<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Serie;
use App\Models\Game;

class MovieController extends Controller
{
    private function createItem(){
        // Coge los datos
        // rellena estos datos (id, family_id(0), has_childs(false), description, release, height_picture(null), width_picture(null))
        // Retorna la id para las siguientes funciones
    }
    public function getmovies(Request $request){
        $movies = Movie::all(); 
        return response()->json($movies);
    }

    public function getseries(Request $request){
        $series = Serie::all(); 
        return response()->json($series);
    }

    public function getgames(Request $request){
        $games = Game::all(); 
        return response()->json($games);
    }

    public function addmovie(Request $request){
        // Coge la ID de createItem
        // Crea una nueva película (id, item_id)
        return response()->json();
    }
    public function addserie(Request $request){
        return response()->json();
    }
    public function addgame(Request $request){
        return response()->json();
    }

    public function deletemovie(Request $request){
        //
    }
    public function deleteserie(Request $request){
        //
    }

    public function deletegame(Request $request){
        //
    }
}
