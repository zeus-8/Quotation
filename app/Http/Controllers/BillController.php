<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use carbon\Carbon;
use hive\Models\Customer;
use hive\Models\Quotation;
use hive\Models\Bill;
use hive\User;
use DB;
use Redirect;
use Session;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $quotations = DB::table('quotations')
                            ->join('customers', 'customers.id', '=', 'quotations.customer_id')
                            ->select('quotations.id', 'quotations.n_quotAtion', 'customers.cu_name', 'customers.cu_last_name')
                            ->where('quotations.status', '=', '0')
                            ->get();
        return view('sys.bill.list', compact('quotations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
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
        
        $coti = Quotation::find($id);
        // $find = DB::table('quotations')
        //                 ->select('quotations.package_id')
        //                 ->where('quotations.id', '=', $coti->id)
        //                 ->get();

        if ($coti->package_id == ''){
            $result = DB:: table('quotations')
                            ->join('customers', 'customers.id', '=', 'quotations.id')
                            ->select('quotations.id', DB::raw('customers.id as customer'), 'customers.cu_name', 
                                'customers.cu_last_name', 'customers.cu_cell_phone', 'customers.cu_phone', 
                                'customers.cu_email', 'customers.cu_address', 'quotations.n_quotation', 
                                'quotations.cant_a', 'quotations.cant_n', 'quotations.cant_te', 'quotations.cant_e', 
                                'quotations.cant_ne', 'quotations.date_travel_init', 'quotations.date_travel_end',
                                'quotations.coment')
                            ->where('quotations.id', '=', $coti->id)
                            ->get();
        }
        else{
            $result = DB:: table('quotations')
                            ->join('customers', 'customers.id', '=', 'quotations.id')
                            ->join('packages', 'packages.id', '=', 'quotations.package_id')
                            ->select('quotations.id', DB::raw('customers.id as customer'), 'customers.cu_name', 
                                'customers.cu_last_name', 'customers.cu_cell_phone', 'customers.cu_phone', 
                                'customers.cu_email', 'customers.cu_address', 'quotations.coment', 'quotations.n_quotation',
                                'quotations.cant_a', 'quotations.cant_n', 'quotations.cant_te', 'quotations.cant_e', 
                                'quotations.cant_ne', 'quotations.date_travel_init', 'quotations.date_travel_end', 
                                'packages.pa_name', 'packages.pa_cost_a', 'packages.pa_cost_n', 'packages.pa_cost_te',
                                'packages.pa_cost_e', 'packages.pa_cost_ne')
                            ->where('quotations.id', '=', $coti->id)
                            ->get();
        }
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        $user = \Auth::User();
        // dd('Cotizacion', $coti, 'Resultado', $result, 'user', $user, 'date', $date);
        return view('sys.bill.edit', compact('coti', 'result', 'date', 'user'));
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
        $customer = Customer::find($request->customer);
        $customer->cu_name = trim(strtoupper($request['nombre']));
        $customer->cu_last_name = trim(strtoupper($request['apellido']));
        $customer->cu_id_card_ruc = $request['cedula'];
        $customer->cu_cell_phone = $request['celular'];
        $customer->cu_phone = $request['fijo'];
        $customer->cu_email = trim(strtoupper($request['email']));
        $customer->cu_address = trim(strtoupper($request['direccion']));
        $customer->save();

        $quotation = Quotation::find($request->quotation);
        $quotation->status = 1;
        $quotation->save();

        $bill = Bill::create([
                    'bi_coment' => trim(strtoupper($request['notes'])),
                    'bi_nbill' => $request['nquotation'],
                    'bi_bill_ref' => $request['ref'],
                    'user_id' => $request['user'],
                    'customer_id' => $request['customer'],
                    'quotation_id' => $request['cotizacion']
                ]);

        // dd($request, $customer, $quotation);
        return Redirect::to('bill');
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
    /*public function search(Request $request)
    {
       $carbon = Carbon::now();
       $carbon = $carbon->format('d-m-Y');
       $user = \Auth::User();
        if ($request->find == 1) 
        {
            $res = DB:: table('customers')
                        ->join('quotations', 'quotations.id', '=', 'customers.id')
                        ->select('customers.cu_id_card_ruc', 'customers.cu_name', 'customers.cu_last_name', 'customers.cu_cell_phone', 'customers.cu_phone', 'customers.cu_email', 'customers.cu_address', 'quotations.id', 'quotations.coment')
                        ->where('customers.cu_id_card_ruc', '=', $request->cedula)
                        ->whereNull('quotations.status')
                        ->get();

            $res->op = 1;

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
        //                 dd($res);, 
        // }
        
        // dd($res->items);
        return view('sys.bill.create', compact('res', 'carbon', 'user'));
    }*/
    // public function billing(Request $)
}
