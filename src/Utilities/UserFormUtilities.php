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
        return self::formatToTitleCase($input);
    }

    public function sanitiseValueInput(string $value): float
    {
        return preg_replace('/[^0-9\.]/', '', $value);
    }
}