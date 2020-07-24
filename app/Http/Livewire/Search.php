<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Product;

class Search extends Component
{
	public $q = '';
    public $products = [];

    public function mount()
    {
        $this->q = request('q');

        if ($this->q) {
            $this->searchProducts();
        }
    }

	public function searchProducts()
    {
        $this->products = Product::search($this->q)
            ->get()
            ->load('vendor');

        $this->emit('fetch:completed', $this->q);
	}

	public function render()
	{
		return view('livewire.search');
	}
}
