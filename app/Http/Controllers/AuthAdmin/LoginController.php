<?php

namespace App\Http\Controllers\AuthAdmin;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = '/admin';

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
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $this->validate($request,[
            'email'     =>  'required|email',
            'password'  =>  'required|min:5',
        ]);

        $cridential =   [
            'email'     =>  $request->email,
            'password'  =>  $request->password,
        ];

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role_id' => 1]))
        {
            return redirect()->intended(route('admin.home'));
        }else
        {
            return back()->withInput();
        }
    }
}
