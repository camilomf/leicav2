<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use App\Liable;
use DateTime;

class LendingRegisterController extends Controller
{
    public function index(){
        $inventories = Inventory::all()->where('state_id',2);
        // $registers = DB::table('maintenance_register')->get();
        return view('lending_register.index',compact('inventories'));
    }

    public function create($id)
    {   
        
        $liables = Liable::all();
        $inventory = Inventory::find($id);
        return view('lending_register.create',compact('inventory','liables'));

        
    }

    public function store(Request $request,$id)
    {
        
        $inventory = Inventory::find($id);
        // $lending_date = new DateTime();
        // $lending_date->format('d-m-Y');
        $inventory->state_id = 2;
        $inventory->save();
        $date_supossed_return= $request->get('suppossed_return_date');
        $liable_id = $request->get('liable_id');
        $inventory->inventoryByLiable()->attach($liable_id,['supossed_return_date'=>$date_supossed_return]);

          return redirect()->route('lending_register.index')
                          ->with('success', 'Registro actualizado exitosamente');
    }


    public function remove($id)
    {
        $inventory = Inventory::find($id);
        $inventory->state_id = 1;
        $inventory->save();
          return redirect()->route('lendings')
                          ->with('success', 'Registro actualizado exitosamente');
    }
}
