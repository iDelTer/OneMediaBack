<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Item;
use App\Models\Picture;
use App\Models\Movie;
use App\Models\Serie;
use App\Models\Game;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{

    public function checkRole($data)
    {
        $user = auth()->user();

        if ($user) {
            $role = $user->role;

            if (!$role) return response()->json(['role' => 'No tienes permisos']);
        } else {
            return response()->json(['message' => 'Usuario no autenticado'], 401);
        }
    }

    public function getremotemoviesrandom(Request $request)
    {

        $user = auth()->user();

        if ($user) {
            $role = $user->role;

            if (!$role) return response()->json(['role' => 'No tienes permisos']);
        } else {
            return response()->json(['message' => 'Usuario no autenticado'], 401);
        }

        $url = 'https://api.themoviedb.org/3/discover/movie';
        $headers = [
            'Authorization: Bearer ' . env('THEMOVIEDB_TOKEN'),
            'accept: application/json',
        ];

        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => $headers,
            ],
        ]);

        $response = file_get_contents($url, false, $context);

        if ($response !== false) {
            $data = json_decode($response, true);
            return response()->json($data['results']);
        } else {
            return response()->json(['error' => 'No se ha podido establecer conexión']);
        }
    }

    public function getremotemoviesname(Request $request)
    {

        $this->checkRole($request);

        $searchQuery = $request->input('query');
        LOG::info('esta es la query' . $searchQuery);

        $url = "https://api.themoviedb.org/3/search/movie?query=$searchQuery";
        $headers = [
            'accept: application/json',
            'Authorization: Bearer ' . env('THEMOVIEDB_TOKEN'),
        ];

        $context = stream_context_create([
            'http' => [
                'method' => 'GET',
                'header' => $headers,
            ],
        ]);

        $response = file_get_contents($url, false, $context);

        if ($response !== false) {
            $data = json_decode($response, true);
            return response()->json($data['results']);
        } else {
            return response()->json(['error' => 'No se ha podido establecer conexión']);
        }
    }

    private function createItem($name, $desc, $rel, $fam, $ch)
    {
        $item = new Item();
        $item->name = $name;
        $item->family_id = $fam;
        $item->has_childs = $ch;
        $item->description = $desc;
        $item->release = $rel;
        $item->height_picture = null;
        $item->width_picture = null;
        $item->save();

        return $item->id;
    }

    private function createPicture($itemid, $image)
    {
        $picture = new Picture();
        $picture->item_id = $itemid;
        $picture->origin_link = $image;
        $picture->save();

        return $picture->id;
    }

    public function getmovies(Request $request)
    {
        $movies = Movie::inRandomOrder()->take(10)->with('item')->get();

        // Mapear los campos requeridos para cada película
        $movieData = $movies->map(function ($movie) {
            $pictures = Picture::where('item_id', $movie->item_id)->get();
            $rate = Vote::where('item_id', $movie->item_id)->avg('score');
            $picture = $pictures->first();
            return [
                'id' => $movie->item_id,
                'name' => $movie->item->name,
                'description' => $movie->item->description,
                'release' => $movie->item->release,
                'picture' => $picture ? $picture->origin_link : null,
                'rate' => $rate
            ];
        });

        return response()->json($movieData);
    }

    public function getmovie(Request $request)
    {
        Log::info(['request' => $request]);
        $movie = Item::find($request->id);

        $pictures = Picture::where('item_id', $movie->id)->get();
        $rate = Vote::where('item_id', $movie->id)->avg('score');
        $picture = $pictures->first();
        $movie->picture = $picture->origin_link;
        $movie->rate = $rate;

        return response()->json($movie);
    }

    public function addmovie(Request $request)
    {

        $this->checkRole($request);

        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'release' => 'required|string',
            'picture' => 'required|string',
        ]);

        $validatedData['name'] = str_replace(' ', '_', $validatedData['name']);
        $validatedData['name'] = Str::ascii($validatedData['name']);
        $validatedData['description'] = str_replace(' ', '_', $validatedData['description']);
        $validatedData['description'] = Str::ascii($validatedData['description']);
        $validatedData['release'] = str_replace(' ', '/', $validatedData['release']);
        $validatedData['release'] = Str::ascii($validatedData['release']);

        $item_id = $this->createItem($validatedData['name'], $validatedData['description'], $validatedData['release'], 0, false);
        $this->createPicture($item_id, $validatedData['picture']);
        $movie = new Movie();
        $movie->item_id = $item_id;
        $movie->save();

        return response()->json(['item_id' => $item_id, 'movie_id' => $movie->id, 'message' => 'Movie added successfully']);
    }

    public function deletemovie(Request $request)
    {

        $this->checkRole($request);

        Log::info('Delete: ' . $request);
        $movie = Item::find($request->id);
        if ($movie) {
            $movie->delete();
            Movie::where('item_id', $request->id);
            Picture::where('item_id', $request->id);
            return response()->json(['message' => 'Removed successfully', 'status' => 200]);
        } else {
            return response()->json(['message' => 'Movie not found'], 404);
        }
    }

    public function updatemovie(Request $request)
    {

        $this->checkRole($request);

        Log::info('Update: ' . $request);
        $movie = Item::find($request->id);
        if ($movie) {
            $movie->name = $request->name;
            $movie->description = $request->description;
            $movie->save();
            return response()->json(['message' => 'Updated successfully', 'status' => 200]);
        } else {
            return response()->json(['message' => 'Movie not found'], 404);
        }
    }

    public function ratemovie(Request $request)
    {

        $this->checkRole($request);

        $userId = Auth::id();
        $movie = $request->movie_id;
        $score = $request->score;

        $result = Vote::updateOrInsert(['item_id' => $movie, 'user_id' => $userId], ['score' => $score]);

        return response()->json(['result' => $result]);
    }

    public function getseries(Request $request)
    {
        $series = Serie::all();
        return response()->json($series);
    }

    public function getgames(Request $request)
    {
        $games = Game::all();
        return response()->json($games);
    }

    public function addserie(Request $request)
    {
        return response()->json();
    }
    public function addgame(Request $request)
    {
        return response()->json();
    }
    public function deleteserie(Request $request)
    {
        //
    }

    public function deletegame(Request $request)
    {
        //
    }
}
