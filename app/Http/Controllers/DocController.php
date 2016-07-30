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
        $date="";
        foreach ($years as $yr) {
            //$item[substr($yr->TABLE_NAME,15,4)] = substr($yr->TABLE_NAME,15,4);
            $months = $stl_conn->table('BILLING_OUTPUT_'.substr($yr->TABLE_NAME,15,4))->where('CONTRACT_ACC', $user_cont_acc)->orderBy('BillMonth', 'desc')->get();
            foreach ($months as $month) {
                if(!empty($date)){
                    $date=substr($month->BillMonth,0,4).substr($month->BillMonth,4,2);
                }
                $item2[$month->BillMonth]=substr($month->BillMonth,0,4)."-".substr($month->BillMonth,4,2);
            }
        }
        return view('docs.spot-bills',['item2'=>$item2,'date'=>$date]);
    }

    public function getspotbills(Request $request){
        $date = $request->get('date');
        
        $user_cont_acc = \Auth::user()->CONT_ACC;
        $stl_conn = \DB::connection('sqlsrv_STL');
        $data = $stl_conn->table('BILLING_OUTPUT_'.substr($date,0,4))->where(['CONTRACT_ACC'=>$user_cont_acc,'BillMonth'=>$date])->get();
        $years = $stl_conn->select("SELECT * FROM INFORMATION_SCHEMA.TABLES where TABLE_NAME LIKE 'BILLING_OUTPUT_20__';");
        foreach ($years as $yr) {
            //$item[substr($yr->TABLE_NAME,15,4)] = substr($yr->TABLE_NAME,15,4);
            $months = $stl_conn->table('BILLING_OUTPUT_'.substr($yr->TABLE_NAME,15,4))->where('CONTRACT_ACC', $user_cont_acc)->orderBy('BillMonth', 'desc')->get();
            foreach ($months as $month) {
                $item2[$month->BillMonth]=substr($month->BillMonth,0,4)."-".substr($month->BillMonth,4,2);
            }
        }

        return view('docs.spot-bills',['item2'=>$item2,'data'=>$data,'date'=>$date]);
    }

    public function moneyreceipt(){


        return view('docs.money-receipts');
    }

    public function sapbills(){
        $user_cont_acc = \Auth::user()->CONT_ACC;
        $stl_conn = \DB::connection('sqlsrv_SAP');
        $months = $stl_conn->table('BILLING_DATA')->where('CONTRACT_ACC', $user_cont_acc)->orderBy('BILL_MONTH', 'desc')->get();
        foreach ($months as $month) {
            $item2[$month->BILL_MONTH]=substr($month->BILL_MONTH,0,4)."-".substr($month->BILL_MONTH,4,2);
        }

        return view('docs.sap-bills',['item2'=>$item2]);
    }

    public function emobilereceipt(){
        try{
        $user_cont_acc = \Auth::user()->CONT_ACC;
        $months = \DB::table('VW_SPOT_MR_DETAILS')->where('CONTRACT_ACC', $user_cont_acc)->orderBy('BillMonth', 'desc')->get();
            if($months){
                foreach ($months as $month) {
                    $item2[$month->BillMonth]=substr($month->BillMonth,0,4)."-".substr($month->BillMonth,4,2);
                }
                return view('docs.e-mobile-receipts',['item2'=>$item2]);
            }
            else{
                $item2=NULL;
                return view('docs.e-mobile-receipts',['item2'=>$item2]);
            }
        }
        catch(Exception $e){            
            return view('errors.503');
        }
    }

    public function getemobilereceipt(Request $request){
        $date = $request->get('date');
        $user_cont_acc = \Auth::user()->CONT_ACC;
        $data = \DB::table('VW_SPOT_MR_DETAILS')->where(['CONTRACT_ACC'=> $user_cont_acc,'BillMonth'=>$date])->get();
        $months = \DB::table('VW_SPOT_MR_DETAILS')->where('CONTRACT_ACC', $user_cont_acc)->orderBy('BillMonth', 'desc')->get();
        foreach ($months as $month) {
            $item2[$month->BillMonth]=substr($month->BillMonth,0,4)."-".substr($month->BillMonth,4,2);
        }
        return view('docs.e-mobile-receipts',['item2'=>$item2,'data'=>$data]);
    }

    public function servicerequest(){
        $CONS_ACC=NULL;
        $CONTRACT_ACC = \Auth::user()->CONT_ACC;
        $stl_conn = \DB::connection('sqlsrv_STL');
        $USER_DATA = $stl_conn->table('BILLING_OUTPUT_'.date('Y'))->where('CONTRACT_ACC', $CONTRACT_ACC)->limit(1)->get();
        foreach ($USER_DATA as $dat) {
            $CONS_ACC = $dat->CONS_ACC;
        }
        $service_conn = \DB::connection('sqlsrv_SERVICE');
        $data=$service_conn->table('CC_REQ_MAS')->join('CC_SERVICE_TYPE_MAS','CC_REQ_MAS.SERVICE_TYPE_ID','=','CC_SERVICE_TYPE_MAS.SERVICE_TYPE_ID')->join('CC_SERVICE_TYPE_GROUP_MAS','CC_SERVICE_TYPE_GROUP_MAS.SERVICE_TYPE_GROUP_ID','=','CC_SERVICE_TYPE_MAS.SERVICE_TYPE_GROUP_ID')->join('CC_REQ_STAT_MAS','CC_REQ_MAS.REQ_STATUS_ID','=','CC_REQ_STAT_MAS.REQ_STATUS_ID')->where('CONS_ACC',$CONS_ACC)->get();

        return view('docs.service-request',['data'=>$data]);
    }

    public function feedbacks(){

        return view('docs.feedback');
    }

    public function meterprotocol(){
        return view('docs.meter-protocol');
    }

    public function sealreplacement(){
        return view('docs.seal-replacement');
    }

    public function meterchange(){
        return view('docs.meter-change');
    }

    public function inspectionreport(){
        return view('docs.inspection-report');
    }

    public function provisionalass(){
        return view('docs.provisional-ass');
    }

    public function finalass(){
        return view('docs.final-ass');
    }
}
