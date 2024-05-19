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
            $assets = "";
            $pageName = "User/Member";
            $role = "role_".$userinfo->role;

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
                        ->where('role', '=', $level)
                        ->get();
                    }else{
                        $getUser = DB::table('users')
                        ->where('email', '!=', $userinfo->email)
                        ->where('network', 'like', '%['.$userinfo->id.']%')
                        ->where('role', '>=', 1)
                        ->get();
                    }
                }

                $countUser = count($getUser);

                $dataArray = [];
                for($c=0; $c<$countUser; $c++){
                    $roleName = $anotherController->getRole($getUser[$c]->id);
                    $userPhoto = $anotherController->getProfileImage($getUser[$c]->id);
                    $dataArray[] = [
                        'id' => $getUser[$c]->id,
                        'photo' =>$userPhoto, 
                        'name' => $getUser[$c]->full_name, 
                        'email' => $getUser[$c]->email, 
                        'role' => $roleName, 
                        'status' => $getUser[$c]->status
                    ];
                }

                //dd($dataArray);

                $dataSetting = DB::table('level_setting')->first();
                return view('systemadmin.users', compact('userinfo', 'assets', 'pageName', 'dataSetting', 'role', 'dataPI', 'level', 'countUser', 'dataArray'));

            }else{
                if($_GET["level"] == "all"){
                    Session::forget('userLevel');
                    return redirect(url('/user'));
                }else{
                    Session::put('userLevel', $_GET["level"]);
                    return redirect(url('/user'));
                }
                
                
            }

            
        }
    }

    public function activateUser($id)
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

            $roleArray = array('1', '2');
            if(in_array($userinfo->role,  $roleArray))
            {
                $userStatus = $anotherController->getStatus($id);
                $dateUpdate = Carbon::now('Asia/Kuala_Lumpur');
                if($userStatus == 0){
                    DB::table('users')->where('id', $id)->update(['status'=>1, 'updated_at'=>$dateUpdate]);
                    return redirect()->back()->with('success', 'Successful activate User #'.$id);
                }
            }
            
            
        }
    }

    public function unbannedUser($id)
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

            $roleArray = array('1', '2');
            if(in_array($userinfo->role,  $roleArray))
            {
                $userStatus = $anotherController->getStatus($id);
                $dateUpdate = Carbon::now('Asia/Kuala_Lumpur');
                if($userStatus == 2){
                    DB::table('users')->where('id', $id)->update(['status'=>1, 'updated_at'=>$dateUpdate]);
                    return redirect()->back()->with('success', 'Successful unbanned User #'.$id);
                }
            }
            
            
        }
    }

    public function bannedUser($id)
    {
        $userinfo = Auth::user();
        //$data = System::all();
        $anotherController = new DefinedController();

        if($userinfo == null){
            // $fullUrl = Request::fullUrl();
            // Cookie::queue('lastURL', $fullUrl, 1440);
            $assets = "";
            //echo "1";
            return view('auth.login', compact('assets'));
        }else{

            $roleArray = array('1', '2');
            if(in_array($userinfo->role,  $roleArray))
            {
                $userStatus = $anotherController->getStatus($id);
                $dateUpdate = Carbon::now('Asia/Kuala_Lumpur');
                if($userStatus == 1){
                    DB::table('users')->where('id', $id)->update(['status'=>2, 'updated_at'=>$dateUpdate]);
                    return redirect()->back()->with('success', 'Successful banned User #'.$id);
                }
            }
            
            
        }
    }
}
