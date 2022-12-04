<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Http\Requests\StoreOrderDetailRequest;
use App\Http\Requests\UpdateOrderDetailRequest;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $details = OrderDetail::join('orders', 'order_details.idorder', '=' ,'orders.idorder')
                                ->join('menus', 'order_details.idmenu', '=' ,'menus.idmenu')
                                ->join('pelanggans', 'orders.idpelanggan', '=' ,'pelanggans.idpelanggan')
                                ->select(['orders.*','order_details.*','menus.*','pelanggans.*'])
                                ->paginate(3);
        return view('Backend.orderdetail.select',['details'=>$details]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $tglmulai = $request->tglmulai;
        $tglakhir = $request->tglakhir;

        $details = OrderDetail::join('orders', 'order_details.idorder', '=' ,'orders.idorder')
                                ->join('menus', 'order_details.idmenu', '=' ,'menus.idmenu')
                                ->join('pelanggans', 'orders.idpelanggan', '=' ,'pelanggans.idpelanggan')
                                ->whereBetween('orders.tglorder',[$tglmulai,$tglakhir])
                                ->select(['orders.*','order_details.*','menus.*','pelanggans.*'])
                                ->paginate(3);
        return view('Backend.orderdetail.select',['details'=>$details]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderDetailRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderDetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderDetailRequest  $request
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderDetailRequest $request, OrderDetail $orderDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetail $orderDetail)
    {
        //
    }
}
