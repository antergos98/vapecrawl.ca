<?php

namespace App\Http\Livewire;

use Illuminate\Support\Collection;
use Livewire\Component;
use App\Product;

class Search extends Component
{
    public $q = '';
    public $products = [];
    public $originalProducts = [];
    public $lastSearch = '';
    public $sort;
    public $availability;

    public function updatedSort()
    {
        $this->applyFilters();
    }

    public function updatedAvailability()
    {
        $this->applyFilters();
    }

    public function mount()
    {
        $this->q = request('q');

        if ($this->q) {
            $this->searchProducts();
        }
    }

    public function searchProducts()
    {
        if (is_null($this->q) || $this->q === "") {
            return;
        }

        if ($this->q === $this->lastSearch) {
            return;
        }

        $this->products = $this->originalProducts = Product::search($this->q)
            ->get()
            ->load('vendor');

        $this->applyFilters();

        $this->emit('fetch:completed', $this->q);

        $this->lastSearch = $this->q;
    }

    public function applyFilters()
    {
        if ($this->availability === null || $this->availability === "") {
            $this->availability = "none";
        }

        if ($this->sort === null || $this->sort === "") {
            $this->sort = "none";
        }

        switch ($this->availability) {
            case '0':
                $this->products = $this->originalProducts->where('in_stock', 0);
                break;
            case '1':
                $this->products = $this->originalProducts->where('in_stock', 1);
                break;
            case '':
                $this->products = $this->originalProducts;
                break;
        }

        switch ($this->sort) {
            case 'asc':
                $this->products = $this->products->sortBy('price');
                break;
            case 'desc':
                $this->products = $this->products->sortByDesc('price');
                break;
            case '':
                $this->products = $this->originalProducts;
                break;
        }

        $this->render();
        $this->emit('filters:applied');
    }

    public function render()
    {
        return view('livewire.search');
    }
}
