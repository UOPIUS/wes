<?php

namespace App\Http\Controllers;

use App\Locals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class LocalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$courts = Courts::all();
        $locals = DB::select('select * from locals');
        //return view();
    }
    public function fetchlocal(Request $request)
    {
        try{
            $data = $request->state_id;
            $response = '<option value="">-Select-</option>';
            $lgas = Locals::where('state_id', '=', $data)->get();
            foreach($lgas as $lga){
                $response .= "<option value='$lga->local_id'>".$lga->local_name."</option>";
            }
            echo ($response);
            exit;
        }
        catch(Exception $e){
            echo json_encode(['status'=>'201','msg'=>$e->getMessage()]);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Locals  $locals
     * @return \Illuminate\Http\Response
     */
    public function show(Locals $locals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Locals  $locals
     * @return \Illuminate\Http\Response
     */
    public function edit(Locals $locals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Locals  $locals
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Locals $locals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Locals  $locals
     * @return \Illuminate\Http\Response
     */
    public function destroy(Locals $locals)
    {
        //
    }
}
