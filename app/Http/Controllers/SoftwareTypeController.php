<?php

namespace App\Http\Controllers;

use App\SoftwareType;
use Illuminate\Http\Request;

class SoftwareTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $software_types=SoftwareType::all();
        return view('software_types.index',compact('software_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('software_types.create');
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
            'description' => 'required'
          ]);

          SoftwareType::create($request->all());
          return redirect()->route('software_type.index')
                          ->with('success', 'Tipo de software agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SoftwareType  $softwareType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $software_type = SoftwareType::find($id);
        return view('software_types.detail', compact('software_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SoftwareType  $softwareType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $software_type = SoftwareType::find($id);
        return view('software_types.edit', compact('software_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SoftwareType  $softwareType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
          ]);
          $software_type = SoftwareType::find($id);
          $software_type->name = $request->get('name');
          $software_type->description = $request->get('description');
          $software_type->save();
          return redirect()->route('software_type.index')
                          ->with('success', 'Tipo de software actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SoftwareType  $softwareType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $software_type = SoftwareType::find($id);
        $software_type->delete();
        return redirect()->route('software_type.index')
                        ->with('success', 'Tipo de software eliminado exitosamente');
    }
}
