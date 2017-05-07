<?php

namespace App\Service;

use App\Employee;
use App\EmployeeTimer;
use Carbon\Carbon;

class ClientTimers
{
    public static function initTimer($employeeId, $memberId)
    {
        EmployeeTimer::create([
            "EmployeeId" => $employeeId,
            "MemberId" => $memberId,
            "Timer" => Carbon::now()->timestamp,
            "isFinalized" => false,
        ])->save();
    }

    public static function timerDone($employeeId, $memberId)
    {
        $queryToMatch = [
            'EmployeeId' => $employeeId,
            'MemberId' => $memberId,
            'isFinalized' => false
        ];

        $valueDone = EmployeeTimer::where($queryToMatch)->first();

        $valueDone->update([
            "Timer" => Carbon::now()->timestamp - $valueDone->Timer,
            "isFinalized" => true
        ]);
    }

    public static function getMemberIdFromUnfinishedTimer($employeeId)
    {
        $query = ['EmployeeId' => $employeeId, 'IsFinalized' => false];

        $timer = EmployeeTimer::where($query)->first();

        return $timer->MemberId;
    }

    /**
     * TODO temporary solution.
     * LETS work on M/M/1 ( or * )
     */
    public static function getAverageTime($jobId)
    {
        $queryForEmployees = ['JobId' => $jobId];

        $employees = Employee::where($queryForEmployees)->get();

        $count = 0;
        $totalCount = 0;
        $employess = 0;

        foreach ($employees as $employee) {
            $employees++;

            $queryToMatch = [
                "EmployeeId" => $employee->Id,
                "isFinalized" => true
            ];

            $allValues = EmployeeTimer::where($queryToMatch)->get();

            foreach ($allValues as $value) {
                $totalCount = $value->Timer + $totalCount; // ta false einai se unix. Ta true einai apla times - millis
                $count++;
            }
        }

        return $totalCount / ( $count == 0 ? 1 : $count ) ;
    }
}