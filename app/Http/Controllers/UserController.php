<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('user.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $count = 0;
        $this->validate($request, User::$register_validation_rules);
        $stl_conn = \DB::connection('sqlsrv_STL');
        $contacc = $request->get('CONT_ACC');
        $data=$request->only('name','lname','email','password','phone','password_confirmation');
        foreach ($contacc as $accnos) {
            $count=$count+1;
            if(empty($accnos)){
                return back()->withInput()->withErrors(['CONT_ACC' => 'Contract Account Number ' +$count+ ' is missing']);
            }
            else{
                $USER_DATA = $stl_conn->table('BILLING_OUTPUT_'.date('Y'))->where('CONTRACT_ACC', $accnos)->limit(1)->get();
                if(empty($USER_DATA)){
                    return back()->withInput()->withErrors(['CONT_ACC' => 'Contract Account Number '+$count+' does not exist']);
                }
            }
        }
        if($data['password']==$data['password_confirmation']){
        $data['password'] = bcrypt($data['password']);
        $user=\DB::table('users')->insert([
            'name' => $data['name']." ".$data['lname']." ",
            'email' => $data['email'],
            'password' => $data['password'],
            'CONT_ACC' => "NULL",
            'phone' => $data['phone'],
            'updated_at' => \Carbon\Carbon::now(),
            'created_at'=>\Carbon\Carbon::now(),
            ]);
        }
        else{
            return back()->withInput()->withErrors(['email' => 'Confirmation password did not match']);
        }

        $user_id = \DB::table('users')->where('email',$data['email'])->get();
        foreach ($user_id as $id) {
            $u_id = $id->id;
        }
        foreach ($contacc as $accno) {
            $U_DATA = $stl_conn->table('BILLING_INPUT_'.date('Y'))->where('CONTRACT_ACC', $accno)->limit(1)->get();
            foreach ($U_DATA as $DAT) {
                $user_details = \DB::table('users_details')->insert([
                'DIVCODE' => $DAT->DivCode,
                'DIVISION' => $DAT->DIVISION,
                'CONTRACT_ACC' => $DAT->CONTRACT_ACC,
                'CONSUMER_ACC' => $DAT->CONS_ACC,
                'METER_NO' => $DAT->METER_NO,
                'METER_TYPE' => $DAT->METER_TYPE,
                'ADD1' => $DAT->CONS_ADD1,
                'ADD2' => $DAT->CONS_ADD2,
                'ADD3' => $DAT->CONS_ADD3,
                'ADD4' => $DAT->CONS_ADD4,
                'VILL_CODE' => $DAT->VILL_CODE,
                'users_id' => $u_id,
                ]);
            }
                            
        }
        return redirect()->route('login'); 
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try{
        $this->validate($request, User::$info_update_rules);
        if(empty($errors)){
            $user = $request->only('name','phone');
            \DB::table('users')->where('id', \Auth::user()->id)->update(['name' => $user['name']." ",'phone' => $user['phone']]);
            return redirect()->route('settings');      
        }
        else
            return back()->withInput();
        
        }
        catch(\Illuminate\Database\QueryException $e){

        }
    }

    public function changepassword(Request $request){
        try{
        $this->validate($request, User::$changepassword_rules);
        $user = $request->only('password1','password2','password3');
        if($user['password2']==$user['password3']){
            if(empty($errors)){     
                $pass=\DB::table('users')->where('id', \Auth::user()->id)->first();
                if(\Hash::check($user['password1'],$pass->password)){
                    \DB::table('users')->where('id', \Auth::user()->id)->update(['password' => bcrypt($user['password2'])]);
                    return redirect()->route('logout');    
                }
                else
                    return back()->withInput()->withErrors(['password' => 'Wrong Password']);
            }
            else
                return back()->withInput();
        }
        else
            return back()->withInput()->withErrors(['password' => 'Confirmation password did not match']);
        }
        catch(\Illuminate\Database\QueryException $e){

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function dashboard(){
        if (\Auth::check()) {
            $user_cont_acc = \Auth::user()->CONT_ACC;
            $stl_conn = \DB::connection('sqlsrv_STL');
            $data = $stl_conn->table('BILLING_OUTPUT_'.date('Y'))->where('CONTRACT_ACC', $user_cont_acc)->orderBy('BillMonth', 'asc')->get();
        }
        else{
            return redirect()->route('login');
        }
        return view('user.dashboard',['data' => $data]);
    }

    public function settings(){
        if (\Auth::check()) {
            $user_cont_acc = \Auth::user()->CONT_ACC;
            $stl_conn = \DB::connection('sqlsrv_STL');
            $data = $stl_conn->table('BILLING_OUTPUT_'.date('Y'))->where('CONTRACT_ACC', $user_cont_acc)->limit(1)->get();
        } 
            return view('user.settings',['data'=>$data]);
    }

    public function apiregister(Request $request){
        try{
            $count=0;
            $contacc = $request->get('CONT_ACC');
            $data=$request->only('name','lname','email','password','phone');
            $data['password'] = bcrypt($data['password']);
            $stl_conn = \DB::connection('sqlsrv_STL');
            foreach ($contacc as $accnos) {
                $count=$count+1;            
                $USER_DATA = $stl_conn->table('BILLING_OUTPUT_'.date('Y'))->where('CONTRACT_ACC', $accnos)->limit(1)->get();
                if(empty($USER_DATA)){
                    return response()->json(['errorInfo' => 'Contract Account Number '+$count+' does not exist'], 401);
                }
            }
                $user=\DB::table('users')->insert([
                    'name' => $data['name']." ".$data['lname']." ",
                    'email' => $data['email'],
                    'password' => $data['password'],
                    'CONT_ACC' => "NULL",
                    'phone' => $data['phone'],
                    'updated_at' => \Carbon\Carbon::now(),
                    'created_at'=>\Carbon\Carbon::now(),
                    ]);

                $user_id = \DB::table('users')->where('email',$data['email'])->get();
                foreach ($user_id as $id) {
                    $u_id = $id->id;
                }
                foreach ($contacc as $accno) {
                    $U_DATA = $stl_conn->table('BILLING_INPUT_'.date('Y'))->where('CONTRACT_ACC', $accno)->limit(1)->get();
                    foreach ($U_DATA as $DAT) {
                        $user_details = \DB::table('users_details')->insert([
                        'DIVCODE' => $DAT->DivCode,
                        'DIVISION' => $DAT->DIVISION,
                        'CONTRACT_ACC' => $DAT->CONTRACT_ACC,
                        'CONSUMER_ACC' => $DAT->CONS_ACC,
                        'METER_NO' => $DAT->METER_NO,
                        'METER_TYPE' => $DAT->METER_TYPE,
                        'ADD1' => $DAT->CONS_ADD1,
                        'ADD2' => $DAT->CONS_ADD2,
                        'ADD3' => $DAT->CONS_ADD3,
                        'ADD4' => $DAT->CONS_ADD4,
                        'VILL_CODE' => $DAT->VILL_CODE,
                        'users_id' => $u_id,
                        ]);
                    }
                                    
                }

                if($user_details){
                    return response()->json(['Info' => 'user_registered'], 200);
                }
                else{
                    return response()->json(['errorInfo' => 'credentials_exists'], 401);
                }
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json($ex);
        }
    }

    public function selectacc(){
        if(\Auth::check()){
            $id=\Auth::user()->id;
            $data = \DB::table('users_details')->where('users_id',$id)->get();
            return view('user.select-acc',['data'=>$data]);
        }
        return redirect()->route('login');
    }

    public function selectedacc(Request $request){
        $data=$request->only('CONT_ACC');
        if(\Auth::check()){
            $id=\Auth::user()->id;
            $ch=\DB::table('users')->where('id', \Auth::user()->id)->update(['CONT_ACC' => $data['CONT_ACC']]);
            if($ch){
                return redirect()->route('dashboard');
            }
        }
    }

    public function addcontacc(Request $request){
        $cont_acc = $request->only('CONT_ACC');
        $id = \Auth::user()->id;
        $stl_conn = \DB::connection('sqlsrv_STL');
        $USER_DATA = $stl_conn->table('BILLING_OUTPUT_'.date('Y'))->where('CONTRACT_ACC', $cont_acc)->limit(1)->get();
        if(empty($USER_DATA)){
            return back()->withInput()->withErrors(['CONT_ACC' => 'Contract Account Number does not exist']);
        }
        $data = $stl_conn->table('BILLING_INPUT_'.date('Y'))->where('CONTRACT_ACC', $cont_acc)->limit(1)->get();
        foreach ($data as $dat) {
            $cons_acc = $dat->CONS_ACC; $divcode = $dat->DivCode; $division = $dat->DIVISION; $meter_no = $dat->METER_NO;
            $meter_type = $dat->METER_TYPE; $add1 = $dat->CONS_ADD1; $add2 = $dat->CONS_ADD2; $add3 = $dat->CONS_ADD3;
            $add4 = $dat->CONS_ADD4; $vill_code = $dat->VILL_CODE;
        }
        $user_details = \DB::table('users_details')->insert([
                        'DIVCODE' => $divcode,
                        'DIVISION' => $division,
                        'CONTRACT_ACC' => $cont_acc,
                        'CONSUMER_ACC' => $cons_acc,
                        'METER_NO' => $meter_no,
                        'METER_TYPE' => $meter_type,
                        'ADD1' => $add1,
                        'ADD2' => $add2,
                        'ADD3' => $add3,
                        'ADD4' => $add4,
                        'VILL_CODE' => $vill_code,
                        'users_id' => $id,
                        ]);
        if($user_details){
            return redirect()->route('settings');
        }
    }

}
