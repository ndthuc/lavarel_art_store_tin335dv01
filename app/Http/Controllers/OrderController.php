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
    public function filter_by_status($status){
        return $orders = Order::where('status', $status)
            ->orderBy('order_date', 'desc')
            ->paginate(10);
    }
    public function filter_by_dates($from_date, $to_date){
        return $orders = DB::table('orders')
            ->whereBetween('order_date', [$from_date, $to_date])
            ->paginate(10);
    }
    public function index(Request $request)
    {
        $statuses = DB::table('order_statuses')->get();
        $status = $request->status;

        $from_date = $request->input('from_date');
        $to_date = $request->input('to_date');

        static $orders = null;
        static $errors = null;

        if ($status != null && $statuses
                ->where('status_name', '=', $status)
                ->isNotEmpty()){
            $orders = $this->filter_by_status($status);
        }
        elseif ($from_date!= null || $to_date != null){
            $validator = Validator::make($request->all(), [
                'from_date' => 'required|date',
                'to_date' => 'required|date|after_or_equal:from_date'
            ]);
            if ($validator->fails()){
                $orders = Order::orderBy('order_date', 'desc')->paginate(10);
            }
            else{
                $orders = $this->filter_by_dates($from_date, $to_date);
            }
        }
        else{
            $orders = Order::orderBy('order_date', 'desc')->paginate(10);
        }
        return view('order.index', [
            'orders' => $orders,
            'statuses' => $statuses,
            'selected_status' => $status,
            'from_date' => $from_date,
            'to_date' => $to_date,]);
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
            ->select( 'products.id',
                'products.product_name',
                'products.image',
                'products.price',
                'products.include_VAT')
            ->orderBy('products.id', 'asc')
            ->paginate(5);
        $user = DB::table('users')->where('id', $order->user_id)->first();
        return view('order.show',
            [   'order' => $order,
                'status' => $status,
                'products' => $products,
                'user' => $user]);
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
}
