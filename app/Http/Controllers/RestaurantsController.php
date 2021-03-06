<?php

namespace App\Http\Controllers;

use DB;
use App\Hotels;
use App\Actives;
use App\Restaurants;
use Illuminate\Http\Request;
use App\Http\Requests\RestaurantsRequest;

class RestaurantsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('editor', ['only' => [
            'index',
            'store',
            'edit',
            'update',
            'destroy'
        ]]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $hotels = Hotels::orderBy('hotel_name', 'ASC')->where('active_id', '1')->get();
            $actives = Actives::orderBy('id', 'ASC')->get();
            return view('restaurant.index', [
                'hotels' => $hotels,
                'actives' => $actives
            ]);
        } catch (Exception $e) {
            return view('error.index')->with('error', $e);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            $restaurants = DB::table('restaurants')
                ->select('restaurants.id', 'restaurant_name', 'hotel_name', 'restaurant_email', 'actives.active', 'restaurant_comment')
                ->join('hotels', 'restaurants.hotel_id', '=', 'hotels.id')
                ->join('actives', 'restaurants.active_id', '=', 'actives.id')
                ->orderBy('restaurants.id', 'asc')->paginate(10);
            return view('restaurant.list', [
                'restaurants' => $restaurants
            ]);
        } catch (Exception $e) {
            return view('error.index')->with('error', $e);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(RestaurantsRequest $request)
    {
        DB::beginTransaction();
        try {
            $restaurants = new Restaurants;
            $restaurants->restaurant_name = $request->restaurant_name;
            $restaurants->restaurant_email = $request->restaurant_email;
            $restaurants->hotel_id = $request->hotel_id;
            $restaurants->active_id = $request->active_id;
            $restaurants->restaurant_comment = $request->restaurant_comment;
            $restaurants->save();
            DB::commit();
            return redirect()->action('RestaurantsController@create');
        } catch (Exception $e) {
            DB::rollback();
            return view('error.index')->with('error', $e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $restaurants = DB::table('restaurants')
                ->select('restaurants.id', 'restaurant_name', 'restaurant_email', 'restaurants.hotel_id', 'hotel_name', 'restaurants.active_id', 'actives.active', 'restaurant_comment')
                ->join('hotels', 'restaurants.hotel_id', '=', 'hotels.id')
                ->join('actives', 'restaurants.active_id', '=', 'actives.id')
                ->orderBy('restaurants.id', 'asc')->where('restaurants.id', $id)->get();
            foreach ($restaurants as $restaurant) {

            }

            $actives = Actives::orderBy('id', 'ASC')->get();
            $hotels = Hotels::orderBy('id', 'ASC')->where('active_id', '1')->get();

            return view('restaurant.edit', [
                'id' => $restaurant->id,
                'restaurant_name' => $restaurant->restaurant_name,
                'restaurant_email' => $restaurant->restaurant_email,
                'hotel_id' => $restaurant->hotel_id,
                'hotel_name' => $restaurant->hotel_name,
                'active_id' => $restaurant->active_id,
                'active' => $restaurant->active,
                'restaurant_comment' => $restaurant->restaurant_comment
            ])->with('actives', $actives)->with('hotels', $hotels);
        } catch (Exception $e) {
            return view('error.index')->with('error', $e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(RestaurantsRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            DB::table('restaurants')
                ->where('id', $id)
                ->update([
                    'restaurant_name' => $request->restaurant_name,
                    'restaurant_email' => $request->restaurant_email,
                    'hotel_id' => $request->hotel_id,
                    'active_id' => $request->active_id,
                    'restaurant_comment' => $request->restaurant_comment
                ]);
            DB::commit();
            return redirect()->action('RestaurantsController@create');
        } catch (Exception $e) {
            DB::rollback();
            return view('error.index')->with('error', $e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //echo $id;
        DB::beginTransaction();
        try {
            DB::table('restaurants')->where('id', $id)->delete();
            DB::commit();
            return redirect()->action('RestaurantsController@create');
        } catch (Exception $e) {
            DB::rollback();
            return view('error.index')->with('error', $e);
        }
    }

}
