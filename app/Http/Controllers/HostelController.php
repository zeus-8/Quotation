<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Http\Requests;
use hive\Http\Requests\CreateHotelRequest;
use hive\Http\Requests\UpdateHotelRequest;
use hive\Models\Hotel;
use hive\Models\Room;
use hive\Models\Thotel;
use hive\Models\Localitie;
use hive\Models\Reference;
use hive\Models\Restaurant;
use Redirect;
use Session;
use DB;

class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = DB::table('hotels')->select('hotels.id', 'hotels.ho_name', 'hotels.ho_contac', 'hotels.ho_cell_phone')->whereNull('deleted_at')->get();
        // dd($hotels);
        return view('sys.hostel.list', compact('hotels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rooms = Room::All();
        $thotels = Thotel::All();
        $localities = Localitie::all();
        $references = Reference::all();
        $restaurants = Restaurant::all();
        // dd($rooms, $thotels, $references, $restaurants);
        return view('sys.hostel.create', compact('rooms', 'thotels', 'localities', 'references', 'restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHotelRequest $request)
    {
        $request->new = array_filter($request->room);
        // dd($request);
        
        $hotel = Hotel::create([
                        'reference_id' => $request['ref'],
                        'thotel_id' => $request['tipo_hotel'],
                        'ho_name' => trim(strtoupper($request['nombre'])),
                        'ho_address' => trim(strtoupper($request['direccion'])),
                        'ho_cell_phone' => $request['celular'],
                        'ho_phone' => $request['telef_fijo'],
                        'ho_ext' => $request['ext'],
                        'ho_email' => trim(strtoupper($request['email'])),
                        'ho_contac' => trim(strtoupper($request['contacto'])),
                        'restaurant_id' => $request['restaurant'],
                    ]);
        
       
        $array_sync = [];
        foreach($request->new as $key=>$value) {

            $array_sync[] = [$key => ['cost' => $value]];
            DB::table('hotel_room')
                            ->insert([
                                'hotel_id' => $hotel->id,
                                'room_id' => $key,
                                'cost' => $value,
                            ]);

        }

        Session::flash('message', 'Los datos del HOTEL' .$request->nombre. ' se guardaron exitosamente');
        return Redirect::to('hotel');
        
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
        $rooms = Room::All();
        $thotels = Thotel::All();
        $localities = Localitie::all();
        $references = Reference::all();
        $restaurants = Restaurant::all();
        $hotel = Hotel::find($id);
        $hotel->nombre = $hotel->ho_name;
        $hotel->direccion = $hotel->ho_address;
        $hotel->celular = $hotel->ho_cell_phone;
        $hotel->telef_fijo = $hotel->ho_phone;
        $hotel->ext = $hotel->ho_ext;
        $hotel->email = $hotel->ho_email;
        $hotel->contacto = $hotel->ho_contac;
        $roomf = DB::table('rooms')
                        ->join('hotel_room', 'hotel_room.room_id', '=', 'rooms.id')
                        ->join('hotels', 'hotels.id', '=', 'hotel_room.hotel_id')
                        ->select('hotel_room.room_id', 'rooms.room', 'hotel_room.cost')
                        ->where('hotel_room.hotel_id', '=', $id)
                        ->get();

        // dd($rooms, $roomf);
        return view('sys.hostel.edit', compact('rooms', 'thotels', 'localities', 'references', 'restaurants', 'hotel', 'roomf'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHotelRequest $request, $id)
    {
        $request->new = array_filter($request->room);
        $hotel = Hotel::find($id);
        $hotel->ho_name = trim(strtoupper($request['nombre']));
        $hotel->ho_address = trim(strtoupper($request['direccion']));
        $hotel->ho_cell_phone = $request['celular'];
        $hotel->ho_phone = $request['telef_fijo'];
        $hotel->ho_ext = $request['ext'];
        $hotel->ho_contac = trim(strtoupper($request['contacto']));
        $hotel->reference_id = $request['ref'];
        $hotel->thotel_id = $request['tipo_hotel'];
        $hotel->restaurant_id = $request['restaurant'];
        $hotel->save();
        DB::table('hotel_room')->where('hotel_id', '=', $hotel->id)->delete();
        // dd($hotel);
        $array_sync = [];
        foreach($request->new as $key=>$value) {
            $array_sync[] = [$key => ['cost' => $value]];
            DB::table('hotel_room')
                            ->insert([
                                'hotel_id' => $hotel->id,
                                'room_id' => $key,
                                'cost' => $value,
                            ]);
        }
        Session::flash('message','El Hotel ' .  $request->nombre . ' fue actualizado con exito');
        return Redirect::to('hotel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        $hotel->delete();
        Session::flash('message','El hotel ' .  $hotel->ho_name . ' fue dado de baja con exito');
        return Redirect::to('hotel');
    }
}
