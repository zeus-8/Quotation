<?php

namespace hive\Http\Controllers;

use hive\Repositories\Users\UserRepository;
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
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

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
        //$user = \Auth::User(); // <- esto dara error si no un usuario conectado ... (pruebas)
        $user = $this->userRepository->exampleGetUserConnect();
        $hotels = Hotel::all();
        $references = Reference::all(); //pluck('id', 'reference');
        $localities = Localitie::all(); //pluck('id', 'localitie');
        $guides = Guide::all();
        return view('sys.quotationcero2.create', compact('carbon', 'user', 'hotels', 'references', 'localities', 'guides'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*
        echo "<b>Alimentacion</b> <br>".$request['alimentacion']."<br>";//
        echo "<b>Hoteles</b> <br>".$request['hoteles']."<br>";//
        echo "<b>Subtotal iva</b> <br>".$request['subiva']."<br>";//
        echo "<b>Total con iva</b> <br>".$request['subiva2']."<br>";
        echo "<b>Tranfers</b> <br>".$request['tranfers']."<br>";///
        echo "<b>Ticket aereo</b> <br>".$request['ticket']."<br>";//
        echo "<b>Porcentaje</b> <br>".$request['por']."<br>";//
        echo "<b>Total general</b> <br>".$request['totalpor']."<br>";//
        */

        // data desde el formulario
        //dd($request->all());

        $combination = [];

        // get hotel
        foreach ($request->get('hoteles') as $hotel) {

            $cant_noches = $request->get('noches_hotel_'.$hotel);

            // validate get room_hotel for hotel
            if ($request->has('room_hotel_hotel_'.$hotel)) {

                // get room_hotel id
                foreach ($request->get('room_hotel_hotel_'.$hotel) as $room_hotel_for_hotel) {

                    // cant hab
                    $cant_hab = $request->get('cant_hab_hotel_'.$hotel.'_comb_'.$room_hotel_for_hotel.'');

                    // validate cant hab
                    if (! is_null($cant_hab)) {

                        // combination
                        $combination[] = [
                            'hotel_id'      => $hotel,
                            'room_hotel_id' => $room_hotel_for_hotel,
                            'cant_hab'      => $cant_hab,
                            'cant_night'    => $cant_noches[0]
                        ];
                    }
                }
            }
        }

        // data despues de procesarla
        dd($combination);

    }
    public function hoteles(Request $request)
    {

        $refe = $request->input('referencia');
        $idloca = $request->input('localidad');
        $idho= $request->input('hotel');
        $carbon = Carbon::now();
        //$user = \Auth::User(); // <- esto dara error si no un usuario conectado ... (pruebas)
        $user = $this->userRepository->exampleGetUserConnect();
        $hotels = Hotel::all()->where('reference_id',$refe);
        $references = Reference::all(); //pluck('id', 'reference');
        $localities = Localitie::all(); //pluck('id', 'localitie');
        $guides = Guide::all()->where('reference_id',$refe);
        $localidad = Reference::all()->where('localitie_id',$idloca);
        $localidad2 = Reference::all()->where('localitie_id',$idloca);
        $localidad3 = Localitie::all()->where('id',$idloca);
        $referencia = DB::table('references')
                            ->select('guides.gu_name','guides.cost')
                            ->join('guides', 'guides.reference_id', '=', 'references.id')
                            ->where('references.localitie_id', $idloca)
                            ->get();
        $referencia2 = DB::table('references')
                            ->select('transfers.tr_name','transfers.tr_cost')
                            ->join('transfers', 'transfers.reference_id', '=', 'references.id')
                            ->where('references.localitie_id', $idloca)
                            ->get();   
        $hotels2=  DB::table('hotel_room')
                            ->select('hotel_room.hotel_id','rooms.room','hotel_room.cost','hotels.ho_name','hotels.id')
                            ->join('rooms', 'rooms.id', '=', 'hotel_room.room_id')
                            ->join('hotels', 'hotels.id', '=', 'hotel_room.hotel_id')
                            ->whereIn('hotel_room.hotel_id', $idho)
                            ->get();
        $hoteles2   = DB::table('hotel_room')
                            ->select('hotel_room.hotel_id','rooms.room','hotel_room.cost')
                            ->join('rooms', 'rooms.id', '=', 'hotel_room.room_id')
                            ->where('hotel_room.hotel_id', $idho)
                            ->get();
        $seleccionados = Hotel::all()->whereIn('id',$idho);
        return view('sys.quotationcero2.create', compact('carbon', 'user', 'hotels', 'references', 'localities', 'guides','hotels2','localidad','idloca','localidad2','referencia','referencia2','refe','id','seleccionados','hoteles2','localidad3'));
    }

    public function test_gust(Request $request)
    {
        $refe = $request->input('referencia');
        $idloca = $request->input('localidad');
        $idho= $request->input('hotel');
        $carbon = Carbon::now();
        //$user = \Auth::User(); // <- esto dara error si no un usuario conectado ... (pruebas)
        $user = $this->userRepository->exampleGetUserConnect();

        $hotels = Hotel::all()->where('reference_id',$refe);
        //$references = Reference::all(); //pluck('id', 'reference');
        $localities = Localitie::all(); //pluck('id', 'localitie');
        /*
        $guides = Guide::all()->where('reference_id',$refe);
        $localidad = Reference::all()->where('localitie_id',$idloca);
        $localidad2 = Reference::all()->where('localitie_id',$idloca);
        $localidad3 = Localitie::all()->where('id',$idloca);
        */
        //$referencia = DB::table('references')
            //->select('guides.gu_name','guides.cost')
            //->join('guides', 'guides.reference_id', '=', 'references.id')
            //->where('references.localitie_id', $idloca)
            //->get();

        /*
        $referencia2 = DB::table('references')
            ->select('transfers.tr_name','transfers.tr_cost')
            ->join('transfers', 'transfers.reference_id', '=', 'references.id')
            ->where('references.localitie_id', $idloca)
            ->get();
        */
        $hotels2=  DB::table('hotel_room')
            ->select('hotel_room.id as hotel_room_id','hotel_room.hotel_id as hotel_id','rooms.room as room','hotel_room.cost as cost','hotels.ho_name as hotel_name')
            ->join('rooms', 'rooms.id', '=', 'hotel_room.room_id')
            ->join('hotels', 'hotels.id', '=', 'hotel_room.hotel_id')
            ->whereIn('hotel_room.hotel_id', $idho)
            ->get();
        /*
        $hoteles2   = DB::table('hotel_room')
            ->select('hotel_room.hotel_id','rooms.room','hotel_room.cost')
            ->join('rooms', 'rooms.id', '=', 'hotel_room.room_id')
            ->where('hotel_room.hotel_id', $idho)
            ->get();
        */

        $seleccionados = Hotel::whereIn('id',$idho)->get();

        return view('sys.quotationcero2.create_gust', compact('carbon', 'user', 'localities', 'idloca', 'hotels', 'seleccionados', 'hotels2'));
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
        return view('sys.quotationcero2.create', compact('carbon', 'user', 'hotels', 'references', 'localities', 'guides','localidad','localidad2','idloca','referencia','refe'));
    }
    public function localidad(Request $request)
    {
         $idloca = $request->input('localidad');
         $carbon = Carbon::now();
        //$user = \Auth::User(); // <- esto dara error si no un usuario conectado ... (pruebas)
        $user = $this->userRepository->exampleGetUserConnect();
         $hotels = Hotel::all();
         $references = Reference::all(); //pluck('id', 'reference');
         $localities = Localitie::all(); //pluck('id', 'localitie');
         $guides = Guide::all();
         $localidad = Reference::all()->where('id',$idloca);
         $localidad2 = Reference::all()->where('localitie_id',$idloca);
         return view('sys.quotationcero2.create', compact('carbon', 'user', 'hotels', 'references', 'localities', 'guides','localidad','localidad2','idloca'));
    }
    public function noche(Request $request)
    {

        $noche=$request->input('noches');
        $hot=$request->input('hoteles');
        $opcion=$request->input('opcion');
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
                           ->select('transfers.tr_name','transfers.tr_cost','guides.gu_name','guides.cost','hotels.ho_name','hotels.id')
                           ->join('guides', 'guides.reference_id', '=', 'references.id')
                           ->join('transfers', 'transfers.reference_id', '=', 'references.id')
                           ->join('hotels', 'hotels.reference_id', '=', 'references.id')
                           ->where('references.localitie_id', $idloca)
                           ->get();
        $hotels2 = DB::table('hotel_room')
                           ->select('hotel_room.hotel_id','rooms.room','hotel_room.cost')
                           ->join('rooms', 'rooms.id', '=', 'hotel_room.room_id')
                           ->where('hotel_room.hotel_id', $hot)
                           ->get();
        $hoteles2 = DB::table('hotel_room')
                           ->select('hotel_room.hotel_id','rooms.room','hotel_room.cost')
                           ->join('rooms', 'rooms.id', '=', 'hotel_room.room_id')
                           ->where('hotel_room.hotel_id', $id)
                           ->get();
        return view('sys.quotationcero2.create', compact('carbon', 'user', 'hotels', 'references', 'localities', 'guides','hoteles','hoteles2','localidad','idloca','localidad2','referencia','refe','id','noche','seleccionados','hotels2','hot'));

        /*
         $relacion2 = DB::table('no_hotel')
               ->select('no_hotel.hotel','noches.noche')
               ->join('noches', 'noches.usuario', '=', 'no_hotel.usuario')
               ->where('no_hotel.usuario', 'carlitos')
               ->groupBy('no_hotel.hotel','noches.noche')
               ->get();
        foreach ($relacion2 as $row) {
        echo $row->hotel;
        }

        */
    }
    public function probando(request $request)
    {
         $noches=$request->input('noches');
         $hoteles=$request->input('hoteles');
         $resultado = array_combine($noches,$hoteles);
         $hotels2=  DB::table('hotel_package_room')
            ->select('hotel_package_room.hotel_id','rooms.room','hotel_package_room.cost','hotels.ho_name','hotels.id')
            ->join('rooms', 'rooms.id', '=', 'hotel_package_room.room_id')
            ->join('hotels', 'hotels.id', '=', 'hotel_package_room.hotel_id')
            ->whereIn('hotel_package_room.hotel_id', $hoteles)
            ->groupBy('hotel_package_room.hotel_id','rooms.room','hotel_package_room.cost','hotels.ho_name','hotels.id')
            ->get();

        /*foreach ($hotels2 as $ho) {
            echo $ho->cost."<br>";
        }
        */
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
