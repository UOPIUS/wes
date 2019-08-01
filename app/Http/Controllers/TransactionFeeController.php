<?php

namespace App\Http\Controllers;

use App\TransactionFee;
use Illuminate\Http\Request;

class TransactionFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tfee = TransactionFee::all();
        return view('fee.tfee')->with('fees',$tfee);
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
     * @param  \App\TransactionFee  $transactionFee
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionFee $transactionFee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransactionFee  $transactionFee
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionFee $transactionFee)
    {
       
    }
    public function updatetrfx(Request $request)
    {
        $id = $request->get('id');
         try{
            $request->validate([
                'fee'=>'required'
            ]);
            $tfee = TransactionFee::find($id);
            $tfee->amt =  $request->get('fee');
             $tfee->last_edit =  date("H:m:s d-m-Y");
            $tfee->save();
            echo json_encode(['status'=>'200','msg'=>'Transaction fee updated successfully!']);
        }
        catch(Exception $e){
            echo json_encode(['status'=>'201','msg'=>'An error occurred!']);
        }
        exit;
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransactionFee  $transactionFee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         try{
            $request->validate([
                'amt'=>'required'
            ]);
            $tfee = TransactionFee::find($id);
            $tfee->amt =  $request->get('amt');
            $tfee->save();
            echo json_encode(['status'=>'200','msg'=>'Transaction fee updated successfully!']);
        }
        catch(Exception $e){
            echo json_encode(['status'=>'201','msg'=>'An error occurred!']);
        }
        exit;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransactionFee  $transactionFee
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionFee $transactionFee)
    {
        //
    }
}
