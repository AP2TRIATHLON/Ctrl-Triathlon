<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaboratoireController extends Controller
{
    public function dashboard()
    {
        return view('laboratoire.dashboardLabo');
    }

}
