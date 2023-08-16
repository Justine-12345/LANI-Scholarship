<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\Scholar;
use App\Models\Entry;
use App\Models\Admin;
use App\Models\Application;
use App\Models\Transaction;
use DB;
use Session;

class AdminPanelController extends Controller
{

    public function scholarStatus(Request $request, $type)
    {
       //dd($request);
        $sort1 = 'applicationId';
        $sort2 = 'ASC';
        // dd($request);
    

        if($request->sort1 || $request->sort1)
        {
            $sort1 = $request->sort1;
            $sort2 = $request->sort2;
        }

        if ($type == 'all') {
           $scholars = DB::table('scholars')
            ->join('applications', 'applications.scholarId', 'scholars.scholarId')
            ->leftJoin('transactions','transactions.applicationId','applications.applicationId')
            ->join('entries', 'entries.applicationId', 'applications.applicationId')
            ->select('scholars.scholarId', 'scholarLastName', 'scholarFirstName', 'applicationSubmitDate', 'scholarBarangay', 'entriesStatus','entriesId', 'entries.applicationId', 'transactions.transactionAmount')
             ->where('submissionId','=',$request->submissionId)
            ->orderBy($sort1, $sort2)->get()->toArray();
        }
        elseif($type == 'SUCLCU'){
             $scholars = DB::table('scholars')
            ->join('applications', 'applications.scholarId', 'scholars.scholarId')
            ->leftJoin('transactions','transactions.applicationId','applications.applicationId')
            ->join('entries', 'entries.applicationId', 'applications.applicationId')
            ->select('scholars.scholarId', 'scholarLastName', 'scholarFirstName', 'applicationSubmitDate', 'scholarBarangay', 'entriesStatus', 'entriesId', 'entries.applicationId', 'transactions.transactionAmount' )
            ->where('applicationScholarType','=', 'SUC/LCU')
             ->where('submissionId','=',$request->submissionId)
            ->orderBy($sort1, $sort2)->get()->toArray();
        }
         elseif($type == 'Honors'){
             $scholars = DB::table('scholars')
            ->join('applications', 'applications.scholarId', 'scholars.scholarId')
            ->leftJoin('transactions','transactions.applicationId','applications.applicationId')
            ->join('entries', 'entries.applicationId', 'applications.applicationId')
            ->select('scholars.scholarId', 'scholarLastName', 'scholarFirstName', 'applicationSubmitDate', 'scholarBarangay', 'entriesStatus', 'entriesId', 'entries.applicationId', 'transactions.transactionAmount' )
            ->where('applicationScholarType','=', 'Honors')
             ->where('submissionId','=',$request->submissionId)
            ->orderBy($sort1, $sort2)->get()->toArray();
        }
        elseif($type == 'Premier'){
             $scholars = DB::table('scholars')
            ->join('applications', 'applications.scholarId', 'scholars.scholarId')
            ->leftJoin('transactions','transactions.applicationId','applications.applicationId')
            ->join('entries', 'entries.applicationId', 'applications.applicationId')
            ->select('scholars.scholarId', 'scholarLastName', 'scholarFirstName', 'applicationSubmitDate', 'scholarBarangay', 'entriesStatus', 'entriesId', 'entries.applicationId', 'transactions.transactionAmount' )
            ->where('applicationScholarType','=', 'Premier')
             ->where('submissionId','=',$request->submissionId)
            ->orderBy($sort1, $sort2)->get()->toArray();
        }
        elseif($type == 'Priority'){
             $scholars = DB::table('scholars')
            ->join('applications', 'applications.scholarId', 'scholars.scholarId')
            ->leftJoin('transactions','transactions.applicationId','applications.applicationId')
            ->join('entries', 'entries.applicationId', 'applications.applicationId')
            ->select('scholars.scholarId', 'scholarLastName', 'scholarFirstName', 'applicationSubmitDate', 'scholarBarangay', 'entriesStatus', 'entriesId', 'entries.applicationId', 'transactions.transactionAmount' )
            ->where('applicationScholarType','=', 'Priority')
             ->where('submissionId','=',$request->submissionId)
            ->orderBy($sort1, $sort2)->get()->toArray();
        }
         elseif($type == 'Basic'){
             $scholars = DB::table('scholars')
            ->join('applications', 'applications.scholarId', 'scholars.scholarId')
            ->leftJoin('transactions','transactions.applicationId','applications.applicationId')
            ->join('entries', 'entries.applicationId', 'applications.applicationId')
            ->select('scholars.scholarId', 'scholarLastName', 'scholarFirstName', 'applicationSubmitDate', 'scholarBarangay', 'entriesStatus', 'entriesId', 'entries.applicationId', 'transactions.transactionAmount' )
            ->where('applicationScholarType','=', 'Basic')
             ->where('submissionId','=',$request->submissionId)
            ->orderBy($sort1, $sort2)->get()->toArray();
        }
        elseif($type == 'Basic Plus'){
             $scholars = DB::table('scholars')
            ->join('applications', 'applications.scholarId', 'scholars.scholarId')
            ->leftJoin('transactions','transactions.applicationId','applications.applicationId')
            ->leftJoin('entries', 'entries.applicationId', 'applications.applicationId')
            ->select('scholars.scholarId', 'scholarLastName', 'scholarFirstName', 'applicationSubmitDate', 'scholarBarangay', 'entriesStatus', 'entriesId', 'entries.applicationId', 'transactions.transactionAmount' )
            ->where('applicationScholarType','=', 'Basic Plus' )
            ->where('submissionId','=',$request->submissionId)
            // ->where('submissions.submissionId','=',$request->submissionId)
            ->orderBy($sort1, $sort2)->get()->toArray();
        }
        // else{

        // $scholars = DB::table('scholars')
        //     ->join('applications', 'applications.scholarId', 'scholars.scholarId')
        //     ->leftJoin('transactions','transactions.applicationId','applications.applicationId')
        //     ->join('entries', 'entries.applicationId', 'applications.applicationId')
        //     ->select('scholars.scholarId', 'scholarLastName', 'scholarFirstName', 'applicationSubmitDate', 'scholarBarangay', 'entriesStatus', 'entriesId', 'entries.applicationId', 'transactions.transactionAmount')
        //     ->where('applicationScholarType','=',$type)
        //     ->orderBy($sort1, $sort2)->get()->toArray();
        // }
       
        $transactions = DB::table('transactions')->get();
          
         $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);

        return view('lani.scholarstatus', compact('scholars', 'sort1', 'sort2', 'type','get_data', 'transactions'));
    }

    public function noOfApplication(Request $request, $id)
    {
        // $honors = Application::select('*')->where('applicationScholarType', '=', 'Honors')->count();

        $honors = Entry::select('*')
        ->leftJoin('applications','entries.applicationId','applications.applicationId')
        ->leftJoin('submissions','submissions.submissionId','entries.entriesId')
        ->where('applicationScholarType', '=', 'Honors')
       ->where('entries.submissionId','=', $id)->count();
        
        

        $premier = Entry::select('*')
        ->leftJoin('applications','entries.applicationId','applications.applicationId')
        ->leftJoin('submissions','submissions.submissionId','entries.entriesId')
        ->where('applicationScholarType', '=', 'Premier')
       ->where('entries.submissionId','=', $id)->count();



        $priority = Entry::select('*')
        ->leftJoin('applications','entries.applicationId','applications.applicationId')
        ->leftJoin('submissions','submissions.submissionId','entries.entriesId')
        ->where('applicationScholarType', '=', 'Priority')
       ->where('entries.submissionId','=', $id)->count();



        $sucLcu = Entry::select('*')
        ->leftJoin('applications','entries.applicationId','applications.applicationId')
        ->leftJoin('submissions','submissions.submissionId','entries.entriesId')
        ->where('applicationScholarType', '=', 'SUC/LCU')
       ->where('entries.submissionId','=', $id)->count();


        $basic = Entry::select('*')
        ->leftJoin('applications','entries.applicationId','applications.applicationId')
        ->leftJoin('submissions','submissions.submissionId','entries.entriesId')
        ->where('applicationScholarType', '=', 'Basic')
       ->where('entries.submissionId','=', $id)->count();



        $basicPlus = Entry::select('*')
        ->leftJoin('applications','entries.applicationId','applications.applicationId')
        ->leftJoin('submissions','submissions.submissionId','entries.entriesId')
        ->where('applicationScholarType', '=', 'Basic Plus')
       ->where('entries.submissionId','=', $id)->count();
 
       $all = $honors +  $premier + $priority + $sucLcu + $basic + $basicPlus;


        $userData = ['adminInfo' => Admin::where('adminId', '=', session('UserId'))->first()];

        $dataEx = (['adminPassword']);
        $get_data = array_diff($userData, $dataEx);

        $subId = $id;
        return view('lani.noapp', compact('honors', 'premier', 'priority', 'sucLcu', 'basic', 'basicPlus', 'get_data', 'all', 'subId' ));
    }
}
