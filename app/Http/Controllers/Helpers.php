<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Company;
use App\Employee;
use App\Member;
use Illuminate\Support\Facades\Auth;

class Helpers
{
    public static function isMember()
    {
        $member = Member::where(self::getQuery())->first();

        return $member != null;
    }

    public static function isAdmin()
    {
        $admin = Admin::where(self::getQuery())->first();

        return $admin != null;
    }

    public static function isEmployee()
    {
        $employee = Employee::where(self::getQuery())->first();

        return $employee != null;
    }

    public static function isVerificationRequired()
    {
        $admin = Admin::where(self::getQuery())->first();

        if($admin == null) {
            return false;
        }

        $company = Company::find($admin->CompanyId);

        return $company == null ? false : $company->VerificationRequired;
    }

    private static function getQuery()
    {
        return [
            "UserId" =>  Auth::getUser()->id
        ];
    }
}
