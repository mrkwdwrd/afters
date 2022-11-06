<?php

namespace App\Services\Validation;

use Illuminate\Validation\Factory;

abstract class AbstractValidator implements ValidatorInterface
{
    /**
     * The validator instance
     *
     * @var \Illuminate\Validation\Factory
     */
    protected $validator;

    /**
     * Data (key => value array) to be validated
     *
     * @var array
     */
    protected $data = array();

    /**
     * Validation Rules
     *
     * @var array
     */
    protected $rules = array();

    /**
     * Validation errors
     *
     * @var \Illuminate\Support\MessageBag
     */
    protected $errors;

    /**
     * Custom validation messages
     *
     * @var array
     */
    protected $messages = array();

    /**
     * @param \Illuminate\Validation\Factory $validator
     */
    public function __construct(Factory $validator)
    {
        $this->validator = $validator;
    }

    /**
     * Set data to validate
     *
     * @param array $data
     *
     * @return self
     */
    public function with(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * Pass the data and the rules to the validator
     *
     * @return boolean
     */
    public function passes()
    {
        $validator = $this->validator->make($this->data, $this->rules, $this->messages);

        if ($validator->passes()) {
            return true;
        }

        $this->errors = $validator->errors();

        return false;
    }

    /**
     * Return errors
     *
     * @return \Illuminate\Support\MessageBag
     */
    public function errors()
    {
        return $this->errors;
    }

    /**
     * Get the prepared validation rules
     *
     * @return array
     */
    public function getPreparedRules()
    {
        return $this->rules;
    }

    /**
     * Get the custom validation messages
     *
     * @return array
     */
    public function getMessages()
    {
        return $this->messages;
    }
}
