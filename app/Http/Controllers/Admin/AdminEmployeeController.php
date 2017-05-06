<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\User;
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

        return view('admin.employee.index')
            ->with('data',$dataToReturn)
            ->with('jobs',AdminHelper::allJobsAsArray());
    }

    /**
     * 8elei data gia ton user
     */
    public function create() {
        $employees = AdminHelper::allEmployees();
        return view('admin.employee.create')
            ->with('employees', $employees)
            ->with('jobs', AdminHelper::allJobs());
    }

    public function store(Request $request) {
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);

        $employee = Employee::create([
            'IsOnline' => 0,
            'JobId' => $request->input('JobId'),
            'UserId' => $user->id,
            'NumberStatus' => "DONE"
        ]);

        return redirect()->route('admin.employee.show', $employee->Id);
    }

    public function show($id) {
        $employee = Employee::find($id);

        if (!AdminHelper::existInCompany($employee->Id)) {
            return redirect()->route('admin.employee.index');
        }

        return view('admin.employee.show')
            ->with('employee', AdminHelper::getEmployeeInfo($employee->Id));
    }
//
//    public function edit($id) {
//        $employee = Employee::find($id);
//
//        if (!AdminHelper::existInCompany($employee->Id)) {
//            return redirect()->route('admin.employee.index');
//        }
//
//        return route('admin.employee.edit')
//            ->with('employee', $employee)
//            ->with('jobs',AdminHelper::allJobs());
//    }
//
//    public function update(Request $request, $id) {
//        $employee = Employee::find($id);
//
//        if (!AdminHelper::existInCompany($employee->Id)) {
//            return redirect()->route('admin.employee.index');
//        }
//
//        $employee->update([
//            'IsOnline' => $request->input('IsOnline'),
//            'JobId' => $request->input('JobId'),
//        ]);
//
//        return view('admin.employee.index')->with('employee', AdminHelper::getEmployeeInfo($employee));
//    }

    public function destroy($id) {
        $employee = Employee::find($id);

        if (!AdminHelper::existInCompany($employee->Id)) {
            return redirect()->route('admin.employee.index');
        }

        $employee->delete();

        return redirect()->route('admin.employee.index');
    }
}
