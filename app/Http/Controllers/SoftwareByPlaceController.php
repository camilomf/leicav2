<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Place;
use App\Software;

class SoftwareByPlaceController extends Controller
{
    public function edit($id)
    {
        $place = Place::find($id);
        $softwares = DB::table('software')->get();

        return view('places.edit_software',compact('place','softwares'));

    }

    public function update(Request $request, $id)
    {
        $softwares_id = $request->get('software');
        $software=Software::find($softwares_id);
        $place=Place::find($id);
        $place->software()->sync($software);

        //return dd($place);

        return redirect()->route('places.index')
                        ->with('success', 'Software agregado al plan de estudio correctamente');
    }
}
