<?php

namespace Database\Seeders;

use App\Models\Url;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Price::create([
            'url_id' => Url::find(1)->id,
            'amount' => 10.95,
            'currency' => 'EUR'
        ]);

        \App\Models\Price::create([
            'url_id' => Url::find(2)->id,
            'amount' => 4.55,
            'currency' => 'EUR'
        ]);
    }
}
