<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

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

    public function getStatus($id)
    {
        //$role = "role_".$id;
        $dataSetting = DB::table('users')->where('id', $id)->first();
        //dd($dataSetting->status);
        return $dataSetting->status;
    }

    public function getTotalSales($id, $role, $date)
    {
        //$role = "role_".$id;
        $statuses = ['2', '3', '4', '5'];

        if($role != 4)
        {
            $dataSales = DB::table('order')->where('network', 'like', '%['.$id.']%')->whereIn('status', $statuses)->where('created_at', 'like', '%'.$date.'%')->sum('order_amount');
        }
        else
        {
            $dataSales = DB::table('order')->where('network', 'like', '%['.$id.']%')->whereIn('status', $statuses)->where('created_at', 'like', '%'.$date.'%')->sum('order_amount');
        }

        //dd($dataSetting->status);
        return $dataSales;
    }

    public function getOverallSales($id)
    {
        //$role = "role_".$id;


        $statuses = ['2', '3', '4', '5'];
        $dataSales = DB::table('order')->where('network', 'like', '%['.$id.']%')->whereIn('status', $statuses)->sum('order_amount');


        //dd($dataSetting->status);
        return $dataSales;
    }

    public function getTotalOrder($id, $role)
    {
        //$role = "role_".$id;

        $statuses = ['1', '2', '3', '4', '5'];
        $statusess = ['6', '7'];

        $dataOrderAll = DB::table('order')->where('network', 'like', '%['.$id.']%')->whereIn('status', $statuses)->get();
        $dataOrderAllRC = DB::table('order')->where('network', 'like', '%['.$id.']%')->whereIn('status', $statusess)->get();

        if($role != 4)
        {
            $dataOrderAllPersonal = DB::table('order')->where('order_by', $id)->where('network', 'like', '%['.$id.']%')->whereIn('status', $statuses)->get();
            $dataOrderAllPersonalRC = DB::table('order')->where('order_by', $id)->where('network', 'like', '%['.$id.']%')->whereIn('status', $statusess)->get();
        }
        else
        {
            $dataOrderAllPersonal = DB::table('order_create_by')->where('order_by', $id)->where('network', 'like', '%['.$id.']%')->whereIn('status', $statuses)->get();
            $dataOrderAllPersonalRC = DB::table('order')->where('order_create_by', $id)->where('network', 'like', '%['.$id.']%')->whereIn('status', $statusess)->get();
        }

        $dataOrders = [
            "overall"=>count($dataOrderAll),
            "overallrc"=>count($dataOrderAllRC),
            "personal"=>count($dataOrderAllPersonal),
            "personalrc"=>count($dataOrderAllPersonalRC)
        ];


        //dd($dataSetting->status);
        return $dataOrders;
    }

    public function getDateTime()
    {
        $dateNow = Carbon::now('Asia/Kuala_Lumpur');
        return $dateNow;
    }
}
