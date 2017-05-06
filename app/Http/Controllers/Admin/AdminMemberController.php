<?php

namespace App\Http\Controllers\Admin;

use App\Verification;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminMemberController extends Controller
{
    public function index()
    {
        $company = AdminHelper::myCompany();

        if (!$company->VerificationRequired) {
            return redirect()->route('admin.show');
        }

        $query = ['CompanyId' => $company->Id];
        $verification = Verification::where($query)->get();

        $membersData = [];

        foreach ($verification as $single) {
            array_push($membersData, AdminHelper::getMemberInfo($single->MemberId));
        }

        dd($membersData);

        return view('admin.member.index')->with('members', $membersData);
    }

    public function create()
    {

    }

    public function store()
    {

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
