<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use App\Models\Submission;
use App\Models\Admin;
use App\Models\Application;
use Redirect;
use DB;
use Session;
class SubmissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
        $sort1 = 'submissionId';
        $sort2 = 'ASC';

        // for sorting the submissions
        if($request->sort1 || $request->sort1)
        {
            $sort1 = $request->sort1;
            $sort2 = $request->sort2;
        }
        $submissions = Submission::select('*')->orderBy($sort1, $sort2)->get()->toArray();

        // for collecting the amount of applications
       if(!empty($submissions))
    {
        foreach ($submissions as $submission) {
            $applications = Application::join('entries','entries.applicationId', 'applications.applicationId')->join('submissions', 'submissions.submissionId', 'entries.submissionId')->where('submissions.submissionId', '=', $submission['submissionId'])->select('*')->orderBy('submissions.'.$sort1, $sort2)->get()->toArray();
            
            $applicationCount[$submission['submissionId']] = (@count($applications));
        }
    }
    else
    {
        $applicationCount = 0;
    }

        $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);
        
        return view('lani.appstatus', compact('submissions', 'sort1', 'sort2', 'applicationCount', 'get_data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $adminId = session('UserId');

        // for verifying if there is an open submission
        $openSubmission = Submission::select('*')->where('submissionStatus', '=', 'open')->count();

         $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);

        if($openSubmission > 0) {
            return back()->with('fail', 'There is Open submission, you need to close it before creating new submission');
        }
        else {
            return view('lani.createsubmission', compact('adminId', 'get_data'));
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
        // for inserting records of submissions table
        $submission = new Submission;

        $submission->submissionBatch = $request['submissionBatch'];
        $submission->submissionSem = $request['submissionSem'];
        $submission->submissionYear = $request['submissionYear'];
        $submission->submissionStart = $request['submissionStart'];
        $submission->submissionEnd = $request['submissionEnd'];
        $submission->submissionDesc = $request['submissionDesc'];
        $submission->submissionStatus = 'close';
        $submission->adminId = $request['adminId'];
            
        $save = $submission->save();

        return Redirect::route('submission.index')->with('success', 'Submission is created successfully');
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
        $submission = Submission::select('*')->where('submissionId', '=', $id)->get()->toArray();

        $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);



        return view('lani.editsubmission', compact('submission', 'get_data'));
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
        // for updating a record of submissions table
        

        if ($request->submissionStatus == "close") {
           $endDate = date ('Y-m-d',strtotime ("-1 days"));
           $status = "close";
        }else
        {
            $endDate = $request->submissionEnd;
             $status = "open";
        }



        DB::table('submissions')
            ->where('submissionId', '=', $id)
            ->update(['submissionBatch' => $request->submissionBatch,
                'submissionSem' => $request->submissionSem,
                'submissionYear' => $request->submissionYear,
                'submissionEnd' => $endDate,
                'submissionDesc' => $request->submissionDesc,
                'submissionStatus' =>$status,
                'adminId' => $request->adminId,]);

        return Redirect::route('submission.index')->with('success', 'Submission is updated successfully');
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
