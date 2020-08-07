<?php

namespace App\Http\Controllers;

use App\Product;

class SearchController
{
    public function __invoke()
    {
        if (request('q')) {
            $results = Product::search(request('q'), function ($index, $query, $options) {
                $options['limit'] = 32;
                $options['offset'] = request('skip') ?? 0;
                return $index->search($query, $options);
            })->get();
        } else {
            $results = Product::orderBy('id', 'desc')->skip(request('skip') ?? 0)->limit(32)->get();
        }

        $results = $results->load('vendor.coupons');

        if (request()->ajax()) {
            return response()->json(compact('results'));
        }

        return view('search', compact('results'));
    }
}
