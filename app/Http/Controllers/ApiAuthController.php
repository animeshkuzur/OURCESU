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
        $stl_conn = \DB::connection('sqlsrv_STL');
        $data = $stl_conn->table('BILLING_OUTPUT_'.date('Y'))->where('CONTRACT_ACC', $user_cont_acc)->orderBy('BillMonth', 'asc')->get();
        foreach ($users as $user) {
            $id = $user->id; $name = $user->name; $email = $user->email; $CONT_ACC = $user->CONT_ACC; $phone = $user->phone;
        }
        foreach($data as $dat){
            $cons_acc = $dat->CONS_ACC; $divcode = $dat->DivCode; $division = $dat->DIVISION; $meter_no = $dat->METER_NO;
        }
        
        // if no errors are encountered we can return a JWT
        return response()->json(['id'=>$id,
                                'name' => $name,
                                'email' => $email,
                                'CONT_ACC' => $CONT_ACC,
                                'phone' => $phone,
                                'token' => $token,
                                'CONS_ACC' => $cons_acc,
                                'DivCode' => $divcode,
                                'DIVISION' => $division,
                                'METER_NO' => $meter_no,
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

}
