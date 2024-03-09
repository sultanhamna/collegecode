<?php

namespace App\Http\Controllers\Admin\Auth;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin.dashbord';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    protected function showloginform()
    {
        return view('admin.auth.login');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $admin = Admin::where(['email' => $request->email])->get();

        if (!$admin) {
            return redirect()->back();
        } else {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect(route('admin.dashbord'));
            }
            else {
                return redirect()->back();
            }
        }
    }

    public function loggedOut(Request $request)
    {
        return redirect(route('admin.login'));
    }
}
