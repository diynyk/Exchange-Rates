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

  private  $rates = [];

  public function __construct($logger, $getter ) {
    parent::__construct(null);
    $this->logger = $logger;
    $this->getter= $getter;
    
  }

  private function getCurrencies() {
    if (empty($this->rates)) {
      $this->rates = $this->getter->getRates();
    
    }
    return $this->rates;
  }
  
  private  function getCurency($code, $factor) {
    return ($this->getCurrencies()[$code])*$factor;
  }

  protected function execute(InputInterface $input, OutputInterface $output)
  {
    $sCurrency = $input->getArgument('sCurrency');
    $tCurrency = $input->getArgument('tCurrency');
    $factor = 1 + (((int) $input->getArgument('factor')) / 100);

    $rate = $this->getCurency($sCurrency, $factor) / $this->getCurency($tCurrency, $factor);
    
    die($rate);
   return 0;
  }
  
}