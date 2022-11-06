<?php

namespace App\Services\Validation;

interface ValidatorInterface
{
    /**
     * Add data to validation against
     *
     * @param array $input
     *
     * @return self
     */
    public function with(array $input);

    /**
     * Test if validation passes
     *
     * @return boolean
     */
    public function passes();

    /**
     * Retrieve validation errors
     *
     * @return array
     */
    public function errors();
}
