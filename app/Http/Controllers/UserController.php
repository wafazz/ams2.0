<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Controllers\SystemSetting;
use App\Models\Setting\System;
use DB;
use App\Http\Controllers\DefinedController;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class UserController extends Controller
{
    public function index()
    {
        $userinfo = Auth::user();
        //$data = System::all();
        $anotherController = new DefinedController();

        if($userinfo == null){
            $fullUrl = Request::fullUrl();
            Cookie::queue('lastURL', $fullUrl, 1440);
            $assets = "";
            //echo "1";
            return view('auth.login', compact('assets'));
        }else{

            //after login, must have//
            $dataPI = $anotherController->getProfileImage($userinfo->id);
            //END after login, must have//

            if(empty($_GET["level"])){
                $level = Session::get('userLevel');

                if(empty($level)){
                    $getUser = DB::table('users')
                    ->where('email', '!=', $userinfo->email)
                    ->where('network', 'like', '%['.$userinfo->id.']%')
                    ->where('role', '>=', 1)
                    ->get();
                }else{
                    if(is_numeric($level)){
                        $getUser = DB::table('users')
                        ->where('email', '!=', $userinfo->email)
                        ->where('network', 'like', '%['.$userinfo->id.']%')
                        ->where('role', '>=', $level)
                        ->get();
                    }else{
                        $getUser = DB::table('users')
                        ->where('email', '!=', $userinfo->email)
                        ->where('network', 'like', '%['.$userinfo->id.']%')
                        ->where('role', '>=', 1)
                        ->get();
                    }
                }

                foreach ($getUser as $getUsers){
                    echo $getUsers->email;
                }
            }else{
                Session::put('userLevel', $_GET["level"]);
                return redirect(url('/user'));
            }

            
        }
    }
}
