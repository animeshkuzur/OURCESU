<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;


class ApiAuthController extends Controller
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
    public function update(Request $request, $id)
    {
        //
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

    public function apilogin(Request $request){
        $count=0;
        $data = $request->only('email','password');
        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($data)) {
                return response()->json(['errorInfo' => 'invalid_credentials'], 401);
            }
        } 
        catch (JWTException $e) {
            // something went wrong
            return response()->json(['errorInfo' => 'could_not_create_token'], 500);
        }

        $users = \DB::select('select * from users where email = :email',['email'=>$data['email']]);       
        foreach ($users as $user) {
            $id = $user->id; $name = $user->name; $email = $user->email; $CONT_ACC = $user->CONT_ACC; $phone = $user->phone;
        }

        $user_data = \DB::table('users_details')->where('users_id',$id)->get();
        foreach ($user_data as $user_dat) {
            $count=$count+1;
            $cont_acc = $user_dat->CONTRACT_ACC;
        }
        if($count>1){
            return response()->json(['Info' => $user_data,'token' => $token], 200);; 
        }

        $stl_conn = \DB::connection('sqlsrv_STL');
        $data = \DB::table('users_details')->where('users_id',$id)->limit(1)->get();
        foreach($data as $dat){
            $cons_acc = $dat->CONS_ACC; $divcode = $dat->DivCode; $division = $dat->DIVISION; $meter_no = $dat->METER_NO;
            $meter_type = $dat->METER_TYPE; $add1 = $dat->CONS_ADD1; $add2 = $dat->CONS_ADD2; $add3 = $dat->CONS_ADD3;
            $add4 = $dat->CONS_ADD4; $vill_code = $dat->VILL_CODE;
        }
        
        // if no errors are encountered we can return a JWT
        return response()->json(['id'=>$id,
                                'name' => $name,
                                'email' => $email,
                                'CONT_ACC' => $CONT_ACC,
                                'phone' => $phone,
                                'CONS_ACC' => $cons_acc,
                                'DivCode' => $divcode,
                                'DIVISION' => $division,
                                'METER_NO' => $meter_no,
                                'METER_TYPE' => $meter_type,
                                'ADD1' => $add1,
                                'ADD2' => $add2,
                                'ADD3' => $add3,
                                'ADD4' => $add4,
                                'VILL_CODE' => $vill_code,
                                'token' => $token,
                                ]);

    }

    public function apiauthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['errorInfo' => 'user_not_found'], 404);
            }
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['errorInfo' => 'token_expired'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['errorInfo' => 'token_invalid'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['errorInfo' => 'token_absent'], $e->getStatusCode());
        }
        // the token is valid and we have found the user via the sub claim
        return response()->json(compact('user'));
    }

    public function apilogout(Request $request)
    {
        try {
        $this->validate($request, [
            'token' => 'required'
        ]);
        JWTAuth::invalidate($request->input('token'));
        return response()->json(['Info' => 'token_destroyed']);
        }
        catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['errorInfo' => 'token_expired'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['errorInfo' => 'token_invalid'], $e->getStatusCode());
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['errorInfo' => 'token_absent'], $e->getStatusCode());
        }
    }

    public function getToken()
    {
        $token = JWTAuth::getToken();
        if (!$token) {
            return response()->json(['errorInfo' => 'token_absent']);
        }
        try {
            $refreshedToken = JWTAuth::refresh($token);
            return response()->json(['token' => $refreshedToken]);
        } catch (JWTException $e) {
            return response()->json(['errorInfo' => 'Not able to refresh Token']);
        }
        
    }

    public function apiselectacc(Request $request){
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['errorInfo' => 'user_not_found'], 404);
            }            
        } 
        catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['errorInfo' => 'token_expired'], $e->getStatusCode());
        } 
        catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['errorInfo' => 'token_invalid'], $e->getStatusCode());
        } 
        catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['errorInfo' => 'token_absent'], $e->getStatusCode());
        }
        catch(\Illuminate\Database\QueryException $e){
            return response()->json(['errorInfo'=> $ex]);
        }
        $cont_acc = $request->only('CONT_ACC');
        $id = $user->id;
        \DB::table('users')->where('id',$id)->update(['CONT_ACC' => $cont_acc]);
        $users = \DB::table('users')->where('CONT_ACC',$cont_acc)->limit(1)->get();
        foreach ($users as $user) {
            $id = $user->id; $name = $user->name; $email = $user->email; $CONT_ACC = $user->CONT_ACC; $phone = $user->phone;
        }
        $data = \DB::table('users_details')->where('CONTRACT_ACC',$cont_acc)->limit(1)->get();
        foreach($data as $dat){
            $cons_acc = $dat->CONSUMER_ACC; $divcode = $dat->DivCode; $division = $dat->DIVISION; $meter_no = $dat->METER_NO;
            $meter_type = $dat->METER_TYPE; $add1 = $dat->ADD1; $add2 = $dat->ADD2; $add3 = $dat->ADD3;
            $add4 = $dat->ADD4; $vill_code = $dat->VILL_CODE;
        }

        return response()->json(['id'=>$id,
                            'name' => $name,
                            'email' => $email,
                            'CONT_ACC' => $CONT_ACC,
                            'phone' => $phone,
                            'CONS_ACC' => $cons_acc,
                            'DivCode' => $divcode,
                            'DIVISION' => $division,
                            'METER_NO' => $meter_no,
                            'METER_TYPE' => $meter_type,
                            'ADD1' => $add1,
                            'ADD2' => $add2,
                            'ADD3' => $add3,
                            'ADD4' => $add4,
                            'VILL_CODE' => $vill_code,
                            ]);
    }

}
