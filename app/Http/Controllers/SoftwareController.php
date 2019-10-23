<?php

namespace App\Http\Controllers;

use DB;
use App\Software;
use Illuminate\Http\Request;

class SoftwareController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    function __construct()
    {
        $this->middleware(['auth',
        'roles:Admin,User'
        ]);

    }
    public function index()
    {
        $softwares=Software::all();
        return view('software.index',compact('softwares'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $software_types = DB::table('software_types')->get();
        return view('software.create',compact('software_types'));
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
            'version' => 'required',
          ]);

          $software = new Software();
          $software->name = $request->get('name');
          $software->version = $request->get('version');
          $software->description = $request->get('description');
          $software->observation = $request->get('observation');
          $software->software_type_id = $request->get('software_type_id');
          $software->save();

        //   SoftwareType::create($request->all());
          return redirect()->route('software.index')
                          ->with('success', 'Software agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $software = Software::find($id);
        return view('software.detail', compact('software'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $software = Software::find($id);
        $software_types = DB::table('software_types')->get();

        return view('software.edit',compact('software','software_types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'version' => 'required',
          ]);
          $software = Software::find($id);
          $software->name = $request->get('name');
          $software->version = $request->get('version');
          $software->description = $request->get('description');
          $software->observation = $request->get('observation');
          $software->software_type_id = $request->get('software_type_id');
          $software->save();
          return redirect()->route('software.index')
                          ->with('success', 'software actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Software  $software
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $software = Software::find($id);
        $software->delete();
        return redirect()->route('software.index')
                        ->with('success', 'software eliminado exitosamente');
    }
}
