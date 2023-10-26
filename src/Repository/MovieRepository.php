<?php

namespace App\Repository;

use App\Exception\MoviesInvalidTypeException;
use App\Exception\MoviesUnexpectedValueException;

class MovieRepository implements MovieRepositoryInterface
{

    public function __construct(private readonly string $filePath)
    {
    }

    public function getMovies(): array
    {
        $movies = require($this->filePath);

        if (!is_array($movies)) {
            throw new MoviesInvalidTypeException();
        }

        if (empty($movies)) {
            throw new MoviesUnexpectedValueException();
        }

        return array_unique($movies);
    }
}