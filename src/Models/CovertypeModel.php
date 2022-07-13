<?php

namespace InsuranceApp\Models;

class CovertypeModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getCovertypes()
    {
        $getTypes = $this->db->prepare("SELECT `id`, `name` FROM `cover_type`;");
        $getTypes->execute();
        return $getTypes->fetchAll(\PDO::FETCH_KEY_PAIR);
    }

    public function getMultipliers()
    {
        $getMultipliers = $this->db->prepare("SELECT `name`, `cover_multiplier` FROM `cover_type`;");
        $getMultipliers->execute();
        return $getMultipliers->fetchAll(\PDO::FETCH_KEY_PAIR);
    }
}
