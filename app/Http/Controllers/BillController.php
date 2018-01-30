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
                            ->select('quotations.id', 'quotations.n_quotation', 'customers.cu_name', 'customers.cu_last_name')
                            ->where('quotations.status', '=', '0')
                            ->get();
        // dd($quotations);
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
        $op = 0;
        $coti = Quotation::find($id);
        $customer = DB:: table('quotations')
                        ->join('customers', 'customers.id', '=', 'quotations.id')
                        ->select('quotations.id', DB::raw('customers.id as customer'), 'customers.cu_id_card_ruc', 'customers.cu_name', 
                            'customers.cu_last_name', 'customers.cu_cell_phone', 'customers.cu_phone', 
                            'customers.cu_email', 'customers.cu_address')
                        ->where('quotations.id', '=', $coti->id)
                        ->get();
        if ($coti->package_id == ''){
            $search1 = DB::table('quotations')
                            ->join('hotel_quotation', 'hotel_quotation.quotation_id', '=', 'quotations.id')
                            ->select('hotel_quotation.nights', 'hotel_quotation.cost_room', 'hotel_quotation.cant_room')
                            ->where('quotations.id', '=', $coti->id)
                            ->get();
            foreach ($search1 as $h){
                $hotel = $h;
            } 
            $lodging = ($hotel->cost_room * $hotel->cant_room) * $hotel->nights;
            $search2 = DB::table('quotations')
                            ->join('guide_quotation', 'guide_quotation.quotation_id', '=', 'quotations.id')
                            ->join('guides', 'guide_quotation.guide_id', '=', 'guides.id')
                            ->Select('guide_quotation.cant_guide', 'guides.cost')
                            ->where('quotations.id', '=', $coti->id)
                            ->get();
            foreach ($search2 as $g ) {
                $guide = $g;
                $cost_guide = $guide->cost * $guide->cant_guide;
            }
            $search3 = DB::table('quotations')
                            ->join('quotation_transfer', 'quotation_transfer.quotation_id', '=', 'quotations.id')
                            ->join('transfers', 'quotation_transfer.transfer_id', '=', 'transfers.id')
                            ->select('quotation_transfer.id', 'quotation_transfer.cant_transfer', 'transfers.tr_cost')
                            ->where('quotations.id', '=', $coti->id)
                            ->get();
            $cost_transfer = 0;
            foreach ($search3 as $t) {
                $transfer = $t;
                $cost_transfer = $cost_transfer + ($t->cant_transfer * $t->tr_cost);
            }
            $op = 1;
        }
        else{
           $search1 = DB::table('packages')
                            ->join('hotel_package', 'hotel_package.package_id', '=', 'packages.id')
                            ->select('hotel_package.nights', 'hotel_package.cost_room', 'hotel_package.cant_room')
                            ->where('packages.id', '=', $coti->id)
                            ->get();
            foreach ($search1 as $h){
                $hotel = $h;
            }  
            $lodging = ($hotel->cost_room * $hotel->cant_room) * $hotel->nights;
            $search2 = DB::table('packages')
                            ->join('guide_package', 'guide_package.package', '=', 'packages.id')
                            ->Select('guide_package.cant_guide', 'guide_package.cost_guide')
                            ->where('packages.id', '=', $coti->id)
                            ->get();
            foreach ($search2 as $g ) {
                $guide = $g;
                $cost_guide = $guide->cost * $guide->cant_guide;
            }
        }
        $sub = $lodging + $cost_guide + $cost_transfer + $coti->breakfast + $coti->lunch + $coti->dinner;
        $date = Carbon::now();
        $date = $date->format('d-m-Y');
        $user = \Auth::User();
        // dd('op', $op, 'cotizacion', $coti, 'Cliente', $customer, 'Hotel', $search1, 'Guia', $search2, 'Transporte', $search3, 
        //         'alojamiento', $lodging, 'guia', $cost_guide, 'transporte', $cost_transfer, 'fecha', $date, 'usuario', $user);
        return view('sys.bill.edit', compact('coti', 'customer', 'date', 'user', 'sub', 'op'));
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
        $customer = Customer::find($request->customer_id);
        $customer->cu_name = trim(strtoupper($request['nombre']));
        $customer->cu_last_name = trim(strtoupper($request['apellido']));
        $customer->cu_id_card_ruc = $request['cedula'];
        $customer->cu_cell_phone = $request['celular'];
        $customer->cu_phone = $request['fijo'];
        $customer->cu_email = trim(strtoupper($request['email']));
        $customer->cu_address = trim(strtoupper($request['direccion']));
        $customer->save();

        $quotation = Quotation::find($request->quotation_id);
        $quotation->status = 1;
        $quotation->save();

        $bill = Bill::create([
                    'bi_coment' => trim(strtoupper($request['notes'])),
                    'bi_nbill' => $request['nquotation'],
                    'bi_bill_ref' => $request['ref'],
                    'user_id' => $request['user_id'],
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
