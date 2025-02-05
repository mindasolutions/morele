<?php

declare(strict_types=1);

namespace App\Recommender\Strategy;

class RandomRecommendation implements RecommendationStrategyInterface
{
    /**
     * @param string[] $movies
     * @return string[]
     */
    public function getRecommended(array $movies): array
    {
        shuffle($movies);
        return array_slice($movies, 0, 3);
    }
}
