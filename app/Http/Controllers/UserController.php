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

class UserController extends Controller
{
    public function index()
    {
        $userinfo = Auth::user();
        //$data = System::all();
        $anotherController = new DefinedController();

        if($userinfo == null){
            $assets = "";
            //echo "1";
            return view('auth.login', compact('assets'));
        }else{
            
        }
    }
}
