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
        //                 ->join('hotel_room', 'hotel_room.hotel_id', '=', 'hotels.id')
        //                 ->join('rooms', 'hotel_room.room_id', '=', 'rooms.id')
        //                 ->select('hotels.id, rooms.id, rooms.room, hotel_room.cost')
        //                 ->where('hotels.id', '=', $id)
        //                 ->get();
        return view('sys.quotationcero.create', compact('carbon', 'user', 'hotels', 'references', 'localities', 'guides'));
    }
    // public function getLocalities(Request $request, $id){
    //     if ($request->ajax()){
    //         $localities = Localitie::local($id);
    //         return response()->json($localities);
    //     }
    // } eso no importa era una prueba asi que te la dejo igual. me voy tio voy a comer
    // dale

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


$refe = $request->input('referencia');
$idloca = $request->input('localidad');

$carbon = Carbon::now();
$user = \Auth::User();
$hotels = Hotel::all()->where('reference_id',$refe);
$references = Reference::all(); //pluck('id', 'reference');
$localities = Localitie::all(); //pluck('id', 'localitie');
$guides = Guide::all()->where('reference_id',$refe);

$localidad = Reference::all()->where('localitie_id',$idloca);
$localidad2 = Reference::all()->where('localitie_id',$idloca);

$referencia = DB::table('references')
->select('transfers.tr_name','transfers.tr_cost','guides.gu_name','guides.cost')
->join('guides', 'guides.reference_id', '=', 'references.id')
->join('transfers', 'transfers.reference_id', '=', 'references.id')
->where('references.localitie_id', $idloca)
->get();

$idho= $request->input('hotel');


$hotels2=  DB::table('hotel_room')
->select('hotel_room.hotel_id','rooms.room','hotel_room.cost','hotels.ho_name','hotels.id')
->join('rooms', 'rooms.id', '=', 'hotel_room.room_id')
->join('hotels', 'hotels.id', '=', 'hotel_room.hotel_id')
->whereIn('hotel_room.hotel_id', $idho)
->get();

$seleccionados = Hotel::all()->whereIn('id',$idho);


return view('sys.quotationcero.create', compact('carbon', 'user', 'hotels', 'references', 'localities', 'guides','hotels2','localidad','idloca','localidad2','referencia','refe','id','seleccionados'));

        //
    }


public function metodoprueba(Request $request)
{

$refe = $request->input('referencia');
$id2=$request->input('hotel');
$idloca = $request->input('localidad');


$carbon = Carbon::now();
$user = \Auth::User();
$hotels = Hotel::all()->where('reference_id',$refe);
$references = Reference::all(); //pluck('id', 'reference');
$localities = Localitie::all(); //pluck('id', 'localitie');
$guides = Guide::all()->where('reference_id',$refe);
$localidad = Reference::all()->where('id',$refe);
$hoteles = Hotel::all()->where('id',$id2);
$localidad2 = Reference::all()->where('localitie_id',$idloca);

$referencia = DB::table('references')
->select('transfers.tr_name','transfers.tr_cost','guides.gu_name','guides.cost','hotels.ho_name','hotels.id')
->join('guides', 'guides.reference_id', '=', 'references.id')
->join('transfers', 'transfers.reference_id', '=', 'references.id')
->join('hotels', 'hotels.reference_id', '=', 'references.id')
->where('references.localitie_id', $idloca)
->get();




   return view('sys.quotationcero.create', compact('carbon', 'user', 'hotels', 'references', 'localities', 'guides','localidad','localidad2','idloca','referencia','refe'));



}

public function localidad(Request $request)
{
        $idloca = $request->input('localidad');
        $carbon = Carbon::now();
        $user = \Auth::User();
        $hotels = Hotel::all();
        $references = Reference::all(); //pluck('id', 'reference');
        $localities = Localitie::all(); //pluck('id', 'localitie');
        $guides = Guide::all();
        $localidad = Reference::all()->where('id',$idloca);
        $localidad2 = Reference::all()->where('localitie_id',$idloca);



        return view('sys.quotationcero.create', compact('carbon', 'user', 'hotels', 'references', 'localities', 'guides','localidad','localidad2','idloca'));


}



public function noche(Request $request)
{

$noche=$request->input('noches');
$hot=$request->input('hoteles');


$seleccionados = Hotel::all()->whereIn('id',$hot);


$id=$request->input('hotel');
$refe = $request->input('referencia');
$idloca = $request->input('localidad');

$carbon = Carbon::now();
$user = \Auth::User();
$hotels = Hotel::all()->where('reference_id',$refe);
$references = Reference::all(); //pluck('id', 'reference');
$localities = Localitie::all(); //pluck('id', 'localitie');
$guides = Guide::all()->where('reference_id',$refe);
$hoteles = Hotel::all()->where('id',$id);
$localidad = Reference::all()->where('id',$id);
$localidad2 = Reference::all()->where('localitie_id',$idloca);

$referencia = DB::table('references')
->distinct()
->select('transfers.tr_name','transfers.tr_cost','guides.gu_name','guides.cost')
->join('guides', 'guides.reference_id', '=', 'references.id')
->join('transfers', 'transfers.reference_id', '=', 'references.id')
->where('references.localitie_id', $idloca)
->groupBy('transfers.tr_name','transfers.tr_cost','guides.gu_name','guides.cost')

->get();


$hotels2=  DB::table('hotel_room')

->select('hotel_room.hotel_id','rooms.room','hotel_room.cost','hotels.ho_name','hotels.id')
->join('rooms', 'rooms.id', '=', 'hotel_room.room_id')
->join('hotels', 'hotels.id', '=', 'hotel_room.hotel_id')
->whereIn('hotel_room.hotel_id', $hot)
->groupBy('hotel_room.hotel_id','rooms.room','hotel_room.cost','hotels.ho_name','hotels.id')
->get();


$hoteles2 = DB::table('hotel_room')
->select('hotel_room.hotel_id','rooms.room','hotel_room.cost')
->join('rooms', 'rooms.id', '=', 'hotel_room.room_id')
->where('hotel_room.hotel_id', $id)
->get();




    return view('sys.quotationcero.create', compact('carbon', 'user', 'hotels', 'references', 'localities', 'guides','hoteles','hoteles2','localidad','idloca','localidad2','referencia','refe','id','noche','seleccionados','hotels2','hot'));






}




public function probando(request $request){

$noches=$request->input('noches');
$hoteles=$request->input('hoteles');

$resultado = array_combine($noches,$hoteles);


$hotels2=  DB::table('hotel_room')
->select('hotel_room.hotel_id','rooms.room','hotel_room.cost','hotels.ho_name','hotels.id')
->join('rooms', 'rooms.id', '=', 'hotel_room.room_id')
->join('hotels', 'hotels.id', '=', 'hotel_room.hotel_id')
->whereIn('hotel_room.hotel_id', $hoteles)
->groupBy('hotel_room.hotel_id','rooms.room','hotel_room.cost','hotels.ho_name','hotels.id')
->get();

foreach ($hotels2 as $ho) {
    echo $ho->cost."<br>";
}





//return view('prueba',compact('hotels2','conta','conta2'));





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
