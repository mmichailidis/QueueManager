<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\Job;
use App\User;
use Illuminate\Support\Facades\Auth;


class EmployeeHelper
{
    /**
     * @return Employee
     */
    static function getEmployee() {
        $query = ['UserId' => Auth::getUser()->id];

        return Employee::where($query)->first();
    }

    /**
     * @return Job
     */
    static function getJob() {
        return Job::find(self::getEmployee()->JobId);
    }

    /**
     * @return array
     */
    static function getEmployeeInfo() {
        $user = User::find(self::getEmployee()->UserId);

        return [
            'name' => $user->name,
            'email' => $user->email,
        ];
    }
}