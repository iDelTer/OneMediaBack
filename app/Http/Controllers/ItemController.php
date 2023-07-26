<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Item;
use App\Models\Movie;
use App\Models\Serie;
use App\Models\Game;

class ItemController extends Controller
{

    public function getremotemovies(Request $request)
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
    public function getmovies(Request $request)
    {
        $movies = Movie::all();
        return response()->json($movies);
    }
    public function addmovie(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'release' => 'required|string'
        ]);

        $validatedData['name'] = str_replace(' ', '_', $validatedData['name']);
        $validatedData['name'] = Str::ascii($validatedData['name']);
        $validatedData['description'] = str_replace(' ', '_', $validatedData['description']);
        $validatedData['description'] = Str::ascii($validatedData['description']);
        $validatedData['release'] = str_replace(' ', '/', $validatedData['release']);
        $validatedData['release'] = Str::ascii($validatedData['release']);

        $item_id = $this->createItem($validatedData['name'], $validatedData['description'], $validatedData['release'], 0, false);
        $movie = new Movie();
        $movie->item_id = $item_id;
        $movie->save();

        return response()->json(['item_id' => $item_id, 'movie_id' => $movie->id, 'message' => 'Movie added successfully']);
    }

    public function deletemovie(Request $request)
    {
        //
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
