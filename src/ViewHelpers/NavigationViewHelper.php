<?php

namespace InsuranceApp\ViewHelpers;

use InsuranceApp\Models\QuotesModel;

class NavigationViewHelper
{
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