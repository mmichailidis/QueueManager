<?php

namespace App\Http\Controllers\Auth;

use App\Employee;
use App\Member;
use App\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        Member::create([
            'UserID' => $user->id,
            'TotalReservations' => 0,
            'UnattendedReservations' => 0,
        ]);

        return $user;
    }

    /**
     * When an Employee logs out his status is set on offline so he wont be assigned jobs
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        if(!Auth::check()) {
            return redirect()->route('categories.index');
        }

        $employee = Employee::where(['UserId' => Auth::guard($this->getGuard())->user()->id])->first();

        if($employee != null ) {
            $employee->update([
                'IsOnline' => false,
            ]);
        }

        return $this->logoutExit();
    }

    /**
     * Same as logout
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function getLogout()
    {
        if(!Auth::check()) {
            return redirect()->route('categories.index');
        }

        $employee = Employee::where(['UserId' => Auth::guard($this->getGuard())->user()->id])->first();

        if($employee != null ) {
            $employee->update([
                'IsOnline' => false,
            ]);
        }

        return $this->logoutExit();
    }

    /**
     * Overriden logouts method code cped here
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    private function logoutExit()
    {
        Auth::guard($this->getGuard())->logout();

        return redirect()->route('categories.index');
    }
}
