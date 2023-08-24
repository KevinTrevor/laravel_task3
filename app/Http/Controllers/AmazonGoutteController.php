<?php

namespace App\Http\Controllers;

use App\Custom\WebParser;
use App\Custom\WebScraper;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;
use Goutte\Client;
use Illuminate\Support\Facades\DB;

class AmazonGoutteController extends Controller
{
    public function doWebScraping() {
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
                        $lastPriceAmount = floatval($lastPrice->amount);
                        $epsilon = 0.00001;
                        if ((round($lastPriceAmount, 2) - round($scraping['priceValue'], 2)) < $epsilon) continue;
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

    private function findSelector(string $domain) {
        switch ($domain) {
            case 'amazon':
                $selector = '.a-section a-spacing-none aok-align-center';
                break;
            case 'ebay':
                $selector = '.x-price-primary';
                break;
            case 'coolblue':
                $selector = '.js-sales-price-wrapper';
                break;
            case 'mediamarkt':
                $selector = '.ProductDetails-styled__StyledSection-sc-b2e6b065-0 MZbQR';
                break;
            case 'berlet':
                $selector = '.primary-price';
                break;
            case 'alza':
                $selector = '.price-box__prices';
                break;
            case 'technikdirekt':
                $selector = ".price__detail flex";
            case 'otto':
                $selector = '.pdp_price__retail-price';
                break;
            case 'deichmann':
                $selector = '.price-info';
                break;
            case 'cortexpower':
                $selector = '.original';
                break;
            case 'basketballdirect':
                $selector = '.product__price';
                break;
        }
        return $selector;
    }
}
