<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Http\Requests\CreateCompanyRequest;
use hive\Models\Companie;
use Session;
use Redirect;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companie::all();
        return view('sys.company.list', compact('companies'));
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
    public function store(CreateCompanyRequest $request)
    {
        Companie::create([
                    'co_name' => trim(strtoupper($request['nombre'])),
        ]);
        Session::flash('message', 'Se guardo la COMPAÑIA exitosamente');
        return Redirect::to('company');
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
        $companie = Companie::find($id);
        $companie->nombre = $companie->co_name;
        return view('sys.company.edit', compact('companie'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CreateCompanyRequest $request, $id)
    {
        $companie = Companie::find($id);
        $companie->co_name = trim(strtoupper($request->nombre));
        $companie->save();
        Session::flash('message', 'Se modifico la COMPAÑIA exitosamente');
        return Redirect::to('company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
