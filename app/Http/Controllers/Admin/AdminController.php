<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function show()
    {
        return view('admin.company.show')->with('company', AdminHelper::myCompany());
    }

    public function edit()
    {
        return view('admin.company.edit')->with('company', AdminHelper::myCompany());

    }

<<<<<<< HEAD
    public function update(Request $request)
    {
        $company = AdminHelper::myCompany();
=======
    public function update(Request $request) {
>>>>>>> e260f36633ad44476b0b26e5fccbf140b51084a4

        $company->update([
            'Name' => $request->input('Name'),
            'AutoProceedActivated' => $request->input('AutoProceedActivated'),
            'AutoProceedTime' => $request->input('AutoProceedTime'),
            'VerificationRequired' => $request->input('VerificationRequired'),
        ]);

        return redirect()->route('admin.show');
    }
}
