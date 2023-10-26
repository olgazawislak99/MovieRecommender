<?php

namespace App\Tests;

use App\Entity\Enum\RecommendationAlgorithm;
use App\Repository\MovieRepository;
use App\Service\Recommender\MovieRecommender;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MovieRecommenderTest extends KernelTestCase
{
    const MOVIES_FILE_PATH = 'tests/data/movies.php';

    private MovieRecommender $movieRecommender;

    protected function setUp(): void
    {
        $movies = array_unique(require self::MOVIES_FILE_PATH);
        $movieRepository = $this->createMock(MovieRepository::class);
        $movieRepository
            ->method('getMovies')
            ->willReturn($movies);
        $this->movieRecommender = new MovieRecommender($movieRepository);
    }

    /**
     * @dataProvider recommendationAlgorithmProvider
     */
    public function testReturnsArrayOfString(string $recommendationAlgorithm)
    {
        $recommendedMovies = $this->movieRecommender->recommend($recommendationAlgorithm);

        foreach ($recommendedMovies as $recommendedMovie) {
            $this->assertIsString($recommendedMovie);
        }
    }

    public function recommendationAlgorithmProvider(): array
    {
        return [
            [RecommendationAlgorithm::RANDOM_RECOMMENDATION->value],
            [RecommendationAlgorithm::W_LETTER_RECOMMENDATION->value],
            [RecommendationAlgorithm::MULTI_WORD_RECOMMENDATION->value]
        ];
    }
}