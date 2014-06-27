<?php

use Dadleyy\Rdio\ApiClient;

class ApiClientTest extends PHPUnit_Framework_TestCase {

  public function testActivity() {
    $client = new ApiClient(getenv('RDIO_CLIENT'), getenv('RDIO_SECRET'));
    $this->assertTrue(is_array($client->activity('s8297079')));
  }

}

?>
