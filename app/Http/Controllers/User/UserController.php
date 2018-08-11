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
        $user = Auth::guard('web')->user();
        $orders = $user->orders()->latest(7);
        return view('user.dashboard', compact('user', 'orders'));
    }

    public function getDesigns()
    {
        $designs = Design::whereStatus(1)->get();
        $user = Auth::guard('web')->User();
//        dd($user->measurement);
        return view('user.designs', compact('designs','user'));
    }

}
