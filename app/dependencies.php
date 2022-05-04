<?php

declare(strict_types=1);

use DI\ContainerBuilder;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\UidProcessor;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Slim\Views\PhpRenderer;

return function (ContainerBuilder $containerBuilder) {
    $container = [];

    $container['renderer'] = function (ContainerInterface $c) {
        $settings = $c->get('settings')['renderer'];
        $renderer = new PhpRenderer($settings['template_path']);
        return $renderer;
    };

    $container['dbConn'] = function () {
        $db = new PDO('mysql:host=127.0.0.1; dbname=insurance-calc', 'root', 'password');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $db;
    };

    $container['UserFormUtilities'] = DI\get('\InsuranceApp\Utilities\UserFormUtilities');
    $container['QuotesModel'] = DI\factory('\InsuranceApp\Factories\QuotesModelFactory');
    $container['CartypeModel'] = DI\factory('\InsuranceApp\Factories\CartypeModelFactory');
    $container['CovertypeModel'] = DI\factory('\InsuranceApp\Factories\CovertypeModelFactory');
    $container['AllQuotesController'] = DI\factory('\InsuranceApp\Factories\AllQuotesControllerFactory');
    $container['HomePageController'] = DI\factory('\InsuranceApp\Factories\HomePageControllerFactory');
    $container['QuotePageController'] = DI\factory('\InsuranceApp\Factories\QuotePageControllerFactory');
    $container['AcceptQuoteController'] = DI\factory('\InsuranceApp\Factories\AcceptQuoteControllerFactory');

    $containerBuilder->addDefinitions($container);
};
