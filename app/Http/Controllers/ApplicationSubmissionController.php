<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;
use App\Models\Application;
use App\Models\School;
use App\Models\Signature;
use App\Models\Course;
use App\Models\Transaction;
use App\Models\Entry;




class ApplicationSubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dito malalaman kung meron ng application
        //check the number of edit
        //scholarID
        //dito malalaman kung open yung submission
        //....
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
  // return back()->with('Success!','Data Added!');
public function store(Request $request)
    {
        $req = $request->all();

     
//Function for uploading file in public/images/...
function laniFileUpload(Request $request, $fileAttribute)
        {
            
            $req = $request->all();

            $i = 0;
            $filepath = '';

            if ($request->hasfile($fileAttribute)) {
                foreach ($request->file($fileAttribute) as $file) {

                    $extension = $file->getClientOriginalExtension();
                    $name = 'batch-'.$req['batch'].'sem-'.$req['sem'].'_year-'.$req['year']."".$i.'.'.$extension;

                    $file->move(public_path() . '/images/'.'scholarId-'.$req['scholarId'].'/'.$fileAttribute.'/', $name);
                    $data[] = $name;

                    $filepath .= $name . '|';
                    $i++;
                }
            }
            $i = 0;

            return $filepath;
        }

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
      
        $application->applicationIdPicture =  $idPicture  ;



        //for Scholar Type
        $application->applicationScholarType = $req['scholarType'];


        //for uploading Enrollment form
      
        $application->applicationEnrollmentForm =   $enrollmentForm ;

        //for uploading  Report Card
     
        $application->applicationReportCard =  $reportCard ;


        //for uploading Diploma
       
        $application->applicationDiploma = $diploma;


        //for uploading GoodMoral
     
        $application->applicationGoodMoral = $goodMoral ;


        //for uploading SchoolId
       
        $application->applicationSchoolId = $schoolId ;

        //for uploading Academic Exellence
      
        $application->applicationAcademicExcellence = $acadExe ;

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

        //for saving all records in database
        $application->save();

      




//inserting Data In Signature Table
       $signature = new Signature;

        $scholarSignature = laniFileUpload($request, 'scholarSignature');
        $signature->scholarSignature = $scholarSignature;

        $guardianSignature = laniFileUpload($request, 'guardianSignature');
        $signature->guardianSignature = $guardianSignature;

        $signature->signatureDate = $req['signatureDate'];

        $signature->signatureDateParent = $req['signatureDateParent'];

        $signature->applicationId =  $application->id;

        //for saving all records in database
        $signature->save();

//inserting Data In schools Table
       $school = new School;

       $school->schoolName = $req['schoolName']; 
       $school->schoolAddress = $req['schoolAddress'];
       $school->applicationId = $application->id;
       $school->save();

//inserting Data In courses Table
       $course = new Course;

       $course->courseName = $req['courseName'];
       $course->courseLadderized = $req['courseLadderized'];

       $course->courseGwa = $req['courseGwa'] ;
       $course->courseYearLevel = $req['courseYearLevel'];
       $course->courseUnitsEnrolled = $req['courseUnitsEnrolled'] ;
       $course->courseDuration = $req['courseDuration'] ;
       $course->courseGraduating =  $req['courseGraduating'];
       $course->courseGraduatingHonor = $req['courseGraduatingHonor'] ;
       $course->courseNeededSemester = $req['courseNeededSemester'] ;
       $course->courseOthers = $req['courseOthers'] ;
       $course->courseTransferee = $req['courseTransferee'] ;
       $course->courseShiftee = $req['courseShiftee'] ;
       $course->applicationId = $application->id ;
       $course->save();


$submissionIdQuery = DB::table('submissions')
                ->select('submissionId')
                ->where('submissionStatus','=', 'open')
                ->get();
                
        $submissionId = $submissionIdQuery->pluck('submissionId')->all()[0];


// inserting Data In Entries Table
if ($req['applicationNumOfEdit'] > 0) {
   $entryStatus = "Updated";
}else{
      $entryStatus = "On Process";
}


       $entries = new Entry;

       $entries->entriesStatus =  $entryStatus ; 

       $entries->submissionId = $submissionId;
       $entries->applicationId = $application->id;
       $entries->save();




//*****check if there is application Submitted*****
// $openSubmission = DB::table('submissions')
//         ->join('entries', 'submissions.submissionId', '=' ,'entries.submissionId')
//         ->leftJoin('applications','applications.applicationId','=', 'entries.applicationId')
//         ->join('scholars','scholars.scholarId', '=', 'applications.scholarid')
//         ->select('entries.*')
//         ->where('submissionStatus', '=', 'open')
//         ->get();

// if (isset($openSubmission)) {
//     echo "notSet";
// }
// else{
//     echo "Set Already";
// }

       


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
}
