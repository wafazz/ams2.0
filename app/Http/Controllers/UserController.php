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
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function index()
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

            //after login, must have//
            $dataPI = $anotherController->getProfileImage($userinfo->id);
            //END after login, must have//
            $assets = "";
            $pageName = "User/Member";
            $role = "role_".$userinfo->role;

            $menu = $anotherController->menuCount();

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
                    $roleName = $anotherController->getRole($getUser[$c]->role);
                    $userPhoto = $anotherController->getProfileImage($getUser[$c]->id);
                    $dataArray[] = [
                        'id' => $getUser[$c]->id,
                        'photo' =>$userPhoto,
                        'name' => $getUser[$c]->full_name,
                        'email' => $getUser[$c]->email,
                        'role' => $roleName,
                        'status' => $getUser[$c]->status,
                        'reg_date' => $getUser[$c]->created_at
                    ];
                }

                //dd($dataArray);

                $dataSetting = DB::table('level_setting')->first();
                return view('systemadmin.users', compact('userinfo', 'assets', 'pageName', 'dataSetting', 'role', 'dataPI', 'level', 'countUser', 'dataArray', 'menu'));

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

    public function regNew(Request $request)
    {
        $userinfo = Auth::user();
        $currentDateTime = Carbon::now('Asia/Kuala_Lumpur');
        $formattedDateTime = $currentDateTime->format('Y-m-d H:i:s');
        $rules = [
            'password' => 'required|min:8|confirmed', // The 'confirmed' rule checks if password_confirmation field matches password
            'email' => 'unique:users',
        ];

        $messages = [
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Passwords do not match.',
            'email.unique' => 'Email already existed. Please use another.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }else{
            $query = [
                'email'=>$request->email,
                'password'=>bcrypt($request->password),
                'email_verification_status'=>0,
                'full_name'=>$request->full_name,
                'phone'=>$request->phone,
                'created_at'=>$formattedDateTime,
                'updated_at'=>$formattedDateTime,
                'sponsor'=>$userinfo->id,
                'status'=>1,
                'role'=>$request->designation
            ];
            $addNewUser = DB::table('users')->insertGetId($query);
            $newNetwork = $userinfo->network.",[".$addNewUser."]";
            $updateUser = DB::table('users')->where('id', $addNewUser)->update(['network'=>$newNetwork]);
            //$insertedId = $addNewUser->id;
            //Mail::to('3c2481c88c-df8a3f+1@inbox.mailtrap.io')->send(new SendingEmail());

            if($updateUser){
                return redirect()->back()->with('success', 'User created successfully. ID: #' . $addNewUser);
            }


        }
    }

    public function activateUser($id)
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
