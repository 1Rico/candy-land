<?php

namespace App\Http\Controllers\Tailor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('user.profile');
    }
}
