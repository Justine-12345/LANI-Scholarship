
@extends('layouts.base')

@include('designs.renewviewcss')

@include('layouts.nav')

@section('body')

@php
 $scholarId = $get_data['scholarInfo']['scholarId'];
 $folder = "scholarId-".$scholarId;
@endphp
<body>
@if($entry->entriesStatus == "resolve")
<p style="width: 500px; margin: auto;text-align: center; margin-top: 100px"><b style="color: red; font-size: 30px">Admin encountered problem in your application <b><i class="fas fa-exclamation-circle" style="font-size: 30px"></i>

<br>
<small>Click the button below to resolve the problem. Try resolve the problem immediately.</small>
<br>
<br>
<a class="btn btn-danger
" href="{{ route('application.edit',$entry->applicationId) }}" role="button">Resolve Application</a>
</p>
@else

    <main>
        <section>
            <h1 class="text-center" data-aos="fade-down" style="color: rgb(255,255,255);background-color: #807d7d;font-size: 40px;box-shadow: 0px 0px;border-color: rgb(255,255,255);border-radius: 0px;"><br><strong>RENEWAL APPLICANTS</strong><br><br></h1>
        </section>
    </main>
{{-- {{ dd($entry) }} --}}
<div class="alert alert-warning" role="alert" style="width: 90%; margin: auto;margin-bottom: 30px">
  <h4 class="alert-heading">Submission Information</h4>
  <p>Batch : <b>{{ $entry->submissionBatch }} </b></p>
  <p>Sem :<b>{{ $entry->submissionSem }} </b></p>
  <p>School Year :<b> {{ $entry->submissionYear }}</b></p>
   @php 
   $date=date_create($applications->applicationSubmitDate);
   @endphp               
  <p>Submitted Dated: <b>{{ date_format( $date, "M. d, Y") }}</b></p>
  <p>Status: <b>{{ ucwords($entry->entriesStatus) }}</b></p>


  <hr>
@if($entry->entriesStatus == "rejected")
  <b style="color: red">
  Admin Statement: {{ $entry->entriesComment }}</b>
@endif


  <p class="mb-0"><i></i></p>
</div>
    <form data-aos="slide-up">
        <div class="form-group">
            <section>
                <div class="container">
                    <div class="col text-center" style="box-shadow: 0px 0px 20px;"><h1 style="font-size: 30px;"><br />OFFICE OF THE MAYOR<br />Taguig City, Philippines</h1>


                        <div>
                            <h1 style="font-size: 30px;"><br>LIFELINE ASSISTANCE FOR NEIGHBORS IN-NEED<br>(L.A.N.I.) SCHOLARSHIP APPLICATION FORM<br>For RENEWAL Applicants<br><br></h1>
                        </div>
                        <div>
                            <p class="text-left"><strong>Recent 2 x 2 ID&nbsp;Picture</strong><br></p>
                            <div class="form-row">
                                <div class="col text-left">


                            @php
                            function exploder($imgString)
                            {
                                $string = $imgString;
                                
                                $exploded = explode("|", $string);
                                return $exploded;
                            }
                                
                            $IDs = exploder($applications->applicationIdPicture);
                            @endphp
                                


                           @foreach($IDs as $ID) 
                           @if($ID != "")
                            <picture> <a target="_blank" href="{{asset("images/$folder/idPicture/$ID")}}">
                                <img src="{{asset("images/$folder/idPicture/$ID")}}" width="100px" height="100px" style="width: 200px;height: 200px;" alt="no Image"></picture>
                            </a></picture>
                            @endif
                            @endforeach


                                </div>
                            </div>
                            {{-- start --}}
                            <div class="form-row">
                                <div class="col-xl-2">
                                    <h1 class="text-left" style="font-size: 16px;"><strong>Scholarship Type :</strong></h1>
                                </div>
                                <div class="col text-left">
                                    <p>{{ $applications->applicationScholarType }}</p>
                                </div>
                            </div>
                            <div class="form-row" style="margin-top: 20px;">
                                <div class="col">
                                    <div></div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="form-row">
                                <div class="col-xl-2 offset-xl-0">
                                    <p class="text-left"><strong>Course:</strong>&nbsp;</p>
                                </div>
                                <div class="col-xl-10 offset-xl-0 text-left">
                                    <p>{{ $applications->courseName }}</p>
                                </div>
                            </div>
                            <div class="form-row text-left">
                                <div class="col-xl-2 offset-xl-0 text-left">
                                    <p><strong>Ladderized?&nbsp;</strong></p>
                                </div>
                                <div class="col-xl-2 offset-xl-0">
                                    <p>{{ $applications->courseLadderized }}</p>
                                </div>
                                <div class="col-xl-1 offset-xl-0">
                                    <p class="text-left"><strong>GWA:&nbsp;</strong></p>
                                </div>
                                <div class="col-xl-3">
                                    <p>{{ $applications->courseGwa }}</p>
                                </div>
                                <div class="col-xl-1">
                                    <p class="text-left"><strong>Year Level:</strong></p>
                                </div>
                                <div class="col-xl-3">
                                    <p>{{ $applications->courseYearLevel }}</p>
                                </div>
                            </div>
                            <div class="form-row text-left">
                                <div class="col-xl-2 offset-xl-0 text-left">
                                    <p><strong>No. of units enrolled:&nbsp;&nbsp;</strong></p>
                                </div>
                                <div class="col-xl-2">
                                    <p>{{ $applications->courseUnitsEnrolled }}</p>
                                </div>
                                <div class="col-xl-2">
                                    <p class="text-left"><strong>Course Duration:&nbsp;</strong></p>
                                </div>
                                <div class="col">
                                    <p>{{ $applications->courseDuration }}</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-xl-2">
                                    <p class="text-left"><strong>Name of the School:&nbsp;</strong></p>
                                </div>
                                <div class="col">
                                    <p style="text-align: left;">{{ $applications->schoolName }}</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-xl-2">
                                    <p class="text-left"><strong>School Address:&nbsp;</strong></p>
                                </div>
                                <div class="col" style="text-align: left;">
                                    <p>{{ $applications->schoolAddress }}</p>
                                </div>
                            </div>
                            <div class="form-row text-left">
                                <div class="col-xl-2 offset-xl-0 text-left">
                                    <p><strong>Graduating this term?&nbsp;</strong></p>
                                </div>
                                <div class="col-xl-2">
                                    <p>{{ $applications->courseGraduating }}</p>
                                </div>
                                <div class="col-xl-4 offset-xl-0">
                                    <p class="text-left"><strong>If yes, are you graduating with honors?:&nbsp;</strong></p>
                                </div>
                                <div class="col">
                                    <p>{{ $applications->courseGraduatingHonor }}</p>
                                </div>
                            </div>
                            <div class="form-row" style="height: 40px;">
                                <div class="col-xl-8 offset-xl-0" style="height: 40px;">
                                    <p class="text-left" style="height: 40px;"><strong>If no, how many semesters more to go before you graduate, including the current sem/term?</strong><br><br></p>
                                </div>
                                <div class="col">
                                    <div></div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p class="text-left">{{ $applications->courseNeededSemester }}</p>
                                </div>
                            </div>
                            <div class="form-row text-left">
                                <div class="col-xl-2 offset-xl-0 text-left">
                                    <p><strong>Others:&nbsp;</strong></p>
                                </div>
                                <div class="col">
                                    <p>{{ $applications->courseOthers }}</p>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-xl-3" style="width: 250px;height: 40px;">
                                    <p class="text-left"><strong>Transferee(Previous School):</strong></p>
                                </div>
                                <div class="col-xl-3">
                                    <p class="text-left">{{ $applications->courseTransferee }}</p>
                                </div>
                                <div class="col-xl-3 offset-xl-0" style="width: 250px;">
                                    <p class="text-left" style="width: 250px;"><strong>Shiftee(Previous Course):</strong></p>
                                </div>
                                <div class="col-xl-3 offset-xl-0">
                                    <p class="text-left">{{ $applications->courseShiftee }}</p>
                                </div>
                            </div>
                        </div>
                        {{-- end --}}
                        {{-- start --}}
                             <div>
                                <h1 style="color: rgb(199,20,14);margin-top: 10px;">Required Documents</h1>
                @php
                $enrollForms = exploder($applications->applicationEnrollmentForm);
                $authGrades = exploder($applications->applicationReportCard);
                $goodMoral = exploder($applications->applicationGoodMoral);
                $schoolId = exploder($applications->applicationSchoolId);
                $votersP = exploder($applications->applicationVotersCertificateP);
                $voters = exploder($applications->applicationVotersCertificate);
                $birthCert = exploder($applications->applicationBirthCertificate);
                $otherDocs = exploder($applications->applicationOtherDocs);
                $scholarSig = exploder($applications->scholarSignature);
                $parentSig = exploder($applications->guardianSignature);
            
                @endphp
                            </div>
                            <div style="margin-top: 30px;">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr></tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-left"><strong>1. Enrolment Form&nbsp;</strong>for Current Semester/Term with Official Receipt, if applicable<br></td>
                                                <td class="text-center" style="width: 461px;">
                                @foreach($enrollForms as $enrollForm)
                                @if($enrollForm != "")
                                    <picture>
                                    <a target="_blank" href="{{asset("images/$folder/applicationEnrollmentForm/$enrollForm")}}">
                                     <img src="{{asset("images/$folder/applicationEnrollmentForm/$enrollForm")}}" style="height: 150px;">

                                     </a>  
                                    </picture>
                                    <br>
                                @endif
                                @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>2.Authenticated or True Copy of Grades</strong>&nbsp;last semester, with school seal/official signature (for trimester, grades for the past 2 terms)<br></td>
                                                <td class="text-center">
                                @foreach($authGrades as $authGrade)
                                @if($authGrade != "")
                                    <picture>
                                    <a target="_blank" href="{{asset("images/$folder/applicationReportCard/$authGrade")}}">
                                     <img src="{{asset("images/$folder/applicationReportCard/$authGrade")}}" style="height: 150px;">

                                     </a>  
                                    </picture>
                                    <br>
                                @endif
                                @endforeach
                                                </td>
                                            </tr>
                        
                                            <tr>
                                                <td class="text-left"><strong>3.Certificate of Good Moral Character&nbsp;</strong>(Issued within the school year)<br></td>
                                                <td class="text-center">
                            @foreach($goodMoral as $gM)
                            @if($gM != "")
                                    <picture>
                                     <a target="_blank" href="{{asset("images/$folder/applicationGoodMoral/$gM")}}">
                                        <img src="{{asset("images/$folder/applicationGoodMoral/$gM")}}" style="height: 150px;">
                                     </a>  
                                    </picture>
                                    <br>
                            @endif
                            @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>4. School ID</strong>&nbsp;(back to back in a single page)<br></td>
                                                <td class="text-center">
                            @foreach($schoolId as $sI)
                            @if($sI != "")
                                    <picture>
                                     <a target="_blank" href="{{asset("images/$folder/applicationSchoolId/$sI")}}">
                                        <img src="{{asset("images/$folder/applicationSchoolId/$sI")}}" style="height: 150px;">
                                     </a>  
                                    </picture>
                                    <br>
                            @endif
                            @endforeach
                                                </td>
                                            </tr>
                            
                                            <tr>
                                                <td class="text-left"><strong>5. Voter’s Certification</strong>&nbsp;issued by COMELEC, showing that<strong>&nbsp;at least one of the parents</strong>&nbsp;of the applicant is a registered voter (Issued after the May 13, 2019 election)<br></td>
                                                <td class="text-center">
                            @foreach($votersP as $vP)
                            @if($vP != "")
                                    <picture>
                                     <a target="_blank" href="{{asset("images/$folder/applicationVotersCertificateP/$vP")}}">
                                        <img src="{{asset("images/$folder/applicationVotersCertificateP/$vP")}}" style="height: 150px;">
                                     </a>  
                                    </picture>
                                    <br>
                            @endif
                            @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>6. Voter's Certification of the applicant if 18 years old and above</strong><br>(Issued after the May 13,2019 election)<br></td>
                                                <td class="text-center">
                            @foreach($voters as $vS)
                            @if($vS != "")
                                    <picture>
                                     <a target="_blank" href="{{asset("images/$folder/applicationVotersCertificate/$vS")}}">
                                        <img src="{{asset("images/$folder/applicationVotersCertificate/$vS")}}" style="height: 150px;">
                                     </a>  
                                    </picture>
                                    <br>
                            @endif
                            @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>7.&nbsp;Birth Certificate</strong><br></td>
                                                <td class="text-center">
                            @foreach($birthCert as $bC)
                            @if($bC != "")
                                    <picture>
                                     <a target="_blank" href="{{asset("images/$folder/applicationVotersCertificate/$bC")}}">
                                        <img src="{{asset("images/$folder/applicationBirthCertificate/$bC")}}" style="height: 150px;">
                                     </a>  
                                    </picture>
                                    <br>
                            @endif
                            @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>8.&nbsp;Other necessary documents&nbsp;</strong>to facilitate the processing of your scholarship application (Transcript or True Copy of Grades since start of college for New Applicants who are continuing students, F137, Course Curriculum,&nbsp;<strong>PDAO Endorsement and ID</strong>&nbsp;(for PWD Applicants), etc.&nbsp;<strong>(Compile all other necessary documents in one PDF file)</strong><br></td>
                                                <td class="text-center">
                            @foreach($otherDocs as $oD)
                            @if($oD != "")
                                    <picture>
                                     <a target="_blank" href="{{asset("images/$folder/applicationOtherDocs/$oD")}}">
                                        <img src="{{asset("images/$folder/applicationOtherDocs/$oD")}}" style="height: 150px;">
                                     </a>  
                                    </picture>
                                    <br>
                            @endif
                            @endforeach
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>                            {{-- end --}}
                            <div>
                                <p class="text-center"><br>I hereby certify that <strong>ALL </strong>the answers given above are <strong>TRUE</strong> and<strong> CORRECT</strong> to the best of my knowledge, and the<br>attached documents are <strong>FAITHFUL REPRODUCTION </strong>of the original copies. I further acknowledge that <strong>ANY ACT OF</strong><br><strong>DISHONESTY OR FALSIFICATION MAY BE A GROUND FOR MY DISQUALIFICATION</strong> from this scholarship program.<br><br>I also understand that this submission of application does <strong>NOT</strong> automatically qualify me for the scholarship grant and<br>that I will abide by the decision of the L.A.N.I. Scholarship Management.<br><br>Thank you so much.<br><br></p>
                            </div>
                            {{-- start --}}
                              <div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr></tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-center" style="width: 545.2px;height: 100px;">
                            @foreach($scholarSig as $sS)
                            @if($sS != "")
                                    <picture>
                                     <a target="_blank" href="{{asset("images/$folder/scholarSignature/$sS")}}">
                                        <img src="{{asset("images/$folder/scholarSignature/$sS")}}" style="height: 150px;">
                                     </a>  
                                    </picture>
                                    <br>
                            @endif
                            @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">
                                                            <p>{{ $applications->applicationApplicant }}</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>{{ $applications->signatureDate }}</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center" style="height: 40.2px;"><strong>&nbsp;Printed Name &amp; Signature of Applicant</strong><br></td>
                                                        <td class="text-center"><strong>Date</strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-left" style="height: 40.2px;"><strong>Attested by:</strong><br></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center" style="width: 545.2px;height: 100.px;">
                            @foreach($parentSig as $pS)
                            @if($pS != "")
                                    <picture>
                                     <a target="_blank" href="{{asset("images/$folder/guardianSignature/$pS")}}">
                                        <img src="{{asset("images/$folder/guardianSignature/$pS")}}" style="height: 150px;">
                                     </a>  
                                    </picture>
                                    <br>
                            @endif
                            @endforeach
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center">
                                                            <p>{{ $applications->applicationApplicantParent }}</p>
                                                        </td>
                                                        <td class="text-center">
                                                            <p>{{ $applications->signatureDateParent }}</p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-center" style="height: 40.2px;"><strong>&nbsp;Printed Name &amp; Signature of Parent/Guardian</strong><br></td>
                                                        <td class="text-center"><strong>Date</strong></td>
                                                    </tr>      <td style="height: 62px;" id="transMode">

                                                   <b>Preferred mode of receiving allowance</b>
                                                    <div>
                                @if($applications->transactionGcashNum != "")
                                                GCash
                                                 <br>
                                                 <small> </small>
                                @else
                                               Cash
                              @endif

                                                    </div>

                         @if($errors->has('transMode'))
                    <small><i>*{{ $errors->first('transMode') }}</i></small>
                                                        @endif

                                                </td>
                                                <tr>
                                     @if($applications->transactionGcashNum != "")
                                                <td>
                                                     <b> Gcash Number </b>

                                                   <div>{{ $applications->transactionGcashNum }}</div>
                                                   <br>

                                                    <b> Gcash Name </b>

                                                   <div>{{ $applications->transactionGcashName }}</div>

                                                </td>
                                         @endif
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- end --}}
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </form>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    @endif
</body>
@stop