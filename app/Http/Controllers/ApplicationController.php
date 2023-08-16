<?php
namespace App\Http\Controllers;

use App\Http\Controllers\MailController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use App\Models\Scholar;
use App\Models\Application;
use App\Models\School;
use App\Models\Signature;
use App\Models\Course;
use App\Models\Transaction;
use App\Models\Entry;
use App\Models\Family;
use App\Models\Education;
use App\Models\Sibling;
use App\Models\Admin;
use App\Models\Submission;
use View;
use Redirect;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         $userData = ['scholarInfo' => Scholar::where('scholarId', '=', session('UserId'))->first()];
        

        $dataEx = (['scholarPassword']);
        $get_data = array_diff($userData, $dataEx);

         
 $scholar = Scholar::where('scholars.scholarId','=',session('UserId'))->get()->toArray();

        $applications = DB::table('entries')
                       ->join('applications', 'applications.applicationId', 'entries.applicationId')
                       ->join('scholars', 'scholars.scholarId', 'applications.scholarId')
                       ->join('submissions','submissions.submissionId', 'entries.submissionId')
                       ->select('entries.*', 'submissions.*', 'applications.*')
                       ->where('scholars.scholarId','=', session('UserId'))->get()->toArray();
        $submissions = DB::table('submissions')
                       ->select('submissionYear')->distinct()->get()->toArray();

         return view('lani.status', compact('applications', 'get_data', 'submissions','scholar'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        $subStart = DB::table('submissions')
                ->where('submissionStart','>=',date('Y-m-d'))->orderBy('submissionStart', 'ASC')->first();
                
  if(@isset($subStart)){ 
    if (@$subStart->submissionStart == date('Y-m-d')) 
    {
        if (@$subStart->submissionStatus == "close") {
            $sub = Submission::find($subStart->submissionId);
            $sub->submissionStatus="open";
            $sub->save();
        }
    }   
              
    $date=date_create( $subStart->submissionStart);
    $soon =date_format($date,"M/d/Y");
}else{
    $soon = "na";
}
 $submissionIdQuery1 = DB::table('submissions')
                        ->select('*')
                        ->where('submissionStatus','=', 'open')
                        ->get(); 
if (@isset($submissionIdQuery1)) {
  if (date( "Y-m-d" ) > @$submissionIdQuery1[0]->submissionEnd) {

        DB::table('submissions')->where('submissionId', @$submissionIdQuery1[0]->submissionId)->update(['submissionStatus' => 'close']);     
}  
}


        $userData = ['scholarInfo' => Scholar::where('scholarId', '=', session('UserId'))->first()];

        $dataEx = (['scholarPassword']);
        $get_data = array_diff($userData, $dataEx);
        $scholar = Scholar::where('scholars.scholarId','=',session('UserId'))->get()->toArray();

       // return View::make('lani.home', compact('get_data'));

        $message []= "";

         //*****check if there is open submission*****
        $submissionIdQuery = DB::table('submissions')
                        ->select('*')
                        ->where('submissionStatus','=', 'open')
                        ->get();  
        
        // if($submissionIdQuery > )




        // dd($submissionIdQuery);


        @$submissionYear = $submissionIdQuery->all()[0]->submissionYear;


        @$submissionSem = $submissionIdQuery->all()[0]->submissionSem;
      
        //*****check if there is application Submitted*****
        $myEntry = DB::table('scholars')
                ->join('applications', 'scholars.scholarId', '=' ,'applications.scholarId')
                ->join('entries','applications.applicationId','=', 'entries.applicationId')
                ->join('submissions','submissions.submissionId', '=', 'entries.submissionId')
                ->select('entries.*', 'submissionSem', 'submissionYear')
                ->where('submissionYear','=', $submissionYear)
                ->where('submissionSem','=', $submissionSem)
                ->where('scholars.scholarId','=',session('UserId'))
                ->get();

        //*****check if there is already submitted application in the current submission*****
        if (isset($myEntry)) {
           $message['openSubmission'] = $submissionIdQuery->all();
           $message['entryStatus'] = $myEntry->all();
        }
        else{
          $message['entryStatus'] = "NoEntry";
        }
      
        
        if ((!isset($get_data['scholarInfo']['scholarStatus'])) || ($get_data['scholarInfo']['scholarStatus'] == 'new')) {
           //echo "for redirecting to new page with array message";
          return view('lani.new', compact('message', 'get_data','myEntry', 'scholar', 'soon'));
        }else
        {
          //echo "for redirecting to renew page with array message";
          return view('lani.renew', compact('message', 'get_data','myEntry', 'scholar', 'soon'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 

 $req = $request->all();
        // $arrayName = array('okay' => 'nice' );
        //  $arrayName1 = array('okayy' => 'nicee' );


        //Function for uploading file in public/images/...
        function laniFileUpload(Request $request, $fileAttribute)
        {     
            $req = $request->all();
            $i = 0;
            $filepath = '';

            if ($request->hasfile($fileAttribute)) {
                foreach ($request->file($fileAttribute) as $file) {

                    //for collecting the extension of the file
                    $extension = $file->getClientOriginalExtension();

                    //for assigning new name of the file
                    $name = 'batch-'.$req['batch'].'_sem-'.$req['sem'].'_year-'.$req['year']."_".$i.'.'.$extension;

                    //for uploading the file
                    $file->move(public_path() . '/images/'.'scholarId-'.$req['scholarId'].'/'.$fileAttribute.'/', $name);

                    //for concatinating all the file path
                    $filepath .= $name . '|';

                    $i++;
                }
            }
            $i = 0;

            //for returning all the file path
            return $filepath;
        }

        //restrictions of all fields
        if (@$req['applicationScholarStatus'] == "renew") {
            $rules = [
            //pictures field restrictions
            'idPicture' => 'required',
            'scholarSignature' => 'required',
            'guardianSignature' => 'required',
            'applicationEnrollmentForm' => 'required',
            'applicationReportCard' => 'required',
            'applicationGoodMoral'=> 'required',
            'applicationSchoolId' => 'required',
            'applicationVotersCertificateP' => 'required',
            'applicationVotersCertificate' => 'required',
            'applicationBirthCertificate' => 'required',


            //course field restrictions
           
            'courseName' => 'required',
            'courseLadderized' => 'required',
            'courseGwa' => 'required|numeric|max:10|min:1',
            'courseYearLevel' => 'required',
            'courseUnitsEnrolled' => 'required|numeric|max:25|min:1',
            'courseDuration' => 'required',
            'courseGraduating' => 'required',
            'courseGraduatingHonor' => 'required',
            'courseNeededSemester' => 'numeric|max:25|min:1',
            'courseOthers' => 'required',

            //school field restrictions
            'schoolName' => 'required',
            'schoolAddress' => 'required',
            'schoolAddress' => 'required',
            
            //application field restrictions
            'applicationApplicant' => 'required',
            'scholarType' => 'required',
            'applicationApplicantParent' => 'required',

            //signature field restrictions
            'signatureDate' => 'required',
            'signatureDateParent' => 'required',

            //trsansaction field restrictions
             'transMode' => 'required',



            //******new applicant extra fields******
            //family field restrictions
            'familyFatherName' => 'alpha',
            'familyMotherName' => 'alpha',
            'familySpouseName' => 'nullable|alpha',
            'familyFatherContact' => 'numeric',
            'familyMotherContact' => 'numeric',
            'familySpouseContact' => 'nullable|numeric',

            //siblings field restrictions
            'siblingsNumber' => 'nullable|numeric',
            'siblingName1' => 'nullable',
            'siblingName2' => 'nullable',
            'siblingName3' => 'nullable',
            'siblingName4' => 'nullable',
            'siblingName5' => 'nullable',
            'siblingAge1' => 'nullable|numeric',
            'siblingAge2' => 'nullable|numeric',
            'siblingAge3' => 'nullable|numeric',
            'siblingAge4' => 'nullable|numeric',
            'siblingAge5' => 'nullable|numeric',
            'siblingMonthlyIncome1' => 'nullable|numeric',
            'siblingMonthlyIncome2' => 'nullable|numeric',
            'siblingMonthlyIncome3' => 'nullable|numeric',
            'siblingMonthlyIncome4' => 'nullable|numeric',
            'siblingMonthlyIncome5' => 'nullable|numeric',
           
        ];



        }
        else{
             $rules = [

                  //pictures field restrictions
            'idPicture' => 'required',
            'scholarSignature' => 'required',
            'guardianSignature' => 'required',
            'applicationEnrollmentForm' => 'required',
            'applicationReportCard' => 'required',
            'applicationGoodMoral'=> 'required',
            'applicationSchoolId' => 'required',
            'applicationVotersCertificateP' => 'required',
            'applicationVotersCertificate' => 'required',
            'applicationBirthCertificate' => 'required',
            'applicationDiploma' => 'required',


            //course field restrictions
            'idPicture' => 'required',
            'scholarSignature' => 'required',
            'guardianSignature' => 'required',
            'courseName' => 'required',
            'courseLadderized' => 'required',
            'courseGwa' => 'required|numeric|max:10|min:1',
            'courseYearLevel' => 'required',
            'courseUnitsEnrolled' => 'required|numeric|max:25|min:1',
            'courseDuration' => 'required',
            'courseGraduating' => 'required',
            'courseGraduatingHonor' => 'required',
            'courseNeededSemester' => 'numeric|max:25|min:1',
            'courseOthers' => 'required',

            //school field restrictions
            'schoolName' => 'required',
            'schoolAddress' => 'required',
            'schoolAddress' => 'required',
            
            //application field restrictions
            'applicationApplicant' => 'required',
            'scholarType' => 'required',
            'applicationApplicantParent' => 'required',

            //signature field restrictions
            'signatureDate' => 'required',
            'signatureDateParent' => 'required',
            

            //trsansaction field restrictions
             'transMode' => 'required',

            //******new applicant extra fields******
            //family field restrictions
            'familyFatherLiving' => 'required',
            'familyMotherLiving' =>'required',
            'familyFatherName' => 'required',
            'familyMotherName' => 'required',
            'familySpouseName' => 'nullable|alpha',
            'familyFatherContact' => 'numeric',
            'familyMotherContact' => 'numeric',
            'familySpouseContact' => 'nullable|numeric',

            //education field restrictions
            'educationSHType' => 'required',
            'educationJHType' => 'required',
            'educationELType' => 'required',

            'educationSHName' => 'required',
            'educationJHName' => 'required',
            'educationELName' => 'required',

            'educationSHAddress' => 'required',
            'educationJHAddress' => 'required',
            'educationELAddress' => 'required',

            'educationSHGraduated' => 'required',
            'educationJHGraduated' => 'required',
            'educationELGraduated' => 'required',
            



            //siblings field restrictions
            'siblingsNumber' => 'nullable|numeric',
            'siblingName1' => 'nullable',
            'siblingName2' => 'nullable',
            'siblingName3' => 'nullable',
            'siblingName4' => 'nullable',
            'siblingName5' => 'nullable',
            'siblingAge1' => 'nullable|numeric',
            'siblingAge2' => 'nullable|numeric',
            'siblingAge3' => 'nullable|numeric',
            'siblingAge4' => 'nullable|numeric',
            'siblingAge5' => 'nullable|numeric',
            'siblingMonthlyIncome1' => 'nullable|numeric',
            'siblingMonthlyIncome2' => 'nullable|numeric',
            'siblingMonthlyIncome3' => 'nullable|numeric',
            'siblingMonthlyIncome4' => 'nullable|numeric',
            'siblingMonthlyIncome5' => 'nullable|numeric',
        ];
        }

        if ($req['transMode'] == "Gcash") {
             $rules['transactionGcashNum'] = 'required|numeric';
            $rules['transactionGcashName'] = 'required';
        }


        //error messages of all fields
        $messages = [
            'required' => 'Required',
            'min' => 'Too few',
            'max' => 'Too high',
            'alpha' => 'Letters only',
            'numeric' => 'Numbers only'
        ];

        //for validating all of the fields
        $validator = Validator::make($request->all(), $rules, $messages);

        //for validating if all fields passes
        if ($validator->passes()) {

        //for collecting image name from request
        $idPicture = laniFileUpload($request, 'idPicture');
        $enrollmentForm = laniFileUpload($request, 'applicationEnrollmentForm');
        $reportCard = laniFileUpload($request, 'applicationReportCard');
        $diploma = laniFileUpload($request, 'applicationDiploma');
        $goodMoral = laniFileUpload($request, 'applicationGoodMoral');
        $schoolId = laniFileUpload($request, 'applicationSchoolId');
        $acadExe = laniFileUpload($request, 'applicationAcademicExcellence');
        $votersCert = laniFileUpload($request, 'applicationVotersCertificate');
        $votersCerP = laniFileUpload($request, 'applicationVotersCertificateP');
        $birthCert = laniFileUpload($request, 'applicationBirthCertificate');
        $otherDocs = laniFileUpload($request, 'applicationOtherDocs');


        //inserting Data In Applications Table
        $application = new Application;

        //for Status
        $application->applicationScholarStatus = $req['applicationScholarStatus']; 

        //for uploading id picture
        $application->applicationIdPicture =  $idPicture ;

        //for Scholar Type
        $application->applicationScholarType = $req['scholarType'];

        //for uploading Enrollment form
        $application->applicationEnrollmentForm =   $enrollmentForm;

        //for uploading  Report Card
        $application->applicationReportCard =  $reportCard;

        //for uploading Diploma
        $application->applicationDiploma = $diploma;

        //for uploading GoodMoral
        $application->applicationGoodMoral = $goodMoral;

        //for uploading SchoolId
        $application->applicationSchoolId = $schoolId;

        //for uploading Academic Exellence
        $application->applicationAcademicExcellence = $acadExe;

        //for uploading Voters Certificate
        $application->applicationVotersCertificate = $votersCert;

        //for uploading Voters Certificate Parent
        $application->applicationVotersCertificateP =  $votersCerP;

        //for uploading Birth Certificate
        $application->applicationBirthCertificate =  $birthCert;

        //for uploading Other Docs
        $application->applicationOtherDocs = $otherDocs;

        //for scholarId (foreign Key)
        $application->scholarId = $req['scholarId'];

        //for submit date
        $application->applicationSubmitDate = $req['applicationSubmitDate']; 

        //for applicant who summited
        $application->applicationApplicant = $req['applicationApplicant'] ;

        //for applicant parent name
        $application->applicationApplicantParent = $req['applicationApplicantParent']  ;

        //for schoolyear (e.g. 2020-2021)
        $application->applicationNumOfEdit = $req['applicationNumOfEdit'];

        //for saving all records of application in database
        $application->save();


        //for collecting image name from request
        $scholarSignature = laniFileUpload($request, 'scholarSignature');
        $guardianSignature = laniFileUpload($request, 'guardianSignature');


        //inserting Data In Signature Table
        $signature = new Signature;

        //for uploading the signature of applicant
        $signature->scholarSignature = $scholarSignature;

        //for uploading the signature of parent/guardian
        $signature->guardianSignature = $guardianSignature;

        //for signature date of applicant
        $signature->signatureDate = $req['signatureDate'];

        //for signature date of parent
        $signature->signatureDateParent = $req['signatureDateParent'];

        //for current application id
        $signature->applicationId =  $application->applicationId;

        //for saving all records of signature in database
        $signature->save();



        //inserting Data In schools Table
        $school = new School;

        //for name of school
        $school->schoolName = $req['schoolName'];

        //for address of school
        $school->schoolAddress = $req['schoolAddress'];

        //for current application id
        $school->applicationId = $application->applicationId;

        //for saving all records of school in database
        $school->save();



        //inserting Data In courses Table
        $course = new Course;

        //for name of course
        $course->courseName = $req['courseName'];

        //for ladderized
        $course->courseLadderized = $req['courseLadderized'];

        //for General Weighted Average(GWA)
        $course->courseGwa = $req['courseGwa'] ;

        //for year level
        $course->courseYearLevel = $req['courseYearLevel'];

        //for units enrolled
        $course->courseUnitsEnrolled = $req['courseUnitsEnrolled'];

        //for course duration
        $course->courseDuration = $req['courseDuration'] ;

        //for graduating
        $course->courseGraduating =  $req['courseGraduating'];

        //for graduating with honor
        $course->courseGraduatingHonor = $req['courseGraduatingHonor'];

        //for needed semester before graduating
        $course->courseNeededSemester = $req['courseNeededSemester'];

        //for others
        $course->courseOthers = $req['courseOthers'];

        //for transferee
        $course->courseTransferee = $req['courseTransferee'];

        //for shiftee
        $course->courseShiftee = $req['courseShiftee'];

        //for current application id
        $course->applicationId = $application->applicationId;

        //for saving all records of course in database
        $course->save();

         if ($req['transMode'] == 'Gcash') {
            $trans = new Transaction;
            $trans->transactionGcashNum = $req['transactionGcashNum'];
            $trans->transactionGcashName = $req['transactionGcashName'];
            $trans->applicationId = $application->applicationId;
            $trans->save();
            }




        //new Applicant additional inputs
        if (@$req['applicationScholarStatus'] == "new"){
                Education::create($request->all());
                Family::create($request->all());
                

                if (isset($req['siblingName1'])) {
                    $sibling = new Sibling;
                       $sibling->siblingName = $req['siblingName1'];
                       $sibling->siblingAge = $req['siblingAge1'];
                       $sibling->siblingCivilStatus = $req['siblingCivilStatus1'];
                       $sibling->siblingHighestEduc = $req['siblingHighestEduc1'];
                       $sibling->siblingWork = $req['siblingWork1'];
                       $sibling->siblingMontlyIncome = $req['siblingMonthlyIncome1'];
                       $sibling->scholarId = $req['scholarId'];
                       $sibling->save();
                    }


                if (isset($req['siblingName2'])) {
                    $sibling = new Sibling;
                       $sibling->siblingName = $req['siblingName2'];
                       $sibling->siblingAge = $req['siblingAge2'];
                       $sibling->siblingCivilStatus = $req['siblingCivilStatus2'];
                       $sibling->siblingHighestEduc = $req['siblingHighestEduc2'];
                       $sibling->siblingWork = $req['siblingWork2'];
                       $sibling->siblingMontlyIncome = $req['siblingMonthlyIncome2'];
                       $sibling->scholarId = $req['scholarId'];
                       $sibling->save();
                    }


                 if (isset($req['siblingName3'])) {
                    $sibling = new Sibling;
                       $sibling->siblingName = $req['siblingName3'];
                       $sibling->siblingAge = $req['siblingAge3'];
                       $sibling->siblingCivilStatus = $req['siblingCivilStatus3'];
                       $sibling->siblingHighestEduc = $req['siblingHighestEduc3'];
                       $sibling->siblingWork = $req['siblingWork3'];
                       $sibling->siblingMontlyIncome = $req['siblingMonthlyIncome3'];
                       $sibling->scholarId = $req['scholarId'];
                       $sibling->save();
                    }

                if (isset($req['siblingName4'])) {
                    $sibling = new Sibling;
                       $sibling->siblingName = $req['siblingName4'];
                       $sibling->siblingAge = $req['siblingAge4'];
                       $sibling->siblingCivilStatus = $req['siblingCivilStatus4'];
                       $sibling->siblingHighestEduc = $req['siblingHighestEduc4'];
                       $sibling->siblingWork = $req['siblingWork4'];
                       $sibling->siblingMontlyIncome = $req['siblingMonthlyIncome4'];
                       $sibling->scholarId = $req['scholarId'];
                       $sibling->save();
                    }

                if (isset($req['siblingName5'])) {
                    $sibling = new Sibling;
                       $sibling->siblingName = $req['siblingName5'];
                       $sibling->siblingAge = $req['siblingAge5'];
                       $sibling->siblingCivilStatus = $req['siblingCivilStatus5'];
                       $sibling->siblingHighestEduc = $req['siblingHighestEduc5'];
                       $sibling->siblingWork = $req['siblingWork5'];
                       $sibling->siblingMontlyIncome = $req['siblingMonthlyIncome5'];
                       $sibling->scholarId = $req['scholarId'];
                       $sibling->save();
                    }


            }

           

        //for checking if there is open submissions
        $submissionIdQuery = DB::table('submissions')
            ->select('submissionId')
            ->where('submissionStatus','=', 'open')
            ->get();
        
        //for collecting the value of submissionIdQuery variable
        $submissionId = $submissionIdQuery->pluck('submissionId')->all()[0];


        // inserting Data In Entries Table
        if ($req['applicationNumOfEdit'] > 0) {
            $entryStatus = "updated";
        }else{
            $entryStatus = "process";
        }


        //inserting Data In entries Table
        $entries = new Entry;

        //for entry status
        $entries->entriesStatus =  $entryStatus ; 

        //for current submission id
        $entries->submissionId = $submissionId;

        //for current application id
        $entries->applicationId = $application->applicationId;

        //for saving all records of entry in database
        $entries->save();


         $submissionIdQuery = DB::table('submissions')
                        ->select('*')
                        ->where('submissionStatus','=', 'open')
                        ->get();  
        
        @$submissionYear = $submissionIdQuery->all()[0]->submissionYear;


        @$submissionSem = $submissionIdQuery->all()[0]->submissionSem;
      





        //for sending email

        $submissionIdQuery = DB::table('submissions')
                        ->select('*')
                        ->where('submissionStatus','=', 'open')
                        ->get();  
        
        $submissionYear = $submissionIdQuery->all()[0]->submissionYear;


        $submissionSem = $submissionIdQuery->all()[0]->submissionSem;
        $submissionBatch = $submissionIdQuery->all()[0]->submissionBatch;
      

        $scholarEmail = DB::table('scholars')
            ->where('scholarId','=', $req['scholarId'])
            ->select('scholarEmail')->get()->toArray();
        $reciever = $scholarEmail[0]->scholarEmail;
        $link = "http://lanischolar.test/application/".$application->applicationId;
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

                                <p style="margin:0; font-family:Arial,sans-serif; color:#606060; line-height:150%; font-size:16px;">Your application now is successfully <b>submitted</b> for evaluation. Click the button below to see your submitted application </p>
                                      </td>
                                    </tr>
                                  </table>



                                   <table border="0" cellpadding="0" cellspacing="0" width="600" style="text-align:center; background-color:#FFFFFF; margin-bottom:20px;">
                                    <tr>
                                      <td>
                                        <p style="margin:0; font-family:Arial, sans-serif; color:#606060; line-height:150%; font-size:16px;">                            
                                        <br>
                                        <h3>Application Update Info:</h3>
                                        <p>Batch : <b>$submissionBatch</b></p>
                                        <p>Semester : <b>$submissionSem</b></p>
                                        <p>School year : <b>$submissionYear<b></p>
                                        <br>
                                        </p>
                                      </td>
                                    </tr>
                                  </table>

                                  <!--MAIN CALL TO ACTION BUTTON-->
                                  <table border="0" cellpadding="0" cellspacing="0" style="background-color:#800000; margin-bottom:20px;">
                                    <tr>
                                        <td align="center" valign="middle" style="color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; letter-spacing:-.5px; line-height:150%; padding-top:15px; padding-right:30px; padding-bottom:15px; padding-left:30px;">
                                            <a href="$link" target="_blank" style="color:#FFFFFF; text-decoration:none;">View Application</a>
                                        </td>
                                    </tr>
                                </table>
                                  
                           
                                   <table border="0" cellpadding="0" cellspacing="0" width="600" style="text-align:center; background-color:#FFFFFF; margin-bottom:20px;">
                                    <tr>
                                      <td>
                                        <p style="margin:0; font-family:Arial, sans-serif; color:#606060; line-height:150%; font-size:16px;">Result will send in this email after the evaluation</br>
                                            Thank you and God Bless!!!</p>
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
        $sender->send( $reciever,'Lani Scholar Application',$message);

                //for redirecting to create page
        return Redirect::route('application.create');

        }

    

        return redirect()->back()->withInput()->withErrors($validator);
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

        $userData = ['scholarInfo' => Scholar::where('scholarId', '=', session('UserId'))->first()];

        $dataEx = (['scholarPassword']);
        $get_data = array_diff($userData, $dataEx);
        $scholar = Scholar::where('scholars.scholarId','=',session('UserId'))->get()->toArray();

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
                      ->where('applications.applicationId','=',$id )->first();
            
            $siblings = DB::table('siblings')
                    ->leftJoin('scholars','scholars.scholarId','siblings.scholarId')
                    ->select('siblings.*')
                    ->where('siblings.scholarId','=', session('UserId'))->get()->toArray();
            $entry = DB::table('entries')
                    ->join('submissions','submissions.submissionId','entries.submissionId')
                    ->join('applications','applications.applicationId','entries.applicationId')
                    ->select('entries.*','submissions.*')
                    ->where('applications.applicationId','=',$id )->first();

        if ($applications->applicationScholarStatus == "new") {
           //echo "for redirecting to new page with array message";
          return view('lani.new-view', compact('get_data', 'applications', 'siblings','entry','scholar'));
        }else
        {
          //echo "for redirecting to renew page with array message";
          return view('lani.renew-view', compact('get_data', 'applications', 'siblings','entry','scholar'));
        }

     
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
        $userData = ['scholarInfo' => Scholar::where('scholarId', '=', session('UserId'))->first()];
        $scholar = Scholar::where('scholars.scholarId','=',session('UserId'))->get()->toArray();
        $dataEx = (['scholarPassword']);
        $get_data = array_diff($userData, $dataEx);

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
                      ->where('applications.applicationId','=',$id )->first();
        
            
            $siblings = DB::table('siblings')
                    ->leftJoin('scholars','scholars.scholarId','siblings.scholarId')
                    ->select('siblings.*')
                    ->where('siblings.scholarId','=', session('UserId'))->get()->toArray();
            $entry = DB::table('entries')
                    ->join('submissions','submissions.submissionId','entries.submissionId')
                    ->join('applications','applications.applicationId','entries.applicationId')
                    ->select('entries.*','submissions.*')
                    ->where('applications.applicationId','=',$id )->first();

            $message []= "";
            $submissionIdQuery = DB::table('submissions')
                        ->select('*')
                        ->where('submissionStatus','=', 'open')
                        ->get();  
            @$submissionYear = $submissionIdQuery->all()[0]->submissionYear;


            @$submissionSem = $submissionIdQuery->all()[0]->submissionSem;
            $myEntry = DB::table('scholars')
                ->join('applications', 'scholars.scholarId', '=' ,'applications.scholarId')
                ->join('entries','applications.applicationId','=', 'entries.applicationId')
                ->join('submissions','submissions.submissionId', '=', 'entries.submissionId')
                ->select('entries.*', 'submissionSem', 'submissionYear')
                ->where('submissionYear','=', $submissionYear)
                ->where('submissionSem','=', $submissionSem)
                ->where('scholars.scholarId','=',session('UserId'))
                ->get();
           $message['openSubmission'] = $submissionIdQuery->all();
           $message['entryStatus'] = $myEntry->all();


        if ($applications->applicationScholarStatus == "new") {
           //echo "for redirecting to new page with array message";
          return view('lani.new-update', compact('get_data', 'applications', 'siblings','entry','message', 'scholar'));
        }else
        {
          //echo "for redirecting to renew page with array message";
          return view('lani.renew-update', compact('get_data', 'applications', 'siblings','entry','message', 'scholar'));
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
        $req = $request->all();

        // $arrayName = array('okay' => 'nice' );
        //  $arrayName1 = array('okayy' => 'nicee' );




        //Function for uploading file in public/images/...
        function laniFileUpload(Request $request, $fileAttribute)
        {     
            $req = $request->all();
            $i = 0;
            $filepath = '';

            if ($request->hasfile($fileAttribute)) {
                foreach ($request->file($fileAttribute) as $file) {

                    //for collecting the extension of the file
                    $extension = $file->getClientOriginalExtension();

                    //for assigning new name of the file
                    $name = 'batch-'.$req['batch'].'_sem-'.$req['sem'].'_year-'.$req['year']."_".$i.'.'.$extension;

                    //for uploading the file
                    $file->move(public_path() . '/images/'.'scholarId-'.$req['scholarId'].'/'.$fileAttribute.'/', $name);

                    //for concatinating all the file path
                    $filepath .= $name . '|';

                    $i++;
                }
            }
            $i = 0;

            //for returning all the file path
            return $filepath;
        }

        //restrictions of all fields
        if (@$req['applicationScholarStatus'] == "renew") {
            $rules = [
            

            //course field restrictions
           
            'courseName' => 'required',
            'courseLadderized' => 'required',
            'courseGwa' => 'required|numeric|max:10|min:1',
            'courseYearLevel' => 'required',
            'courseUnitsEnrolled' => 'required|numeric|max:25|min:1',
            'courseDuration' => 'required',
            'courseGraduating' => 'required',
            'courseGraduatingHonor' => 'required',
            'courseNeededSemester' => 'numeric|max:25|min:1',
            'courseOthers' => 'required',

            //school field restrictions
            'schoolName' => 'required',
            'schoolAddress' => 'required',
            'schoolAddress' => 'required',
            
            //application field restrictions
            'applicationApplicant' => 'required',
            'scholarType' => 'required',
            'applicationApplicantParent' => 'required',

            //signature field restrictions
            'signatureDate' => 'required',
            'signatureDateParent' => 'required',

            //trsansaction field restrictions
             'transMode' => 'required',



            //******new applicant extra fields******
            //family field restrictions
            'familyFatherName' => 'alpha',
            'familyMotherName' => 'alpha',
            'familySpouseName' => 'nullable|alpha',
            'familyFatherContact' => 'numeric',
            'familyMotherContact' => 'numeric',
            'familySpouseContact' => 'nullable|numeric',

            //siblings field restrictions
            'siblingsNumber' => 'nullable|numeric',
            'siblingName1' => 'nullable|alpha',
            'siblingName2' => 'nullable|alpha',
            'siblingName3' => 'nullable|alpha',
            'siblingName4' => 'nullable|alpha',
            'siblingName5' => 'nullable|alpha',
            'siblingAge1' => 'nullable|numeric',
            'siblingAge2' => 'nullable|numeric',
            'siblingAge3' => 'nullable|numeric',
            'siblingAge4' => 'nullable|numeric',
            'siblingAge5' => 'nullable|numeric',
            'siblingMonthlyIncome1' => 'nullable|numeric',
            'siblingMonthlyIncome2' => 'nullable|numeric',
            'siblingMonthlyIncome3' => 'nullable|numeric',
            'siblingMonthlyIncome4' => 'nullable|numeric',
            'siblingMonthlyIncome5' => 'nullable|numeric',
           
        ];



        }
        else{
             $rules = [

            //course field restrictions
            'courseName' => 'required',
            'courseLadderized' => 'required',
            'courseGwa' => 'required|numeric|max:10|min:1',
            'courseYearLevel' => 'required',
            'courseUnitsEnrolled' => 'required|numeric|max:25|min:1',
            'courseDuration' => 'required',
            'courseGraduating' => 'required',
            'courseGraduatingHonor' => 'required',
            'courseNeededSemester' => 'numeric|max:25|min:1',
            'courseOthers' => 'required',

            //school field restrictions
            'schoolName' => 'required',
            'schoolAddress' => 'required',
            'schoolAddress' => 'required',
            
            //application field restrictions
            'applicationApplicant' => 'required',
            'scholarType' => 'required',
            'applicationApplicantParent' => 'required',

            //signature field restrictions
            'signatureDate' => 'required',
            'signatureDateParent' => 'required',
            

            //trsansaction field restrictions
             'transMode' => 'required',

            //******new applicant extra fields******
            //family field restrictions
            'familyFatherLiving' => 'required',
            'familyMotherLiving' =>'required',
            'familyFatherName' => 'required',
            'familyMotherName' => 'required',
            'familySpouseName' => 'nullable|alpha',
            'familyFatherContact' => 'numeric',
            'familyMotherContact' => 'numeric',
            'familySpouseContact' => 'nullable|numeric',

            //education field restrictions
            'educationSHType' => 'required',
            'educationJHType' => 'required',
            'educationELType' => 'required',

            'educationSHName' => 'required',
            'educationJHName' => 'required',
            'educationELName' => 'required',

            'educationSHAddress' => 'required',
            'educationJHAddress' => 'required',
            'educationELAddress' => 'required',

            'educationSHGraduated' => 'required',
            'educationJHGraduated' => 'required',
            'educationELGraduated' => 'required',
            



            //siblings field restrictions
            'siblingsNumber' => 'nullable|numeric',
            'siblingName1' => 'nullable',
            'siblingName2' => 'nullable',
            'siblingName3' => 'nullable',
            'siblingName4' => 'nullable',
            'siblingName5' => 'nullable',
            'siblingAge1' => 'nullable|numeric',
            'siblingAge2' => 'nullable|numeric',
            'siblingAge3' => 'nullable|numeric',
            'siblingAge4' => 'nullable|numeric',
            'siblingAge5' => 'nullable|numeric',
            'siblingMonthlyIncome1' => 'nullable|numeric',
            'siblingMonthlyIncome2' => 'nullable|numeric',
            'siblingMonthlyIncome3' => 'nullable|numeric',
            'siblingMonthlyIncome4' => 'nullable|numeric',
            'siblingMonthlyIncome5' => 'nullable|numeric',
        ];
        }

        if (@$req['transMode'] == "Gcash") {
             $rules['transactionGcashNum'] = 'required|numeric';
            $rules['transactionGcashName'] = 'required';
        }


        //error messages of all fields
        $messages = [
            'required' => 'Required',
            'min' => 'Too few',
            'max' => 'Too high',
            'alpha' => 'Letters only',
            'numeric' => 'Numbers only'
        ];
        //for validating all of the fields
        $validator = Validator::make($request->all(), $rules, $messages);

        //for validating if all fields passes
        if ($validator->passes()) {

        //for collecting image name from request
        $idPicture = laniFileUpload($request, 'idPicture');
        $enrollmentForm = laniFileUpload($request, 'applicationEnrollmentForm');
        $reportCard = laniFileUpload($request, 'applicationReportCard');
        $diploma = laniFileUpload($request, 'applicationDiploma');
        $goodMoral = laniFileUpload($request, 'applicationGoodMoral');
        $schoolId = laniFileUpload($request, 'applicationSchoolId');
        $acadExe = laniFileUpload($request, 'applicationAcademicExcellence');
        $votersCert = laniFileUpload($request, 'applicationVotersCertificate');
        $votersCerP = laniFileUpload($request, 'applicationVotersCertificateP');
        $birthCert = laniFileUpload($request, 'applicationBirthCertificate');
        $otherDocs = laniFileUpload($request, 'applicationOtherDocs');


        //inserting Data In Applications Table
        $application = Application::where('applications.applicationId','=',$id)->first();
       
        //for Status
        $application->applicationScholarStatus = $req['applicationScholarStatus']; 
        //for uploading id picture

        if($request->hasfile('idPicture')){
         foreach ($req['old_idPicture'] as $key => $pic ) {
            File::delete(public_path('images/scholarId-'.$req['scholarId'].'/idPicture/'.$pic));
        }
        $application->applicationIdPicture =  $idPicture ;
        }
        //for Scholar Type
        $application->applicationScholarType = $req['scholarType'];



        //for uploading Enrollment form
        if($request->hasfile('applicationEnrollmentForm')){
         foreach ($req['old_applicationEnrollmentForm'] as $key => $pic ) {
            File::delete(public_path('images/scholarId-'.$req['scholarId'].'/applicationEnrollmentForm/'.$pic));
        }
        $application->applicationEnrollmentForm =   $enrollmentForm;
        }
       



        //for uploading  Report Card
        if($request->hasfile('applicationReportCard')){
         foreach ($req['old_applicationReportCard'] as $key => $pic ) {
            File::delete(public_path('images/scholarId-'.$req['scholarId'].'/applicationReportCard/'.$pic));
        }
        $application->applicationReportCard =  $reportCard;
        }
      

        //for uploading Diploma
        if($request->hasfile('applicationDiploma')){
         foreach ($req['old_applicationDiploma'] as $key => $pic ) {
            File::delete(public_path('images/scholarId-'.$req['scholarId'].'/applicationDiploma/'.$pic));
        }
        $application->applicationDiploma = $diploma;
        }
       

        //for uploading GoodMoral
        if($request->hasfile('applicationGoodMoral')){
         foreach ($req['old_applicationGoodMoral'] as $key => $pic ) {
            File::delete(public_path('images/scholarId-'.$req['scholarId'].'/applicationGoodMoral/'.$pic));
        }
        $application->applicationGoodMoral = $goodMoral;
        }
       

        //for uploading SchoolId
        if($request->hasfile('applicationSchoolId')){
         foreach ($req['old_applicationSchoolId'] as $key => $pic ) {
            File::delete(public_path('images/scholarId-'.$req['scholarId'].'/applicationSchoolId/'.$pic));
        }
        $application->applicationSchoolId = $schoolId;
        }
        

        //for uploading Academic Exellence
        if($request->hasfile('applicationAcademicExcellence')){
         foreach ($req['old_applicationAcademicExcellence'] as $key => $pic ) {
            File::delete(public_path('images/scholarId-'.$req['scholarId'].'/applicationAcademicExcellence/'.$pic));
        }
         $application->applicationAcademicExcellence = $acadExe;
        }
       
        //for uploading Voters Certificate
        if($request->hasfile('applicationVotersCertificate')){
         foreach ($req['old_applicationVotersCertificate'] as $key => $pic ) {
            File::delete(public_path('images/scholarId-'.$req['scholarId'].'/applicationVotersCertificate/'.$pic));
        }
        $application->applicationVotersCertificate = $votersCert;
        }
        

        //for uploading Voters Certificate Parent
         if($request->hasfile('applicationVotersCertificateP')){
         foreach ($req['old_applicationVotersCertificateP'] as $key => $pic ) {
            File::delete(public_path('images/scholarId-'.$req['scholarId'].'/applicationVotersCertificateP/'.$pic));
        }
         $application->applicationVotersCertificateP =  $votersCerP;
        }
       

        //for uploading Birth Certificate
        if($request->hasfile('applicationBirthCertificate')){
         foreach ($req['old_applicationBirthCertificate'] as $key => $pic ) {
            File::delete(public_path('images/scholarId-'.$req['scholarId'].'/applicationBirthCertificate/'.$pic));
        }
        $application->applicationBirthCertificate =  $birthCert;
        }
        

        //for uploading Other Docs
        if($request->hasfile('applicationOtherDocs')){
         foreach ($req['old_applicationOtherDocs'] as $key => $pic ) {
            File::delete(public_path('images/scholarId-'.$req['scholarId'].'/applicationOtherDocs/'.$pic));
        }
          $application->applicationOtherDocs = $otherDocs;
        }
      

        //for scholarId (foreign Key)
        $application->scholarId = $req['scholarId'];

        //for submit date
        $application->applicationSubmitDate = $req['applicationSubmitDate']; 

        //for applicant who summited
        $application->applicationApplicant = $req['applicationApplicant'] ;

        //for applicant parent name
        $application->applicationApplicantParent = $req['applicationApplicantParent']  ;

        //for schoolyear (e.g. 2020-2021)
        $application->applicationNumOfEdit = $req['applicationNumOfEdit'];

        //for saving all records of application in database
        $application->save();


        //for collecting image name from request
        $scholarSignature = laniFileUpload($request, 'scholarSignature');
        $guardianSignature = laniFileUpload($request, 'guardianSignature');


        //inserting Data In Signature Table
        $signature = Signature::where('signatures.applicationId','=',$id)->first();

        //for uploading the signature of applicant
         if($request->hasfile('scholarSignature')){
         foreach ($req['old_scholarSignature'] as $key => $pic ) {
            File::delete(public_path('images/scholarId-'.$req['scholarId'].'/scholarSignature/'.$pic));
        }
        $signature->scholarSignature = $scholarSignature;
        }
        

        //for uploading the signature of parent/guardian
        if($request->hasfile('guardianSignature')){
         foreach ($req['old_guardianSignature'] as $key => $pic ) {
            File::delete(public_path('images/scholarId-'.$req['scholarId'].'/guardianSignature/'.$pic));
        }
         $signature->guardianSignature = $guardianSignature;
        }

        //for signature date of applicant
        $signature->signatureDate = $req['signatureDate'];

        //for signature date of parent
        $signature->signatureDateParent = $req['signatureDateParent'];

        //for current application id
        $signature->applicationId = $id;

        //for saving all records of signature in database
        $signature->save();



        // //inserting Data In schools Table
        $school = School::where('schools.applicationId','=',$id)->first();

        //for name of school
        $school->schoolName = $req['schoolName'];

        //for address of school
        $school->schoolAddress = $req['schoolAddress'];

        //for current application id
        $school->applicationId = $id;

        //for saving all records of school in database
        $school->save();



        //inserting Data In courses Table
        $course = Course::where('courses.applicationId','=',$id)->first();

        //for name of course
        $course->courseName = $req['courseName'];

        //for ladderized
        $course->courseLadderized = $req['courseLadderized'];

        //for General Weighted Average(GWA)
        $course->courseGwa = $req['courseGwa'] ;

        //for year level
        $course->courseYearLevel = $req['courseYearLevel'];

        //for units enrolled
        $course->courseUnitsEnrolled = $req['courseUnitsEnrolled'];

        //for course duration
        $course->courseDuration = $req['courseDuration'] ;

        //for graduating
        $course->courseGraduating =  $req['courseGraduating'];

        //for graduating with honor
        $course->courseGraduatingHonor = $req['courseGraduatingHonor'];

        //for needed semester before graduating
        $course->courseNeededSemester = $req['courseNeededSemester'];

        //for others
        $course->courseOthers = $req['courseOthers'];

        //for transferee
        $course->courseTransferee = $req['courseTransferee'];

        //for shiftee
        $course->courseShiftee = $req['courseShiftee'];

        //for current application id
        $course->applicationId = $id;

        //for saving all records of course in database
        $course->save();
       
         if ($req['transMode'] == 'Gcash') {
            if (isset($req['old_transMode'])) {
            $trans = Transaction::where('transactions.applicationId','=',$id)->first();
            $trans->transactionGcashNum = $req['transactionGcashNum'];
            $trans->transactionGcashName = $req['transactionGcashName'];
            $trans->applicationId = $id;
            $trans->save();

            }
            else{
            $trans = new Transaction;
            $trans->transactionGcashNum = $req['transactionGcashNum'];
            $trans->transactionGcashName = $req['transactionGcashName'];
            $trans->applicationId = $id;
            $trans->save();
            }
            }
         else{
            $trans = Transaction::where('transactions.applicationId','=',$id);
            $trans->delete();
        }


            
        //new Applicant additional inputs
        if (@$req['applicationScholarStatus'] == "new"){

            $education = Education::where('education.scholarId','=',$req['scholarId'])->first();
            $education->update($request->all());


            $family = Family::where('families.scholarId','=',$req['scholarId'])->first();
            $family->update($request->all());

            $siblings = Sibling::where('siblings.scholarId','=',$req['scholarId']);
            $siblings->delete();

                if (isset($req['siblingName1'])) {
                      $sibling = new Sibling;
                       $sibling->siblingName = $req['siblingName1'];
                       $sibling->siblingAge = $req['siblingAge1'];
                       $sibling->siblingCivilStatus = $req['siblingCivilStatus1'];
                       $sibling->siblingHighestEduc = $req['siblingHighestEduc1'];
                       $sibling->siblingWork = $req['siblingWork1'];
                       $sibling->siblingMontlyIncome = $req['siblingMonthlyIncome1'];
                       $sibling->scholarId = $req['scholarId'];
                    $sibling->save();
                    }


                if (isset($req['siblingName2'])) {
                       $sibling = new Sibling;
                       $sibling->siblingName = $req['siblingName2'];
                       $sibling->siblingAge = $req['siblingAge2'];
                       $sibling->siblingCivilStatus = $req['siblingCivilStatus2'];
                       $sibling->siblingHighestEduc = $req['siblingHighestEduc2'];
                       $sibling->siblingWork = $req['siblingWork2'];
                       $sibling->siblingMontlyIncome = $req['siblingMonthlyIncome2'];
                       $sibling->scholarId = $req['scholarId'];
                       $sibling->save();
                    }


                 if (isset($req['siblingName3'])) {
                       $sibling = new Sibling;
                       $sibling->siblingName = $req['siblingName3'];
                       $sibling->siblingAge = $req['siblingAge3'];
                       $sibling->siblingCivilStatus = $req['siblingCivilStatus3'];
                       $sibling->siblingHighestEduc = $req['siblingHighestEduc3'];
                       $sibling->siblingWork = $req['siblingWork3'];
                       $sibling->siblingMontlyIncome = $req['siblingMonthlyIncome3'];
                       $sibling->scholarId = $req['scholarId'];
                       $sibling->save();
                    }

                if (isset($req['siblingName4'])) {
                       $sibling = new Sibling;
                       $sibling->siblingName = $req['siblingName4'];
                       $sibling->siblingAge = $req['siblingAge4'];
                       $sibling->siblingCivilStatus = $req['siblingCivilStatus4'];
                       $sibling->siblingHighestEduc = $req['siblingHighestEduc4'];
                       $sibling->siblingWork = $req['siblingWork4'];
                       $sibling->siblingMontlyIncome = $req['siblingMonthlyIncome4'];
                       $sibling->scholarId = $req['scholarId'];
                       $sibling->save();
                    }

                if (isset($req['siblingName5'])) {
                       $sibling = new Sibling;
                       $sibling->siblingName = $req['siblingName5'];
                       $sibling->siblingAge = $req['siblingAge5'];
                       $sibling->siblingCivilStatus = $req['siblingCivilStatus5'];
                       $sibling->siblingHighestEduc = $req['siblingHighestEduc5'];
                       $sibling->siblingWork = $req['siblingWork5'];
                       $sibling->siblingMontlyIncome = $req['siblingMonthlyIncome5'];
                       $sibling->scholarId = $req['scholarId'];
                       $sibling->save();
                    }


            }

           

        // //for checking if there is open submissions
        // $submissionIdQuery = DB::table('submissions')
        //     ->select('submissionId')
        //     ->where('submissionStatus','=', 'open')
        //     ->get();
        
        // //for collecting the value of submissionIdQuery variable
        // $submissionId = $submissionIdQuery->pluck('submissionId')->all()[0];


        // inserting Data In Entries Table
        if ($req['applicationNumOfEdit'] > 0) {
            $entryStatus = "updated";
        }else{
            $entryStatus = "process";
        }


        //inserting Data In entries Table
        $entries = Entry::where('entries.applicationId','=',$id)->first();

        //for entry status
        $entries->entriesStatus =  $entryStatus ; 

        // //for current submission id
        // $entries->submissionId = $submissionId;

        //for current application id
        $entries->applicationId = $id;

        //for saving all records of entry in database
        $entries->save();


         $submissionIdQuery = DB::table('submissions')
                        ->select('*')
                        ->where('submissionStatus','=', 'open')
                        ->get();  
        
        @$submissionYear = $submissionIdQuery->all()[0]->submissionYear;


        @$submissionSem = $submissionIdQuery->all()[0]->submissionSem;
      


        //for sending email

        $submissionIdQuery = DB::table('submissions')
                        ->select('*')
                        ->where('submissionStatus','=', 'open')
                        ->get();  
        
        $submissionYear = $submissionIdQuery->all()[0]->submissionYear;


        $submissionSem = $submissionIdQuery->all()[0]->submissionSem;
        $submissionBatch = $submissionIdQuery->all()[0]->submissionBatch;
      

        $scholarEmail = DB::table('scholars')
            ->where('scholarId','=', $req['scholarId'])
            ->select('scholarEmail')->get()->toArray();
        $reciever = $scholarEmail[0]->scholarEmail;
        $link = "http://lanischolar.test/application/".$id;
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

                                <p style="margin:0; font-family:Arial,sans-serif; color:#606060; line-height:150%; font-size:16px;">Your application now is successfully <b>updated</b> for evaluation. Click the button below to see your submitted application </p>
                                      </td>
                                    </tr>
                                  </table>



                                   <table border="0" cellpadding="0" cellspacing="0" width="600" style="text-align:center; background-color:#FFFFFF; margin-bottom:20px;">
                                    <tr>
                                      <td>
                                        <p style="margin:0; font-family:Arial, sans-serif; color:#606060; line-height:150%; font-size:16px;">                            
                                        <br>
                                        <h3>Application Update Info:</h3>
                                        <p>Batch : <b>$submissionBatch</b></p>
                                        <p>Semester : <b>$submissionSem</b></p>
                                        <p>School year : <b>$submissionYear<b></p>
                                        <br>
                                        </p>
                                      </td>
                                    </tr>
                                  </table>

                                  <!--MAIN CALL TO ACTION BUTTON-->
                                  <table border="0" cellpadding="0" cellspacing="0" style="background-color:#800000; margin-bottom:20px;">
                                    <tr>
                                        <td align="center" valign="middle" style="color:#FFFFFF; font-family:Helvetica, Arial, sans-serif; font-size:16px; font-weight:bold; letter-spacing:-.5px; line-height:150%; padding-top:15px; padding-right:30px; padding-bottom:15px; padding-left:30px;">
                                            <a href="$link" target="_blank" style="color:#FFFFFF; text-decoration:none;">View Application</a>
                                        </td>
                                    </tr>
                                </table>
                                  
                           
                                   <table border="0" cellpadding="0" cellspacing="0" width="600" style="text-align:center; background-color:#FFFFFF; margin-bottom:20px;">
                                    <tr>
                                      <td>
                                        <p style="margin:0; font-family:Arial, sans-serif; color:#606060; line-height:150%; font-size:16px;">Result will send in this email after the evaluation</br>
                                            Thank you and God Bless!!!</p>
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
        $sender->send( $reciever,'Lani Scholar Application',$message);

                //for redirecting to create page
        return Redirect::route('application.create');

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
