# Task description

Write a simple application in PHP to find movie recommendations (the backend part alone is enough).
The list of movies in the form of an array is provided in the movies.php file, you can copy it or directly
add it to your application.

The application contains 3 recommendation algorithms:

1. 3 random titles are returned.
2. All movies with the letter 'W' are returned, but only if they have an even number of characters in the title.
3. All titles that consist of more than 1 word are returned.

Write unit tests to validate the solution.

## Requirements

PHP CLI >= 8.3

## Usage

You can run it by command `php index.php` 

## Tests

1. Run `composer install` to install the necessary packages
2. For run tests type `composer test`
