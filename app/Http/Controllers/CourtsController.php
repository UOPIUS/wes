<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Courts;

class CourtsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courts = Courts::all();
        //$courts = DB::select('select * from courts');
        return view('courts.index', compact('courts'));
    }
    public function fetch()
    {
        //
        //$courts = Courts::all();
        $courts = DB::select('select * from court_info');
        return compact('courts');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     'court_id',
        'description',
        'createdby',
        'date_created'
        'img_url',
        'status'
     */
    public function store(Request $request)
    {
        $request->validate([
            'description'=>'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.request()->img->getClientOriginalExtension();
        request()->img->move(public_path('img'), $imageName);


        $court = new Courts([
            'description' => $request->get('description'),
            'createdby' => 'user-01',
            'date_created' => date('Y-m-d H:m:s'),
            'img_url' => $imageName,
            'status' => '1'
        ]);
        $court->save();
        return redirect('/courts')->with('success', 'Court saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $court = Courts::find($id);
        return view('courts.edit', compact('court'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'description'=>'required'
        ]);
        $court = Courts::find($id);
        $court->description =  $request->get('description');
        $court->save();
        return redirect('/courts')->with('success', 'Court updated!');
    }


    public function status(Request $request, $id)
    {
        $court = Courts::find($id);
        $status = $court->status;
        $newStatus = 5;
        if($status == '1'){
            $newStatus = '0';
        }elseif('0' == $status) {
            $newStatus = '1';
        }
        $court->status = $newStatus;
        $court->save();
        return redirect('/courts')->with('success', 'status updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $court = Courts::find($id);
        $court->delete();

        return redirect('/courts')->with('success', 'Court deleted!');
    }
}
