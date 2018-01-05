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
        $packages = Package::all();
        // dd($packages);
        return view('sys.quotation.list', compact('packages'));//
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
        $user = \Auth::User();
        $package = Package::find($id);
        $dates = Date::all();
        $guides = Guide::all();
        // $ho = DB::table('room_hotel_package')
        //                 ->selec()
        $hotels = Hotel::all();
        $rooms = Room::all();
        $restaurants = Restaurant::all();
        $transfers = Transfer::all();
        $carbon = Carbon::now();
        // dd($user, $package, $dates, $guides, $hotels, $rooms, $restaurants, $transfers, $carbon); 
        return view('sys.quotation.create', compact('user', 'package', 'date', 'guides', 'hotels', 'rooms', 'restaurants', 'transfers', 'carbon'));
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
