<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Company;
use App\Employee;
use App\Job;
use App\Member;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminHelper
{
    /**
     * @return Admin
     */
    static function getAdmin()
    {
        $query = ['UserId' => Auth::getUser()->id];

        return Admin::where($query)->first();
    }

    /**
     * @return Company
     */
    static function myCompany()
    {
        return Company::find(self::getAdmin()->CompanyId);
    }

    /**
     * @return Job
     */
    static function allJobs()
    {
        $query = ['CompanyId' => self::getAdmin()->CompanyId];

        return Job::where($query)->get();
    }

    static function allEmployees()
    {
        $toReturn = Employee::all();

        $toReturn = collect($toReturn)->reject(function ($employee) {
            return !(self::existInCompany($employee->Id));
        });

        return $toReturn;
    }

    /**
     * @param $employeeId
     * @return bool
     */
    static function existInCompany($employeeId) {
        $job = Job::find(Employee::find($employeeId)->JobId);

        return $job->CompanyId == self::getAdmin()->CompanyId;
    }

    /**
     * @param $employeeId
     * @return array
     */
    static function getEmployeeInfo($employeeId){
        $employee = Employee::find($employeeId);
        $user = User::find($employee->UserId);

        return [
            'name' => $user->name,
            'email' => $user->email,
        ];
    }

    /**
     * @param $memberId
     * @return array
     */
    static function getMemberInfo($memberId){
        $member = Member::find($memberId);
        $user = User::find($member->UserId);

        return [
            'name' => $user->name,
            'email' => $user->email,
            'TotalReservations' => $member->TotalReservations,
            'UnattendedReservations' => $member->UnattendedReservations,
        ];
    }
}