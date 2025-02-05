<?php

declare(strict_types=1);

namespace App\Recommender\Strategy;

class WEvenLengthRecommendation implements RecommendationStrategyInterface
{
    /**
     * @param string[] $movies
     * @return string[]
     */
    public function getRecommended(array $movies): array
    {
        return array_filter($movies, fn($movie): bool =>
            str_starts_with(mb_strtolower($movie), 'w') && (mb_strlen($movie) % 2 == 0));
    }
}
