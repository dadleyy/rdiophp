<?php

use Dadleyy\Rdio\ApiClient;

class ApiClientTest extends PHPUnit_Framework_TestCase {

  public function testActivity() {
    $client = new ApiClient();
    $this->assertTrue(is_array($client->activity('s8297079')));
  }

}

?>
