<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Models\Pakages;
use hive\Models\Transport;
use hive\Models\Hotels;
use hive\Models\Guides;
use hive\Models\Restaurant;
use hive\Models\Date;
use hive\User;
use carbon\Carbon;
use DB;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd('vamos bien');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::User();
        $pakages = Pakages::all();
        $transports = Transport::all();
        $hotels = Hotels::all();
        $guides = Guides::all();
        $dates = Date::all();
        $restaurants = Restaurant::all();
        $carbon = Carbon::now();
        // dd($user, $pakages, $transports, $hotels, $guides, $dates, $carbon);
        return view('sys.quotation.create', compact('user', 'pakages', 'transports', 'hotels', 'guides', 'dates', 'restaurants', 'carbon'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
