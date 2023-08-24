<?php

namespace App\Custom;

use Goutte\Client;

class WebScraper
{
    public function doWebScraping($url) {
        $goutteClient = new Client();
        $parser = new WebParser();
        
        $crawler = $goutteClient->request(
            method: 'GET',
            uri: $url,
        );
        $domain = explode('.', $url)[1];
        $componentSelector = $this->findSelector($domain);
        
        $filterComponent = $crawler->filter(selector: $componentSelector);
        if ($filterComponent->count() != 0) {
            $text = $filterComponent->text();
            return [
                'statusCode' => '200',
                'priceValue' => $parser->parsePrice($domain, $text),
                'currency' => 'EUR',
            ];
        }
        else {
            return [
                'statusCode' => '404',
            ];
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
                $selector = '.product__price';
                break;
        }
        return $selector;
    }
}
 