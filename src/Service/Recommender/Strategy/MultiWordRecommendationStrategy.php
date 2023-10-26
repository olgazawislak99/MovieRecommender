<?php

namespace App\Service\Recommender\Strategy;

class MultiWordRecommendationStrategy implements RecommendationStrategyInterface
{

    public function getRecommendation(array $movies): array
    {
        return array_filter($movies, function ($movie) {
            return count(explode(' ', $movie)) > 1;
        });
    }
}