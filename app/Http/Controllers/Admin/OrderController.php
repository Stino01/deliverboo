<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\Restaurant;
use App\Type;
use App\Product;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        $user_id = Auth::user()->id;

        $restaurant = Restaurant::where('user_id', $user_id)->first();
        $products = Product::where('restaurant_id', $restaurant->id)->get();

        foreach ($products as $product) {
            foreach($product->orders as $order) {
                // echo $product->pivot->product_id;
                // echo $order->name;
                $product_id[] = $order->pivot->product_id;
            }
            //dd($product_id);
        }

        return view('admin.orders.index', compact('orders', 'product_id'));
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
    public function show(Order $order)
    {
        $orders = Order::all();
        $user_id = Auth::user()->id;

        $restaurant = Restaurant::where('user_id', $user_id)->first();
        $products = Product::where('restaurant_id', $restaurant->id)->get();

        foreach ($products as $product) {
            foreach($product->orders as $order) {
                $product_id[] = $order->pivot->product_id;
                $order_id[] = $order->pivot->order_id;
            }
        }
        
        return view('admin.orders.show', compact('products' ,'order'));
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
