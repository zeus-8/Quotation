<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Http\Requests;
use hive\Http\Requests\CreateLocationRequest;
use hive\Models\Localities;
use Redirect;
use Session;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localities = Localities::all();
        return view ('sys.location.list', compact('localities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sys.location.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateLocationRequest $request)
    {
        localities::create([
                'localidad'      => trim(strtoupper($request['localidad'])),
            ]);
        Session::flash('message', 'Los datos de la LOCALIDAD se guardaron exitosamente');
        return Redirect::to('location');
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
        $location = Localities::find($id);
        return view('sys.location.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateLocationRequest $request, $id)
    {
        $location = Localities::find($id);
        $location->localidad     = trim(strtoupper($request->localidad));
        $location->save();
        Session::flash('message','La localidad ' .  $request->localidad . ' fue actualizada con exito');
        return Redirect::to('location');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $location = Localities::find($id);
        $location->delete();
        Session::flash('message','La localidad ' .  $location->localidad . ' fue eliminada con exito');
        return Redirect::to('location');
    }
}
