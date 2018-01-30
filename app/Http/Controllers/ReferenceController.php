<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Http\Requests\CreateReferenceRequest;
use hive\Models\Localitie;
use hive\Models\Reference;
use DB;
use Redirect;
use Session;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $localities = Localitie::all();
        $references = DB::table('references')
                            ->join('localities', 'localities.id', '=', 'references.localitie_id')
                            ->select(DB::raw('localities.id as localitie'), 'references.id', 'references.reference')
                            ->WhereNull('references.deleted_at')
                            ->get();
        // dd($references);
        return view('sys.reference.list', compact('localities', 'references'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateReferenceRequest $request)
    {
        // dd($request);
        Reference::create([
                'reference' => trim(strtoupper($request['referencia'])),
                'localitie_id' => $request['localidad'],
        ]);
        Session::flash('message', 'Los datos de la REFRENCIA se guardaron exitosamente');
        return Redirect::to('reference');
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
        $reference = Reference::find($id);
        $localities = Localitie::all();
        $ref = DB::table('references')
                            ->join('localities', 'localities.id', '=', 'references.localitie_id')
                            ->select(DB::raw('localities.id as localitie'), 'references.id', 'references.reference')
                            ->Where('references.id', '=', $id)
                            ->WhereNull('references.deleted_at')
                            ->get();
        // dd($reference, $ref);
        return view('sys.reference.edit', compact('localities', 'reference', 'ref'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateReferenceRequest $request, $id)
    {
        $reference = Reference::find($id);
        $reference->reference = trim(strtoupper($request['referencia']));
        $reference->localitie_id = $request['localitie'];
        $reference->save();
        Session::flash('message', 'Los datos de la REFRENCIA ' . $request->referencia . ' se guardaron exitosamente');
        return Redirect::to('reference');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reference = Reference::find($id);
        $reference->delete();
        Session::flash('message','La referencia ' .  $reference->reference . ' fue dado de baja con exito');
        return Redirect::to('reference');
    }
}
