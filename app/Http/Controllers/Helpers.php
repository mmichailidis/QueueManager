<?php


namespace App\Http\Controllers;


class Helpers
{
    public static function isMember()
    {
        return true;
    }

    public static function isAdmin()
    {
        return true;
    }

    public static function isEmployee()
    {
        return true;
    }

    public static function isVerificationRequired()
    {
        return true;
    }
}

