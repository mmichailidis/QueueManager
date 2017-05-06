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
        $company = AdminHelper::myCompany();

        if(!$company->VerificationRequired) {
            return redirect()->route('admin.show');
        }

        return view('admin.member.show')->with('member', AdminHelper::getMemberInfo($id));
    }

    public function destroy($id) {
        $company = AdminHelper::myCompany();

        if(!$company->VerificationRequired) {
            return redirect()->route('admin.show');
        }

        $member = AdminHelper::getMemberInfo($id);
        $member->delete();

        return redirect()->route('admin.member.index');
    }
}
