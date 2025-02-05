<?php

declare(strict_types=1);

namespace App\Recommender\Strategy;

interface RecommendationStrategyInterface
{
    /**
     * @param string[] $movies
     * @return string[]
     */
    public function getRecommended(array $movies): array;
}
