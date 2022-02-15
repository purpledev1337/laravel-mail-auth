<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mailValidate($id)
    {
        
        $user = User::findOrFail($id);

        $user -> email_verified_at = Carbon::now();

        $user -> save();

        return redirect() -> route('home');
    }
}
