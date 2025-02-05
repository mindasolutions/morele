<?php

declare(strict_types=1);

namespace App\Tests\Recommender;

use PHPUnit\Framework\TestCase;
use App\Recommender\MovieRecommender;
use App\Recommender\Strategy\RandomRecommendation;
use App\Recommender\Strategy\WEvenLengthRecommendation;
use App\Recommender\Strategy\MultipleWordsRecommendation;

class MovieRecommenderTest extends TestCase
{
    /**
     * @var string[]
     */
    private array $movies = [
        "Matrix", "Wiedźmin", "Władca Pierścieni", "Avatar", "Titanic", "Wall-E", "Wolverine"
    ];

    public function testCanUseRandomStrategy(): void
    {
        $recommender = new MovieRecommender(new RandomRecommendation());
        $recommendations = $recommender->getRecommendations($this->movies);

        $this->assertCount(3, $recommendations);
    }

    public function testCanUseWEvenLengthStrategy(): void
    {
        $recommender = new MovieRecommender(new WEvenLengthRecommendation());
        $recommendations = $recommender->getRecommendations($this->movies);

        $this->assertSame(["Wiedźmin", "Wall-E"], array_values($recommendations));
    }

    public function testCanUseMultipleWordsStrategy(): void
    {
        $recommender = new MovieRecommender(new MultipleWordsRecommendation());
        $recommendations = $recommender->getRecommendations($this->movies);

        $this->assertSame(["Władca Pierścieni"], array_values($recommendations));
    }
}
