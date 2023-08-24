<?php

namespace App\Console;

use App\Models\Product;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use App\Custom\WebScraper;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        /*
        $schedule->call(function () {
            $webScraper = new WebScraper();
            $products = Product::all();

            foreach ($products as $product) {
                $urls = $product->urls;

                foreach ($urls as $url) {
                    $uri = $url->url;
                    $scraping = $webScraper->doWebScraping($uri);
                    
                    if ($url->prices->count() == 0) {
                        
                    }
                    if ($scraping['statusCode'] == 200) {
                        $url->prices()->create([
                        'url_id' => $url->id,
                        'amount' => $scraping['priceValue'],
                        'currency' => $scraping['currency'],
                    ]);
                }
            }
        })->everyMinute();
        */
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
