<?php

namespace App\Http\Controllers;

use App\Frequency;
use App\MaintenancePlan;
use Illuminate\Http\Request;
use DB; 

class FrequencyController extends Controller
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
        $frequencies=Frequency::where('id','!=',1)->get();
        $id=1;
        return view('maintenance_plan.frequency.index',compact('frequencies','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance_plan.frequency.create');
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
            'name' => 'required|unique:frequencies',
          ]);

          Frequency::create($request->all());
          return redirect()->route('frequency.index')
                          ->with('success', 'frecuencia agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Frequency  $frequency
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $frequency = Frequency::find($id);
        return view('maintenance_plan.frequency.detail', compact('frequency'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Frequency  $frequency
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $frequency = Frequency::find($id);
        return view('maintenance_plan.frequency.edit', compact('frequency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Frequency  $frequency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // $request->validate([
        //     'name' => 'required',
        //   ]);
          $frequency = Frequency::find($id);
        //   $frequency->name = $request->get('name');
          $frequency->description = $request->get('description');
          $frequency->save();
          return redirect()->route('frequency.index')
                          ->with('success', 'Frecuencia actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Frequency  $frequency
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $frequency = Frequency::find($id);
        $lists = DB::table('maintenance_plans')->where('frequency_id',$id)->get();
        foreach($lists as $list){
            $list=MaintenancePlan::find($list->id);
            $list->frequency_id = 1;
            $list->save();
        }

        $frequency->delete();
        return redirect()->route('frequency.index')
                        ->with('success', 'Frecuencia eliminada exitosamente');
    }
}
