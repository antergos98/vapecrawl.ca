<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;

class SearchController
{
    public function __invoke()
    {
        if (request('q')) {
            $results = Product::search(request('q'), function ($index, $query, $options) {
                $options['limit'] = 32;
                $options['offset'] = (int) request('skip') ?? 0;
                return $index->search($query, $options);
            })->get();
        } else {
            $results = Product::orderBy('id', 'desc')->skip(request('skip') ?? 0)->limit(32)->get();
        }

        $results = $results->load([
            'vendor.coupons' => fn ($query) => $query->where('expires_at', '>', Carbon::now())->orWhereNull('expires_at')->orderBy('expires_at', 'desc')
        ]);

        if (request()->ajax()) {
            return response()->json(compact('results'));
        }

        return view('search', compact('results'));
    }
}
