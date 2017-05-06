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
        return view('admin.employee.index')->with('employees', $employees)->with('data',AdminHelper::getEmployeeInfo($employees->Id));
    }

    public function create() {

    }

    public function store(Request $request) {
        $employee = Employee::create([
            'IsOnline' => $request->input('IsOnline'),
            'JobId' => $request->input('JobId'),
            'UserId' => $request->input('UserId')
        ]);

        return redirect()->route('admin.employee.show')->with('employee' , $employee->Id);
    }

    public function show($id) {
        $employee = Employee::find($id);
        dd(AdminHelper::getMemberInfo($employee->Id));
        return view('admin.employee.show')->with('employee', $employee)->with('data', AdminHelper::getEmployeeInfo($employee->Id));
    }

    public function edit($id) {
        $employee = Employee::find($id);
        return view('admin.employee.edit')->with('employee', $employee);
    }

    public function update(Request $request, $id) {
        $employee = Employee::find($id);

        $employee->update([
            'IsOnline' => $request->input('IsOnline'),
            'JobId' => $request->input('JobId'),
            'UserId' => $request->input('UserId')
        ]);

        return redirect()->route('admin.employee.show')->with('employee' , $employee->Id);
    }

    public function destroy($id) {
        $employee = Employee::find($id);
        $employee->delete();

        return redirect()->route('admin.employee.index');
    }
}
