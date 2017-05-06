<?php
/**
 * Created by IntelliJ IDEA.
 * User: MidoriKage
 * Date: 06-May-17
 * Time: 1:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Admin;
use Illuminate\Support\Facades\Auth;

class AdminHelper
{
    static function getAdmin(){
        $user = Auth::getUser();

        $query = [ 'UserId' => $user->id ];

        return Admin::where($query)->first();
    }
}