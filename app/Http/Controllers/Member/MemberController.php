<?php

namespace App\Http\Controllers\Member;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{

    /**
     * @var ClientService
     */
    private $clientService;

//    /**
//     * MemberController constructor.
//     * @param ClientService $clientService
//     */
//    public function __construct(ClientService $clientService)
//    {
//        $this->clientService = $clientService;
//    }

    public function requestTicket(Request $request)
    {
        if (!MemberHelper::isMember()) {
            return redirect()->route('categories.index');
        }

        $assign = $this->clientService->registerMemberInLine(MemberHelper::getMember()->Id, $request->input('jobId'));

        if ($assign) {
            return redirect()->route('member.ticket.show', $assign->Id);
        } else {
            return redirect()->route('member.errorOnTicket');
        }
    }

    public function myProfile()
    {
        return view('member.profile')
            ->with('tickets', MemberHelper::myTickets())
            ->with('member', MemberHelper::getMember())
            ->with('name', MemberHelper::myName())
            ->with('email', MemberHelper::myEmail());
    }

    public function show($ticketId)
    {
        if (!MemberHelper::isTheTicketMine($ticketId)) {
            return redirect()->route('categories.index');
        }

        return view('member.ticket.show')->with('ticket', MemberHelper::getTicket($ticketId));
    }

    public function destroy($ticketId)
    {
        if (!MemberHelper::isTheTicketMine($ticketId)) {
            return redirect()->route('categories.index');
        }

//        $this->clientService->discardTicket($ticketId);

        return view('member.profile');
    }

    public function edit()
    {
        return view('member.edit')
            ->with('member', MemberHelper::getMember())
            ->with('name', MemberHelper::myName())
            ->with('email', MemberHelper::myEmail());
    }

    public function update(Request $request)
    {
        if (!(MemberHelper::isMember())) {
            return redirect()->route('categories.index');
        }

        $user = Auth::getUser();

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        return redirect()->route('member.profile');
    }



}
