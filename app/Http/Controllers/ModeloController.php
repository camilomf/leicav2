<?php

namespace App\Http\Controllers;

use App\Modelo;
use DB;
use App\Inventory;
use Illuminate\Http\Request;

class ModeloController extends Controller
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
        $id=1;
        $models=Modelo::where('id','!=',1)->get();
        return view('model.index',compact('models','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $trademarks = DB::table('trademarks')->get();
        return view('model.create',compact('trademarks'));
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

          $model = new Modelo();
          $model->name = $request->get('name');
          $model->trademark_id = $request->get('trademark_id');
          $model->save();

        //   modelType::create($request->all());
          return redirect()->route('model.index')
                          ->with('success', 'Modelo agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = Modelo::find($id);
        return view('model.detail', compact('model'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = Modelo::find($id);
        $trademarks = DB::table('trademarks')->get();

        return view('model.edit',compact('model','trademarks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
          ]);
          $model = Modelo::find($id);
          $model->name = $request->get('name');
          $model->trademark_id = $request->get('trademark_id');
          $model->save();
          return redirect()->route('model.index')
                          ->with('success', 'Modelo actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modelo  $modelo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Modelo::find($id);
        $lists = DB::table('inventories')->where('modelo_id',$id)->get();
        foreach($lists as $list){
            $list=Inventory::find($list->id);
            $list->modelo_id = 1;
            $list->save();
        }
        
        $model->delete();
        return redirect()->route('model.index')
                        ->with('success', 'Modelo eliminado exitosamente');
    }
}
