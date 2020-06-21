<?php

namespace App\Http\Controllers;

use App\Product;

class SearchController
{
    public function __invoke()
    {
        $results = [];

        if (request()->query('q')) {
            $results = Product::search(request()->query('q'))->get();
            $results->load('vendor');
        }

        if (request()->ajax()) {
            return response()->json(compact('results'));
        }

        return view('search', compact('results'));
    }
}
