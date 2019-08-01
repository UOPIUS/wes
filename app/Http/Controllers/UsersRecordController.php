<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\UsersRecord;
use App\States;
use App\UsersRole;
use App\Courts;
use App\UsersLogin;
class UsersRecordController extends Controller
{
    public function index()
    {
        $users = DB::table('users_info')
            ->join('userlogin', 'users_info.user_id', '=', 'userlogin.username')
            ->join('locals', 'users_info.lga_id', '=', 'locals.local_id')
            ->join('states', 'users_info.state_id', '=', 'states.state_id')
            ->join('court_info', 'users_info.court_id', '=', 'court_info.court_id')
            ->join('userduty', 'userlogin.duty', '=', 'userduty.role_id')
            ->select('users_info.*', 'court_info.description as cdescription','userduty.description' ,'locals.local_name','states.name','userlogin.status')
            ->where('userlogin.duty', '<>', '7')
            ->get();
        return view('users.index', compact('users'));
    }
    public function fetchclients()
    {
        $users = DB::table('users_info')
            ->join('userlogin', 'users_info.user_id', '=', 'userlogin.username')
            ->join('locals', 'users_info.lga_id', '=', 'locals.local_id')
            ->join('states', 'users_info.state_id', '=', 'states.state_id')
            ->join('court_info', 'users_info.court_id', '=', 'court_info.court_id')
            ->join('userduty', 'userlogin.duty', '=', 'userduty.role_id')
            ->select('users_info.*', 'court_info.description as cdescription','userduty.description' ,'locals.local_name','states.name','userlogin.status')
            ->where('userlogin.duty', '=', '7')
            ->get();
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = DB::table('userduty')->where('role_id', "<>",'7' )->get();
        $courts = Courts::all();
        $states = States::all();

        return view('users.create')
            ->with('roles', $roles)
            ->with('states', $states)
            ->with('courts',$courts);
    }
    public function loginuser(Request $request)
    {
        $user_id = $request->get('username');
        $passw = $request->get('password');
        //echo $user_id.'===='.$passw;
        $single = DB::table('users_info')->where('email',"=", $user_id)->exists();
        if($single){
            $user = DB::table('users_info')
                ->join('userlogin', 'users_info.user_id', '=', 'userlogin.username')
                ->select('users_info.court_id','users_info.state_id', 'users_info.lga_id','userlogin.duty','userlogin.password')
                ->where('users_info.email', '=', $user_id)
                ->first();
            //var_dump($user);
            $verify = password_verify($passw, $user->password);
            //var_dump($verify);
            if($verify){
                $row = DB::table('userduty')->where('role_id',"=", $user->duty)->first();
                $index= $row->home_page;
                //set session variables
                $request->session()->put('duty', $user->duty);
                $request->session()->put('stateid', $user->state_id);
                $request->session()->put('lgaid', $user->lga_id);
                $request->session()->put('court', $user->court_id);
                return view('dashboards.'.$index);
                //echo json_encode(['status'=>'200','dashboard'=>'Success','url'=>$index]);
                //$value = $request->session()->get('key'); get session variable
            }
        }else {
            //record does not exist
            echo json_encode(['status'=>'201','msg'=>'Username or password does not exist']);
        }
    }
    //loginuser
    public function store(Request $request)
    {
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'phone'=>'required',
        ]);

        //check if phone exist
        $phone = $request->get('phone');
        if(DB::table('users_info')->where('phone',"=", $phone)->exists()){
            echo json_encode(['status'=>'201','msg'=>'Phone already exist']); 

        }
        else {
            //initialize variables
            $password = $request->get('password');
            $hashed = password_hash($password,PASSWORD_DEFAULT);
            $fname = $request->get('fname');
            $lname = $request->get('lname');
            $court = $request->get('court');
            $address = $request->get('address');
            $gender = $request->get('gender');
            $state = $request->get('state');
            $lga = $request->get('lga');
            $email = (null !== ($request->get('address'))) ? $request->get('address') : '';

            $duty = $request->get('duty');
            try { 

                $user_id = date('Hms');
                #main user account
                $user = new UsersRecord([
                    'user_id' => $user_id,
                    'fname' => $fname,
                    'lname' => $lname,
                    'mname' => '',
                    'email' => $email,
                    'court_id' => $court,
                    'gender' => $gender,
                    'state_id' => $state,
                    'lga_id' => $lga,

                    'address' => $address,
                    'date_created' => date("Y-m-d H:m:s"),
                    'status' => '1',
                ]);
                $user->save();
                $id = time();
                foreach($duty as $d){
                    #user login details
                    $login = new UsersLogin([
                        'username' => $user_id,
                        'password' => $hashed,
                        'ipaddress' => '---IP Address----',
                        'verify_url' => '--verify--url',
                        'lastaccess' => '--lastaccess',
                        'duty' => $d[0],
                        'date_created' => date("Y-m-d H:m:s"),
                        'status' => '1',
                        'id'=>$id++,
                    ]);
                    $login->save();
                }
                echo json_encode(['status'=>'200','msg'=>'Record saved successfully!']);

            }catch(Exception $e){
                echo json_encode(['status'=>'201','msg'=>'An error occurred']);
            }
        }

        exit;
    }

    public function showprofile(Request $r)
    {
        $courts = App\Courts::all();
        $states = App\States::all();
        $id = $r->get('user_id');
        $user = DB::table('users_info')
            ->where('user_id', $id)
            ->get();
        return view('users.edit')
            ->with('user', $user)
            ->with('courts', $courts)
            ->with('states', $states);
    }
    public function show(UsersRecord $userRecord)
    {
        //
    }


    public function edit(UsersRecord $userRecord)
    {
        //
    }


    public function update(Request $request, BindCourts $bindCourts)
    {
        //
    }
    public function destroy(BindCourts $bindCourts)
    {
        //
    }
}
