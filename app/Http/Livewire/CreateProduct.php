<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CreateProduct extends Component
{
    public $name = '';
    public $urls = [];

    public function save()
    {
        $product = Product::create(
            $this->only(['name'])
        );

        foreach($this->urls as $url) {
            $product->urls()->create([
                'url' => $url,
            ]);
        }

        return $this->redirect('/products');
    }

    public function render()
    {
        return view('livewire.create-product');
    }
}
