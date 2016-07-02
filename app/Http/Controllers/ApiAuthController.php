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
        foreach ($users as $user) {
            $id = $user->id; $name = $user->name; $email = $user->email; $CONT_ACC = $user->CONT_ACC;
        }
        
        // if no errors are encountered we can return a JWT
        return response()->json(['id'=>$id,
                                'name' => $name,
                                'email' => $email,
                                'CONT_ACC' => $CONT_ACC,
                                'token' => $token,
                                ]);

    }

}
