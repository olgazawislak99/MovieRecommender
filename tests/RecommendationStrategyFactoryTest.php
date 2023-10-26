<?php

namespace App\Tests;

use App\Entity\Enum\RecommendationAlgorithm;
use App\Service\Recommender\Factory\RecommendationStrategyFactory;
use App\Service\Recommender\Strategy\RecommendationStrategyInterface;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class RecommendationStrategyFactoryTest extends TestCase
{
    /**
     * @dataProvider recommendationAlgorithmProvider
     */
    public function testReturnsProperInstance(RecommendationAlgorithm $recommendationAlgorithm)
    {
        $strategy = RecommendationStrategyFactory::createStrategy($recommendationAlgorithm);
        $reflection = new ReflectionClass($strategy);

        $this->assertInstanceOf(RecommendationStrategyInterface::class, $strategy);
        $this->assertSame($reflection->getShortName(), $recommendationAlgorithm->value . 'Strategy');

    }

    public function recommendationAlgorithmProvider(): array
    {
        return [
            [RecommendationAlgorithm::RANDOM_RECOMMENDATION],
            [RecommendationAlgorithm::W_LETTER_RECOMMENDATION],
            [RecommendationAlgorithm::MULTI_WORD_RECOMMENDATION]
        ];
    }
}