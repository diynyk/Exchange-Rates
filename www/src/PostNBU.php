<?php

namespace Fixer;

use \GuzzleHttp\Client;

class PostNBU extends ZaprosNBU {
  const TEMPLATE = 'https://bank.gov.ua/NBUStatService/v1/statdirectory/exchangenew?json&date=%s';
  private function setRates() {
    $url =    
    vsprintf(
        self::TEMPLATE,
        [
         date (self::DATE_FORMAT)
        ]
      );
     // die ($url);          
    
    $response = $this->client->request(
      'POST',
      $url);

    if ($response->getStatusCode() >= 400 ) {
      die('error');
    }
    
    $data = json_decode($response->getBody(), true);
    
    $rates= array_column($data, 'rate', 'cc');
    return $rates;

  }

  
}

