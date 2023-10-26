<?php

namespace App\Exception;

use Symfony\Component\Config\Definition\Exception\InvalidTypeException;

class MoviesInvalidTypeException extends InvalidTypeException
{
    public function __construct()
    {
        parent::__construct('Returned value must be type of array');
    }
}