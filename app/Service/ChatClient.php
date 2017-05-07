<?php

namespace App\Service;

use App\Message;
use App\Thread;

class ChatClient
{
    public static $EMPLOYEE = 'employee';
    public static $MEMBER = 'member';

    public static $ERROR = 'error';

    /**
     * @param $memberId
     * @param $employeeId
     * @return Thread
     */
    public static function make($memberId, $employeeId)
    {
        $thread = Thread::create([
            'MemberId' => $memberId,
            'EmployeeId' => $employeeId,
            'MessageCount' => 0,
            'IsActive' => true,
            'RequestForEnd' => false
        ]);

        return $thread;
    }

    public static function getThreadId(array $columnValue)
    {
        $query = ['IsActive' => true];

        $query = array_merge($query, $columnValue);

        $thread = Thread::where($query)->first();

        if ($thread) {
            return $thread->Id;
        } else {
            return self::$ERROR;
        }
    }

    /**
     * @param $threadId
     */
    private static function destroyThread($threadId)
    {
        Thread::find($threadId)->update([
            'IsActive' => false
        ]);
    }

    public static function requestEnd($threadId)
    {
        $thread = Thread::find($threadId);

        if ($thread->RequestForEnd) {
            self::destroy($threadId);
        } else {
            $thread->update([
                'RequestForEnd' => true
            ]);
        }
    }

    public static function push($threadId, $from, $body, $readStatus = false)
    {
        $thread = Thread::find($threadId);

        $thread->update([
            'MessageCount' => $thread->MessageCount + 1,
        ]);

        return Message::create([
            'ThreadId' => $threadId,
            'Body' => $body,
            'From' => $from,
            'ReadStatus' => $readStatus
        ]);
    }

    public static function pull($threadId, $reader , $isClean = false)
    {
        $query = [
            'ThreadId' => $threadId,
        ];

        $all = Message::where($query)->get();

        $toReturn = [];

        foreach ($all as $one) {
            if($isClean) {
                if (($one->From != $reader) && (!$one->ReadStatus)) {
                    array_push($toReturn, $one);
                }
            } else {
                array_push($toReturn, $one);
            }

            if ($one->From != $reader) {
                $one->update([
                    'ReadStatus' => true,
                ]);
            }
        }

        return $toReturn;
    }

    public static function isRequestedToEnd($threadId)
    {
        return Thread::find($threadId)->RequestForEnd;
    }

    public static function defaultGoodbye($threadId)
    {
        $message = new Message();

        $message->Id = '-1';
        $message->Body = "The conversation ended";
        $message->From = 'System';
        $message->ReadStatus = true;
        $message->ThreadId = $threadId;

        return $message;//ofc do not save the message
    }
}