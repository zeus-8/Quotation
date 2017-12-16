<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Http\Requests;
use hive\Http\Requests\CreateHostelRequest;
use hive\Models\Hotels;
use hive\Models\Type_Room;
use hive\Models\Type_Hoste;
use Redirect;
use Session;
use DB;

class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         // return view('sys.hostel.list', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Type_Room::All();
        $typehotels = Type_Hoste::All();
        return view('sys.hostel.create', compact('rooms', 'typehotels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHostelRequest $request)
    {
        dd($request);
        $request['fijo'] = trim(strtoupper($request['telef_fijo']));
        $hostel = new Hotels($request->all());
        $hostel->save();

        //LLENADO DE LA TABLA PIVOTE
        // $hostel->typeroom()->sync($request->costo);
        // $hostel->typeroom()->attach('costo[]',['menu_id'=>'id menu', 'status'=>true]);
       
        $hostel->typeroom()->sync([
            $idHabitacion => [ 'costo' => $costoHabitacion],
            $idOtraHabitacion => ['costo' => $costoOtraHabitacion],
        ]);

        Session::flash('message', 'Los datos del HOTEL' .$request->nombre. ' se guardaron exitosamente');
        return Redirect::to('hostel');
        
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
