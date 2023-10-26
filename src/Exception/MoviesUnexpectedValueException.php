<?php

namespace App\Exception;


use UnexpectedValueException;

class MoviesUnexpectedValueException extends UnexpectedValueException
{
    public function __construct()
    {
        parent::__construct('Returned value must not be empty');
    }
}