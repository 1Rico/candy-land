<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $user = \Auth::guard('web')->user();
        $data = $request->all();
        $user->update($data);

        return redirect()->action('User\ProfileController@index')->with('success', 'Profile updated successfully!');
    }
}
