<?php

namespace App\Service\Recommender\Strategy;

class RandomRecommendationStrategy implements RecommendationStrategyInterface
{

    public function getRecommendation(array $movies): array
    {
        shuffle($movies);

        return array_slice($movies, 0, 3);
    }
}