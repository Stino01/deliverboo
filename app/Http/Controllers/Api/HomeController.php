<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Type;
use App\Restaurant;
use App\Product;
use App\Category;
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
        $filteredRestaurants = [];
        $categories = Category::all();

        // PRODOTTI DA MOSTRARE NELLA SHOW PER IL MENU DA FIXARE
        foreach ($restaurants as $restaurant) {
            $products = Product::where('restaurant_id', $restaurant->user_id)->get();
        };
        // dump($products);

        // FILTRO PER I RISTORANTI (DA FIXARE)
        foreach ($types as $type) {
            foreach ($type->restaurants as $restaurant) {
                //$type_id[] = $restaurant->pivot->type_id;
                foreach ($restaurants as $res) {
                    if ($res->id == $restaurant->getOriginal('pivot_restaurant_id')) {
                        // dump($restaurant->getOriginal());
                        $filteredRestaurants[] = $restaurant->getOriginal();
                    }
                }
            }
        }
        $data = [
            'restaurants' => $filteredRestaurants,
            'types' => $types,
            'categories' => $categories,
            'products' => $products,
        ];
        return response()->json($data);
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
    public function show($slug)
    {
        $restaurant = Restaurant::where("slug", $slug)->first();
        $products = Product::where('restaurant_id', $restaurant->user_id)->get();
        $data = [
            'restaurant' => $restaurant,
            'products' => $products,
        ];

        return response()->json($data);
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
