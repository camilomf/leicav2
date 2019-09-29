<?php

namespace App\Http\Controllers;

use DB;
use App\Career;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware(['auth',
        'roles:Chief'
        ]);

    }



    public function index()
    {
        $careers=DB::table('careers')->get();
        return view('study_plan_manage.career.index',compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('study_plan_manage.career.create');
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

          career::create($request->all());
          return redirect()->route('career.index')
                          ->with('success', 'Carrera agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $career = Career::find($id);
        return view('study_plan_manage.career.detail', compact('career'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $career = Career::find($id);
        return view('study_plan_manage.career.edit', compact('career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
          ]);
          $career = career::find($id);
          $career->name = $request->get('name');
          $career->description = $request->get('description');
          $career->save();
          return redirect()->route('career.index')
                          ->with('success', 'Carrera actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $career = career::find($id);
        $career->delete();
        return redirect()->route('career.index')
                        ->with('success', 'Carrera eliminada exitosamente');
    }
}
