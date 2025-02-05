<?php

declare(strict_types=1);

namespace App\Tests\Recommender\Strategy;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\TestCase;
use App\Recommender\Strategy\MultipleWordsRecommendation;

class MultipleWordsRecommendationTest extends TestCase
{
    /**
     * @param string[] $input
     * @param string[] $expected
     * @return void
     */
    #[Test]
    #[DataProvider('getFiltersMoviesWithMultipleWords')]
    public function testFiltersMoviesWithMultipleWords(array $input, array $expected): void
    {
        $strategy = new MultipleWordsRecommendation();

        $recommendations = $strategy->getRecommended($input);

        $this->assertSame($expected, array_values($recommendations));
    }

    /**
     * @return array<int, list<int|list<string>>>
     */
    public static function getFiltersMoviesWithMultipleWords(): array
    {
        return [
            [
                ["Matrix", "Titanic", "Avatar", "Władca Pierścieni", "Star Wars"],
                ["Władca Pierścieni", "Star Wars"]
            ],
            [
                ["Matrix"],
                []
            ],
            [
                ["Władca Pierścieni"],
                ["Władca Pierścieni"]
            ],
            [
                [],
                []
            ],
        ];
    }
}
