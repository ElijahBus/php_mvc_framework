<?php

namespace app\core;

class Controller
{
    public string $layout = "main";
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

    /**
     * Set the value of layout
     *
     * @return  self
     */ 
    public function setLayout($layout)
    {
        $this->layout = $layout;

        return $this;
    }
}
