<?php

namespace InsuranceApp\ViewHelpers;

use InsuranceApp\Models\QuotesModel;

class QuotesViewHelper
{
    public static function displaySingleQuote(array $quote): string
    {
        $html = '<div class="quoteItem">';
        $html .= '<span>Customer Name: ' . $quote['customer_name'] . '</span>';
        $html .= '<span>Car Type: ' . $quote['type'] . '</span>';
        $html .= '<span>Cover Type: ' . $quote['name'] . '</span>';
        $html .= '<span>Insurance Cost: £' . number_format(floatval($quote['cost']), 2, '.', '') . '</span>';
        $html .= '</div>';
        return $html;
    }

    public static function displayManyQuotes(array $quotes): string
    {
        if (empty($quotes)) {
            $result = 'Nothing to show.';
        } else {
            $result = '<table><tr><th>Customer Name</th><th>Car Type</th><th>Cover Type</th><th>Policy Value</th></tr>';
            foreach ($quotes as $quote) {
                $result .= '<tr>';
                $result .= '<td>' . $quote['customer_name'] . '</td>';
                $result .= '<td>' . $quote['type'] . '</td>';
                $result .= '<td>' . $quote['name'] . '</td>';
                $result .= '<td>£' . number_format(floatval($quote['cost']), 2, '.', '') . '</td>';
                $result .= '</tr>';
            }
            $result .= '</table>';
        }
        return $result;
    }

    public static function displayNewQuoteForm(array $cartypes, array $covertypes, string $actionUrl): string
    {
        $result = '<form class="newQuoteForm" action="' . $actionUrl . '" method="post">';
        $result .= '<label for="customerName">Your Name:</label>';
        $result .= '<input type="text" name="customerName" id="customerName" required />';
        $result .= '<label for="carValue">Car Value:</label>';
        $result .= '<input type="number" name="carValue" id="carValue" min="0" max="1000000" step="0.01" required />';
        $result .= self::displayCartypeDropdown($cartypes);
        $result .= self::displayCovertypeDropdown($covertypes);
        $result .= '<button type="submit">Get Quote</button>';
        $result .= '</form>';
        return $result;
    }

    public static function displayCartypeDropdown(array $cartypes): string
    {
        $result = '<label for="cartype">Car Type:</label>';
        $result .= '<select name="cartype" required><option value="" selected hidden> -- select an option -- </option>';
        foreach ($cartypes as $cartype) {
            $result .= '<option';
            $result .= ' value=' . $cartype . '>';
            $result .= $cartype;
            $result .= '</option>';
        }
        $result .= '</select>';
        return $result;
    }

    public static function displayCovertypeDropdown(array $covertypes): string
    {
        $result = '<label for="covertype">Cover Type:</label>';
        $result .= '<select name="covertype" required><option value="" selected hidden> -- select an option -- </option>';
        foreach ($covertypes as $covertype) {
            $result .= '<option';
            $result .= ' value=' . $covertype . '>';
            $result .= $covertype;
            $result .= '</option>';
        }
        $result .= '</select>';
        return $result;
    }

    public static function displayAcceptQuoteButton(int $id): string
    {
        $result = '<form action="/acceptQuote" method="post">';
        $result .= '<input type="hidden" name="id" value="' . $id . '" />';
        $result .= '<button type="submit">Accept Quote</button>';
        $result .= '</form>';
        return $result;
    }

    public static function displayNavbar(): string
    {
        $result = '';
        $result .= '<nav>';
        $result .= '<div class="logo">InsureMe</div>';
        $result .= '<div class="links">';
        $result .= '<a href="/">Home</a>';
        $result .= '<a href="/quotes">All Quotes</a>';
        $result .= '</div></nav>';

        return $result;
    }
}