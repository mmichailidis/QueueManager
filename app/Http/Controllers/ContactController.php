<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ContactController extends Controller
{
    public function index(){
        return view('pages.contact');
    }

    public function about(){
        return view('page.about');
    }
}
