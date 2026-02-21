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
        logout as protected laravelLogout;
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
     * Handle a login request for users and admins.
     */
    public function login(Request $request)
    {
        $admin = Admin::where('email', $request->input('email'))->first();

        if ($admin && Hash::check((string) $request->input('password'), $admin->password)) {
            $request->session()->regenerate();
            $request->session()->put('admin_id', $admin->id);
            $request->session()->put('admin_name', $admin->name);

            return redirect()->intended($this->redirectPath());
        }

        return $this->laravelLogin($request);
    }

    /**
     * Mark authenticated users as admin when their email exists in admins table.
     */
    protected function authenticated(Request $request, $user): void
    {
        $admin = Admin::where('email', $user->email)->first();

        if ($admin) {
            $request->session()->put('admin_id', $admin->id);
            $request->session()->put('admin_name', $admin->name);
            return;
        }

        $request->session()->forget(['admin_id', 'admin_name']);
    }

    /**
     * Log out and clear any admin session markers.
     */
    public function logout(Request $request)
    {
        $request->session()->forget(['admin_id', 'admin_name']);

        return $this->laravelLogout($request);
    }
}
