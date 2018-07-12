<?php

namespace App\Http\Controllers\Tailor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Tailor;


class TailorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:tailor');
    }

    public function index()
    {
        return "Tailor Dashboard";
    }

}
