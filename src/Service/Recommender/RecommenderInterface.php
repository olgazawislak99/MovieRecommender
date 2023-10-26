<?php

namespace App\Service\Recommender;

interface RecommenderInterface
{
    public function recommend(string $recommendationAlgorithm): array;
}