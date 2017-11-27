<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Http\Requests;
use hive\Http\Requests\TypeRoomRequest;
use hive\Models\Type_Room;
use Redirect;
use Session;
use DB;

class BedroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beds = Type_Room::all();
        return view('sys.bedroom.list', compact('beds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sys.bedroom.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TypeRoomRequest $request)
    {
         // dd($request);
         Type_Room::create([
                'descripcion_habi' => trim(strtoupper($request['descripcion'])),
            ]);
        Session::flash('message', 'La HABITACION se guardo exitosamente');
        return Redirect::to('bed');
        
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
        $bed = Type_Room::find($id);
        $bed->descripcion = $bed->descripcion_habi;
        // dd($bed);
        return view('sys.bedroom.edit', compact('bed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TypeRoomRequest $request, $id)
    {
        // dd($request);
        $bed = Type_Room::find($id);
        $bed->descripcion_habi = trim(strtoupper($request->descripcion));
        $bed->save();
        Session::flash('message','La habitacion ' .  $request->descripcion . ' fue actualizado con exito');
        return Redirect::to('bed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bed = Type_Room::find($id);
        $bed->delete();
        Session::flash('message','El rango ' .  $bed->descripcion_habi . ' fue ELIMINADO con exito');
        return Redirect::to('bed');
    }
}
