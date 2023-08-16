<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use App\Models\Admin;
use App\Models\Scholar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use DB;
use View;
use Redirect;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        $scholar = $request->all();
        $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);
        $qrResult = "";
       return View::make('lani.qrScanner', compact('get_data', 'qrResult', 'scholar'));
    }

    public function find(Request $request, $id)
    {
        //
         $scholar1 = Scholar::where('applications.applicationId','=',$id )
                    ->leftJoin('applications','applications.scholarId', 'scholars.scholarId')
                    ->select('scholars.*', 'applications.applicationId')
                    ->get()->first();
        $scholar['scholar'] = $scholar1;
        $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);
        $transaction = DB::table('transactions')
                        ->where('transactionQRCode','=',$request->scannedCode)->first();

       if(@$transaction->transactionQRCode == ""){
        $qrResult = "wala";
       }
       else{
        $qrResult = "meron";
       }

        return view('lani.qrScanner', compact('transaction', 'get_data', 'qrResult', 'scholar'));
    }

    public function gcash($id)
    {
        //
        $scholar1 = Scholar::where('applications.applicationId','=',$id )
                    ->leftJoin('applications','applications.scholarId', 'scholars.scholarId')
                    ->select('scholars.*', 'applications.applicationId')
                    ->get()->first();
        $scholar['scholar'] = $scholar1;
       
        $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);
        $transaction = DB::table('transactions')
                        ->where('applicationId','=',$id)->first();


        return view('lani.gcash', compact('transaction', 'get_data', 'scholar'));
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
    public function show(Request $request)
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
        $scholar = DB::table('scholars')
                    ->leftJoin('applications','applications.scholarId', 'scholars.scholarId')
                    ->select('scholars.*', 'applications.applicationId')
                    ->where('applications.applicationId','=',$id)->get()->first();
       

        $tran = Transaction::where('applicationId','=',$id)->get();
        //dd($tran);
         $transaction = DB::table('transactions')
         ->where('applicationId','=',$id)->get()->first();
        // dd($transaction->transactionGcashNum);
        if(@$tran[0]['transactionGcashNum'] == "")
        {
            return Redirect::route('transaction.index', compact('scholar'));
        }
        else{
              return Redirect::route('gcash',$id);
        }
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
        $rules = [
            'transactionAmout' => 'numeric'
        ];

        $validator = Validator::make($request->all(), $rules);
         if ($validator->passes()) {
            $transaction = Transaction::where('transactionId','=',$id)->first();
            $transaction->transactionAmount = $request->transactionAmout;
            $transaction->transactionDateReceived = date('Y-m-d');
            $transaction->save();

            $amout =  $request->transactionAmout;
            $dateRe =  date('Y-m-d');
            if($request->mode == "cash"){
                $message = "<b>Congratulation!!!</b>You successfully <b>claim</b> your allowance for this semester.";
            }

             if($request->mode == "gcash"){
                $message = "<b>Congratulation!!!</b>Your allowance for this semester successfully <b>sent</b> to your Gcash account.";
            }
        $message = <<<HTML
          <style type="text/css">
          /*RESET  -- this may be ignored by some email clients*/
            body{
                margin:0;
                padding:0;
            }

            img{
                border:0 none;
                height:auto;
                line-height:100%;
                outline:none;
                text-decoration:none;
            }

            a img{
                border:0 none;
            }

            .imageFix{
                display:block;
            }

            table, td{
                border-collapse:collapse;
            }

            #bodyTable{
                height:100% !important;
                margin:0;
                padding:0;
                width:100% !important;
            }
          /*END RESET*/
         </style>



         <table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
            <tr>
                <td align="center" valign="top">
                    <table border="0" cellpadding="20" cellspacing="0" width="100%" id="emailContainer">      
                  <tr>
                    <td align="center" valign="top" style="padding:0;">
                      
                      
                        <!--HEADER BLACK BAR WITH LOGO-->
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailHeader" style="background:#666666; color:#ffffff; margin:0;">
                          <tr>
                            <td align="center">

                              <table border="0" cellpadding="0" cellspacing="0" width="600">
                                  <tr>
                                      <td align="left" valign="middle">
                                        <a href="#"><img src="https://pbs.twimg.com/profile_images/1645453746/avatar_400x400.jpg" alt="" style="padding:10px 0 5px;" /></a>
                                      </td>
                                  </tr>
                              </table>
                            
                            </td>
                          </tr>
                        </table>
                      
                      
                      
                      
                      
                    </td>
                </tr>
                <tr>
                    <td align="center" valign="top">
                        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailBody">
                            <tr>
                                <td align="center" valign="top">
                                  
                                  
                                  <!--MAIN BANNER IMAGE-->
                                  <table border="0" cellpadding="0" cellspacing="0" width="600" style="background-color:#FFFFFF; margin-bottom:10px;">
                                    <tr>
                                      <td>
                                      </td>
                                    </tr>
                                  </table>

                                  <!--MAIN CONTENT COPY-->
                                  <table border="0" cellpadding="0" cellspacing="0" width="600" style="text-align:center; background-color:#FFFFFF; margin-bottom:20px;">
                                    <tr>
                                      <td>
                                        <h2 style="margin:0; font-family:Arial, sans-serif; color:#606060; letter-spacing:-1px; font-size:40px; font-weight:bold;">LANI Scholarship Program</h2>

                                <p style="margin:0; font-family:Arial,sans-serif; color:#606060; line-height:150%; font-size:16px;">$message</p>
                                      </td>
                                    </tr>
                                  </table>



                                   <table border="0" cellpadding="0" cellspacing="0" width="600" style="text-align:center; background-color:#FFFFFF; margin-bottom:20px;">
                                    <tr>
                                      <td>
                                        <p style="margin:0; font-family:Arial, sans-serif; color:#606060; line-height:150%; font-size:16px;">                            
                                        <br>
                                        
                                        <p>Amout : ₱ <b>$amout</b></p>
                                        <p>Recieved Date : <b>$dateRe</b></p>
                                        
                                        <br>
                                        </p>
                                      </td>
                                    </tr>
                                  </table>

                                  
                                                    
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
              
                        </table>
                    </td>
                </tr>
            </table>
        HTML;

        $sender = new MailController;
        $sender->send( $request->scholarEmail,'Lani Scholar Application',$message);


             return redirect()->back()->with('success','Transaction Done Successfully!!!');
         }
      return redirect()->back()->withInput()->withErrors($validator);
       
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
}
