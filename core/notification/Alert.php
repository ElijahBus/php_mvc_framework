<?php

namespace app\core\notification;

use app\core\Application;

class Alert
{
    private $flashMessage;

    public function __construct($status)
    {
        $this->flashMessage = Application::$app->session->getFlash($status);
    }

    public function __toString()
    {

        if ($this->flashMessage) {
            return sprintf(
                "
                    <div class='alert alert-success'>
                        %s
                    </div>    
                ",
                $this->flashMessage
            );
        }

        return '';
    }
}
