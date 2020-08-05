<?php

namespace App\Http\Controllers;

use App\Product;
use MeiliSearch\Index;

class SearchController
{
    public function __invoke()
    {
        if (request('q')) {
            $results = Product::search(request('q'), function(Index $index, $query, $options) {
                $options['limit'] = 10000;
                return $index->search($query, $options);
            })->get();
        } else {
            $results = Product::orderBy('id', 'desc')->get();
        }

        $results = $results->load('vendor');

        $results = $results->skip(request('skip') ?? 0)->take(32)->flatten();

        if (request()->ajax()) {
            return response()->json(compact('results'));
        }

        return view('search', compact('results'));
    }
}
