<?php

namespace App\Custom;

use Goutte\Client;

class WebScrapper
{
    public function doWebScraping($url) {
        $goutteClient = new Client();
        
        $crawler = $goutteClient->request(
            method: 'GET',
            uri: $url,
        );

        $selector = $this->switchSelector($url);
        echo $crawler->filter(selector: '.product__price')->text();
    }

    private function switchSelector(string $url) {
        $splittedUrl = explode(".", $url);

        // splitedUrl[!] is the domain name of the URL.
        switch ($splittedUrl[1]) {
            case 'amazon':
                $selector = '';
                break;
            case 'ebay':
                $selector = '.x-price-primary';
                break;
            case 'coolblue':
                $selector = '';
                break;
            case 'berlet':
                $selector = '';
                break;
            case 'alza':
                $selector = '.price-box__prices';
                break;
            case 'technikdirekt':
                $selector = '.essentials__priceBox h2';
            case 'otto':
                $selector = '.pdp_price__retail-price';
                break;
            case 'deichmann':
                $selector = '.price-info';
                break;
            case 'cortexpower':
                break;
        }
        return $selector;
    }
}
 