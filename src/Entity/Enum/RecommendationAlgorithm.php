<?php

namespace App\Entity\Enum;

enum RecommendationAlgorithm: string
{
    case RANDOM_RECOMMENDATION = 'RandomRecommendation';
    case W_LETTER_RECOMMENDATION = 'WLetterRecommendation';
    case MULTI_WORD_RECOMMENDATION = 'MultiWordRecommendation';
}
