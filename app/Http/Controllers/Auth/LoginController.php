<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    use AuthenticatesUsers {
        login as protected laravelLogin;
        showLoginForm as protected laravelShowLoginForm;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Display the login form.
     */
    public function showLoginForm()
    {
        if (session()->has('admin_id')) {
            return redirect()->route('admin.dashboard');
        }

        return $this->laravelShowLoginForm();
    }

    /**
     * Handle a login request for users and admins.
     */
    public function login(Request $request)
    {
        $admin = Admin::where('email', $request->input('email'))->first();

        if ($admin && Hash::check((string) $request->input('password'), $admin->password)) {
            $request->session()->regenerate();
            $request->session()->put('admin_id', $admin->id);
            $request->session()->put('admin_name', $admin->name);

            return redirect()->route('admin.dashboard');
        }

        return $this->laravelLogin($request);
    }
}
