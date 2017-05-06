<?php

namespace App\Http\Controllers\Admin;

use App\Job;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class AdminJobController extends Controller
{
    public function index()
    {
        return view('admin.job.index')->with('jobs', AdminHelper::allJobs());
    }

    public function create()
    {
        return view('admin.job.create')->with('jobs', AdminHelper::allJobs());
    }

    public function store(Request $request)
    {
        $job = Job::create([
            'CompanyId' => AdminHelper::getAdmin()->CompanyId,
            'Name' => $request->input('Name'),
            'IsByName' => $request->input('IsByName'),
            'TypeOfJob' => $request->input('TypeOfJob'),
            'AverageWaitingTime' => 0,
        ]);

        return redirect()->route('admin.job.show', $job->Id);
    }

    public function show($id)
    {
        $job = Job::find($id);

        if ($job->CompanyId != AdminHelper::getAdmin()->CompanyId) {
            return redirect()->route('admin.job.index');
        }

        return view('admin.job.show')->with('job', $job);
    }

    public function edit($id)
    {
        $job = Job::find($id);

        if ($job->CompanyId != AdminHelper::getAdmin()->CompanyId) {
            return redirect()->route('admin.job.index');
        }

        return view('admin.job.show')->with('job', $job);

    }

    public function update(Request $request, $id)
    {
        $job = Job::find($id);

        if ($job->CompanyId != AdminHelper::getAdmin()->CompanyId) {
            return redirect()->route('admin.job.index');
        }

        $avgTime = $job->AverageWaitingTime;

        $job->update([
            'Name' => $request->input('Name'),
            'IsByName' => $request->input('IsByName'),
            'LastNumber' => 0,
            'TypeOfJob' => $request->input('TypeOfJob'),
            'AverageWaitingTime' => $avgTime,
        ]);

        return redirect()->route('admin.job.show', $job->Id);
    }

    public function destroy($id)
    {
        $job = Job::find($id);

        if ($job->CompanyId != AdminHelper::getAdmin()->CompanyId) {
            return redirect()->route('admin.job.index');
        }

        $job->delete();
    }
}
