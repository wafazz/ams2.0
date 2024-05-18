<?php

namespace App\Http\Controllers;

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

class ProfileController extends Controller
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

            $dataSP = $anotherController->getSponsor($userinfo->id);

            //dd($dataSP);

            $states = DB::table('states')->get();

            $assets = "";
            $pageName = "Profile";
            $role = "role_".$userinfo->role;
            $dataSetting = DB::table('level_setting')->first();
            return view('systemadmin.profile', compact('userinfo', 'assets', 'pageName', 'dataSetting', 'role', 'dataPI', 'dataSP', 'states'));

        }

    }

    public function updatePI(Request $request)
    {
        $userinfo = Auth::user();
        //$data = System::all();
        $anotherController = new DefinedController();

        if($userinfo == null){
            $assets = "";
            //echo "1";
            return view('auth.login', compact('assets'));
        }else{
            $id = $userinfo->id;
            $updatedAt = Carbon::now('Asia/Kuala_Lumpur');

            $rules = [
                'image' => 'image|mimes:jpeg,png,jpg,gif',
            ];

            $messages = [
                'image.image' => 'Only image allowed to upload.',
                'image.mimes' => 'Only format jpeg,png,jpg & gif allowed to upload.',
            ];

            $ext = array('png', 'jpeg', 'jpg', 'gif');
            $extension = $request->file('newProfileImage')->getClientOriginalExtension();

            if (!in_array($extension, $ext)) {
                return redirect()->back()->with('error', 'Invalid file format. Only format jpeg,png,jpg & gif allowed to upload.');
            }else{
                $filename = time()."_PI_".$request->file('newProfileImage')->getClientOriginalName();

                $path = $request->file('newProfileImage')->storeAs('images', $filename, 'storage');

                //dd($path);
                $requestData= 'storage/'.$path;

                $dataImage = $requestData;

                $query = [
                    "user_id" => $id,
                    "image" => $requestData,
                    "status" => 1,
                    "created_at" => $updatedAt,
                    "updated_at" => $updatedAt
                ];

                DB::table('profile_image')->where('user_id', $id)->update(['status' => 2, 'updated_at'=>$updatedAt]);

                $addPI = DB::table('profile_image')->insert($query);

                $message = "Successfull updated Profile Image.";

                return redirect()->back()->with('success', $message);
            }
        }

    }

    public function updateProfile(Request $request)
    {
        $userinfo = Auth::user();
        //$data = System::all();
        $anotherController = new DefinedController();

        if($userinfo == null){
            $assets = "";
            //echo "1";
            return view('auth.login', compact('assets'));
        }else{
            $id = $userinfo->id;
            $updatedAt = Carbon::now('Asia/Kuala_Lumpur');

            //preg_match_all('/\d+/', $request->phone_no, $matches);
            $numbersOnly = preg_replace('/\D/', '', $request->phone_no);

            //$phoneNumber = preg_match('/^\d+$/', );

            if($request->country == "Malaysia"){
                if($numbersOnly[0] == "6"){
                    $realPhone = $numbersOnly;
                }else if($numbersOnly[0] == "0"){
                    $realPhone = "6".$numbersOnly;
                }else if($numbersOnly[0] == "1"){
                    $realPhone = "60".$numbersOnly;
                }else{
                    $realPhone = "60".$numbersOnly;
                }
            }else if($request->country == "Singapore"){
                if(strlen($numbersOnly) == "8"){
                    $realPhone = "65".$numbersOnly;
                }else if(strlen($numbersOnly) == "9"){
                    $realPhone = "6".$numbersOnly;
                }else if(strlen($numbersOnly) == "10"){
                    $realPhone = $numbersOnly;
                }else{
                    $realPhone = $numbersOnly;
                }
            }

            //dd($realPhone);
            $updateQuery = [
                "full_name"=>$request->full_name,
                "phone"=>$realPhone,
                "address_1"=>$request->address_1,
                "address_2"=>$request->address_2,
                "postcode"=>$request->postcode,
                "city"=>$request->city,
                "state"=>$request->state,
                "country"=>$request->country,
                "updated_at"=>$updatedAt

            ];




            DB::table('users')->where('id', $id)->update($updateQuery);

            //$addPI = DB::table('profile_image')->insert($query);

            $message = "Successfull updated Profile.";

            return redirect()->back()->with('success', $message);

        }

    }

    public function updatePassword(Request $request)
    {
        $userinfo = Auth::user();
        //$data = System::all();
        $anotherController = new DefinedController();

        if($userinfo == null){
            $assets = "";
            //echo "1";
            return view('auth.login', compact('assets'));
        }else{
            $id = $userinfo->id;
            $updatedAt = Carbon::now('Asia/Kuala_Lumpur');

            //preg_match_all('/\d+/', $request->phone_no, $matches);
            $newPass = bcrypt($request->new_password);

            if (!password_verify($request->current_password, $userinfo->password)){
                return redirect()->back()->with('error', "Invalid Current Password");
            }else if (!password_verify($request->new_password_confirmation, $newPass)){
                return redirect()->back()->with('error', "New Password and Confirm New Password must same.");
            }else{
                DB::table("users")->where('id', $id)->update(['password'=>$newPass]);
                return redirect()->back()->with('success', "Successful updating your password.");
            }


        }

    }
}
