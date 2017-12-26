<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Models\Package;
use hive\Models\Transfer;
use hive\Models\Hotel;
use hive\Models\Room;
use hive\Models\Guide;
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
        $pakages = Pakage::all();
        return view('sys.quotation.list', compact('pakages'));//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = \Auth::User();
        $pakages = Package::all();
        $transfers = Transfer::all();
        $hotels = Hotel::all();
        $guides = Guide::all();
        $dates = Date::all();
        $restaurants = Restaurant::all();
        $carbon = Carbon::now();
        // dd($user, $pakages, $transfers, $hotels, $guides, $dates, $carbon); 'transports', 'hotels', 'guides', 'dates', 'restaurants',
        return view('sys.quotation.create', compact('user', 'pakages', 'carbon'));
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
