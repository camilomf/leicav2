<?php

namespace App\Http\Controllers;

use App\StudyPlan;
use App\Software;
use DB;
use Illuminate\Http\Request;

class PlanStudyBySoftwareController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth',
        'roles:Chief,Admin'
        ]);

    }

    public function edit($id)
    {
        $study_plan = StudyPlan::find($id);
        $softwares = DB::table('software')->get();

        return view('study_plan_manage.study_plan.edit_software',compact('study_plan','softwares'));

    }

    public function update(Request $request, $id)
    {
        $softwares_id = $request->get('software');
        $software=Software::find($softwares_id);
        $study_plan=StudyPlan::find($id);
        $study_plan->software()->sync($software);

        //return dd($study_plan);

        return redirect()->route('plan.index')
                        ->with('success', 'Software agregado al plan de estudio correctamente');
    }
}
