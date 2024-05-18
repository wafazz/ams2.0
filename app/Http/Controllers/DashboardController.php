<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Controllers\SystemSetting;
use App\Models\Setting\System;
use DB;

class DashboardController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $userinfo = Auth::user();
        //$data = System::all();

        if($userinfo == null){
            $fullUrl = Request::fullUrl();
            Cookie::queue('lastURL', $fullUrl, 1440);
            $assets = "";
            //echo "1";
            return view('auth.login', compact('assets'));
        }else{

            $assets = "";
            $pageName = "Dashboard";

            if($userinfo->role == 1 || $userinfo->role == 2){
                $role = "role_".$userinfo->role;
                $dataSetting = DB::table('level_setting')->first();
                return view('systemadmin.dashboard', compact('userinfo', 'assets', 'pageName', 'dataSetting', 'role'));
            }else{
                echo "company";
            }
        }

    }
}
