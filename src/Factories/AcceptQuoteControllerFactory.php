<?php

namespace InsuranceApp\Factories;

use Psr\Container\ContainerInterface;
use InsuranceApp\Controllers\AcceptQuoteController;

class AcceptQuoteControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $quotesModel = $container->get('QuotesModel');
        $renderer = $container->get('renderer');
        return new AcceptQuoteController($renderer, $quotesModel);
    }
}