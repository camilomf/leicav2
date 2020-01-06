<?php

namespace App\Http\Controllers;

use App\MaintenancePlan;
use DB;
use Illuminate\Http\Request;

class MaintenancePlanController extends Controller
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
        $maintenance_plans=MaintenancePlan::where('id','!=',1)->get();
        $id=1;
        return view('maintenance_plan.plan.index',compact('maintenance_plans','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $frequencies = DB::table('frequencies')->get();
        $priorities = DB::table('priorities')->get();
        return view('maintenance_plan.plan.create',compact('frequencies','priorities'));
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
            'name' => 'required|unique:maintenance_plans',
          ]);

          $maintenance_plan = new MaintenancePlan();
          $maintenance_plan->name = $request->get('name');
          $maintenance_plan->description = $request->get('description');
          $maintenance_plan->frequency_id = $request->get('frequency_id');
          $maintenance_plan->priority_id = $request->get('priority_id');
          $maintenance_plan->save();

          return redirect()->route('maintenance_plan.index')
                          ->with('success', 'Plan de Mantencion agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MaintenancePlan  $maintenancePlan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maintenance_plan = MaintenancePlan::find($id);
        return view('maintenance_plan.plan.detail', compact('maintenance_plan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MaintenancePlan  $maintenancePlan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maintenance_plan = MaintenancePlan::find($id);
        $frequencies = DB::table('frequencies')->get();
        $priorities = DB::table('priorities')->get();

        return view('maintenance_plan.plan.edit',compact('maintenance_plan','frequencies','priorities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MaintenancePlan  $maintenancePlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
          ]);
          $maintenance_plan = MaintenancePlan::find($id);
          $maintenance_plan->name = $request->get('name');
          $maintenance_plan->description = $request->get('description');
          $maintenance_plan->frequency_id = $request->get('frequency_id');
          $maintenance_plan->priority_id = $request->get('priority_id');
          $maintenance_plan->save();
          return redirect()->route('maintenance_plan.index')
                          ->with('success', 'Plan de mantencion actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MaintenancePlan  $maintenancePlan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maintenance_plan = MaintenancePlan::find($id);
        $lists = DB::table('inventories')->where('maintenance_plan_id',$id)->get();
        foreach($lists as $list){
            $list=Inventory::find($list->id);
            $list->maintenance_plan_id = 1;
            $list->save();
        }

        $maintenance_plan->delete();
        return redirect()->route('maintenance_plan.index')
                        ->with('success', 'Plan de mantencion eliminado exitosamente');
    }
}
