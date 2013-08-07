<?php

namespace CryptoTrade\Exchange;

class Cryptsy extends \CryptoTrade\Exchange {
  protected $apiKey;
  protected $secretKey;
  
  /**
   * 
   * @param string $apiKey
   * @param string $secretKey
   */
  public function __construct($apiKey, $secretKey) {
    $this->setName("Cryptsy");
    $this->setEndpoint("https://www.cryptsy.com/api");
    $this->apiKey = $apiKey;
    $this->secretKey = $secretKey;
    
    $req = new \CryptoTrade\Exchange\Cryptsy\Request\Market\Listing($this);
    $this->markets = $this->sendRequest($req);
  }
  
  /**
   * @inherited
   */
  protected function sendRequest($message) {
    $postData = (string)$message;
    
    $sign = hash_hmac("sha512", $postData, $this->secretKey);
    
    $headers = array(
      'Sign: '.$sign,
      'Key: '.$this->apiKey,
    );
    
    // our curl handle (initialize if required)
    static $ch = null;
    if (is_null($ch)) {
      $ch = curl_init();
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; Cryptsy API PHP client; PHP/'.phpversion().')');
    }
    
    curl_setopt($ch, CURLOPT_URL, $this->endpoint);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    // run the query
    $res = curl_exec($ch);

    if ($res === false) {
      throw new Exception('Could not get reply: '.curl_error($ch));
    }
    $dec = json_decode($res, true);
    if (!$dec) {
      throw new Exception('Invalid data received, please make sure connection is working and requested API exists');
    }
    return $message->getResponse();
  }
}