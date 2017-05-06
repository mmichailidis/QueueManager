<?php

namespace App\Http\Controllers\Employee;

use App\Services\ToS;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function myProfile() {
        return view('employee.profile')
            ->with('employee', EmployeeHelper::getEmployee())
            ->with('data', EmployeeHelper::getEmployeeInfo());
    }

    //employee.overview
    public function myJob() {
        return view('employee.overview')
            ->with('job', EmployeeHelper::getJob());
    }

    public function work() {
        $jobType = EmployeeHelper::getJob()->TypeOfJob;

        if (ToS::translate($jobType) == ToS::$IN_PERSON) {
            return view('employee.work.work')->with('employee', EmployeeHelper::getEmployee());
        } else if (ToS::translate($jobType) == ToS::$LIVE_CHAT) {
            return view('employee.work.chat')->with('employee', EmployeeHelper::getEmployee());
        }

        return redirect()->route('employee.profile');
    }

    //API
    public function getNumber() {

    }

    //API
    public function getCharHistory() {

    }

    public function postMessage() {

    }

}
