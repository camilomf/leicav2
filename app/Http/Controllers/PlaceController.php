<?php

namespace App\Http\Controllers;

use App\Place;
use App\Inventory;
use DB;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places=Place::where('id','!=',1)->get();
        $id=1;
        return view('places.index',compact('places','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('places.create');
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

          Place::create($request->all());
          return redirect()->route('places.index')
                          ->with('success', 'Lugar agregado correctamente');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $place = Place::find($id);
        $inventories = Inventory::where('place_id',$id)->get();
        return view('places.detail', compact('place','inventories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $place = Place::find($id);
        return view('places.edit', compact('place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
          ]);
          $place = Place::find($id);
          $place->name = $request->get('name');
          $place->description = $request->get('description');
          $place->save();
          return redirect()->route('places.index')
                          ->with('success', 'Lugar actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $place = Place::find($id);
        $lists = DB::table('inventories')->where('place_id',$id)->get();
        foreach($lists as $list){
            $list=Inventory::find($list->id);
            $list->place_id = 1;
            $list->save();
        }

        $place->delete();
        return redirect()->route('places.index')
                        ->with('success', 'Lugar eliminado exitosamente');
    }
}
