<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

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
    protected $redirectTo= RouteServiceProvider::DASHBOARD;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function showLoginForm()
    {
         if (Auth::id()) {
             return redirect()->back();
         }else{
            return view('dashboard.auth.login');
         }

    }

        public function login(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);


        $credentials = $request->except(['_token']);
        $user= Admin::where('email',$request->email)->first();
        if ($user){
            if (Auth::guard('admin')->attempt($credentials)) {
                    $request->session()->regenerate();
                    return redirect()->to('/dashboard/index')
                        ->with(['message' => 'تم تسجيل الدخول بنجاح ', 'alert-type' => 'success']);
                }else{
                    return redirect()->back()
                        ->with(['message' => 'خطأ في كلمة المرور او الايميل', 'alert-type' => 'error']);
                }

        }else{
            return redirect()->back()
                ->with(['message' => 'خطأ في كلمة المرور او الايميل', 'alert-type' => 'error']);
        }

    }



    protected function guard()
    {
        return Auth::guard('admin');
    }
}
