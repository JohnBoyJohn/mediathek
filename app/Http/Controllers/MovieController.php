<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use DateTime;

class MovieController extends Controller
{
    public function create(Request $request)
    {
        $this->validatePostData($request);

        try {
            //movie already in db? then skip insert 
            $movie = Movie::firstWhere('imdbID', $request->input('imdbID'));
            if($movie) {
                return $this->attachMovieToUser($movie->id);
            }
            // insert movie 
            $movieData = $this->assembleDataForModel($request);
            $movie = Movie::create($movieData);

            return $this->attachMovieToUser($movie->id);
        } catch (\Throwable $th) {
            $this->log($th, $request);
        }
        
        return response()->json([
            'status' => 500,
            'msg' => __('app.messages.error'),
        ]);
    }

    private function validatePostData(Request $request) {
        $request->validate([
            'imdbID' => ['required', 'string', 'max:255'],
            'Title' => ['required', 'string', 'max:255'],
            'Runtime' => ['required', 'string', 'max:255'],
            'Genre' => ['required', 'string', 'max:255'],
            'Plot' => ['required', 'string'],

            'Released' => ['string', 'nullable', 'max:25'],
            'Director' => ['string', 'nullable', 'max:255'],
            'Writer' => ['string', 'nullable', 'max:255'],
            'Actors' => ['string', 'nullable', 'max:255'],
            'Language' => ['string', 'nullable', 'max:255'],
            'Country' => ['string', 'nullable', 'max:255'],
            'Awards' => ['string', 'nullable', 'max:255'],
            'Poster' => ['string', 'nullable', 'max:255'],
            'imdbRating' => ['string', 'nullable', 'max:255'],
            'Type' => ['string', 'nullable', 'max:255'],
            'Boxoffice' => ['string', 'nullable', 'max:255'],
        ]);
    }

    private function assembleDataForModel(Request $request) {
        $imdbRating = $request->input('imdbRating') != config('app.invalidApiString') 
                ? $request->input('imdbRating') 
                : null;
        $releaseDate = $request->input('Released') != config('app.invalidApiString')
                ? DateTime::createFromFormat('d M Y', $request->input('Released'))->format('Y-m-d')
                : null;

        $movieData = [
            'imdbID' => $request->input('imdbID'),
            'title' => $request->input('Title'),
            'released' => $releaseDate,
            'runtime' => $request->input('Runtime'),
            'genre' => $request->input('Genre'),
            'plot' => $request->input('Plot'),

            'director' => $request->input('Director'),
            'writer' => $request->input('Writer'),
            'actors' => $request->input('Actors'),
            'language' => $request->input('Language'),
            'country' => $request->input('Country'),
            'awards' => $request->input('Awards'),
            'poster' => $request->input('Poster'),
            'imdbRating' => $imdbRating,
            'type' => $request->input('Type'),
            'boxoffice' => $request->input('Boxoffice'),
        ];

        $movieData = array_map(function ($val) {
            return $val != config('app.invalidApiString') ? $val : null;
        }, $movieData);

        return $movieData;
    }

    private function attachMovieToUser(int $id) {
        $user = User::find(Auth::id());
        if (!$user->movies()->find($id)) {
            $user->movies()->attach([$id]);
        }

        return response()->json([
            'status' => 200,
            'msg' => __('app.messages.movie.success'),
        ]);
    }

    private function log(\Throwable $th, Request $request) {
        Log::error('***************** error-start *****************');
        Log::error($request->all());
        Log::error($th);
        Log::error('****************** error-end ******************');

    }
}
