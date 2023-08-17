<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Product::create(['name' => 'Ikea Vidga 702.607.68 Gardinenaufhängung, Weiß, 24 Stück'])->urls()
            ->createMany([
                ['url' => 'https://www.amazon.de/dp/B01IQINP1S'],
                ['url' => 'https://www.ebay.de/itm/325508349111'],
            ]);
        \App\Models\Product::create(['name' => 'PlayStation 5 Digital Edition'])->urls()
            ->createMany([
                ['url' => 'https://www.coolblue.de/produkt/865867/playstation-5-digital-edition.html'],
                ['url' => 'https://www.mediamarkt.de/de/product/_sony-playstationr5-digital-edition-2844543.html'],
                ['url' => 'https://www.berlet.de/product/sony-playstation-5-digital-edition-schwarz-320422/'],
                ['url' => 'https://www.alza.de/gaming/playstation-5-digital-edition-d6153938.htm'],
                ['url' => 'https://www.technikdirekt.de/sony-playstation-5-digital-edition-825gb-white-76715-de'],
            ]);

        \App\Models\Product::create(['name' => 'Nike Sneakersocken (6-Paar) mit Mittelfußgummi'])->urls()
            ->createMany([
                ['url' => 'https://www.otto.de/p/nike-sneakersocken-6-paar-mit-mittelfussgummi-C260502613/#variationId=4761845'],
                ['url' => 'https://www.amazon.de/Nike-Socken-Sneakersocken-F%C3%BC%C3%9Flinge-Schwarz/dp/B0869K5BRF/ref=asc_df_B0869K5BRF?tag=bingshoppin0b-21&linkCode=df0&hvadid=80814203012797&hvnetw=o&hvqmt=e&hvbmt=be&hvdev=c&hvlocint=&hvlocphy=&hvtargid=pla-4584413743948977&psc=1'],
                ['url' => 'https://www.deichmann.com/de-de/p-m01788502/0178850200000005?utm_source=bing&utm_medium=cpc&utm_content=product&msclkid=8fdd6e76ffd01b32382b0aa8f511c631&utm_campaign=%23pla%2F_bng_de_de_generic_dsd-sea_shopping_generic-ns&utm_term=4576304857416528'],
                ['url' => 'https://www.cortexpower.de/nike-unisex-sportsocken-everyday-cushion-crew-6pr-sx7666-100-46-50-white-black-45-50.html?utm_source=psmido&utm_medium=preisportal&utm_campaign=psmido-Standard&utm_content=46363-002-04&utm_term=0194954124810'],
                ['url' => 'https://www.basketballdirect.com/de/nike-everyday-cushioned-6-pack-socks-sx7666-100?utm_campaign=simple&utm_content=Nike&utm_source=idealo&utm_medium=preisvergleich&utm_term=Nike+Everyday+Cushioned+6-pack+Socks&size=6682'],
            ]);
    }
}
