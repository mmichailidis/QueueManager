<?php
/**
 * Created by IntelliJ IDEA.
 * User: MidoriKage
 * Date: 06-May-17
 * Time: 1:24 PM
 */

namespace App\Http\Controllers\Admin;


use App\Admin;
use App\Company;
use Illuminate\Support\Facades\Auth;

class AdminHelper
{
    static function getAdmin(){
        $query = [ 'UserId' => Auth::getUser()->id ];

        return Admin::where($query)->first();
    }

    static function myCompany(){
        return Company::find(self::getAdmin()->CompanyId);
    }
}