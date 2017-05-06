<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminMemberController extends Controller
{
    public function index() {
        $company = AdminHelper::myCompany();

        if(!$company->VerificationRequired) {
            return redirect()->route('admin.show');
        }
    }

    public function create() {

    }

    public function store() {

    }

    public function show($id) {

    }

    public function destroy($id) {

    }
}
