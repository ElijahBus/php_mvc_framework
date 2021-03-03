<?php

namespace app\core;

class Application
{

  public static  Application $app;
  public static string $ROOT_DIR;

  public Router $router;
  public Request $request;
  public Response $response;
  public Controller $controller;

  public function __construct($rootPath)
  {
    self::$app = $this;
    self::$ROOT_DIR = $rootPath;

    $this->request = new Request();
    $this->response = new Response();
    $this->router = new Router($this->request, $this->response);
  }

  /**
   * Run a new instance of the application to the resolved route
   */
  public function run()
  {
    echo $this->router->resolve();
  }

  /**
   * Get the value of controller
   */ 
  public function getController()
  {
    return $this->controller;
  }

  /**
   * Set the value of controller
   *
   * @return  self
   */ 
  public function setController($controller)
  {
    $this->controller = $controller;

    return $this;
  }
}
