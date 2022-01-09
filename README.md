# String Calculator
Symfony console command for string calculation.

Requirements:
- PHP 8.0.2+
- Composer

This is a simple Symfony 6 project which contains a single console command.

This repo has the base steps and bonus steps worked through as a series of pull requests and their related branches are still available.

To setup this project, `composer install` after checking out project files.

Run the console command using `php app calc '<string>'` and provide an input string to be calculated. Input strings should be single quoted if necessary.

Run the project's tests using `composer test` on a fully setup project.

With credit to this helpful [blog post on autowired DI](https://weblog.yivoff.com/create-a-standalone-console-command-with-autowired-di-but-without-installing-the-rest-of-the-symfony-framwork) for standalone Symfony console commands. :heart: 
