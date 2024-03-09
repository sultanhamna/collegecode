<?php

namespace App\Http\Controllers\Customer\Auth;
use App\Models\Customer;
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
    protected $redirectTo = '/customer.dashbord';

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
        return view('customer.auth.login');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $customer = Customer::where(['email' => $request->email])->get();

        if (!$customer) {
            return redirect()->back();
        } else {
            if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect(route('customer.dashbord'));
            }
            else {
                return redirect()->back();
            }
        }
    }

    public function loggedOut(Request $request)
    {
        return redirect(route('customer.login'));
    }
}
