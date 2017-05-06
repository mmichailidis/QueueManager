<?php

namespace App\Http\Controllers\Employee;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    public function myProfile() {
        return view('employee.profile')->with('employee', EmployeeHelper::getEmployee())->with('data', EmployeeHelper::getEmployeeInfo());
    }

    //employee.overview
    public function myJob() {
        return view('employee.overview')->with('job', EmployeeHelper::getJob());
    }

    public function work() {

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
