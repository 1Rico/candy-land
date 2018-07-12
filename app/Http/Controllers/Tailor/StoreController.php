<?php

namespace App\Http\Controllers\Tailor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Store;
use Auth;


/**
 * Class StoreController
 * @package App\Http\Controllers\Tailor
 */
class StoreController extends Controller
{

    /**
     * StoreController constructor.
     */
    public function __construct()
    {

    }

    public function getStores()
    {
        $tailor = Auth::guard('tailor')->user();
        return view('tailor.stores');
    }

}
