<?php

namespace App\Service\Recommender\Factory;

use App\Entity\Enum\RecommendationAlgorithm;
use App\Service\Recommender\Strategy\MultiWordRecommendationStrategy;
use App\Service\Recommender\Strategy\RandomRecommendationStrategy;
use App\Service\Recommender\Strategy\RecommendationStrategyInterface;
use App\Service\Recommender\Strategy\WLetterRecommendationStrategy;

class RecommendationStrategyFactory
{
    public static function createStrategy(RecommendationAlgorithm $recommendationAlgorithm): RecommendationStrategyInterface
    {
        return match ($recommendationAlgorithm) {
            RecommendationAlgorithm::RANDOM_RECOMMENDATION => new RandomRecommendationStrategy(),
            RecommendationAlgorithm::W_LETTER_RECOMMENDATION => new WLetterRecommendationStrategy(),
            RecommendationAlgorithm::MULTI_WORD_RECOMMENDATION => new MultiWordRecommendationStrategy()
        };
    }

}