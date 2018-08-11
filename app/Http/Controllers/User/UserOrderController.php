<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;

class UserOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = \Auth::guard('web')->User();
        $orders = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        return view('user.orders', compact('orders', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request = json_decode($request->data);
        $completion_date = Carbon::now(3)->addDays($request->duration);

        $order = new Order();
        $order->reference = '12112';
        $order->amount = $request->amount;
        $order->completion_date = $completion_date;
        $order->delivery_address = $request->delivery_address;
        $order->user_id = $request->user_id;
        $order->tailor_id = $request->tailor_id;
        $order->design_id = $request->design_id;

        $order->save();

        return redirect()->action('User\UserOrderController@index')->with('success', 'Order has been made!');
    }

    /**
     * Store a newly created resource in storage.a
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
        //
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
