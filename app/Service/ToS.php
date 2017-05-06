<?php

namespace App\Services;

class ToS
{
    public static function translate($tosId) {
        switch($tosId) {
            case 1:
                return self::$IN_PERSON; //the user can interact physically with the employee
            case 2:
                return self::$LIVE_CHAT; //the user will interact with the chat app
            default:
                return self::$INVALID; //exception! :P
        }
    }

    public static $LIVE_CHAT = 'LiveChat';
    public static $IN_PERSON = 'InPerson';
    public static $INVALID = 'invalid';

    public static function getValues(){
        return [
            self::$IN_PERSON,
            self::$LIVE_CHAT
        ];
    }
}