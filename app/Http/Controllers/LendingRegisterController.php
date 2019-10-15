<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;

class LendingRegisterController extends Controller
{
    public function index(){
        $inventories = Inventory::all()->where('state_id',5);
        // $registers = DB::table('maintenance_register')->get();
        return view('maintenance_register.index',compact('inventories'));
    }

    public function register($id)
    {
        $inventory = Inventory::find($id);

        $inventory->state_id = 2;
        $inventory->save();

        return view('lending_register.index',compact('inventory'));

        
    }

    public function store(Request $request)
    {
            $id = $request->get('inventory_id');
            $date = new DateTime();
            $date->format('d-m-Y');
            $inventory = Inventory::find($id);
            $maintenance_type_id = $request->get('maintenance_type_id');
            $inventory->state_id = 5;
            $inventory->save();
            $inventory->maintenanceType()->attach($maintenance_type_id,['date'=>$date]);

          return redirect()->route('maintenance_register.index')
                          ->with('success', 'Registro actualizado exitosamente');
    }
}
