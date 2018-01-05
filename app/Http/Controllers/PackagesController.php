<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Models\Date;
use hive\Models\Hotel;
use hive\Models\Transfer;
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
        $dates = Date::all(); 
        $hotels = Hotel::all();
        $transfers = DB::table('transfers')
                            ->join('ttransfers', 'ttransfers.id', '=', 'transfers.ttransfer_id')
                            ->join('companies', 'companies.id', '=', 'transfers.companie_id')
                            ->select('transfers.id', 'transfers.tr_name', 'transfers.tr_last_name', 'transfers.tr_cost', 'companies.co_name', 'ttransfers.tt_transfer')
                            ->orderBy('transfers.id')
                            ->get();      
        // dd($transfers);
        return view('sys.packages.create', compact('dates', 'hotels', 'transfers'));
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
