<?php

namespace App\Http\Middleware;

use App\Employee;
use Closure;
use Illuminate\Support\Facades\Auth;

class EmployeeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::getUser();
        $employee = Employee::where(['UserId' => $user->id])->first();

        if($employee == null ) {
            return redirect()->route('categories.index');
        }

        if(!$employee->IsOnline) {
            $employee->update([
               'IsOnline' => true
            ]);
        }

        return $next($request);
    }
}
