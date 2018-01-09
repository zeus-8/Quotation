<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Http\Requests\CreateRestaurantRequest;
use hive\Models\Restaurant;
use DB;
use Session;
use Redirect;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = DB::table('restaurants')->whereNull('deleted_at')->get();
        return view('sys.restaurant.list', compact('res'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sys.restaurant.create');   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRestaurantRequest $request)
    {
        Restaurant::create([
                're_name' => trim(strtoupper($request['nombre_restaurant'])),
                're_address' => trim(strtoupper($request['direccion_restaurant'])),
                're_cell_phone' => $request['celular_restaurant'],
                're_phone' => $request['fijo_restaurant'],
                're_cost_breakfast' => $request['costo_desayuno'],
                're_cost_lunch' => $request['costo_almuerzo'],
                're_cost_dinner' => $request['costo_cena'], 
        ]);
        Session::flash('message', 'Los datos del RESTAURANT se guardaron exitosamente');
        return Redirect::to('restaurant');
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
        $res = Restaurant::find($id);
        $res->nombre_restaurant = $res->re_name;
        $res->direccion_restaurant = $res->address;
        $res->celular_restaurant = $res->re_cell_phone;
        $res->fijo_restaurant = $res->re_phone;
        $res->costo_desayuno = $res->re_cost_breakfast;
        $res->costo_almuerzo = $res->re_cost_lunch;
        $res->costo_cena = $res->re_cost_dinner;
        return view('sys.restaurant.edit', compact('res'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateRestaurantRequest $request, $id)
    {
        $res = Restaurant::find($id);
        $res->re_name = trim(strtoupper($request->nombre_restaurant));
        $res->re_address = trim(strtoupper($request->direccion_restaurant));
        $res->re_cell_phone = $request->celular_restaurant;
        $res->re_phone = $request->fijo_restaurant;
        $res->re_cost_breakfast = $request->costo_desayuno;
        $res->re_cost_lunch = $request->costo_almuerzo;
        $res->re_cost_dinner = $request->costo_cena;
        $res->save();
        Session::flash('message','El restaurante '. $request->nombre_restaurant .' fue actualizado con exito');
        return Redirect::to('restaurant');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res = Restaurant::find($id);
        $res->delete();
        Session::flash('message','El restaurant ' .  $res->re_name . ' fue eliminado con exito');
        return Redirect::to('restaurant');
    }
}