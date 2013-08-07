<?php

namespace CryptoTrade\Exchange\Cryptsy\Request\Market;

class Listing extends \CryptoTrade\Request\Market\Listing {
  private $requestData;
  
  public function __construct($exchange) {
    $this->exchange = $exchange;
    
    $mt = explode(" ", microtime());
    
    $this->requestData = array(
      'method' => 'getmarkets',
      'nonce' => $mt[1].$mt[0],
    );
  }
  
  public function getResponse($text) {
    return new \CryptoTrade\Response\Market\Listing($text);
  }
  
  public function __toString() {
    return http_build_query($this->requestData, '', '&');
  }
}