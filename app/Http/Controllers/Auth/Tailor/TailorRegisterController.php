<?php

namespace App\Http\Controllers\Auth\Tailor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Tailor;
use Auth;

class TailorRegisterController extends Controller
{
    protected $redirectPath = '/tailor';


    protected function Register(Request $request)
    {

        $rule = [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phone' => 'required|string|max:15|unique:tailors',
            'email' => 'required|string|email|max:255|unique:tailors',
            'password' => 'required|string|min:6|confirmed',
        ];

        $this->validate($request, $rule);
        $tailor = new Tailor();
        $password = $request['password'];
        $tailor = $tailor->create([
            'firstname' => $request['firstname'],
            'lastname' => $request['lastname'],
            'gender' => $request['gender'],
            'phone' => $request['phone'],
            'email' => $request['email'],
            'password' => bcrypt($password)
//            'avatar' => 'public/defaults/avatars/default.png'
        ]);

        if($tailor && Auth::guard('tailor')->attempt(['email' => $tailor->email, 'password' => $password])){
            dd(Auth::guard('tailor')->User()->status);

            // if successful, then redirect to their intended location
            return redirect()->intended(route('tailor.dashboard'));
        }

        return redirect()->back()->with('failure', 'An error occurred. Please try again');

    }
}
