<?php

namespace App\Http\Controllers;

use App\Product;
use MeiliSearch\Index;

class SearchController
{
    public function __invoke()
    {
        if (request()->query('q') != null) {
            $results = Product::search(request()->query('q'), function(Index $index, $query, $options) {
                $options['limit'] = 1000;
                return $index->search($query, $options);
            })->get();

            $results->load('vendor');

            $results = $results->skip(request()->query('skip') ?? 0)->take(48)->flatten();

            if (request()->ajax()) {
                return response()->json(compact('results'));
            }

            return view('search', compact('results'));
        }

        $results = Product::with('vendor')->limit(48)->skip(request()->query('skip') ?? '0')->get();

        if (request()->ajax()) {
            return response()->json(compact('results'));
        }

        return view('search', compact('results'));
    }
}
