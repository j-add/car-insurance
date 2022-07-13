<?php

namespace InsuranceApp\Models;

class CartypeModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getCartypes()
    {
        $getTypes = $this->db->prepare("SELECT `id`, `type` FROM `car_type`;");
        $getTypes->execute();
        return $getTypes->fetchAll(\PDO::FETCH_KEY_PAIR);
    }

    public function getMultipliers()
    {
        $getMultipliers = $this->db->prepare("SELECT `type`, `type_multiplier` FROM `car_type`;");
        $getMultipliers->execute();
        return $getMultipliers->fetchAll(\PDO::FETCH_KEY_PAIR);
    }
}
