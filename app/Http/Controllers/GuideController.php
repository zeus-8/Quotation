<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Http\Requests\CreateGuideRequest;
use hive\Http\Requests\UpdateGuideRequest;
use hive\Models\Guide;
use hive\Models\Reference;
use Session;
use Redirect;
use DB;

class GuideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $guides = DB::table('guides')
                        ->select('guides.id', 'guides.gu_id_card', 'guides.gu_name', 'guides.gu_last_name', 'references.reference')
                        ->join('references', 'guides.reference_id', '=', 'references.id')
                        ->whereNull('guides.deleted_at')
                        ->get();
                        // dd($guides);
        return view('sys.guide.list', compact('guides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $references = Reference::all();
        return view('sys.guide.create', compact('references'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateGuideRequest $request)
    {
        // dd($request);
        Guide::create([
                'gu_name'      => trim(strtoupper($request['nombre'])),
                'gu_last_name'  => trim(strtoupper($request['apellido'])),
                'gu_id_card'    => $request['cedula'],
                'gu_cell_phone'   => $request['celular'],
                'gu_phone'      => $request['telef_fijo'],
                'gu_address'    =>  $request['direccion'],
                'gu_email'     => trim(strtoupper($request['email'])),
                'cost'  => $request['costo'],
                'reference_id'    => $request['ref'],
            ]);
        Session::flash('message', 'Los datos del GUIA se guardaron exitosamente');
        return Redirect::to('guide');
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
        $guide = Guide::find($id);
        $guide->nombre = $guide->gu_name;
        $guide->apellido = $guide->gu_last_name;
        $guide->cedula = $guide->gu_id_card;
        $guide->celular = $guide->gu_cell_phone;
        $guide->telef_fijo = $guide->gu_phone;
        $guide->direccion = $guide->gu_address;
        $guide->email = $guide->gu_email;
        $guide->costo = $guide->cost;
        $guide->ref = $guide->reference_id;
        $references = Reference::all();
        return view('sys.guide.edit', compact('guide', 'references'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGuideRequest $request, $id)
    {
        $guide = Guide::find($id);
        $guide->gu_name = trim(strtoupper($request->nombre));
        $guide->gu_last_name = trim(strtoupper($request->apellido));
        $guide->gu_id_card = $request->cedula;
        $guide->gu_cell_phone = $request->celular;
        $guide->gu_phone = $request->telef_fijo;
        $guide->gu_address = trim(strtoupper($request->direccion));
        $guide->gu_email = trim(strtoupper($request->email));
        $guide->cost = $request->costo;
        $guide->reference_id = $request->ref;
        $guide->save();
        Session::flash('message','El usuario ' .  $request->email . ' fue actualizado con exito');
        return Redirect::to('guide');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $guide = Guide::find($id);
        $guide->delete();
        Session::flash('message','El guia ' .  $guide->gu_name . ' fue dado de baja con exito');
        return Redirect::to('guide');
    }
}
