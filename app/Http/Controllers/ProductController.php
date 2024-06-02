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

class ProductController extends Controller
{
    public function index()
    {
        $userinfo = Auth::user();
        //$data = System::all();
        $anotherController = new DefinedController();
        $dateNow = $anotherController->getDateTime(); //timezone Asia/Kuala_Lumpur



        if($userinfo == null || $userinfo->role >= 3){

            $assets = "";
            //echo "1";
            return view('auth.login', compact('assets'));
        }else{

            $assets = "../";
            $pageName = "List Product";
            $listProduct = DB::table('products')->whereNull('soft_delete')->get();



            $menu = $anotherController->menuCount();

            $role = "role_".$userinfo->role;
            $dataSetting = DB::table('level_setting')->first();

            return view('systemadmin.listproduct', compact('userinfo', 'assets', 'pageName', 'listProduct', 'dataSetting', 'role', 'menu'));
        }
    }

    public function categoryIndex()
    {
        $userinfo = Auth::user();
        //$data = System::all();
        $anotherController = new DefinedController();
        $dateNow = $anotherController->getDateTime(); //timezone Asia/Kuala_Lumpur



        if($userinfo == null || $userinfo->role >= 3){

            $assets = "";
            //echo "1";
            return view('auth.login', compact('assets'));
        }else{

            $assets = "../";
            $pageName = "Category / Brand";
            $listCategory = DB::table('category')->whereNull('soft_delete')->get();
            $listBrand = DB::table('brand')->whereNull('soft_delete')->get();



            $menu = $anotherController->menuCount();

            $role = "role_".$userinfo->role;
            $dataSetting = DB::table('level_setting')->first();

            return view('systemadmin.catbrand', compact('userinfo', 'assets', 'pageName', 'listCategory', 'listBrand', 'dataSetting', 'role', 'menu'));
        }
    }

    public function categoryAdd(Request $request)
    {
        $userinfo = Auth::user();
        //$data = System::all();
        $anotherController = new DefinedController();
        $dateNow = $anotherController->getDateTime(); //timezone Asia/Kuala_Lumpur



        if($userinfo == null || $userinfo->role >= 3){

            $assets = "";
            //echo "1";
            return view('auth.login', compact('assets'));
        }else{
            $query = [
                'name'=>$request->name,
                'product_attached'=>0,
                'created_at'=>$dateNow,
                'updated_at'=>$dateNow,
            ];
            DB::table('category')->insert($query);
            return redirect()->back()->with('success', 'Successful added new Category.');
        }
    }

    public function brandAdd(Request $request)
    {
        $userinfo = Auth::user();
        //$data = System::all();
        $anotherController = new DefinedController();
        $dateNow = $anotherController->getDateTime(); //timezone Asia/Kuala_Lumpur



        if($userinfo == null || $userinfo->role >= 3){

            $assets = "";
            //echo "1";
            return view('auth.login', compact('assets'));
        }else{
            $query = [
                'name'=>$request->name,
                'product_attached'=>0,
                'created_at'=>$dateNow,
                'updated_at'=>$dateNow,
            ];
            DB::table('brand')->insert($query);
            return redirect()->back()->with('success', 'Successful added new Brand.');
        }
    }
}
