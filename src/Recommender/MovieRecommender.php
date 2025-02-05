<?php

declare(strict_types=1);

namespace App\Recommender;

use App\Recommender\Strategy\RecommendationStrategyInterface;

class MovieRecommender
{
    public function __construct(
        private RecommendationStrategyInterface $strategy
    ) {
    }

    public function setStrategy(RecommendationStrategyInterface $strategy): self
    {
        $this->strategy = $strategy;

        return $this;
    }

    /**
     * @param string[] $movies
     * @return string[]
     */
    public function getRecommendations(array $movies): array
    {
        return $this->strategy->getRecommended($movies);
    }
}
