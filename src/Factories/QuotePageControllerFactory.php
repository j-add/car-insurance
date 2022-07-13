<?php

namespace InsuranceApp\Factories;

use InsuranceApp\Utilities\UserFormUtilities;
use Psr\Container\ContainerInterface;
use InsuranceApp\Controllers\QuotePageController;

class QuotePageControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $quotesModel = $container->get('QuotesModel');
        $cartypeModel = $container->get('CartypeModel');
        $covertypeModel = $container->get('CovertypeModel');
        $userFormUtilities = $container->get('UserFormUtilities');
        $renderer = $container->get('renderer');
        return new QuotePageController($renderer, $cartypeModel, $covertypeModel, $quotesModel, $userFormUtilities);
    }
}