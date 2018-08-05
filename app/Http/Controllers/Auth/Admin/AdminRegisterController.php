<?php

namespace App\Http\Controllers\Auth\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Auth;

class AdminRegisterController extends Controller
{
    protected $redirectPath = '/kdadmin';


    protected function Register(Request $request)
    {

        $rule = [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:15|unique:admins',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:6|confirmed',
        ];

        $this->validate($request, $rule);
        $admin = new Admin();
        $password = $request['password'];
        $admin = $admin->create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'gender' => $request['gender'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => bcrypt($password)
//            'avatar' => 'public/defaults/avatars/default.png'
        ]);

        if($admin && Auth::guard('admin')->attempt(['email' => $admin->email, 'password' => $password])){
//            dd(Auth::guard('admin')->User()->status);

            // if successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->with('failure', 'An error occurred. Please try again');

    }
}
