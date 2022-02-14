<?php

namespace App\Http\Controllers;

use App\Videogame;
use App\User;
use App\Mail\VideogameDeleted;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;


class ApiController extends Controller
{
    
    public function getVideogames() {

        $videogames = Videogame::all();

        return json_encode($videogames);
    }

    public function deleteVideogame($id) {

        $videogame = Videogame::findOrFail($id);
        
        $videogame -> delete();
        
        $this -> sendDeleteMail($videogame);
        
        return json_encode($videogame);
    }
    
    private function sendDeleteMail($videogame) {

        $user = Auth::user();

        Mail::to($user -> email) -> send(new VideogameDeleted($videogame, $user));
        Mail::to('admin@videogames.db') -> send(new VideogameDeleted($videogame, $user));
    }
}
