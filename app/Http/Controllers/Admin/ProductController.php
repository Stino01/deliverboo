<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Product;
use App\User;
use App\Restaurant;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $user = Auth::user();
        // $products = Product::where('user_id', $user->id)->get();
        // return view('admin.products.index', compact('products', 'user'));

        // $restaurants = Restaurant::all();
        // $user_id = Auth::user()->id;
        // $data = [
        //     'products' => Product::where([
        //         ['user_id', $user->id],
        //         ['restaurant_id', $restaurants->id]
        //     ])->get(),
        // ];

        // return view('admin.products.index', $data);

        // $products = Product::where('restaurant_id', $restaurant_id)->get();
        // return view('admin.products.index', compact('products'));

        $user = Auth::user();
        $restaurants = Restaurant::where('user_id', $user->id)->get();
        $products = Product::all();
        return view('admin.products.index', compact('products', 'restaurants'));
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

    private function getSlug($name)
    {
        $slug = Str::of($name)->slug("-");
        $count = 1;

        //prendi il primo post il cui slug è uguale a $slug
        // se è presente allora genero un nuovo slug aggiungendo -$count
        while (Product::where("slug", $slug)->first()) {
            $slug = Str::of($name)->slug("-") . "-{$count}";
            $count++;
        }
        return $slug;
    }
}
