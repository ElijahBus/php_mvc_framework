<?php

namespace app\core;

class Router
{
  protected array $routes = [];
  public Request $request;
  public Response $response;

  /**
   *  __Construct method
   */
  public function __construct(Request $request, Response $response)
  {
    $this->request = $request;
    $this->response = $response;
  }

  public function get($path, $callback)
  {
    $this->routes['get'][$path] = $callback;
  }

  public function post($path, $callback)
  {
    $this->routes['post'][$path] = $callback;
  }

  /**
   * Resolve the request route
   *
   */
  public function resolve()
  {
    $path = $this->request->getPath();
    $method = $this->request->getMethod();

    $callback = $this->routes[$method][$path] ?? false;

    # Return a 404 status code when the route is not resolved
    if ($callback === false) {
      $this->response->setStatusCode(404);

      return $this->renderView('_404');
    }

    # Return a view by taking taking the string passed as the view name
    if (is_string($callback)) {
      return $this->renderView($callback);
    }

    # Create an instance of the controller class the user has passed
    if (is_array($callback)) {
      $callback[0] = new $callback[0]();
    }

    # Return the controller action
    return call_user_func($callback, $this->request);
  }

  /**
   * Render the view file
   *
   * @param [type] $view
   * @param array $params
   * @return string
   */
  public function renderView($view, $params = []) 
  {
    $layoutContent = $this->layoutContent();
    $viewContent = $this->renderOnlyView($view, $params);

    return str_replace(['{{ content }}', '{{content}}'], $viewContent, $layoutContent);
  }

  /**
   * Replace the placeholder value in the template by the 
   * corresponding view
   *
   * @param [type] $viewContent
   * @return string
   */
  public function renderContent($viewContent)
  {
    $layoutContent = $this->layoutContent();

    return str_replace(['{{ content }}', '{{content}}'], $viewContent, $layoutContent);
  }

  /**
   * Load the default layout of the app
   * @todo app support of custom layout
   *
   */
  protected function layoutContent()
  {
    ob_start();
    include_once Application::$ROOT_DIR . "/views/layouts/main.php";

    return ob_get_clean();
  }

  /**
   * Read the content of the view to render 
   *
   * @param [type] $view
   * @param array $params
   */
  protected function renderOnlyView($view, $params)
  {
    foreach ($params as $key => $param) {
      $$key = $param;
    }

    ob_start();
    include_once Application::$ROOT_DIR . "/views/$view.php";

    return ob_get_clean();
  }
}
