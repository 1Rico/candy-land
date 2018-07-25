<?php

namespace App\Http\Controllers\Tailor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Store;
use Auth;
use Crypt;


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

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function getStores()
    {
        $tailor = Auth::guard('tailor')->user();
        $stores = $tailor->stores;
        return view('tailor.stores', compact('stores'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveStore(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
        'name'   => 'required|string|min:5|max:255',
        'phone' => 'required|string|min:5|max:255',
        'address' => 'required|string|min:6|max:255',
        'description' => 'required|string|min:10|max:255'
    ]);
        $data = $request->all();
        $data['tailor_id'] = Auth::guard('tailor')->user()->id;
        Store::create($data);
//        $store = new Store();
//        $store->name = $request->name;
//        $store->phone = $request->phone;
//        $store->address = $request->address;
//        $store->description = $request->description;
//        $store->tailor_id = Auth::guard('tailor')->user()->id;
//
//        $store->save();

        return redirect()->route('tailor.stores')->with('success', 'Successfully Added Store!');

    }

    public function viewStore($id)
    {
        $store = Store::findOrFail(Crypt::decryptString($id));
        return view('tailor.store', compact('store'));
    }

}
