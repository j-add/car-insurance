<?php

declare(strict_types=1);

use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $container = $app->getContainer();

    $app->get('/', 'HomePageController');
    $app->get('/quotes', 'AllQuotesController');
    $app->post('/yourquote', 'QuotePageController');
    $app->post('/acceptQuote', 'AcceptQuoteController');
};
