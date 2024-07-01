<?php

namespace App\Http\Controllers;

use App\Models\Mtype;
use Illuminate\Http\Request;

class MTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $mTypes = Mtype::all();

        return view('mtypes.index', [
            'mTypes' => $mTypes,
        ]);
    }
}
