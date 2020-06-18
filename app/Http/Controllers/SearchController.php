<?php

namespace App\Http\Controllers;

use App\Models\Product;

class SearchController
{
    public function __invoke()
    {
        if (request('q')) {
            $results = Product::search(request('q'))->simplePaginate(config('vapecrawl.max_products_per_page'));
        } else {
            $terms = collect(Product::POPULAR_KEYWORDS);
            $query = Product::where('name', 'like', "%{$terms[0]}%");
            $terms->skip(1)->each(fn($term) => $query->orWhere('name', 'like', "%{$term}%"));

            $results = $query->inRandomOrder()->simplePaginate(config('vapecrawl.max_products_per_page'));
        }

        $results->load(['vendor.coupons']);

        if (request()->ajax()) {
            return response()->json(compact('results'));
        }
        return view('search', compact('results'));
    }
}
