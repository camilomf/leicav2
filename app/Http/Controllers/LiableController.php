<?php

namespace App\Http\Controllers;

use App\Liable;
use App\Inventory;
use Illuminate\Http\Request;
use DB;

class LiableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $liables = Liable::all();
        return view('lending_register.liable.index',compact('liables','resultado'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        $inventory=Inventory::find($id);
        $liabilities = DB::table('liabilities')->get();
        return view('lending_register.liable.create',compact('liabilities','inventory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $request->validate([
            'rut' => 'required',
            'name' => 'required',
            'apePat' => 'required',
            'apeMat' => 'required',
          ]);
          Liable::create($request->all());

          return redirect()->route('lending_register.index')
                          ->with('success', 'Responsable agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Liable  $liable
     * @return \Illuminate\Http\Response
     */
    public function show(Liable $liable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Liable  $liable
     * @return \Illuminate\Http\Response
     */
    public function edit(Liable $liable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Liable  $liable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Liable $liable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Liable  $liable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Liable $liable)
    {
        //
    }
}
