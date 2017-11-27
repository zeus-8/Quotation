<?php

namespace hive\Http\Controllers;

use Illuminate\Http\Request;
use hive\Http\Requests;
use hive\Http\Requests\CreateUserRequest;
use hive\Http\Requests\UpdateUserRequest;
use hive\Models\Type_User;
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
                   ->join('tipo_usu', 'users.id_tu', '=', 'tipo_usu.id_tu')
                   ->select('users.id', 'users.cedula', 'users.name', 'users.apellido', 'users.id_tu', 'tipo_usu.descripcion_tu')
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
        $role = Type_User::all();
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
                'apellido'  => trim(strtoupper($request['apellido'])),
                'cedula'    => $request['cedula'],
                'fijo'      => $request['telef-casa'],
                'celular'   => $request['celular'],
                'direccion' => trim(strtoupper($request['direccion'])),
                'email'     => trim(strtoupper($request['email'])),
                'password'  => bcrypt($request['cedula']),
                'id_tu'    => $request['rol'],
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
        $role = Type_User::all();
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
        $user->apellido = trim(strtoupper($request->apellido));
        $user->fijo     = $request->fijo;
        $user->celular  = $request->celular;
        $user->direccion= trim(strtoupper($request->direccion));
        $user->id_tu    = $request->rol;
        $user->save();
        Session::flash('message','El usuario ' .  $request->email . ' fue actualizado con exito');
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
