<?php

namespace Fixer;

use \GuzzleHttp\Client;

class Currency extends EntityAbstract {

  private $endpoint;
  private $userId;
  private $token;


  public function setEndpoint($endpoint) {
    $this->endpoint = $endpoint;
    return $this;
  }

  public function setUserId($userId) {
    $this->userId = $userId;
    return $this;
  }


  public function setToken($token) {
    $this->token = $token;
    return $this;
  }

    public function setRate($id, $amount){
        $ENDPOINT_TEMPLATE = '%s/%s/%s/crm.%s.update.json?id=%s';
    
        $payload = [
          'ID' => $id,
          'fields' => [
            'AMOUNT' => $amount
          ]
        ];
    
        $response = $this->client->request(
          'POST',
          vsprintf(
            $ENDPOINT_TEMPLATE,
            [
              $this->endpoint,
              $this->userId,
              $this->token,
              $this->entity,
              $id
            ]
          ), ['json' => $payload]);


      }












}

