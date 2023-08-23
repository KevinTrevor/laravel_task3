<?php

namespace App\Http\Controllers;

use App\Charts\ExpensesChart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();

        return view('livewire.index-product', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('livewire.create-product');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:255',
        ]);

        $product = Product::create(['name' => $request->name]);

        foreach ($request->input('urls') as $url) {
            $product->urls()->create([
                'url' => $url,
                'product_id' => $product->id,
            ]);
        }

        return redirect()->route('products.index')->with('info','Product created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id, ExpensesChart $chart)
    {
        $product = Product::find($id);

        $urls = $product->urls;
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
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
