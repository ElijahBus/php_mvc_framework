<?php

namespace app\core;

class Controller
{
    /**
     * Render the view to the user
     *
     * @param string $view, The view name
     * @param array $params, The list of params to pass to the view
     */
    public function  render($view, $params = [])
    {
        return Application::$app->router->renderView($view, $params);
    }
}
