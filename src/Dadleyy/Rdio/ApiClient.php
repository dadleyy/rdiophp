<?php namespace Dadleyy\Rdio;

use \OAuth;

define('RDIO_API_ENDPOINT', 'http://api.rdio.com/1/');
define('RDIO_REQUEST_TOKEN', 'http://api.rdio.com/oauth/request_token');
define('RDIO_ACCESS_TOKEN', 'http://api.rdio.com/oauth/access_token');

class ApiClient {

  private $client_id;
  private $client_secret;
  private $callback;
  private $auth;

  public function __construct($client_id, $secret, $auth_callback = null) {
    $this->client_id = $client_id;
    $this->client_secret = $secret;

    if($auth_callback !== null)
      $this->callback = $auth_callback;

    $this->auth = new OAuth($this->client_id, $this->client_secret, OAUTH_SIG_METHOD_HMACSHA1, OAUTH_AUTH_TYPE_FORM);
  }

  public function activity($user_key) {
    return $this->run(array(
      'method' =>  'getActivityStream',
      'user' => $user_key,
      'scope' => 'user'
    ));
  }

  public function heavyRotation($user_key, $type = 'artists') {
    return $this->run(array(
      'method' => 'heavyRotation',
      'user' => $user_key,
      'type' => $type
    ));
  }

  private function run($params) {
    $this->auth->fetch(RDIO_API_ENDPOINT, $params, OAUTH_HTTP_METHOD_POST);
    return json_decode($this->auth->getLastResponse(), true);
  }

}

?>
