<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SearchController extends Controller
{
    public function show () {
        return view('dashboard');
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
                Log::debug($response->json());
                return $response->json();
            } else {
                Log::error(date("m.d.Y"));
                Log::error($query);
                Log::error($request->all());
                Log::error($response);
            }
        }
    }

    private function assembleQueryString(Request $request) {
        $url = env('MOVIE_API_URL') . '?apikey=' . env('MOVIE_API_KEY');
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
