<?php

namespace App\Service;

use App\Company;
use App\Employee;
use App\EmployeeTimer;
use App\Job;
use App\Member;
use App\NumberAssign;
use App\Services\ClientTimers;
use App\Services\Domain\Status;
use App\Services\Domain\TicketHolder;
use App\Services\ToS;
use Carbon\Carbon;

class Client
{
    /**
     * @param $companyId Integer the id which will be used to find jobIDs
     * @return Integer|Employee[] Returns an array of jobIds
     *         and the employees related to each jobId
     */
    public function getAllCompanyEmployees($companyId)
    {
        $jobs = $this->getAllJobs($companyId);
        $employees = [];

        foreach ($jobs as $job) {
            $employees[$job->Id] = $this->getAllEmployees($job->Id);
        }

        return $employees;
    }

    /**
     * Register the member in line by assigning number and the time it
     * was created
     *
     * @param $memberId
     * @param $jobId
     * @return NumberAssign Returns a NumberAssign model if the registration
     *         was complete. Else it returns null. Null also means the member is
     *         not verified if the job needs verification
     */
    public function registerMemberInLine($memberId, $jobId)
    {
        $flag = $this->hasLine($jobId);
        $newAssign = null;

        if ($this->needsVerification($jobId)) {
            if ($this->isVerified($memberId, Job::find($jobId)->CompanyId)) {
                $newAssign = NumberAssign::create([
                    "MemberId" => $memberId,
                    "JobId" => $jobId,
                    "Number" => $this->increaseLastNumberOfQueue($jobId),
                    "Time" => Carbon::now()->timestamp,
                    'IsUsed' => false
                ]);

                $newAssign->save();
            } else {
                $newAssign = null;
            }
        } else {
            $newAssign = NumberAssign::create([
                "MemberId" => $memberId,
                "JobId" => $jobId,
                "Number" => $this->increaseLastNumberOfQueue($jobId),
                "Time" => Carbon::now()->timestamp,
                'IsUsed' => false
            ]);

            $newAssign->save();
        }

        if (!$flag) {
            $this->reCheckLazyEmployees($jobId);
            $newAssign = $this->getTicket($newAssign->Id);
        }

        return $newAssign;
    }

    /**
     * When an employee is done with his task OR the member
     * never arrives in time this function is called.
     *
     * Updated the status of the employee to done and removes the
     * currentNumber.
     * Then it triggers the Timer to stop counting
     * and also updates the Member according to the result. The
     * result is based on his arrival ( status = true , he arrived else false )
     *
     * In the end he tries to move the employee to the next Task
     *
     * @param $employeeId
     * @param bool $status
     */
    public function employeeDone($employeeId, $status = true)
    {
        $employee = Employee::find($employeeId);

        $employee->update([
            'NumberStatus' => Status::$DONE,
            'CurrentNumber' => -1
        ]);

        $member = Member::find(ClientTimers::getMemberIdFromUnfinishedTimer($employeeId));

        ClientTimers::timerDone($employeeId, $member->Id);

        if ($status) {
            $member->update([
                'TotalReservations' => $member->TotalReservations + 1
            ]);
        } else {
            $member->update([
                'TotalReservations' => $member->TotalReservations + 1,
                'UnattendedReservations' => $member->UnattendedReservations + 1
            ]);
        }

        $this->assignNextNumber($employeeId);
    }

    /**
     * This function assigns the next Number the employee will
     * serve.
     * The next person to serve is -obviously- the next Number.
     * if there is no next number then this function drops
     * creating an "emptyPool" with employees at DONE state.
     * An event should be fired to recheck and applying tasks to them
     *
     * On the other hand if there are still people in the queue
     * it will initialize the Timer for the next member and it
     * will update the AverageWaitingTime of the job.
     * Last but not least it will update the "ticket" (NumberAssign)
     * as being used and how long it waited until being used
     *
     * @param $employeeId
     */
    public function assignNextNumber($employeeId)
    {
        $employee = Employee::find($employeeId);

        if(!$employee->IsOnline) {
            $this->reCheckLazyEmployees($employee->JobId);
        }

        $query = ['JobId' => $employee->JobId, 'IsUsed' => false];
        $lines = NumberAssign::where($query)->get();

        $ticket = $this->getLowestNotUsedNumberColumn($lines);

        if ($ticket == null) {
//            return [ 'status' => 'error' , 'containsThread' => false , 'thead' => null];
            return;
        }

        $employee->update([
            'CurrentNumber' => $ticket->Number,
            'NumberStatus' => Status::$PENDING
        ]);

        //TODO notify member for using his ticket? discardTicket should inform?

        ClientTimers::initTimer($employeeId, $ticket->MemberId);

        $ToS = $this->getToSofJob($employee->JobId);

        $thread = null;

        if (ToS ::translate($ToS) == ToS::$LIVE_CHAT) {
            ChatClient::make($ticket->MemberId, $employeeId);
        }

        $this->updateJobAverageTime($employee);

        $this->discardTicket($ticket->Id);
    }

    /**
     * @param $ticketId
     * @return NumberAssign Returns the specific ticket
     */
    public function getTicket($ticketId)
    {
        return NumberAssign::find($ticketId);
    }

    /**
     * Sets isUsed status of the ticket to true
     * TODO Mporw na balw mia stili ston pinaka wasDiscarded
     * gia ta tickets pou eginan discard apo to member
     * na min metriounte sto avg
     *
     * @param $ticketId
     * @param bool $byUser
     */
    public function discardTicket($ticketId, $byUser = false)
    {
        $ticket = $this->getTicket($ticketId);

        $ticket->update([
            "Time" => Carbon::now()->timestamp - $ticket->Time,
            'IsUsed' => true,
            "DiscardedByUser" => $byUser,
        ]);
    }

    /**
     * @param NumberAssign $ticket
     * @return Employee Returns the employee which match the assigned ticket number
     */
    public function getAssignedEmployeeWithTicket(NumberAssign $ticket)
    {
        $query = ['CurrentNumber' => $ticket->Number];

        return Employee::where($query)->first();
    }

    /**
     * When a member arrives then the status should change
     * to Arrived so the auto-move-forward event wont catch it
     *
     * @param $employeeId
     */
    public function memberArrived($employeeId)
    {
        Employee::find($employeeId)->update([
            'NumberStatus' => Status::$ARRIVED
        ]);
    }

    /**
     * @param $memberId
     * @return TicketHolder Everything with the MemberId included
     */
    public function getMemberNumbers($memberId)
    {
        $query = ['MemberId' => $memberId, 'IsUsed' => false];
        $pendingTickets = NumberAssign::where($query)->get();

        $query = ['MemberId' => $memberId, 'IsFinalized' => false];
        $pendingAppears = EmployeeTimer::where($query)->get();

        return TicketHolder::of($pendingTickets, $pendingAppears);
    }

    /**
     * Trying to reAssign a job to employees waiting for
     * someone to help!
     * @param string $jobId
     */
    public function reCheckLazyEmployees($jobId = '*')
    {
        $query = ['NumberStatus' => Status::$DONE, 'IsOnline' => true, 'JobId' => $jobId ];
        $lazyEmployees = Employee::where($query)->get();

        foreach ($lazyEmployees as $lazy) {
            $this->assignNextNumber($lazy->Id);
        }
    }

    /**
     * Identification if the specific job has a Line waiting to
     * be served
     *
     * @param $jobId
     * @return bool
     */
    public function hasLine($jobId)
    {
        $query = ['JobId' => $jobId, 'IsUsed' => false];

        $tickets = NumberAssign::where($query)->get();

        if (count($tickets) > 0) {
            return true;
        }

        return false;
    }

    /**
     * Was not sure if the first() is the correct way
     * to get the next Number so i get all the unused numbers
     * and call this function to find the next ( min ) Number
     *
     * @param $data
     * @return mixed
     */
    private function getLowestNotUsedNumberColumn($data)
    {
        if(is_array($data)) {
            return collect($data)->min('Number');
        }
        return $data;
    }

    /**
     * We should work with JobID.
     * For loading the jobs the getAllJobs() function will return
     * all the jobs with their ids
     *
     * So when a job opens or an employee makes an action JobId should
     * shipped again
     *
     * @param $jobId
     * @return mixed
     */
    private function needsVerification($jobId)
    {
        return Company::find(Job::find($jobId)->CompanyId)->VerificationRequired;
    }

    /**
     * True if he exist in the table
     * False otherwise
     *
     * @param $memberId
     * @param $companyId
     * @return bool
     */
    private function isVerified($memberId, $companyId)
    {
        $query = [
            'CompanyId' => $companyId,
            'MemberId' => $memberId
        ];

        return Company::where($query)->first() != null;
    }

    /**
     * Increase the LastNumber by 1 and retrieve the number
     *
     * @param $jobId
     * @return mixed
     */
    private function increaseLastNumberOfQueue($jobId)
    {
        $job = Job::find($jobId);

        $number = $job->LastNumber + 1;

        $job->update([
            "LastNumber" => $number,
        ]);

        return $number;
    }

    private function updateJobAverageTime($employee)
    {
        Job::find($employee->JobId)->update([
            'AverageWaitingTime' => ClientTimers::getAverageTime($employee->JobId)
        ]);
    }

    private function getToSofJob($jobId)
    {
        return Job::find($jobId)->TypeOfJob;
    }
}