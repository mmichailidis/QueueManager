<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ErrorController extends Controller
{
    public function ticketError(){
        return view('member.ticket.error');
    }
}
