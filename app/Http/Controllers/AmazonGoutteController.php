<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Goutte\Client;

class AmazonGoutteController extends Controller
{
    public function doWebScraping() {
        $goutteClient = new Client();
        
        $url = 'https://www.ebay.de/itm/325508349111';

        $crawler = $goutteClient->request(
            method: 'GET',
            uri: $url,
        );

        $selector = $this->switchSelector($url);
        echo $crawler->filter(selector: $selector)->text();
    }

    private function switchSelector(string $url) {
        $splittedUrl = explode('.', $url);

        switch ($splittedUrl[1]) {
            case 'amazon':
                $selector = '';
                break;
            case 'ebay':
                $selector = '.x-price-primary';
                break;
            case 'coolblue':
                $selector = '.js-sales-price-wrapper';
                break;
            case 'mediamarkt':
                $selector = '.ProductDetails-styled__StyledSection-sc-b2e6b065-0 MZbQR span';
                break;
            case 'berlet':
                $selector = '';
                break;
            case 'alza':
                $selector = '.price-box__prices';
                break;
            case 'technikdirekt':
                $selector = ".price__detail flex h2";
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
                $selector = '';
                break;
        }
        return $selector;
    }
}
