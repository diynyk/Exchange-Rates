<?php

namespace Fixer\Commands;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Fixer\ZaprosNBU;
class SetRateCommand extends Command {

  private $logger;

  private $getter;

  private $setter;

  private  $rates = [];

  public function __construct($logger, $getter, $setter ) {
    parent::__construct(null);
    $this->logger = $logger;
    $this->getter= $getter;
    $this->setter= $setter;
    
  }

  private function getCurrencies() {
    if (empty($this->rates)) {
      $this->rates = $this->getter->getRates();
    
    }
    return $this->rates;
  }
  
  private  function getCurency($code) {
    return ($this->getCurrencies()[$code]);
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $endpoint = $input->getArgument('rest-endpoint');
    $userId = $input->getArgument('user-id');
    $token = $input->getArgument('user-token');
    $this->setter
      ->setEndpoint($endpoint)
      ->setUserId($userId)
      ->setToken($token)
      ;

    $currency = $input->getArgument('currency');
    $factor = 1 + (((int) $input->getArgument('factor')) / 100);
    $amount = $this->getCurency($currency) * $factor;
    $this->setter->setRate($currency,round($amount,2));


   return 0;
  }
  
}