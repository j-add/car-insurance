<?php

namespace InsuranceApp\Models;

class QuotesModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function getDb(): \PDO
    {
        return $this->db;
    }

    public function addNewQuote(string $name, int $carType, int $coverType, float $cost): void
    {
        $addQuote = $this->db->prepare(
            "INSERT INTO `quotes` (`customer_name`, `car_type_id`, `cover_id`, `cost`, `accepted`) VALUES (:name, :carType, :coverType, :cost, 0);"
        );
        $addQuote->bindParam(':name', $name);
        $addQuote->bindParam(':carType', $carType);
        $addQuote->bindParam(':coverType', $coverType);
        $addQuote->bindParam(':cost', $cost);
        $addQuote->execute();
    }

    public function acceptQuote(int $quoteId): void
    {
        $acceptQuote = $this->db->prepare("UPDATE `quotes` SET `accepted` = '1' WHERE `id` = :id;");
        $acceptQuote->bindParam(':id', $quoteId);
        $acceptQuote->execute();
    }

    public function getQuoteById(int $id): array
    {
        $getQuote = $this->db->prepare(
            "SELECT `quotes`.`id`, `customer_name`, `car_type`.`type`, `cover_type`.`name`, `cost`, `accepted` 
                        FROM `quotes` LEFT JOIN `car_type` ON `quotes`.`car_type_id` = `car_type`.`id` 
                        LEFT JOIN `cover_type` ON `quotes`.`cover_id` = `cover_type`.`id` WHERE (`quotes`.`id`) = :id"
        );
        $getQuote->bindParam(':id', $id);
        $getQuote->execute();
        return $getQuote->fetch();
    }

    public function getUnacceptedQuotes(): array
    {
        $getUnaccepted = $this->db->prepare(
            "SELECT `quotes`.`id`, `customer_name`, `car_type`.`type`, `cover_type`.`name`, `cost`, `accepted` 
                        FROM `quotes` LEFT JOIN `car_type` ON `quotes`.`car_type_id` = `car_type`.`id` 
                        LEFT JOIN `cover_type` ON `quotes`.`cover_id` = `cover_type`.`id` WHERE `accepted` = 0"
        );
        $getUnaccepted->execute();
        return $getUnaccepted->fetchAll();
    }

    public function getAcceptedQuotes(): array
    {
        $getAccepted = $this->db->prepare(
            "SELECT `quotes`.`id`, `customer_name`, `car_type`.`type`, `cover_type`.`name`, `cost`, `accepted` 
                        FROM `quotes` LEFT JOIN `car_type` ON `quotes`.`car_type_id` = `car_type`.`id` 
                        LEFT JOIN `cover_type` ON `quotes`.`cover_id` = `cover_type`.`id` WHERE `accepted` = 1"
        );
        $getAccepted->execute();
        return $getAccepted->fetchAll();
    }

    public function getLastQuoteId(): int
    {
        $getQuote = $this->db->lastInsertId();
        return intval($getQuote);
    }
}
