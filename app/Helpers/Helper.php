<?php

if (!function_exists('sparatorNumberFormat')) {
    function sparatorNumberFormat($angka)
    {
        return number_format($angka, 0, ',', '.');
    }
}
