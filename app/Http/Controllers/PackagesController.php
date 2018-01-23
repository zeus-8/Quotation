<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Models\Date;
use hive\Models\Transfer;
use hive\Models\Localitie;
use hive\Models\Hotel;
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
        $transfers = DB::table('transfers')
                            ->join('ttransfers', 'ttransfers.id', '=', 'transfers.ttransfer_id')
                            ->join('companies', 'companies.id', '=', 'transfers.companie_id')
                            ->select('transfers.id', 'transfers.tr_name', 'transfers.tr_last_name', 'transfers.tr_cost', 'companies.co_name', 'ttransfers.tt_transfer')
                            ->orderBy('transfers.id')
                            ->get();
        $localities = Localitie::all();
        $hotels = Hotel::all();      

        // dd($transfers);
        return view('sys.packages.create', compact('dates', 'localities', 'transfers', 'hotels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

$idhotel=$request->input('hotel');
$local=$request->input('local');
$dates = Date::all(); 
$transfers = DB::table('transfers')
->join('ttransfers', 'ttransfers.id', '=', 'transfers.ttransfer_id')
->join('companies', 'companies.id', '=', 'transfers.companie_id')
->select('transfers.id', 'transfers.tr_name', 'transfers.tr_last_name', 'transfers.tr_cost', 'companies.co_name', 'ttransfers.tt_transfer')
->orderBy('transfers.id')
->get();
$localities = Localitie::all();
$hotels = Hotel::all();      
$nombrehotel = Hotel::all()->where('id',$idhotel); 
$nombrelocal = Localitie::all()->where('id',$local); 
$hoteles = DB::table('hotel_room')
->select('hotel_room.hotel_id','rooms.room','hotel_room.cost')
->join('rooms', 'rooms.id', '=', 'hotel_room.room_id')
->where('hotel_room.hotel_id', $idhotel)
->get();
$referencias= DB::table('references')
->select('transfers.tr_name','transfers.tr_cost')
->join('transfers', 'transfers.reference_id', '=', 'references.id')
->where('references.localitie_id', $local)
->get();
$referencias2= DB::table('references')
->select('guides.gu_name','guides.cost')
->join('guides', 'guides.reference_id', '=', 'references.id')
->where('references.localitie_id', $local)
->get();
$referencias3= DB::table('references')
->select('hotels.ho_name','hotels.id')
->join('hotels', 'hotels.reference_id', '=', 'references.id')
->where('references.localitie_id', $local)
->get();



    return view('sys.packages.create', compact('dates', 'localities', 'transfers', 'hotels','idhotel','hoteles','local','referencias','referencias2','referencias3','nombrehotel','nombrelocal'));


    }


      public function localidad(Request $request)
    {
      
$idhotel=$request->input('hotel');
$local=$request->input('local');
$dates = Date::all(); 
$transfers = DB::table('transfers')
->join('ttransfers', 'ttransfers.id', '=', 'transfers.ttransfer_id')
->join('companies', 'companies.id', '=', 'transfers.companie_id')
->select('transfers.id', 'transfers.tr_name', 'transfers.tr_last_name', 'transfers.tr_cost', 'companies.co_name', 'ttransfers.tt_transfer')
->orderBy('transfers.id')
->get();
$localities = Localitie::all();
$hotels = Hotel::all();      
$nombrehotel = Hotel::all()->where('id',$idhotel); 
$hoteles = DB::table('hotel_room')
->select('hotel_room.hotel_id','rooms.room','hotel_room.cost')
->join('rooms', 'rooms.id', '=', 'hotel_room.room_id')
->where('hotel_room.hotel_id', $idhotel)
->get();
$nombrelocal = Localitie::all()->where('id',$local); 
$referencias= DB::table('references')
->select('transfers.tr_name','transfers.tr_cost')
->join('transfers', 'transfers.reference_id', '=', 'references.id')
->where('references.localitie_id', $local)
->get();
$referencias2= DB::table('references')
->select('guides.gu_name','guides.cost')
->join('guides', 'guides.reference_id', '=', 'references.id')
->where('references.localitie_id', $local)
->get();
$referencias3= DB::table('references')
->select('hotels.ho_name','hotels.id')
->join('hotels', 'hotels.reference_id', '=', 'references.id')
->where('references.localitie_id', $local)
->get();




// dd($referencias);
  return view('sys.packages.create', compact('dates', 'localities', 'transfers', 'hotels','idhotel','hoteles','local','referencias','referencias2','referencias3','nombrehotel','nombrelocal'));


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
