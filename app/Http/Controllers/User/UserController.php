<?php

namespace App\Http\Controllers\User;
use App\Models\Design;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class UserController extends Controller
{
   /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('user.dashboard');
    }

    public function getDesigns()
    {
        $designs = Design::all();
        $user = Auth::guard('web')->User();
//        dd($user->measurement);
        return view('user.designs', compact('designs','user'));
    }

}
