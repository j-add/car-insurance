<?php

namespace InsuranceApp\Factories;

use InsuranceApp\Models\CartypeModel;
use Psr\Container\ContainerInterface;

class CartypeModelFactory
{
    public function __invoke(ContainerInterface $container): CartypeModel
    {
        $db = $container->get('dbConn');
        return new CartypeModel($db);
    }
}