<?php

namespace InsuranceApp\Factories;

use Psr\Container\ContainerInterface;
use InsuranceApp\Controllers\HomePageController;

class HomePageControllerFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $cartypeModel = $container->get('CartypeModel');
        $covertypeModel = $container->get('CovertypeModel');
        $renderer = $container->get('renderer');
        return new HomePageController($renderer, $cartypeModel, $covertypeModel);
    }
}