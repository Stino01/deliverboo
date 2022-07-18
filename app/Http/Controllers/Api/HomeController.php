<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Type;
use App\Restaurant;
use Response;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        $types = Type::all();
        $res_type = Restaurant::find($restaurant->id)->types()->get();
        $restaurant = Restaurant::where('user_id', $user)->first();
        $filteredRestaurants = [];

        foreach ($types as $type) {
            foreach ($type->restaurants as $restaurant) {
                //$type_id[] = $restaurant->pivot->type_id;
                foreach ($restaurants as $res) {
                    if ($res->id == $restaurant->getOriginal('pivot_restaurant_id')) {
                        //dump($res);
                        if (!in_array($res, $filteredRestaurants)) {
                            array_push($filteredRestaurants, $res);
                        }
                    }
                }
            }
        }
        if ($restaurant->getOriginal('pivot_restaurant_id') == $restaurant->id) {
            // dump($restaurant->getOriginal('pivot_restaurant_id'));
            foreach ($res_type as $type_attributes) {
                dump($type_attributes);

            //     $prod_attributes = Order::find($order->id)->products()->get();
            //     // dump($prod_attributes);
            // }
            // // dump($prod_attributes);
            // // dump($prod_attributes);
            // foreach ($prod_attributes as $pivot_attr) {
            //     $pivot_attr = Order::find($order->id)->products()->get();
            //     // dump($pivot_attr->pivot);
            // }
        };
        //dump($filteredRestaurants);
        $data = [
            'restaurants' => $restaurants,
            'types' => $types
        ];
        return response()->json($data);
        }
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
