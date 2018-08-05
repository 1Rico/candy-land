<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;

class ProfileController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $user = \Auth::guard('web')->user();
        return view('user.profile', compact('user'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'firstname'     => 'string|max:255',
            'lastname'     => 'string|max:255',
//            'phone' => 'unique:users',
            'password' => 'string|min:6|confirmed',
        ]);

        $user = \Auth::guard('web')->user();

        if($request->has('old_password')){
            $old_password = $request->old_password;
            if(!(Hash::check($old_password, $user->password))){
                return redirect()->back()->with('error', 'Your current password is incorrect');
            }

            $validatedData = $request->validate([
                'password' => 'required|string|min:6|confirmed'
            ]);

            $user->password = bcrypt($request->password);
            $user->save();
            return redirect()->action('Tailor\ProfileController@index')->with('success', 'Password updated successfully!');
        }


        $data = $request->all();
        $user->update($data);

        return redirect()->action('User\ProfileController@index')->with('success', 'Profile updated successfully!');
    }
}
