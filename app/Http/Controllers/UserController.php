<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Http\Requests;
use hive\Http\Requests\CreateUserRequest;
use hive\Http\Requests\UpdateUserRequest;
use hive\Models\Tusers;
use hive\User;
use Redirect;
use Session;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users')
                   ->join('tusers', 'users.tuser_id', '=', 'tusers.id')
                   ->select('users.id', 'users.us_id_card', 'users.name', 'users.us_last_name', 'users.tuser_id', 'tusers.type_user')
                   ->whereNull('deleted_at')
                   ->get();
                   // dd($users);
        return view('sys.user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $role = Tusers::all();
        return view('sys.user.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        // dd($request);
        User::create([
                'name'      => trim(strtoupper($request['nombre'])),
                'us_last_name'  => trim(strtoupper($request['apellido'])),
                'us_id_card'    => $request['cedula'],
                'us_phone'      => $request['telef_casa'],
                'us_cell_phone'   => $request['celular'],
                'email'     => trim(strtoupper($request['email'])),
                'password'  => bcrypt($request['cedula']),
                'tuser_id'    => $request['rol'],
            ]);
        Session::flash('message', 'Los datos del USUARIO se guardaron exitosamente');
        return Redirect::to('usuario');
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
        $user = User::find($id);
        $user->nombre = $user->name; 
        $user->apellido = $user->us_last_name; 
        $user->cedula = $user->us_id_card; 
        $user->telef_casa = $user->us_phone; 
        $user->celular = $user->us_cell_phone; 
        $role = Tusers::all();
        // dd($user, $role);
        return view('sys.user.edit', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        // dd($request);
        $user           = User::find($id);
        $user->name     = trim(strtoupper($request->nombre));
        $user->us_last_name = trim(strtoupper($request->apellido));
        $user->us_phone     = $request->fijo;
        $user->us_cell_phone  = $request->celular;
        $user->tuser_id    = $request->rol;
        $user->save();
        Session::flash('message','El usuario ' . $request->email . ' fue actualizado con exito');
        return Redirect::to('usuario');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        Session::flash('message','El usuario ' .  $user->email . ' fue dado de baja con exito');
        return Redirect::to('usuario');
    }
}
