<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\States;
use Illuminate\Support\Facades\DB;
class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getStates()
    {
        //$courts = Courts::all();
        $states = DB::select('select * from states');

        return compact('states');
    }

    
}
