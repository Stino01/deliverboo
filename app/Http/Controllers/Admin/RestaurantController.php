<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Restaurant;
use App\Type;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $data = [
            'restaurants' => Restaurant::where('user_id', $user_id)->orderBy('name', 'asc')->get(),
            'types' => Type::where(''),
        ];

        return view('admin.restaurants.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.restaurants.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newRestaurant = new Restaurant();

        $newRestaurant->name = $data['name'];
        $newRestaurant->slug = $this->getSlug($newRestaurant->name);
        $newRestaurant->email = $data['email'];
        $newRestaurant->password = $data['password'];
        $newRestaurant->address = $data['address'];
        $newRestaurant->vat_number = $data['vat_number'];
        $newRestaurant->user_id = Auth::user()->id;

        $newRestaurant->save();

        if(isset($data['types'])){
            $newRestaurant->types()->sync($data['types']);        
        }

        return redirect()->route('admin.restaurants.index', $newRestaurant->id);
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
    public function destroy()
    {
        //
    }

    private function getSlug($title)
    {
        $slug = Str::of($title)->slug("-");
        $count = 1;

        while(Restaurant::where('slug', $slug)->first()) {
            $slug = Str::of($title)->slug("-") . "-{$count}";
            $count++;
        };

        return $slug;
    }
}
