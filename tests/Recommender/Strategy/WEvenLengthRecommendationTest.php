<?php

declare(strict_types=1);

namespace App\Tests\Recommender\Strategy;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use App\Recommender\Strategy\WEvenLengthRecommendation;

class WEvenLengthRecommendationTest extends TestCase
{
    /**
     * @param string[] $input
     * @param string[] $expected
     */
    #[Test]
    #[DataProvider('getFiltersMoviesWithWAndEvenLength')]
    public function testFiltersMoviesWithWAndEvenLength(array $input, array $expected): void
    {
        $strategy = new WEvenLengthRecommendation();

        $recommendations = $strategy->getRecommended($input);

        $this->assertSame($expected, array_values($recommendations));
    }

    /**
     * @return array<int, list<int|list<string>>>
     */
    public static function getFiltersMoviesWithWAndEvenLength(): array
    {
        return [
            [
                ["Wiedźmin", "Władca Pierścieni", "Wall-E", "Wolverine", "Matrix"],
                ["Wiedźmin", "Wall-E"]
            ],
            [
                ["Władca Pierścieni"],
                []
            ],
            [
                ["wiedźmin"],
                ["wiedźmin"]
            ],
            [
                [],
                []
            ],
        ];
    }
}
