<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected function redirectTo() {
        if(auth()->user()->role == 1) {
            return route('admin.dashboard');
        }else if(auth()->user()->role == 2) {
            return route('dashboard');
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request) {
        $remember = $request->has('remember');
    
        $request->validate([
            'username'      => 'required|string',
            'password'      => 'required|string',
            
        ]);

        $user = User::where('username', $request->username)->first();

        if(!$user) {
            return redirect('/login')->with('Error', 'Username doesn\'t exist.');
        }
       
        if(auth()->attempt(['username' => $request->username, 'password' => $request->password], $remember)) {
            if(auth()->user()->role == 1) {
                return redirect()->route('admin.dashboard')->with("Message", "Welcome Admin $user->name");
            }
            return redirect()->route('dashboard')->with("Message", "Welcome $user->name");
        }else{
            return redirect('/login')->with('Error', 'Invalid credentials.')->withInput($request->all());
        }
    }
}
