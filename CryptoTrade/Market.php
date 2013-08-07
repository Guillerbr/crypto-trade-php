<?php

namespace CryptoTrade;

class Market {
  protected $primaryCurrency;
  
  protected $secondaryCurrency;
  
  /**
   * initialize a new market
   * 
   * @param \CryptoTrade\Currency $pc primary currency
   * @param \CryptoTrade\Currency $sc secondary currency
   */
  public function __construct($pc, $sc) {
    if ( !($pc instanceof Currency) || !($sc instanceof Currency) ) {
      throw new Exception("Proper Currencies not provided to initialize market");
    }
    $this->primaryCurrency = $pc;
    $this->secondaryCurrency = $sc;
  }
  
  /**
   * buy primary currency with secondary currency
   * 
   * @param type $quantity
   * @param type $price
   */
  public function buy($quantity, $price) {
    
  }
  
  /**
   * sell primary currency for secondary currency
   * 
   * @param type $quantity
   * @param type $price
   */
  public function sell($quantity, $price) {
    
  }
  
  /**
   * get all open trades on market
   * @return array of Trade
   */
  public function getAllTrades() {
    return array();
  }
  
  /**
   * 
   * @return array Trade
   */
  public function getMyTrades() {
    return array();
  }
}