<?php

namespace App\Http\Controllers;

use App\SoftwareType;
use Illuminate\Http\Request;

class SoftwareTypeController extends Controller
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
        $software_types=SoftwareType::where('id','!=',1)->get();
        $id=1;
        return view('software_types.index',compact('software_types','id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('software_types.create');
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

          SoftwareType::create($request->all());
          return redirect()->route('software_type.index')
                          ->with('success', 'Tipo de software agregado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SoftwareType  $softwareType
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $software_type = SoftwareType::find($id);
        return view('software_types.detail', compact('software_type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SoftwareType  $softwareType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $software_type = SoftwareType::find($id);
        return view('software_types.edit', compact('software_type'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SoftwareType  $softwareType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required'
          ]);
          $software_type = SoftwareType::find($id);
          $software_type->name = $request->get('name');
          $software_type->description = $request->get('description');
          $software_type->save();
          return redirect()->route('software_type.index')
                          ->with('success', 'Tipo de software actualizado exitosamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SoftwareType  $softwareType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $software_type = SoftwareType::find($id);
        $lists = DB::table('softwares')->where('software_type_id',$id)->get();
        foreach($lists as $list){
            $list=Software::find($list->id);
            $list->software_type_id = 1;
            $list->save();
        }

        $software_type->delete();
        return redirect()->route('software_type.index')
                        ->with('success', 'Tipo de software eliminado exitosamente');
    }
}
