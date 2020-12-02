<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:company')->except('logout');
    }

    public function showCompanyLoginForm(){
        return view('company.login',['authgroup'=> 'company']);
    }
    public function CompanyLogin(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);
        if(Auth::guard('company')->attempt(['email' => $request->email,'password'=>$request->password],$request->get('remember'))){
            return redirect('/company');
        }
        return back()->withInput($request->only('email','remember'));
    }
    // protected function guard(){
    //     return Auth::guard('user');
    // }
    // public function showLoginForm()
    // {
    //     return view('auth.login');
    // }
    // public function logout(Request $request){
    //     Auth::guard('user')->logout();
    //     return $this->loggedOut($request);
    // }
    // public function loggedOut(Request $request)
    // {
    //     return redirect('/login');
    // }
}
