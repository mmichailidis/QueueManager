<?php

namespace App\Service;

class Translator
{
    public static function forAll($in, $isBackwards = false)
    {
        if ($isBackwards) {
            if ($in == 'Ναί') {
                return true;
            } else {
                return false;
            }
        } else {
            if ($in == 1) {
                return "Ναί";
            } else {
                return "Όχι";
            }
        }
    }
}