<?php

namespace CryptoTrade;

abstract class Request {
  public function __construct() {
    throw new \Exception("I must be overriden");
  }
  
  public function __toString() {
    throw new \Exception("I must be overriden");
  }
}