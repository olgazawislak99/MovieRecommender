<?php

namespace App\Tests;

use App\Service\Recommender\Strategy\RandomRecommendationStrategy;
use PHPUnit\Framework\TestCase;

class RandomRecommendationStrategyTest extends TestCase
{
    const MOVIES_FILE_PATH = 'tests/data/movies.php';

    private array $recommendedMovies;

    protected function setUp(): void
    {
        $randomRecommendationStrategy = new RandomRecommendationStrategy();
        $moviesList = array_unique(require self::MOVIES_FILE_PATH);
        $this->recommendedMovies = $randomRecommendationStrategy->getRecommendation($moviesList);
    }

    public function testReturnsThreeTitles()
    {
        $this->assertSame(3, count($this->recommendedMovies));
    }

    public function testReturnsDifferentTitles()
    {
        $this->assertTrue(count($this->recommendedMovies) === count(array_unique($this->recommendedMovies)));
    }
}