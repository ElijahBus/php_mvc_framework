<?php

namespace app\core;

class Application
{
  private Router $router;

  public function __construct()
  {
    $this->router = new Router();
  }

  public function run()
  {
    // todo
  }
}
