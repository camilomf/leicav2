<?php

namespace App\Http\Controllers;

use DB;
use App\StudyPlan;
use Illuminate\Http\Request;

class StudyPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['auth',
        'roles:Chief,Admin'
        ]);

    }

    public function index()
    {
        $study_plans = StudyPlan::all();
        return view('study_plan_manage.study_plan.index',compact('study_plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $careers = DB::table('careers')->get();
        return view('study_plan_manage.study_plan.create',compact('careers'));
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
            'name' => 'required|unique:study_plans',
            'date_start' => 'required',
            'date_end' => 'required',
          ]);

          $study_plan = new StudyPlan();
          $study_plan->name = $request->get('name');
          $study_plan->date_start = $request->get('date_start');
          $study_plan->date_end = $request->get('date_end');
          $study_plan->career_id = $request->get('career_id');
          $study_plan->save();
          //$study_plan_id = $study_plan->id;

          //StudyPlan::create($request->all());
          return redirect()->route('plan.index')
                          ->with('success', 'Plan de estudio agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\StudyPlan  $studyPlan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $study_plan = StudyPlan::find($id);
        $id=1;
        return view('study_plan_manage.study_plan.detail', compact('study_plan','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\StudyPlan  $studyPlan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $study_plan = StudyPlan::find($id);
        $careers = DB::table('careers')->get();

        return view('study_plan_manage.study_plan.edit',compact('study_plan','careers'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\StudyPlan  $studyPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            // 'name' => 'required',
            'date_start' => 'required',
            'date_end' => 'required'
          ]);
          $study_plan = StudyPlan::find($id);
        //   $study_plan->name = $request->get('name');
          $study_plan->date_start = $request->get('date_start');
          $study_plan->date_end = $request->get('date_end');
          $study_plan->career_id = $request->get('career_id');
          $study_plan->save();
          return redirect()->route('plan.index')
                          ->with('success', 'Plan de estudio actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\StudyPlan  $studyPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $study_plan = StudyPlan::find($id);
        $study_plan->delete();
        return redirect()->route('plan.index')
                        ->with('success', 'Plan de estudio eliminado exitosamente');
    }


}
