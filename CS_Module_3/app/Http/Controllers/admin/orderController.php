<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\admin\order_detail;
use App\Models\admin\products;
use App\Models\admin\order;
use Illuminate\Support\Facades\Session;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = order::orderBy('id', 'desc')->get();
        return view('admin.orders.list', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $order = order::where('id', $id)->first();
        return view('admin.orders.edit', compact('order'));
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
        $order = order::where('id', $id)->first();
        $order->user_name = $request->user_name;
        $order->user_address = $request->user_address;
        $order->user_email = $request->user_email;
        $order->user_phone = $request->user_phone;
        $order->status = $request->status;
        $order->save();
        Session::flash('success', 'Sửa đơn hàng thành công');
        return redirect()->route('orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //xóa các sp trong bảng order-detail
        $orders_detail = order_detail::where('order_id', $id)->get();
        foreach ($orders_detail as $order_detail) {
            $order_detail->delete();
        }

        //xóa order
        $order = order::where('id', $id)->first();
        $order->delete();
        Session::flash('success', 'Xóa đơn hàng thành công');
        return redirect()->route('orders.index');
    }

    public function order_detail($id)
    {
        $order = order::where('id', $id)->first();
        return view('admin.orders.order_detail', compact('order'));
    }
}
