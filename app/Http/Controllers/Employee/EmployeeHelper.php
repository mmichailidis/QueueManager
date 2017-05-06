<?php
/**
 * Created by IntelliJ IDEA.
 * User: MidoriKage
 * Date: 06-May-17
 * Time: 1:25 PM
 */

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\Job;
use App\User;
use Illuminate\Support\Facades\Auth;


class EmployeeHelper
{
    static function getEmployee() {
        $query = ['UserId' => Auth::getUser()->id];

        return Employee::where($query)->first();
    }

    static function getJob() {
        return Job::find(self::getEmployee()->JobId);
    }

    static function getEmployeeInfo() {
        $user = User::find(self::getEmployee()->UserId);

        return [
            'name' => $user->name,
            'email' => $user->email,
        ];
    }
}