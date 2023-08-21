<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CreateProduct extends Component
{
    public $name = '';

    public function save()
    {
        Product::create(
            $this->only(['name'])
        );

        return $this->redirect('/products');
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
