<?php

require __DIR__ . '/vendor/autoload.php';

/** @var array<string> $movies */
include_once __DIR__ . '/data/movies.php';

use App\Recommender\MovieRecommender;
use App\Recommender\Strategy\RandomRecommendation;
use App\Recommender\Strategy\WEvenLengthRecommendation;
use App\Recommender\Strategy\MultipleWordsRecommendation;

if ($movies === null) {
    throw new Exception("Missing movie data");
}

echo "Random recommendation:" . PHP_EOL;
$recommender = new MovieRecommender(new RandomRecommendation());
print_r($recommender->getRecommendations($movies));

echo "W and even length recommendation:" . PHP_EOL;
$recommender->setStrategy(new WEvenLengthRecommendation());
print_r($recommender->getRecommendations($movies));

echo "Multiple words recommendation:" . PHP_EOL;
$recommender->setStrategy(new MultipleWordsRecommendation());
print_r($recommender->getRecommendations($movies));
