<?php

namespace App\Jobs;

use App\Custom\WebScraper;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class WebScrapingJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $webScraper = new WebScraper();
        $products = Product::all();

        foreach ($products as $product) {
            $urls = $product->urls;
            foreach ($urls as $url) {
                $uri = $url->url;
                $scraping = $webScraper->doWebScraping($uri);
                    
                $priceRegistered = $url->prices->count();

                if ($scraping['statusCode'] == 200) {
                    if ($priceRegistered != 0) {
                        $lastPrice = Price::orderBy('created_at', 'desc')->first();
                        $lastPriceAmount = round($lastPrice->amount, 2);
                        $actualPriceAmount = $scraping['priceValue'];
                        $tolerance = 0.00001;

                        if (($actualPriceAmount - $lastPriceAmount) < $tolerance) { 
                            continue; 
                        }
                    }

                    $url->prices()->create([
                        'url_id' => $url->id,
                        'amount' => $scraping['priceValue'],
                        'currency' => $scraping['currency'],
                    ]);
                }
            }
        }
    }
}
