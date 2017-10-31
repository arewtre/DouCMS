<?php
class JSSDK {
  private $appId;
  private $appSecret;

  public function __construct($appId, $appSecret) {
    $this->appId = $appId;
    $this->appSecret = $appSecret;
  }
  
  public function getAccessTokenRefresh(){
   
      $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appId&secret=$this->appSecret";
      $res = json_decode($this->httpGet($url));
      $access_token = $res->access_token;
      if ($access_token) {
        $data->expires_in = time() + 7000;
        $data->access_token = $access_token;
        $fp = fopen("./json/access_token.json", "w");
        fwrite($fp, json_encode($data));
        fclose($fp);
      }
      $access_token=$data;
    
    return $access_token;
  }
  
  public function getJsApiTicket() {
    $data = json_decode(file_get_contents("./json/jsapi_ticket.json"));
    if ($data->expire_time < time()) {
      $accessToken = $this->getAccessToken()->access_token;
      $url = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?type=jsapi&access_token=$accessToken";
      $res = json_decode($this->httpGet($url));
      $ticket = $res->ticket;
      if ($ticket) {
        $data->expire_time = time() + 7000;
        $data->jsapi_ticket = $ticket;
        $fp = fopen("./json/jsapi_ticket.json", "w");
        fwrite($fp, json_encode($data));
        fclose($fp);
      }
      $ticket=$data;
    } else {
      $ticket = $data;
    }
    return $ticket;
  }

  public function getAccessToken() {
    $data = json_decode(file_get_contents("./json/access_token.json"));
    if ($data->expires_in < time()) {
      $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=$this->appId&secret=$this->appSecret";
      $res = json_decode($this->httpGet($url));
      $access_token = $res->access_token;
      if ($access_token) {
        $data->expires_in = time() + 7000;
        $data->access_token = $access_token;
        $fp = fopen("./json/access_token.json", "w");
        fwrite($fp, json_encode($data));
        fclose($fp);
      }
      $access_token=$data;
    } else {
      $access_token = $data;
    }
    return $access_token;
  }

  private function httpGet($url) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_TIMEOUT, 500);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_URL, $url);

    $res = curl_exec($curl);
    curl_close($curl);

    return $res;
  }
}

