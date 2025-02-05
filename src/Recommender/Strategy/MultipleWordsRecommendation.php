<?php

declare(strict_types=1);

namespace App\Recommender\Strategy;

class MultipleWordsRecommendation implements RecommendationStrategyInterface
{
    /**
     * @param string[] $movies
     * @return string[]
     */
    public function getRecommended(array $movies): array
    {
        $filtered = array_filter($movies, function ($movie): bool {
            preg_match_all('/[\p{L}\p{N}-]+/u', $movie, $matches);
            return count($matches[0]) > 1;
        });

        return array_values($filtered);
    }
}
