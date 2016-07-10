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
        $this->validate($request, User::$register_validation_rules);
        $data=$request->only('name','lname','email','password','CONT_ACC','phone','password_confirmation');
        if($data['password']==$data['password_confirmation']){
            $data['password'] = bcrypt($data['password']);
            /*$user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'CONT_ACC' => $data['CONT_ACC'],
                ]);*/
            $user=\DB::table('users')->insert([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'CONT_ACC' => $data['CONT_ACC'],
                'phone' => $data['phone'],
                'updated_at' => \Carbon\Carbon::now(),
                'created_at'=>\Carbon\Carbon::now(),
                ]);
            if($user){
                return redirect()->route('login');
            }
        }
        
        return back()->withInput()->withErrors(['email' => 'Confirmation password did not match']);
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
            \DB::table('users')->where('id', \Auth::user()->id)->update(['name' => $user['name'],'phone' => $user['phone']]);
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
            $data=$request->only('name','lname','email','password','CONT_ACC','phone');
            $data['password'] = bcrypt($data['password']);
        try{
            $user=\DB::table('users')->insert([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'],
                'CONT_ACC' => $data['CONT_ACC'],
                'phone' => $data['phone'],
                'updated_at' => \Carbon\Carbon::now(),
                'created_at'=>\Carbon\Carbon::now(),
                ]);

            if($user){
                return response()->json(['Info' => 'user_registered'], 200);
            }
            return response()->json(['errorInfo' => 'credentials_exists'], 401);
        }
        catch(\Illuminate\Database\QueryException $ex){
            return response()->json($ex);
        }
    }


}
