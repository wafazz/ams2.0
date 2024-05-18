<?php

namespace App\Http\Controllers\AUTH;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\DB;
use App\User;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return Response
     */

    public function bycrypt()
    {
        $pass = bcrypt('123456');
        echo $pass;
    }

    public function showLoginForm()
    {
        //$pass = bcrypt('123456');
        $assets = "";
        return view('auth.login', compact('assets'));
    }

    public function home()
    {
        return redirect()->to(url('logout'));
    }

    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');



        //$password = bcrypt('123456');

        //Bypass En. Aliff

            if (Auth::attempt(['email' => $email, 'password' => $password, 'status' => 1])) {
                // Authentication passed...
                //echo "1";
                $lastURL = Request::cookie('lastURL');

                if(empty($lastURL)){
                    return redirect()->intended('dashboard');
                }else{
                    return redirect($lastURL);
                }
                
            }else{
                //Check Is Active
                $userLogin = User::where('email',$email)->first();
                if($userLogin){
                    $is_active = $userLogin->status;

                    if($is_active == 0){
                        $errors = [$this->username() => trans("Error! Account inactive. Please verify your email or contact administrator to activate your account.")];
                    }else if($is_active == 2){
                        $errors = [$this->username() => trans("Error! Account access was blocked/banned.")];
                    }else if($is_active == 3){
                        $errors = [$this->username() => trans("Error! Access denied for email ".$email.".")];
                    }else{
                        $errors = [$this->username() => trans('auth.failed')];
                    }
                }else{
                    $errors = [$this->username() => trans("Error! ".$email." not exist.")];
                }

                return view('auth.login')->withErrors($errors);
            }

    }

    public function username()
    {
        return 'email';
    }

    /**
      * Log the user out of the application.
      *
      * @param  \Illuminate\Http\Request  $request
      * @return \Illuminate\Http\Response
      */
     public function logout(Request $request)
     {
         $this->guard()->logout();

         $request->session()->invalidate();


         return redirect('/');
     }

     public function logoutStatus(Request $request)
     {
         $this->guard()->logout();

         $request->session()->invalidate();


         //return redirect('/');
     }

     /**
      * Get the guard to be used during authentication.
      *
      * @return \Illuminate\Contracts\Auth\StatefulGuard
      */
     protected function guard()
     {
         return Auth::guard();
     }
}
