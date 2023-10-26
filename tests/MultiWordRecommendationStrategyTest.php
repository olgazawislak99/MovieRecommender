<?php

namespace App\Tests;

use App\Repository\MovieRepository;
use App\Service\Recommender\Strategy\MultiWordRecommendationStrategy;
use App\Service\Recommender\Strategy\RandomRecommendationStrategy;
use App\Service\Recommender\Strategy\WLetterRecommendationStrategy;
use PHPUnit\Framework\TestCase;

class MultiWordRecommendationStrategyTest extends TestCase
{
    const MOVIES_FILE_PATH = 'tests/data/movies.php';

    private array $recommendedMovies;

    protected function setUp(): void
    {
        $multiWordRecommendationStrategy = new MultiWordRecommendationStrategy();
        $movies = array_unique(require self::MOVIES_FILE_PATH);
        $this->recommendedMovies = $multiWordRecommendationStrategy->getRecommendation($movies);
    }

    public function testReturnsMultiWordTitles()
    {
        foreach ($this->recommendedMovies as $recommendedMovie) {
            $this->assertTrue(count(explode(' ', $recommendedMovie)) > 1);
        }
    }
}