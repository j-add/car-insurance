<?php

namespace InsuranceApp\Factories;

use Psr\Container\ContainerInterface;
use InsuranceApp\Models\QuotesModel;

class QuotesModelFactory
{
    public function __invoke(ContainerInterface $container): QuotesModel
    {
        $db = $container->get('dbConn');
        return new QuotesModel($db);
    }
}