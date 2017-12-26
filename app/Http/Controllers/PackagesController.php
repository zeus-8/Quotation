<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Models\Hotels;
use hive\Models\Type_Room;
use hive\Models\Transport;
use hive\Models\Guides;
use Redirect;
use Session;
use DB;

class PackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*$hotels = DB::table('hoteles')
                    ->select('id', 'nombre')
                    ->get();*/
        /*$rooms = DB::table('hoteles')
                   ->join('hot_hab', 'hoteles.id', '=', 'hot_hab.id_hot')
                   ->join('habitaciones', 'hot_hab.id_hab', '=', 'habitaciones.id')
                   ->select('hoteles.id', 'habitaciones.descripcion', 'hot_hab.costo')
                   ->get();*/
        /*$rooms = Type_Room::all();
        $transfers = Transport::all();
        $guides = Guides::all();*/
        // dd($hotels, $rooms, $transfers, $guides);, compact('hotels', 'rooms', 'transfers', 'guides')
        return view('sys.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request);
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
