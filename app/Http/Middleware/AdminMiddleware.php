<?php

namespace App\Http\Middleware;

use App\Admin;
use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
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
        $admin = Admin::where(['UserId' => $user->id])->first();

        if($admin == null ) {
            return redirect()->route('categories.index');
        }

        return $next($request);
    }
}
