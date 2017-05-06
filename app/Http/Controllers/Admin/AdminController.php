<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show() {
        return view('admin.company.show')->with('company',Company::find(AdminHelper::getAdmin()->CompanyId));
    }

    public function edit() {
        return view('admin.company.edit')->with('company',Company::find(AdminHelper::getAdmin()->CompanyId));

    }

    public function update() {

    }
}
