<?php

namespace InsuranceApp\Factories;

use InsuranceApp\Models\CovertypeModel;
use Psr\Container\ContainerInterface;

class CovertypeModelFactory
{
    public function __invoke(ContainerInterface $container): CovertypeModel
    {
        $db = $container->get('dbConn');
        return new CovertypeModel($db);
    }
}