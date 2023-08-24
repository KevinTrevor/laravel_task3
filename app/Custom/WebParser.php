<?php

namespace App\Custom;

class WebParser
{
    public function parsePrice(string $domain, string $unparse_price) {
        switch ($domain) {
            case 'amazon':
                $priceFloat = 0.0;
                break;
            case 'ebay':
                $priceStr = explode('/', explode(" ", $unparse_price)[1])[0];
                $priceStr = str_replace(',', '.', $priceStr);
                $priceFloat = floatval($priceStr);
                break;
            case 'coolblue':
                $priceFloat = 0.0;
                break;
            case 'mediamarkt':
                $priceFloat = 0.0;
                break;
            case 'berlet':
                $priceFloat = 0.0;
                break;
            case 'alza':
                $priceFloat = 0.0;
                break;
            case 'technikdirekt':
                $priceFloat = 0.0;
            case 'otto':
                $priceStr = explode('/u00a0', $unparse_price)[0];
                $priceStr = str_replace(',', '.', $priceStr);
                $priceFloat = floatval($priceStr);
                break;
            case 'deichmann':
                $priceStr = explode(' ', $unparse_price)[0];
                $priceStr = str_replace(',', '.', $priceStr);
                $priceFloat = floatval($priceStr);
                break;
            case 'cortexpower':
                $priceStr = explode(' ', $unparse_price)[0];
                $priceStr = str_replace(',', '.', $priceStr);
                $priceFloat = floatval($priceStr);
                break;
            case 'basketballdirect':
                $priceFloat = 0.0;
                break;
        }
        return $priceFloat;
    }
}