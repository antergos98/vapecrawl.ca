<?php

namespace App\Http\Controllers;

use App\Product;
use MeiliSearch\Index;

class SearchController
{
    public function __invoke()
    {
        $results = [];

        if (request()->query('q')) {
            $results = Product::search(request()->query('q'), function(Index $index, $query, $options) {
                $options['limit'] = 50;
                return $index->search($query, $options);
            })->get();
            $results->load('vendor');
        }

        if (request()->ajax()) {
            return response()->json(compact('results'));
        }

        return view('search', compact('results'));
    }
}
