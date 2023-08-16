<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Scholar;
use App\Models\Entry;
use App\Models\Admin;
use PHPMailer\PHPMailer\Exception;
use App\Models\Transaction;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\MailController;
use Illuminate\Support\Facades\Validator;
use View;
use Redirect;
use QRCode;

class EntryController extends Controller
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

       $entry = DB::table('entries')
                    ->join('submissions','submissions.submissionId','entries.submissionId')
                    ->join('applications','applications.applicationId','entries.applicationId')
                    ->select('entries.*','submissions.*','applications.scholarId')
                    ->where('entries.entriesId','=',$id )->first();


         $userData1 = ['scholarInfo' => Scholar::where('scholarId', '=', $entry->scholarId)->first()];

        $dataEx1 = (['scholarPassword']);
        $get_data1 = array_diff($userData1, $dataEx1);
        $scholar = Scholar::where('scholars.scholarId','=',$entry->scholarId)->get()->toArray();

        $applications = DB::table('applications')
                      ->leftJoin('scholars','scholars.scholarId','applications.scholarId')
                      ->leftJoin('education','scholars.scholarId','education.scholarId')
                      ->leftJoin('siblings','scholars.scholarId','siblings.scholarId')
                      ->leftJoin('families','scholars.scholarId','families.scholarId')
                      ->leftJoin('schools','applications.applicationId','schools.applicationId')
                      ->leftJoin('signatures','applications.applicationId','signatures.applicationId')
                      ->leftJoin('courses', 'applications.applicationId','courses.applicationId')
                      ->leftJoin('transactions','applications.applicationId','transactions.applicationId')
                      ->select('scholars.*', 'applications.*', 'schools.*', 'signatures.*', 'courses.*', 'transactions.*', 'applications.*', 'families.*','education.*')
                      ->where('applications.applicationId','=',$entry->applicationId )->first();
       

        $transaction = DB::table('transactions')
                      ->where('applicationId','=',$entry->applicationId)->first();

        $siblings = DB::table('siblings')
                    ->leftJoin('scholars','scholars.scholarId','siblings.scholarId')
                    ->select('siblings.*')
                    ->where('siblings.scholarId','=',$entry->scholarId)->get()->toArray();
        $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);

        if ($applications->applicationScholarStatus == "new") {
           //echo "for redirecting to new page with array message";
          return view('lani.new-validate', compact('get_data', 'applications', 'siblings','entry','scholar','get_data1','transaction'));
        }else
        {
          //echo "for redirecting to renew page with array message";
          return view('lani.renew-validate', compact('get_data', 'applications', 'siblings','entry','scholar','get_data1','transaction'));
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

      if ($request['entriesStatus'] == "accepted") {
         $rules = [
        'entriesStatus' => 'required',
        'transactionDateRecieving' => 'required',
      ];
      }else
      {
      $rules = [
        'entriesStatus' => 'required',
        'entriesComment' => 'required',
        
      ];

      }
     
      $validator = Validator::make($request->all(), $rules);


 if ($validator->passes()){
     $input = $request->all();

if ($request['entriesStatus'] == "accepted") {
  # code...
      if($request->transMode == "Cash"){

      $apExist = Transaction::where('applicationId','=',$input['applicationId'])->get();
    

      if(count($apExist) > 0){
   $code = uniqid();
      $file = public_path('/images/'.$code.'.png');
        \QRCode::text($code)->setOutfile($file)->png();

       $transaction = Transaction::where('applicationId','=',$input['applicationId'])->first();
        $transaction->transactionQRCode = $code;
        $transaction->transactionDateRecieving = $input['transactionDateRecieving'];
        $transaction->save();

      }else{
      $code = uniqid();
      $file = public_path('/images/'.$code.'.png');
        \QRCode::text($code)->setOutfile($file)->png();

      $transaction = new Transaction;
      $transaction->transactionQRCode = $code;
      $transaction->transactionDateRecieving = $input['transactionDateRecieving'];
      $transaction->applicationId = $input['applicationId'];
      $transaction->save();
      }


      }else
      { 
        $transaction = Transaction::where('applicationId','=',$input['applicationId'])->first();

        $transaction->transactionDateRecieving = $input['transactionDateRecieving'];
      
        $transaction->save();
      }
        
}elseif($request['entriesStatus'] == "resolve" || $request['entriesStatus'] == "rejected") {
   $apExist = Transaction::where('applicationId','=',$input['applicationId'])->get();
    
      if(count($apExist) > 0){
       $transaction = Transaction::where('applicationId','=',$input['applicationId'])->first();

        $transaction->transactionDateRecieving = NULL;
         $transaction->transactionQRCode = NULL;
        $transaction->save();

      }
}
        $entry = Entry::find($id);
        $entry->entriesStatus = $input['entriesStatus'];
        $entry->entriesComment = $input['entriesComment'];
        $entry->save();

        if ($input['entriesStatus'] == "accepted") {
        $scholar = Scholar::find($input['scholarId']);
        $scholar->scholarStatus = "renew";
        $scholar->save();

        // $application = Application::find($input['applicationId']);
        // $application->applicationScholarStatus = "renew";
        // $application->save();
        }


       // dd($input);
        //email setup
        $reciever = $input['scholarEmail'];
        $link = "http://lanischolar.test/application/".$input['applicationId'];
        $complain = $input["entriesComment"];
        $response = "";
        $subResponse = "";
        $btnResponse = "";
        $complainBox = "";

        $date=date_create($input['transactionDateRecieving']);
  
        $recieveing = date_format($date,"M/d/Y");
        

        if ($input['entriesStatus'] == "accepted") {

         if($request->transMode == "Cash"){
          $response = '<b>Congratulation!!!</b> Your are qualified in our scholarship program. Please present the attached QRCode below when claiming your allowance The distribution date of your allowance will be in '.$recieveing.'  <small><i>(Estimated date only. Announcement will be post if any changes will happen)</i></small>. Click the button below to see your submitted application<br>
          
          ';
        }else{
          $response = "<b>Congratulation!!!</b> Your are qualified in our scholarship program. Your allowance will be send in your GCash account in ".$recieveing." <small><i>(Estimated date only. Announcement will be post if any changes will happen)</i></small>. Click the button below to see your submitted application";
        }

          $btnResponse = "View Application";
          $subResponse = "Thank you for applying in our scholarship program. God Bless!!!";

        }
        if ($input['entriesStatus'] == "resolve") {
            $response = "Good Day <b>".$input['username']."</b>. While we are assessing your submitted application we experienced some issue  that need to resolve immediately. Issue stated in the box below.";
            $btnResponse = "Resolve Application";
            $subResponse = "Please click the 'Resolve' button immediately to update your application form";

        }
        if ($input['entriesStatus'] == "rejected") {
            $response = "Good Day <b>".$input['username']."</b>. We appreciate that you took the time to apply in our scholarship program. After reviewing your submitted application we have decided to <b>reject</b> you in our in our program. The reason is stated in the box below";

            $btnResponse = "View Application";
            $subResponse = "We appreciate that you are interested in our program. Thank you for applying. We wish you all the best";

        }




if ($input['entriesStatus'] != "accepted") {
                     $complainBox = '<table border="0" cellpadding="0" cellspacing="0" width="600">
                                  <tr>
                                    <td>
                                      <p style="text-align:center; background-color:#e8e8e8; border:1px solid #999999; margin-bottom:20px; font-size:12px; padding:20px; font-family:Arial, sans-serif; line-height:150%;">'.$complain.'</p>
                                    </td>
                                  </tr>
                                </table>';
} 
else{
      $complainBox = '<table border="0" cellpadding="0" cellspacing="0" width="600">
                    <tr>
                        <td>
                            <p></p>
                        </td>
                    </tr>
                </table>';
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
                                        <h2 style="margin:0; font-family:Arial, sans-serif; color:#606060; letter-spacing:-1px; font-size:40px; font-weight:bold;">Here's an Email from LANI Scholarship Program.</h2>

                                <p style="margin:0; font-family:Arial,sans-serif; color:#606060; line-height:150%; font-size:16px;">$response</p>
                                      </td>
                                    </tr>
                                  </table>
                                  
                                  
                                  <!--TEXT BOX-->

                               $complainBox
                                                                 
                                  <!--MAIN CALL TO ACTION BUTTON-->
                                  <table border="0" cellpadding="0" cellspacing="0" style="background-color:#800000; margin-bottom:20px;">
                                    <tr>
                                        <td align="center" valign="middle" style="color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; letter-spacing:-.5px; line-height:150%; padding-top:15px; padding-right:30px; padding-bottom:15px; padding-left:30px;">
                                            <a href="$link" target="_blank" style="color:#FFFFFF; text-decoration:none;">$btnResponse</a>
                                        </td>
                                    </tr>
                                </table>
                                  
                           
                                   <table border="0" cellpadding="0" cellspacing="0" width="600" style="text-align:center; background-color:#FFFFFF; margin-bottom:20px;">
                                    <tr>
                                      <td>
                                        <p style="margin:0; font-family:Arial, sans-serif; color:#606060; line-height:150%; font-size:16px;">$subResponse</p>
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
        if ($request->transMode == "Cash" && $request['entriesStatus'] == "accepted") {
        $sender->sendWithAttach( $reciever,'Lani Scholar Application',$message,'/images/'.$code.'.png');

        return redirect()->back()->with('success','Email was successfully sent');
      }
      else
      {
         $sender->send( $reciever,'Lani Scholar Application',$message);
         
         return redirect()->back()->with('success','Email was successfully sent');
      }
                //for redirecting to create page
       // return Redirect::route('application.create');
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
