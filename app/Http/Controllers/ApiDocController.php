<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;

class ApiDocController extends Controller
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

    public function apiemobilereceipt(){
        try {
            if (!$user = \JWTAuth::parseToken()->authenticate()) {
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
        //$data = $request->only('date');
        $CONTRACT_ACC = $user->CONT_ACC;

        $data = \DB::table('VW_SPOT_MR_DETAILS')->where(['CONTRACT_ACC'=> $CONTRACT_ACC])->orderBy('BillMonth', 'desc')->get();
        $user = \JWTAuth::parseToken()->authenticate();
        return response()->json(compact('data'));
    }
}
