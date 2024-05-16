<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class DefinedController extends Controller
{
    public function getProfileImage($id)
    {
        $userinfo = Auth::user();
        if($userinfo == null){
            return redirect(url('logout'));
        }else{
            $dataImage = DB::table('profile_image')->where('user_id', $id)->orderBy('id', 'desc')->first();

            //dd($dataImage);
            if($dataImage != null)
            {
                $dataPI = $dataImage->image;

            }else{
                $dataPI = "dist/img/default-user.png";

            }

            //dd($id);



            return($dataPI);
        }

    }

    public function getSponsor($id)
    {
        $userinfo = Auth::user();
        if($userinfo == null){
            return redirect(url('logout'));
        }else{
            $dataSP = DB::table('users')->where('id', $id)->first();
            $theRole = $this->getRole($dataSP->role);
            $theSPPI = $this->getProfileImage($id);
//echo $dataSP->all();

            if($dataSP != null)
            {
                $dataSPS = [
                    "image" =>$theSPPI,
                    "name" =>$dataSP->full_name,
                    "phone" =>$dataSP->phone,
                    "email" =>$dataSP->email,
                    "role" =>$theRole
                ];

            }

            //dd(response()->json($dataSPS));



            return $dataSPS;
        }

    }

    public function getRole($id)
    {
        $role = "role_".$id;
        $dataSetting = DB::table('level_setting')->first();
        $roleName = $dataSetting->$role;
        return $roleName;
    }
}
