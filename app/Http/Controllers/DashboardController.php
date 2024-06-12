<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Controllers\SystemSetting;
use App\Models\Setting\System;
use DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\DefinedController;
use Carbon\Carbon;

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
        $anotherController = new DefinedController();

        if($userinfo == null){
            //$fullUrl = $request->fullUrl;
            //Cookie::queue('lastURL', $fullUrl, 1440);
            $assets = "";
            //echo "1";
            return view('auth.login', compact('assets'));
            
        }else{

            $assets = "";
            $pageName = "Dashboard";

            $dateNow = Carbon::now('Asia/Kuala_Lumpur');

            $menu = $anotherController->menuCount();

            $tsty = $anotherController->getTotalSales($userinfo->id, $userinfo->role, date("Y", strtotime($dateNow))); //total sales this year

            $tsly = $anotherController->getTotalSales($userinfo->id, $userinfo->role, date("Y", strtotime('-1 year', strtotime($dateNow)))); //total sales last year

            $tstm = $anotherController->getTotalSales($userinfo->id, $userinfo->role, date("Y-m", strtotime($dateNow))); //total sales this month

            $tslm = $anotherController->getTotalSales($userinfo->id, $userinfo->role, date("Y-m", strtotime('-1 month', strtotime($dateNow)))); //total sales last month

            $tstd = $anotherController->getTotalSales($userinfo->id, $userinfo->role, date("Y-m-d", strtotime($dateNow))); //total sales today

            $tsld = $anotherController->getTotalSales($userinfo->id, $userinfo->role, date("Y-m-d", strtotime('-1 day', strtotime($dateNow)))); //total sales last month

            $overallSales = $anotherController->getOverallSales($userinfo->id); //overall sales
            $totalOrder = $anotherController->getTotalOrder($userinfo->id, $userinfo->role); //overall sales
            $oOverall = $totalOrder["overall"];
            $oOverallP = $totalOrder["personal"];

            //dd($totalOrder);
            if($userinfo->role == 1 || $userinfo->role == 2){
                $role = "role_".$userinfo->role;
                $dataSetting = DB::table('level_setting')->first();
                return view('systemadmin.dashboard', compact('userinfo', 'assets', 'pageName', 'dataSetting', 'role', 'tsty', 'tsly', 'tstm', 'tslm', 'tstd', 'tsld', 'dateNow', 'overallSales', 'oOverall', 'oOverallP', 'menu'));
            }else{
                echo "company";
            }
        }

    }
}
