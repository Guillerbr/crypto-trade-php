<?php

namespace CryptoTrade\Exchange\Cryptsy\Response\Market;

class Listing extends \CryptoTrade\Response\Market\Listing {
  protected $markets;
  
  public function __construct($return) {
    //parse out the data
    foreach ($return['return'] as $m) {
      $market = new \CryptoTrade\Market($m['primary_currency_code'], $m['secondary_currency_code']);
      $this->markets[] = $market;
    }
  }
}