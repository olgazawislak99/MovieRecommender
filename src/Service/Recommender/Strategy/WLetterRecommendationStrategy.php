<?php

namespace App\Service\Recommender\Strategy;

class WLetterRecommendationStrategy implements RecommendationStrategyInterface
{
    public function getRecommendation(array $movies): array
    {
        return array_filter($movies, function ($movie) {
            return $movie[0] === 'W' && mb_strlen($movie) % 2 === 0;
        });
    }
}