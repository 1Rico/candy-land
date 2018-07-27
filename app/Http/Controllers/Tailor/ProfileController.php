<?php

namespace App\Http\Controllers\Tailor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        $tailor = \Auth::guard('tailor')->user();
        return view('tailor.profile', compact('tailor'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'firstname'     => 'string|max:255',
            'lastname'     => 'string|max:255',
//            'phone' => 'unique:users',
            'password' => 'string|min:6|confirmed',
            'address'     => 'string|max:255',
            'city'     => 'string|max:255',
            'state'     => 'string|max:255',
            'country'     => 'string|max:255',
            'delivery_address'     => 'string|max:255',
        ]);

        $user = \Auth::guard('tailor')->user();

        if($request->has('old_password')){
            $old_password = $request->old_password;
            if(Hash::check($old_password, $user->getAuthPassword()) == false){
                return redirect()->back()->with('error', 'Your current password is incorrect');
            }
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->action('Tailor\ProfileController@index')->with('success', 'Password updated successfully!');
        }


        $data = $request->all();
        $user->update($data);

        return redirect()->action('Tailor\ProfileController@index')->with('success', 'Profile updated successfully!');
    }

}
