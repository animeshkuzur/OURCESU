<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DocController extends Controller
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

    public function spotbills(){
        $user_cont_acc = \Auth::user()->CONT_ACC;
        $stl_conn = \DB::connection('sqlsrv_STL');
        $years = $stl_conn->select("SELECT * FROM INFORMATION_SCHEMA.TABLES where TABLE_NAME LIKE 'BILLING_OUTPUT_20__';");
        $item[0]="";
        foreach ($years as $yr) {
            //$item[substr($yr->TABLE_NAME,15,4)] = substr($yr->TABLE_NAME,15,4);
            $months = $stl_conn->table('BILLING_OUTPUT_'.substr($yr->TABLE_NAME,15,4))->where('CONTRACT_ACC', $user_cont_acc)->orderBy('BillMonth', 'desc')->get();
            foreach ($months as $month) {
                $item2[substr($month->BillMonth,0,4)."-".substr($month->BillMonth,4,2)]=substr($month->BillMonth,0,4)."-".substr($month->BillMonth,4,2);
            }
        }

        return view('docs.spot-bills',['item2'=>$item2]);
    }

    public function getspotbills(Request $request){
        $data = $request->get('date');
        $date = substr($data,0,4).substr($data, 5,2);
        $user_cont_acc = \Auth::user()->CONT_ACC;
        $stl_conn = \DB::connection('sqlsrv_STL');
        $data = $stl_conn->table('BILLING_OUTPUT_'.substr($data,0,4))->where(['CONTRACT_ACC'=>$user_cont_acc,'BillMonth'=>$date])->get();
        return response()->json($data);
    }
}
