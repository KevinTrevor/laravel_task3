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
            uri: 'https://www.basketballdirect.com/de/nike-everyday-cushioned-6-pack-socks-sx7666-100?setLanguage=true&size=6471'
        );
        echo $crawler->filter(selector: '.product__price')->text();

        //echo "<pre>";
        //print_r($crawler);
        //$totalPrice = $span->text();
        //print_r($totalPrice);
    }
}
