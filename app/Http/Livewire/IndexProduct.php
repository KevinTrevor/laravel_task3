<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class IndexProduct extends Component
{
    public function render()
    {
        return view('livewire.index-product', [
            'products' => Product::all() 
        ]);
    }
}
