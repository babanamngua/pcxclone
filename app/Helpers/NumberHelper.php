<?php

namespace App\Helpers;

class NumberHelper
{
    public static function formatCurrency($number)
    {
        return number_format($number, 0, ',', '.') . ' ₫';
    }
}
