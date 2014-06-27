<?php namespace Dadleyy\Rdio;

use Illuminate\Support\ServiceProvider;

class RdioServiceProvider extends ServiceProvider {

  protected $defer = false;

  public function boot() {
    $this->package('dadleyy/rdio');
  }

  public function register() {
  }

  public function provides() {
    return array();
  }

}
