<?php

namespace App\Http\Helpers;

use App\Http\Controllers\Controller;

class Money extends Controller
{

    public static function formatMoney($float, $decimais = 2)
    {
        return ($float === "") ? "" : number_format($float, $decimais, ',', '.');
    }

    public static function moneyToFloat($string)
    {
        $string = explode(',', $string);

        $parte1 = str_replace('.', '', $string[0]);

        $parte2 = self::verifyKeyArray(1, $string) ? $string[1] : 0;

        $numero_en_format = $parte1 . '.' . $parte2;

        return floatval($numero_en_format);
    }

    public static function verifyKeyArray($nameKey, $array)
    {
        if ((!empty($array)) && (array_key_exists($nameKey, $array))) {
            return $array[$nameKey];
        }
        return null;
    }
}
