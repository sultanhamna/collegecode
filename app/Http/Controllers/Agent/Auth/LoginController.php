<?php

namespace App\Http\Controllers\Agent\Auth;

use App\Http\Controllers\Controller;
use App\Models\Agent;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = '/agent.dashbord';

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
        return view('agent.auth.login');
    }
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $agent = Agent::where(['email' => $request->email])->get();

        if (!$agent) {
            return redirect()->back();
        } else {
            if (Auth::guard('agent')->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect(route('agent.dashbord'));
            }
            else {
                return redirect()->back();
            }
        }
    }

    public function loggedOut(Request $request)
    {
        return redirect(route('agent.login'));
    }
}
