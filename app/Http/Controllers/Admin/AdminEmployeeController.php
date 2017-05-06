<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminEmployeeController extends Controller
{
    public function index() {
        $employees = AdminHelper::allEmployees();
        $dataToReturn = [];

        $dataMap = collect($employees)->map(function($employee) use ($dataToReturn) {
            return AdminHelper::getEmployeeInfo($employee->Id);
        });

        for ($i = 0 ; $i < count($dataMap) ; $i++) {
            $dataToReturn[$i] = [
                'Employee' => $employees[$i],
                'Data' => $dataMap[$i],
            ];
        }

        return view('admin.employee.index')->with('data',$dataToReturn);
    }

    public function create() {
        $employees = AdminHelper::allEmployees();
        return view('admin.employee.index')->with('employees', $employees));

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
