<?php

namespace App\Http\Livewire;

use App\Charts\ExpensesChart;
use App\Models\Price;
use App\Models\Product;
use App\Models\Url;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class ShowProduct extends Component
{

    public $product;

    public function mount($product)
    {
        $this->product = Product::find($product);
    }

    public function render(ExpensesChart $chart)
    {
        $urls = $this->product->urls;
        $charts = [];
        
        foreach ($urls as $value) {
            $prices = [];
            $dates = [];
            $priceModels = DB::table('prices')->where('url_id', '=', $value->id)->get();

            foreach ($priceModels as $priceModel) {
                array_push($dates, $priceModel->created_at);
                array_push($prices, $priceModel->amount);
            }
            array_push($charts, $chart->build($value->url, $prices, $dates));
        }
        
        return view('livewire.show-product', [
            'charts' => $charts, 
        ]);
    }
}
