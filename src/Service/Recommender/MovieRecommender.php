<?php

namespace App\Service\Recommender;

use App\Entity\Enum\RecommendationAlgorithm;
use App\Repository\MovieRepositoryInterface;
use App\Service\Recommender\Factory\RecommendationStrategyFactory;

class MovieRecommender implements RecommenderInterface
{
    public function __construct(
        private readonly MovieRepositoryInterface $movieRepository
    ) {
    }

    public function recommend(string $recommendationAlgorithm): array
    {
        $strategy = RecommendationStrategyFactory::createStrategy(RecommendationAlgorithm::from($recommendationAlgorithm));
        $movies = $this->movieRepository->getMovies();

        return $strategy->getRecommendation($movies);
    }
}