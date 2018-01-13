<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use carbon\Carbon;
use DB;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('sys.bill.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //dd($request);
        // $user = \Auth::User();
        // $carbon = Carbon::now();
        // return view('sys.bill.create', compact('user', 'carbon'));
        return view('sys.bill.search');
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
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
       $carbon = Carbon::now();
       $user = \Auth::User();
        if ($request->find == 1) 
        {
            $res = DB:: table('customers')
                        ->join('quotations', 'quotations.id', '=', 'customers.id')
                        ->select('customers.cu_id_card_ruc', 'customers.cu_id_card_ruc', 'customers.cu_last_name', 'customers.cu_cell_phone', 'customers.cu_phone', 'customers.cu_email', 'customers.cu_address', 'quotations.id', 'quotations.coment')
                        ->where('customers.cu_id_card_ruc', '=', $request->cedula)
                        ->whereNull('quotations.status')
                        ->get();

            // $res->op = 1;

                        // dd($res);
        } 
        // if ($request->find == 2)
        // {
        //     $res = DB:: table('customers')
        //                 ->join('customer_package', 'customer_package.customer_id')
        //                 ->join('packages', 'packages.id', '=', 'customer_package.package_id')
        //                 ->select('customers.cu_id_card_ruc', 'customers.cu_name', 'customers.cu_last_name', 'customers.cu_cell_phone', 'customers.cu_phone', 'customers.cu_email', 'customers.cu_address', 'packages.id', 'packages.pa_name', 'packages.pa_activities')
        //                 ->where('customers.cu_id_card_ruc', '=', $request->cedula)
        //                 ->get();
        //     $res->op = 2;
        //                 dd($res);
        // }
        
        // dd($res, 'res fuera de ciclo');
        return view('sys.bill.create', compact('res', 'carbon', 'user'));
    }
    // public function billing(Request $)
}
