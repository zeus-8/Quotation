<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Http\Requests;
use hive\Http\Requests\CreateTransferRequest;
use hive\Http\Requests\UpdateTransferRequest;
use hive\Models\Companie;
use hive\Models\Transfer;
use hive\Models\Ttransfer;
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
        $transfers = DB::table('transfers')
                            ->join('companies', 'transfers.companie_id', '=', 'companies.id')
                            ->join('ttransfers', 'transfers.ttransfer_id', '=', 'ttransfers.id')
                            ->select('transfers.id', 'companies.co_name', 'transfers.tr_name', 'transfers.tr_cost', 'ttransfers.tt_transfer')
                            ->whereNull('transfers.deleted_at')
                            ->orderBy('transfers.tr_id_card')
                            ->get();
                            // dd($transfers);
        return view('sys.transport.list', compact('transfers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companie::all();
        $transfers = Ttransfer::all();
        return view('sys.transport.create', compact('companies', 'transfers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTransferRequest $request)
    {
        // dd($request);
        Transfer::create([
                    'companie_id'     => $request['empresa'],
                    'tr_name'     => trim(strtoupper($request['nombre_chofer'])),
                    'tr_last_name'   => trim(strtoupper($request['apellido_chofer'])),
                    'tr_id_card'    => $request['cedula'],
                    'tr_cell_phone'   => $request['celular'],
                    'tr_coment' => $request['descripcion'],
                    'ttransfer_id'     => $request['tipo_transporte'],
                    'tr_cost'   => $request['costo'],                    
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
        $transport1 = Transfer::find($id);
        // dd($transport1);
        $transport1->nombre_chofer =  $transport1->tr_name;
        $transport1->apellido_chofer =  $transport1->tr_last_name;
        $transport1->cedula =  $transport1->tr_id_card;
        $transport1->celular =  $transport1->tr_cell_phone;
        $transport1->descripcion =  $transport1->tr_coment;
        $companies = Companie::all();
        $transfers = Ttransfer::all();
        return view('sys.transport.edit', compact('transport1', 'companies', 'transfers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransferRequest $request, $id)
    {
        $transport1 = Transfer::find($id);
        $transport1->companie_id = $request->empresa;
        $transport1->tr_name = trim(strtoupper($request->nombre_chofer));
        $transport1->tr_last_name = trim(strtoupper($request->apellido_chofer));
        $transport1->tr_cell_phone = $request->celular;
        $transport1->ttransfer_id = $request->tipo_transporte;
        $transport1->tr_cost = $request->costo;
        $transport1->tr_coment = trim(strtoupper($request->descripcion));
        $transport1->save();
        Session::flash('message','Los datos de ' .  $request->nombre_chofer  . ' fue actualizado con exito');
        return Redirect::to('transport');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transport = Transfer::find($id);
        $transport->delete();
        Session::flash('message','Los Datos de ' .  $transport->nombre_chofer . ' fue dado de baja con exito');
        return Redirect::to('transport');
    }

}
