<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //filter by status
        $statuses = DB::table('order_statuses')->get();
        $status = $request->status;
        if (!$status){
            $orders = Order::orderBy('order_date', 'desc')->get();
        }
        else{
                $orders = Order::where('status', $status)
                ->orderBy('order_date', 'desc')
                ->get();
        }
        return view('order.index', [
            'orders' => $orders,
            'statuses' => $statuses]);
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
        $order = DB::table('orders')->find($id);
        $status = DB::table('order_statuses')->find($order->status);
        $products = DB::table('order_product')
            ->where('order_id', $id)
            ->join('orders', 'orders.id', '=', 'order_product.order_id')
            ->join('products', 'products.id', '=', 'order_product.product_id')
            ->select( 'products.id', 'products.product_name', 'products.image', 'products.price', 'products.include_VAT')
            ->orderBy('products.id', 'asc')
            ->get();

        return view('order.show', ['order' => $order, 'status' => $status, 'products' => $products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = DB::table('orders')->find($id);
        $statuses = DB::table('order_statuses')->get();
        return view('order.edit', [ 'order' => $order, 'statuses' => $statuses]);
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
        $order = DB::table('orders')->find($id);
        $order->status = $request->input('status');
        $affect = DB::table('orders')
            ->where('id', $id)
            ->update([
                'status' => $order->status,
            ]);
        return redirect()->back()->with('success', 'Update Order Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->back()->with('success', 'Delete Order Success');
    }

    public function searchByName(Request $request){
        $validator = Validator::make($request->all(), [
            'keyword' => 'required',
        ]);
        if ($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('fail', 'Cannot filter orders');
        }else{
            $keyword = $request->input('keyword');
            $orders = DB::table('orders')
                ->where('name','like','%'.$keyword.'%')
                ->get();
            return view('order.filter', ['orders' => $orders]);
        }
    }

    public function filter(Request $request){
        $validator = Validator::make($request->all(), [
            'from_date' => 'required|date',
            'to_date' => 'required|date|after_or_equal:from_date'
        ]);
        if ($validator->fails()){
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('fail', 'Cannot filter orders');
        }else{
            $from = $request->input('from_date');
            $to = $request->input('to_date');
            $orders = DB::table('orders')->whereBetween('order_date', [$from, $to])->get();
            return view('order.filter', ['orders' => $orders, 'from_date' => $from, 'to_date' => $to]);
        }
    }
}
