<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class AmazonGoutteController extends Controller
{
    public function doWebScraping() {
        $goutteClient = new Client();
        
        $crawler = $goutteClient->request(
            method: 'GET',
            uri: 'https://www.amazon.de/dp/B01IQINP1S'
        );
        $span = $crawler->filter('div.a-section a-spacing-none aok-align-center span.a-price aok-align-center reinventPricePriceToPayMargin priceToPay');
        $totalPrice = $span->text();
        dd($totalPrice);
    }
}
