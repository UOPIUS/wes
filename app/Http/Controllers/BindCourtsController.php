<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BindCourts;
use App\States;
use App\Courts;
use Illuminate\Support\Facades\DB;
class BindCourtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$bindcourts = BindCourts::all();
        //$users = DB::table('users')->select('name', 'email as user_email')->get();
        /**
        $users = DB::table('users')
            ->join('contacts', 'users.id', '=', 'contacts.user_id')
            ->join('orders', 'users.id', '=', 'orders.user_id')
            ->select('users.*', 'contacts.phone', 'orders.price')
            ->get();
        ****/

        $bindcourts = DB::table('bind_court_lga')
            ->join('court_info', 'bind_court_lga.court_id', '=', 'court_info.court_id')
            ->join('locals', 'bind_court_lga.lga_id', '=', 'locals.local_id')
            ->join('states', 'locals.state_id', '=', 'states.state_id')
            ->select('bind_court_lga.*', 'court_info.description','states.name', 'locals.local_name')
            ->get();
        //$bindcourts = DB::table('bind_courts')->get();
        //$bindcourts = DB::select('select * from bind_courts b JOIN locals');
        return view('bindcourts.index', compact('bindcourts'));
    }

    public function fetchcourt(Request $request)
    {
        try{
            $data = $request->lga;
            $response = '<option value="">-Select-</option>';
            $lgas = DB::table('bind_court_lga')
                ->join('court_info', 'bind_court_lga.court_id', '=', 'court_info.court_id')
                ->select('court_info.court_id','court_info.description')
                ->where('lga_id', '=', $data)
                ->get();
            foreach($lgas as $lga){
                $response .= "<option value='$lga->court_id'>".$lga->description."</option>";
            }
            echo ($response);
            exit;
        }
        catch(Exception $e){
            echo json_encode(['status'=>'201','msg'=>$e->getMessage()]);
        }
    }
    public function create()
    {
        $courts = Courts::all();
        $states = States::all();
        return view('bindcourts.create')->with('states', $states)->with('courts',$courts);
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
            'lga'=>'required',
            'fee'=>'required',
            'court'=>'required',
            'address'=>'required',
        ]);

        $bind_id = $request->get('court').$request->get('lga');
        $court = new BindCourts([
            'bind_id' => $bind_id,
            'lga_id' => $request->get('lga'),
            'court_id' => $request->get('court'),
            'address' => $request->get('address'),
            'date_created' => date("Y-m-d H:m:s"),
            
            'fee' => $request->get('fee'),
            'status' => '1',
        ]);

        if(DB::table('bind_court_lga')->where('bind_id', $bind_id)->exists()){
            
            echo json_encode(['status'=>'201','msg'=>'Record already exist']);
        }else{
            $court->save();
            echo json_encode(['status'=>'200','msg'=>'Record saved successfully']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BindCourts  $bindCourts
     * @return \Illuminate\Http\Response
     */
    public function show(BindCourts $bindCourts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BindCourts  $bindCourts
     * @return \Illuminate\Http\Response
     */
    public function edit(BindCourts $bindCourts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BindCourts  $bindCourts
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BindCourts $bindCourts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BindCourts  $bindCourts
     * @return \Illuminate\Http\Response
     */
    public function destroy(BindCourts $bindCourts)
    {
        //
    }
}
