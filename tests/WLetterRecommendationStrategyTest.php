<?php

namespace App\Tests;

use App\Service\Recommender\Strategy\RandomRecommendationStrategy;
use App\Service\Recommender\Strategy\WLetterRecommendationStrategy;
use PHPUnit\Framework\TestCase;

class WLetterRecommendationStrategyTest extends TestCase
{
    const MOVIES_FILE_PATH = 'tests/data/movies.php';

    private array $recommendedMovies;

    protected function setUp(): void
    {
        $wLetterRecommendationStrategy = new WLetterRecommendationStrategy();
        $movies = array_unique(require self::MOVIES_FILE_PATH);
        $this->recommendedMovies = $wLetterRecommendationStrategy->getRecommendation($movies);
    }

    public function testReturnsWLetterTitles()
    {
        foreach ($this->recommendedMovies as $recommendedMovie) {
            $this->assertStringStartsWith('W', $recommendedMovie);
        }
    }

    public function testReturnsTitlesWithEvenChars()
    {
        foreach ($this->recommendedMovies as $recommendedMovie) {
            $this->assertTrue(mb_strlen($recommendedMovie) % 2 === 0);
        }
    }

    public function testReturnsDifferentTitles()
    {
        $this->assertTrue(count($this->recommendedMovies) === count(array_unique($this->recommendedMovies)));
    }
}