<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{

    public function index()
    {
                $orders = DB::table('Orders')
        ->join('Customers', 'Orders.Customer_id', '=', 'Customers.Customer_id')
        ->join('Order_products', 'Orders.Order_id', '=', 'Order_products.Order_id')

        ->get();

        return view('orders.index',['orders'=>$orders]);

    }


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
    public function destroy($Order_id)
    {

        DB::table('Orders')
        ->join('Customers', 'Orders.Customer_id', '=', 'Customers.Customer_id')
        ->join('Order_products', 'Orders.Order_id', '=', 'Order_products.Order_id')
        ->where('Orders.Order_id', $Order_id)
        ->delete();

         return redirect()->route('orders.index');
    }
}



































        // ->select('Orders.*', 'Customers.*', 'Order_products.*')
