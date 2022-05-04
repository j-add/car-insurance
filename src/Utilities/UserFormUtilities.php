<?php

namespace InsuranceApp\Utilities;

class UserFormUtilities
{
    public static function formatToTitleCase(string $name): string
    {
        return ucwords(strtolower($name), " \t\r\n\f\v'-");
    }

    public function sanitiseNameInput(string $input): string
    {
        $input = preg_replace('/[^a-zA-Z \'-]/', '', $input);
        $input = self::formatToTitleCase($input);
        return $input;
    }

    public function sanitiseValueInput(string $value): float
    {
        $value = preg_replace('/[^0-9\.]/', '', $value);
//        preg_match('/\.[0-9]{2}/');
        return $value;
    }
}