<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Http\Requests;
use hive\Http\Requests\CreateHostelRequest;
use hive\Models\Hotel;
use hive\Models\Room;
use hive\Models\Thotel;
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
        $hotels = Hotel::all();
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
        $references = Reference::all();
        $restaurants = Restaurant::all();
        return view('sys.hostel.create', compact('rooms', 'thotels', 'references', 'restaurants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->new = array_filter($request->room);
        $hotel = Hotel::create([
                        'reference_id' => $request['ref'],
                        'thotel_id' => $request['tipo_hotel'],
                        'ho_name' => trim(strtoupper($request['nombre'])),
                        'ho_address' => trim(strtoupper($request['direccion'])),
                        'ho_cell_phone' => $request['celular'],
                        'ho_phone' => $request['telef_fijo'],
                        'ho_email' => trim(strtoupper($request['email'])),
                        'ho_contac' => trim(strtoupper($request['contacto'])),
                        'restaurant_id' => $request['restaurant'],
                    ]);
        foreach($request->new as $key=>$value) {

         $array_sync[] = [$key => ['cost' => $value]];

        }
        // dd($request, $array_para_sync);
        
        $hotel->rooms()->sync($array_sync); 

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
