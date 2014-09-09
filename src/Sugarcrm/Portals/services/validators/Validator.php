<?php namespace Sugarcrm\Portals\Services\Validators;

abstract class Validator  {

    protected $data;

    public $errors;

    public static $messages = array();

    public static $rules;

    public function __construct($data = null)
    {
        $this->data = $data ?: \Input::all();
    }

     public function passes()
    {
        $validation = \Validator::make($this->data, static::$rules, static::$messages);

        if ($validation->passes()) return true;

        $this->errors = $validation->messages();

        return false;
    }

    public function getErrors()
    {
        return $this->errors;
    }

    public function getData()
    {
        return $this->data;
    }


}