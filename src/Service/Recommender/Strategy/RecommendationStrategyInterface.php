<?php

namespace App\Service\Recommender\Strategy;

interface RecommendationStrategyInterface
{
    public function getRecommendation(array $movies): array;
}