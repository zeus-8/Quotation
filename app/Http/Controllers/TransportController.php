<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Models\Business;
use hive\Models\Transport;
use hive\Models\Type_Transport;
use Redirect;
use Session; 
use DB;

class TransportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transports = DB::table('transportes')
                            ->join('empresa', 'transportes.id_emp', '=', 'empresa.id')
                            ->join('tipo_trans', 'transportes.id_tt', '=', 'tipo_trans.id')
                            ->select('transportes.id', 'empresa.nombre', 'transportes.nombre_chofer', 'transportes.apellido_chofer', 'transportes.cedula', 'tipo_trans.descripcion')
                            ->orderBy('transportes.cedula')
                            ->get();
                            // dd($transports);
        return view('sys.transport.list', compact('transports'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $business = Business::all();
        $transports = Type_Transport::all();
        return view('sys.transport.create', compact('business', 'transports'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        Transport::create([
                    'id_emp'     => $request['empresa'],
                    'nombre_chofer'     => trim(strtoupper($request['nombre_chofer'])),
                    'apellido_chofer'   => trim(strtoupper($request['apellido_chofer'])),
                    'cedula'    => $request['cedula'],
                    'telef_chofer'   => $request['celular'],
                    'descripcion_trans' => $request['descripcion'],
                    'id_tt'     => $request['transporte'],                    
                ]);
        Session::flash('message', 'Los datos del TRANSPORTE se guardaron exitosamente');
        return Redirect::to('transport');
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
