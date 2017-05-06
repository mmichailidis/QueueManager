<?php
/**
 * Created by IntelliJ IDEA.
 * User: MidoriKage
 * Date: 06-May-17
 * Time: 1:24 PM
 */

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
    static function getAdmin()
    {
        $query = ['UserId' => Auth::getUser()->id];

        return Admin::where($query)->first();
    }

    static function myCompany()
    {
        return Company::find(self::getAdmin()->CompanyId);
    }

    static function allJobs()
    {
        $query = ['CompanyId' => self::getAdmin()->CompanyId];

        return Job::where($query)->get();
    }

    static function allJobsAsArray()
    {
        $query = ['CompanyId' => self::getAdmin()->CompanyId];
        $jobs = Job::where($query)->get();
        $toReturn = array();

        foreach($jobs as $job) {
            $toReturn[$job->Id] = $job;
        }

        return $toReturn;
    }

    static function allEmployees()
    {
        $toReturn = Employee::all();

        $toReturn = collect($toReturn)->reject(function ($employee) {
            return !(self::existInCompany($employee->Id));
        });

        return $toReturn;
    }

    static function existInCompany($employeeId) {
        $job = Job::find(Employee::find($employeeId)->JobId);

        return $job->CompanyId == self::getAdmin()->CompanyId;
    }

    static function getEmployeeInfo($employeeId){
        $employee = Employee::find($employeeId);
        $user = User::find($employee->UserId);

        return [
            'name' => $user->name,
            'email' => $user->email,
        ];
    }

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