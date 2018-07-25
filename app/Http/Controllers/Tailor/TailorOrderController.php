<?php

namespace App\Http\Controllers\Tailor;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Crypt;

class TailorOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tailor = \Auth::guard('tailor')->User();
        //recheck laravel scopes
        $orders = Order::where('tailor_id', $tailor->id)->get();

        return view('tailor.orders', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request = json_decode($request->data);

        $order = new Order();
        $order->reference = '12112';
        $order->amount = $request->amount;
        $order->completion_date = $request->completion_date;
        $order->delivery_address = $request->delivery_address;
        $order->completion_date = $request->completion_date;
        $order->user_id = $request->user_id;
        $order->tailor_id = $request->tailor_id;
        $order->design_id = $request->design_id;

        $order->save();

//        return view()

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::findOrFail(Crypt::decryptString($id));
        return view('tailor.order', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
