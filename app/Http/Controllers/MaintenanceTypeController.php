<?php

namespace App\Http\Controllers;

use App\MaintenanceType;
use Illuminate\Http\Request;

class MaintenanceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenance_types = MaintenanceType::all();
        return view('maintenance_type.index',compact('maintenance_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance_type.create');
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
          ]);

          MaintenanceType::create($request->all());
          return redirect()->route('maintenance_type.index')
                          ->with('success', 'Tipo de mantención agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MaintenanceType  $maintenanceType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maintenance_type = MaintenanceType::find($id);
        return view('maintenance_type.detail', compact('maintenance_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MaintenanceType  $maintenanceType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maintenance_type = MaintenanceType::find($id);
        return view('maintenance_type.edit', compact('maintenance_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaintenanceType  $maintenanceType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
          ]);
          $maintenance_type = MaintenanceType::find($id);
          $maintenance_type->name = $request->get('name');
          $maintenance_type->description = $request->get('description');
          $maintenance_type->save();
          return redirect()->route('maintenance_type.index')
                          ->with('success', 'Tipo de mantención actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaintenanceType  $maintenanceType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maintenance_type = MaintenanceType::find($id);
        $maintenance_type->delete();
        return redirect()->route('maintenance_type.index')
                        ->with('success', 'Tipo de mantención eliminado exitosamente');
    }
}
