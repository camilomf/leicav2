<?php

namespace App\Http\Controllers;

use App\Priority;
use Illuminate\Http\Request;

class PriorityController extends Controller
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
        $priorities=Priority::all();
        return view('maintenance_plan.priority.index',compact('priorities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenance_plan.priority.create');
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

          Priority::create($request->all());
          return redirect()->route('priority.index')
                          ->with('success', 'Prioridad agregada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $priority = Priority::find($id);
        return view('maintenance_plan.priority.detail', compact('priority'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $priority = Priority::find($id);
        return view('maintenance_plan.priority.edit', compact('priority'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
          ]);
          $priority = Priority::find($id);
          $priority->name = $request->get('name');
          $priority->description = $request->get('description');
          $priority->save();
          return redirect()->route('priority.index')
                          ->with('success', 'Prioridad actualizada exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Priority  $priority
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $priority = Priority::find($id);
        $priority->delete();
        return redirect()->route('priority.index')
                        ->with('success', 'Prioridad eliminada exitosamente');
    }
}
