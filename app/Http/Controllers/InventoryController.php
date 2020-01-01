<?php

namespace App\Http\Controllers;

use App\Inventory;
use App\Modelo;
use DB;
use Illuminate\Http\Request;
use App\Item;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('roles:Admin,User');
        $this->middleware('auth')->only('index', 'show');
    }


    public function index(Request $request)
    {
        $inventories=Inventory::all();
        return view('inventory',compact('inventories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $places = DB::table('places')->get();
        $models = Modelo::all();
        $categories = DB::table('categories')->get();
        $maintenance_plans = DB::table('maintenance_plans')->get();
        return view('inventory.create',compact('places','models','categories','maintenance_plans'));
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
            'serialnumber' => 'required',
            'sku' => 'required',
          ]);

          $inventory = new Inventory();
          $inventory->serialnumber = $request->get('serialnumber');
          $inventory->sku = $request->get('sku');
          $inventory->price = $request->get('price');
          $inventory->observation = $request->get('observation');
          $inventory->place_id = $request->get('place_id');
          $inventory->category_id = $request->get('category_id');
          $inventory->modelo_id = $request->get('model_id');
          $inventory->maintenance_plan_id = $request->get('maintenance_plan_id');
          $inventory->state_id = 1;
          $inventory->save();

        //   inventoryType::create($request->all());
          return redirect()->route('inventory.index')
                          ->with('success', 'Inventario agregado correctamente');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventory = Inventory::find($id);
        return view('inventory.detail', compact('inventory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventory = Inventory::find($id);
        $states = DB::table('states')->get();
        $places = DB::table('places')->get();
        $categories = DB::table('categories')->get();
        $maintenance_plans = DB::table('maintenance_plans')->get();
        $modelos = DB::table('modelos')->get();

        return view('inventory.edit',compact('inventory','states','places','categories','maintenance_plans','modelos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'serialnumber' => 'required',
            'sku' => 'required',
          ]);

          $inventory = Inventory::find($id);
          $inventory->serialnumber = $request->get('serialnumber');
          $inventory->sku = $request->get('sku');
          $inventory->price = $request->get('price');
          $inventory->observation = $request->get('observation');
          $inventory->place_id = $request->get('place_id');
          $inventory->category_id = $request->get('category_id');
          $inventory->modelo_id = $request->get('model_id');
          $inventory->maintenance_plan_id = $request->get('maintenance_plan_id');
          $inventory->state_id = $request->get('state_id');

        //   if($inventory->state_id==5){
        //     $items=Item::where('inventory_id',$inventory->id)->get();
        //     foreach($items as $item){
        //         $item->state_id=5;
        //         $item->save();
        //     }
        //   }

          $inventory->save();

          return redirect()->route('inventory.index')
                          ->with('success', 'Inventario actualizado exitosamente');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Inventory  $inventory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inventory = Inventory::find($id);
        $inventory->delete();
        return redirect()->route('inventory.index')
                        ->with('success', 'Inventario eliminado exitosamente');
    }
}
