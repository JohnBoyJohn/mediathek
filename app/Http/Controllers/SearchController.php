<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
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
            $query = $this->assembleQueryString($request);
            $response = Http::get($query);

            if ($response->successful()) {
                return $response->json();
            } else {
                Log::error('***************** error-start *****************');
                Log::error($query);
                Log::error($request->all());
                Log::error($response);
                Log::error('****************** error-end ******************');
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
}
