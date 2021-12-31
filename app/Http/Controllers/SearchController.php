<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    public function show () {
        return view('search');
    }

    public function search (Request $request) {
        $validated = $request->validate([
            'title' => 'required|max:255|string',
            'year' => 'nullable|integer',
            'type' => 'nullable|string|in:movie,series,episode'
        ]);

        if ($validated) {
            try {
                //code...
            } catch (\Throwable $th) {
                //throw $th;
            }
            $query = $this->assembleQueryString($request);
            $response = Http::get($query);
            $saved = null;

            if($response['imdbID']) {
                $user = User::find(Auth::id());
                $saved = $user->movies()
                        ->where('imdbID', $response['imdbID'])
                        ->first();
            }

            if ($response->successful()) {
                return response()->json([
                    'data' => $response->json(),
                    'saved' => $saved ? true : false,
                ]);
                return $response->json();
            } else {
                $this->log($request, $query, $response);
            }
        }
    }

    private function assembleQueryString(Request $request) {
        $url = env('MOVIE_API_URL') . '?apikey=' . env('MOVIE_API_KEY') . '&plot=full';
        $title = $request->input('title');
        $year = $request->input('year');
        $type = $request->input('type');

        $search = $url . '&t=' . $title;
        if ($year) {
            $search .= '&y=' . $year;
        }
        if ($type) {
            $search .= '&type=' . $type;
        }

        return $search;
    }

    private function log(Request $request, string $query, Response $response) {
        Log::error('***************** error-start *****************');
        Log::error($query);
        Log::error($request->all());
        Log::error($response);
        Log::error('****************** error-end ******************');
    }
}
