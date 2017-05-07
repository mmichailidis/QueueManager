<?php

namespace App\Http\Controllers\Member;


use App\Member;
use App\NumberAssign;
use App\User;
use Illuminate\Support\Facades\Auth;

class MemberHelper
{
    /**
     * @return Member
     */
    static function getMember() {
        return Member::where(['UserId' => Auth::getUser()->id])->first();
    }

    /**
     * @param $ticketId
     * @return NumberAssign
     */
    static function getTicket($ticketId) {
        return NumberAssign::find($ticketId);
    }

    static function isTheTicketMine($ticketId) {
        return self::getTicket($ticketId)->MemberId == self::getMember()->Id;
    }

    static function myTickets(){
        $query = [ 'MemberId' => self::getMember()->Id , 'IsUsed' => false ];
        return NumberAssign::where($query)->get();
    }

    static function myName(){
        return User::find(self::getMember()->UserId)->name;
    }

    static function myEmail(){
        return User::find(self::getMember()->UserId)->email;
    }

    static function isMember(){
        return self::getMember() != null;
    }
}