<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product;

class Search extends Component
{
	public $q = '';
    public $products = [];
    public $lastSearch = '';
    public $sort;

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

        $this->products = Product::search($this->q)
            ->get()
            ->load('vendor');

        $this->applyFilters();

        $this->emit('fetch:completed', $this->q);

        $this->lastSearch = $this->q;
	}

    public function applyFilters()
    {
//        dump($this->sort);
	}

	public function render()
	{
		return view('livewire.search');
	}
}
