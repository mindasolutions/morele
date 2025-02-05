<?php

declare(strict_types=1);

namespace App\Tests\Recommender\Strategy;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use App\Recommender\Strategy\RandomRecommendation;

class RandomRecommendationTest extends TestCase
{
    /**
     * @param string[] $input
     */
    #[Test]
    #[DataProvider('getReturnsRandomMovies')]
    public function testReturnsRandomMovies(array $input, int $expected): void
    {
        $strategy = new RandomRecommendation();

        $recommendations = $strategy->getRecommended($input);

        $this->assertCount($expected, $recommendations);
        $this->assertContainsOnly('string', $recommendations);
    }

    /**
     * @return array<int, list<int|list<string>>>
     */
    public static function getReturnsRandomMovies(): array
    {
        return [
            [
                ["Matrix", "Titanic", "Avatar", "Inception", "Interstellar"],
                3
            ],
            [
                ["Matrix"],
                1
            ],
            [
                [],
                0
            ],
        ];
    }
}
