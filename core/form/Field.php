<?php

namespace app\core\form;

use app\core\Model;

class Field
{
    public const TYPE_TEXT = 'text';
    public const TYPE_EMAIL = 'email';
    public const TYPE_NUMBER = 'number';
    public const TYPE_PASSWORD = 'password';



    private Model $model;
    private $attribute;
    private $type;

    public function __construct(Model $model, $attribute) {
        $this->model = $model;
        $this->attribute = $attribute;
        $this->type = self::TYPE_TEXT;
    }

    public function __toString()
    {
        return sprintf(
            '
            <div>
                <label for="" class="form-label">%s</label>
                <input type="%s" name="%s" value="%s" class="form-control %s" id="">
                <span class="invalid-feedback">%s</span>
            </div>
            ',
            $this->attribute,
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasErrors($this->attribute) ? 'is-invalid' : '',
            $this->model->getFirstError($this->attribute) ?? ''
        );
    }

    public function password()
    {
        $this->type = self::TYPE_PASSWORD;
        
        return $this;
    }

    public function number()
    {
        $this->type = self::TYPE_NUMBER;

        return $this;
    }

    public function email()
    {
        $this->type = self::TYPE_EMAIL;

        return $this;
    }
    
}
