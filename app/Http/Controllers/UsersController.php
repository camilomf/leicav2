<?php

namespace App\Http\Controllers;

use App\User;
use DB;
use Illuminate\Http\Request;
use Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware(['auth',
        'roles:Admin'
        ]);

    }

    public function index()
    {
        $users = User::all();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = DB::table('roles')->get();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            // 'Password' == 'password_confirmation'
          ]);
          $user =  new User;
          $user->name = $request->get('name');
          $user->email=$request->get('email');
          $user->password = Hash::make($request->get('password'));
          $user->role_id = $request->get('role_id');
          $user->save();
          return redirect()->route('users.index')
                          ->with('success', 'Usuario agregado exitosamente');
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

        $roles = DB::table('roles')->get();
        $password = $user->password;

        return view('users.edit',compact('user','roles'));
    }

    public function editPassword($id)
    {
        $user = User::find($id);
        $password = $user->password;

        return view('users.edit_password',compact('user'));
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
          ]);
          $user = User::find($id);
          $user->name = $request->get('name');
          $user->email = $request->get('email');
          $user->role_id = $request->get('role_id');
          $user->save();
          return redirect()->route('users.index')
                          ->with('success', 'Usuario actualizado exitosamente');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => 'required',
          ]);
          $user = User::find($id);
          $password = $request->get('password');
          $user->password = Hash::make($password);
          $user->save();
          return redirect()->route('users.index')
                          ->with('success', 'Usuario actualizado exitosamente');
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
        return redirect()->route('users.index')
                        ->with('success', 'Usuario eliminado exitosamente');
    }
}
