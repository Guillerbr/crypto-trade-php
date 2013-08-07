<?php

namespace CryptoTrade;

class Exchange {
  protected $name;
  
  protected $endpoint;
  
  protected $markets;
  
  /**
   * send the request, this should be overidden depending on the exchange
   * 
   * @param \CryptoTrade\Message $message
   */
  protected function sendRequest($message) {
    throw new Exception("This should be overriden.");
  }
  
  /**
   * get all the markets on the exchange
   * 
   * @return array Market
   */
  public function getMarkets() {
    return $this->markets;
  }
  
  public function setName($n) {
    $this->name = $n;
  }
  
  public function setEndpoint($e) {
    $this->endpoint = $e;
  }
}