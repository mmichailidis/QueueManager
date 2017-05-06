<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminEmployeeController extends Controller
{
    public function index() {
        $employees = Employee::all();
        dd($employees);
        dd(AdminHelper::getMemberInfo($employees->Id));
        return view('admin.employee.index')->with('employees', $employees)->with('data',AdminHelper::getMemberInfo($employees->Id));
    }

    public function create() {

    }

    public function store() {

    }

    public function show($id) {

    }

    public function edit($id) {

    }

    public function update(Request $request) {

    }

    public function destroy($id) {

    }
}
