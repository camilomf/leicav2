<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inventory;
use DB;
use App\MaintenanceType;
use DateTime;

class MaintenanceRegisterController extends Controller
{
    public function index(){
        $inventories = Inventory::all()->where('state_id',5);
        // $registers = DB::table('maintenance_register')->get();
        return view('maintenance_register.index',compact('inventories'));
    }


    public function register($id)
    {
        $inventory = Inventory::find($id);
        $maintenance_types = MaintenanceType::all();

        $inventory->state_id = 5;
        $inventory->save();

        return view('maintenance_register.create',compact('inventory','maintenance_types'));

    }

    public function store(Request $request,$id)
    {
            // $id = $request->get('inventory_id');
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

    public function remove($id){
        $inventory = Inventory::find($id);
        $inventory->state_id = 1;
        $inventory->save();
        $inventories= Inventory::all();
        return view('maintenance',compact('inventories'));
        // return redirect()->route('maintenance_register')
                        // ->with('success', 'Registro actualizado exitosamente');
    }


}
