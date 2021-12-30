<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;
use App\Models\User;

class ListController extends Controller
{
    public function show () {
        $user = User::find(Auth::id());
        $movies = $user->movies()->take(100)->get();

        return view('dashboard')->with([
            'movies' => $movies,
        ]);
    }
}
