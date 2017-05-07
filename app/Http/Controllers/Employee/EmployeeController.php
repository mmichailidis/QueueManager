<?php

namespace App\Http\Controllers\Employee;

use App\Service\ChatClient;
use App\Service\Client;
use App\Service\ToS;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmployeeController extends Controller
{
    /**
     * @var Client
     */
    private $client;

    /**
     * EmployeeController constructor.
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function myProfile()
    {
        return view('employee.profile')
            ->with('employee', EmployeeHelper::getEmployee())
            ->with('data', EmployeeHelper::getEmployeeInfo());
    }

    //employee.overview
    public function myJob()
    {
        return view('employee.overview')
            ->with('job', EmployeeHelper::getJob());
    }

    public function work()
    {
        $jobType = EmployeeHelper::getJob()->TypeOfJob;

        if (ToS::translate($jobType) == ToS::$IN_PERSON) {
            return view('employee.work.work')->with('employee', EmployeeHelper::getEmployee());
        } else if (ToS::translate($jobType) == ToS::$LIVE_CHAT) {
            return view('employee.work.chat')->with('employee', EmployeeHelper::getEmployee());
        }

        return redirect()->route('employee.profile');
    }

    /**
     * Just a route
     */
    public function workDone(Request $request)
    {
        $this->client->employeeDone(
            EmployeeHelper::getEmployee()->Id,
            $request->has('status') ? $request->input('status') : null
        );

//        return redirect()->route('employee.work');
    }

    /**
     * API!
     */
    public function getNumber()
    {
        $me = EmployeeHelper::getEmployee();
        $currentJob = EmployeeHelper::myJobsTimer();

        if ($currentJob['status']) {
            $status = [
                'status' => $me->NumberStatus,
                'number' => $me->CurrentNumber,
                'name' => EmployeeHelper::getMemberName($currentJob['result']->MemberId),
                'timer' => $currentJob['result']->Timer,
            ];
        } else {
            $status = [
                'status' => $me->NumberStatus,
                'number' => $me->CurrentNumber,
                'name' => '',
                'timer' => '',
            ];
        }

        return $status;
    }

    public function memberArrived(){
        $this->client->memberArrived(EmployeeHelper::getEmployee()->Id);
    }

    /**
     * API
     * Ignore read status. Not working as intended
     */
    public function getChatHistory(Request $request)
    {
        $myJob = EmployeeHelper::getJob();

        if (ToS::translate($myJob->TypeOfJob) != ToS::$LIVE_CHAT) {
            return ['status' => 'error', 'status_message' => 'wrong_job'];
        }

        $me = EmployeeHelper::getEmployee();

        $threadId = ChatClient::getThreadId(['EmployeeId' => $me->Id]);

        if ($threadId == ChatClient::$ERROR) {
            return ['status' => ChatClient::$ERROR];
        }

        if (ChatClient::isRequestedToEnd($threadId)) {
            $toReturn = [
                'data' => ChatClient::pull($threadId, ChatClient::$EMPLOYEE,$request->input('clean')),
                'status' => 'final',
                'memberName' => EmployeeHelper::getMemberNameWithThread($threadId),
                'employeeName' => EmployeeHelper::getEmployeeInfo()['name'],
                'goodbye' => ChatClient::defaultGoodbye($threadId)
            ];

            ChatClient::requestEnd($threadId);

            return $toReturn;
        }

        return [
            'data' => ChatClient::pull($threadId, ChatClient::$EMPLOYEE),
            'status' => 'ok',
            'memberName' => EmployeeHelper::getMemberNameWithThread($threadId),
            'employeeName' => EmployeeHelper::getEmployeeInfo()['name'],
        ];
    }

    /**
     * API
     * Employee posting a message!
     */
    public function postMessage(Request $request)
    {
        $myJob = EmployeeHelper::getJob();

        if (ToS::translate($myJob->TypeOfJob) != ToS::$LIVE_CHAT) {
            return ['status' => 'error', 'status_message' => 'wrong_job'];
        }

        $me = EmployeeHelper::getEmployee();

        $threadId = ChatClient::getThreadId(['EmployeeId' => $me->Id]);

        if ($threadId == ChatClient::$ERROR) {
            return ['status' => ChatClient::$ERROR];
        }

        return [
            'status' => 'ok',
            'data' => ChatClient::push($threadId, 'employee', $request->input('body'))
        ];
    }
}
