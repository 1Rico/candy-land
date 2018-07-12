<?php

namespace App\Http\Controllers\Auth\Tailor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Route;

class TailorLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:tailor', ['except' => ['logout']]);
    }

    public function showLoginForm()
    {
        return view('auth.tailor.tailor_login');
    }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('tailor')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // if successful, then redirect to their intended location
            return redirect()->intended(route('tailor.dashboard'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('tailor')->logout();
        return redirect('/tailor');
    }
}
