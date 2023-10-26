<?php

namespace App\Tests;

use App\Exception\MoviesInvalidTypeException;
use App\Exception\MoviesUnexpectedValueException;
use App\Repository\MovieRepository;
use PHPUnit\Framework\TestCase;

class MovieRepositoryTest extends TestCase
{
    public function testThrowsMoviesInvalidTypeException()
    {
        $movieRepository = new MovieRepository('tests/data/movies_not_array.php');

        $this->expectException(MoviesInvalidTypeException::class);
        $this->expectExceptionMessage('Returned value must be type of array');

        $movieRepository->getMovies();
    }

    public function testThrowsMoviesUnexpectedValueException()
    {
        $movieRepository = new MovieRepository('tests/data/movies_empty_array.php');

        $this->expectException(MoviesUnexpectedValueException::class);
        $this->expectExceptionMessage('Returned value must not be empty');

        $movieRepository->getMovies();
    }

    public function testIsArrayUnique()
    {
        $movieRepository = new MovieRepository('tests/data/movies.php');
        $movies = $movieRepository->getMovies();
        $uniqueMovies = array_unique(require('tests/data/movies.php'));

        self::assertSame($uniqueMovies, $movies);
    }
}