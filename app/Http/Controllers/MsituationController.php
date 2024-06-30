<?php

namespace App\Http\Controllers;

use App\Models\Msituation;
use Illuminate\Http\Request;

class MsituationController extends Controller
{
    
    public function index()
    {
        $mSituations = Msituation::all();
        /*
        return view('msituations.index', [
            'mSituations' => $mSituations,
        ]);
        */
    }
    
}
