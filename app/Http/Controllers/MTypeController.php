<?php

namespace App\Http\Controllers;

use App\Models\MType;
use Illuminate\Http\Request;

class MTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mTypes = MType::all();

        return view('mtypes.index', [
            'mTypes' => $mTypes,
        ]);
    }
}
