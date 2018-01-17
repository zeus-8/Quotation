<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Http\Requests\CreateCustomerRequest;
use hive\Models\Customer;
use Session;
use Redirect;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = DB::table('customers')
                            ->select('customers.id', 'customers.cu_id_card_ruc', 'customers.cu_name', 'customers.cu_last_name', 'customers.cu_email')
                            ->whereNull('deleted_at')
                            ->get();
        // dd($customers);
        return view('sys.customer.list', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $select= ['op'=>'soltero(a)', 'op'=>'Casado(a)', 'op'=>'Divorciado(a)', 'op'=>'Viudo(a)'];
        return view('sys.customer.create', compact('select'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCustomerRequest $request)
    {
        // dd($request);
        Customer::create([
                'cu_name' => trim(strtoupper($request['nombre'])),
                'cu_last_name' => trim(strtoupper($request['apellido'])),
                'cu_id_card_ruc' => $request['cedula_ruc'],
                'cu_cell_phone' => $request['celular'],
                'cu_phone' => $request['fijo'],
                'cu_email' => $request['email'],
                'cu_address' => $request['direccion'],
                'cu_sex' => $request['sexo'],
                'cu_civil_status' => $request['edo_civil'],
                // 'cu_brithdate' => $request['cumple_ano']
        ]);
        Session::flash('message', 'Los datos del CLIENTE se guardaron exitosamente');
        return Redirect::to('customer');
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
        $customer = Customer::find($id);
        // dd($customer);
        $customer->nombre = trim(strtoupper($customer->cu_name));
        $customer->apellido = trim(strtoupper($customer->cu_last_name));
        $customer->cedula_ruc = $customer->cu_id_card_ruc;
        $customer->celular = $customer->cu_cell_phone;
        $customer->fijo = $customer->cu_phone;
        $customer->email = trim(strtoupper($customer->cu_email));
        $customer->direccion = trim(strtoupper($customer->cu_address));
        $customer->sexo = $customer->cu_sex;
        $customer->edo_civil = $customer->cu_civil_status;
        return view('sys.customer.edit', compact('customer'));
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
        $customer = Customer::find($id);
        $customer->cu_name = $request['nombre'];
        $customer->cu_last_name = $request['apellido'];
        $customer->cu_cell_phone = $request['celular'];
        $customer->cu_phone = $request['fijo'];
        $customer->cu_address = $request['direccion'];
        $customer->cu_sex = $request['sexo'];
        $customer->cu_civil_status = $request['edo_civil'];
        $customer->save();
         Session::flash('message','El cliente ' .  $request->nombre . ' fue actualizado con exito');
        return Redirect::to('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        Session::flash('message','El Cliente ' .  $customer->cu_name . ' fue dado de baja con exito');
        return Redirect::to('customer');
    }
}
