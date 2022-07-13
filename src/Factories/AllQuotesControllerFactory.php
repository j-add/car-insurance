<?php

namespace InsuranceApp\Factories;

use Psr\Container\ContainerInterface;
use InsuranceApp\Controllers\AllQuotesController;

class AllQuotesControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $quotesModel = $container->get('QuotesModel');
        $renderer = $container->get('renderer');
        return new AllQuotesController($renderer, $quotesModel);
    }
}