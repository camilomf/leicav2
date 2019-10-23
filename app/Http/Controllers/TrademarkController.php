<?php

namespace App\Http\Controllers;

use App\Trademark;
use App\Modelo;
use DB;
use Illuminate\Http\Request;

class TrademarkController extends Controller
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
        $trademarks=Trademark::where('id','!=',1)->get();
        $id=1;
        return view('trademark.index',compact('trademarks','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('trademark.create');
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

          Trademark::create($request->all());
          return redirect()->route('trademark.index')
                          ->with('success', 'Marca agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trademark  $trademark
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trademark = Trademark::find($id);
        return view('trademark.detail', compact('trademark'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Trademark  $trademark
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $trademark = Trademark::find($id);
        return view('trademark.edit', compact('trademark'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trademark  $trademark
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
          ]);
          $trademark = Trademark::find($id);
          $trademark->name = $request->get('name');
          $trademark->save();
          return redirect()->route('trademark.index')
                          ->with('success', 'Marca actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trademark  $trademark
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $trademark = Trademark::find($id);
        $lists = DB::table('modelos')->where('trademark_id',$id)->get();
        foreach($lists as $list){
            $list=Modelo::find($list->id);
            $list->trademark_id = 1;
            $list->save();
        }

        $trademark->delete();
        return redirect()->route('trademark.index')
                        ->with('success', 'Marca eliminada exitosamente');
    }
}
