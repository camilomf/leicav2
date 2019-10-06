<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MaintenanceViewController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth',
        'roles:User,Admin'
        ]);

    }

    public function mostrar()
    {
        return view('maintenance');
    }


}
