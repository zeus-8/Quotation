<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use carbon\Carbon;
use hive\Models\Guide;
use hive\Models\Hotel;
use hive\Models\Reference;
use hive\Models\Localitie;
use hive\User;
use DB;

class QuotationCeroController extends Controller
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
        $carbon = Carbon::now();
        $user = \Auth::User();
        $hotels = Hotel::all();
        $references = Reference::all(); //pluck('id', 'reference');
        $localities = Localitie::all(); //pluck('id', 'localitie');
        $guides = Guide::all();
        // dd($references);
        // $rooms = DB:: table('hotels')
        //                 ->join('hotel_package_room', 'hotel_package_room.hotel_id', '=', 'hotels.id')
        //                 ->join('rooms', 'hotel_package_room.room_id', '=', 'rooms.id')
        //                 ->select('hotels.id, rooms.id, rooms.room, hotel_package_room.cost')
        //                 ->where('hotels.id', '=', $id)
        //                 ->get();
        return view('sys.quotationcero.create', compact('carbon', 'user', 'hotels', 'references', 'localities', 'guides'));
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
