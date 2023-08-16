
@extends('layouts.base')
@section('body')
{{-- @include('layouts.nav') --}}
@include('designs.newcss')
<body>

@php

 $scholarId = $get_data1['scholarInfo']['scholarId'];
 $folder = "scholarId-".$scholarId;
@endphp

    <main>
        <section>
            <h1 class="text-center" data-aos="fade-down" style="color: rgb(255,255,255);background-color: #807d7d;font-size: 40px;box-shadow: 0px 0px;border-color: rgb(255,255,255);border-radius: 0px;"><br><strong>RENEW APPLICANTS</strong><br><br></h1>
        </section>
    </main>


 @if(count($errors) > 0) 
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 90%; margin: auto; margin-bottom: 30px">
  <strong><h3>Invalid input encountered !!!</h3></strong> 
  @foreach($errors->all() as $error)
  <li>{{ $error }}</li>
  @endforeach
</div>
@endif 

@if($message = Session::get('success'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{ $message }} <i class="fas fa-check-circle"></i></strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

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
  <p class="mb-0"><i></i></p>
</div>
    <form data-aos="slide-up">
        <div class="form-group">
            <section>
                <div class="container">
                    <div class="col text-center" style="box-shadow: 0px 0px 20px;"><h1 style="font-size: 30px;"><br />OFFICE OF THE MAYOR<br />Taguig City, Philippines</h1>


                        <div>
                            <h1 style="font-size: 30px;"><br>LIFELINE ASSISTANCE FOR NEIGHBORS IN-NEED<br>(L.A.N.I.) SCHOLARSHIP APPLICATION FORM<br>For NEW Applicants<br><br></h1>
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
                            <picture>
                                <a target="_blank" href="{{asset("images/$folder/idPicture/$ID")}}">
                                <img src="{{asset("images/$folder/idPicture/$ID")}}" width="100px" height="100px" style="width: 200px;height: 200px;" alt="no Image"></picture>
                            </a>
                            
                            @endif
                            @endforeach
                                </div>
                            </div>
                           {{--  start --}}
                         
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
                $diplomas = exploder($applications->applicationDiploma);
                $goodMoral = exploder($applications->applicationGoodMoral);
                $schoolId = exploder($applications->applicationSchoolId);
                $certExe = exploder($applications->applicationAcademicExcellence);
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
                                                <td class="text-left"><strong>3. Junior &amp; Senior High School Report Card/Diploma/</strong>&nbsp;Other valid proof of having Graduated from High School<br></td>
                                                <td class="text-center">
                                @foreach($diplomas as $diploma)
                                @if($diploma != "")
                                    <picture>
                                        <a target="_blank" href="{{asset("images/$folder/applicationDiploma/$diploma")}}">
                                        <img src="{{asset("images/$folder/applicationDiploma/$diploma")}}" style="height: 150px;">
                                     </a>  
                                    </picture>
                                    <br>
                                @endif
                                @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>4.Certificate of Good Moral Character&nbsp;</strong>(Issued within the school year)<br></td>
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
                                                <td class="text-left"><strong>5. School ID</strong>&nbsp;(back to back in a single page)<br></td>
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
                                                <td class="text-left"><strong>6. Certificate of Academic Excellence for Top 10 graduates</strong><br><strong>of Taguig public high school</strong>&nbsp;(for Honors/Full scholar applicants)<br></td>
                                                <td class="text-center">
                            @foreach($certExe as $cE)
                            @if($cE != "")
                                    <picture>
                                     <a target="_blank" href="{{asset("images/$folder/applicationAcademicExcellence/$cE")}}">
                                        <img src="{{asset("images/$folder/applicationAcademicExcellence/$cE")}}" style="height: 150px;">
                                     </a>  
                                    </picture>
                                    <br>
                            @endif
                            @endforeach
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>7. Voter’s Certification</strong>&nbsp;issued by COMELEC, showing that<strong>&nbsp;at least one of the parents</strong>&nbsp;of the applicant is a registered voter (Issued after the May 13, 2019 election)<br></td>
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
                                                <td class="text-left"><strong>8. Voter's Certification of the applicant if 18 years old and above</strong><br>(Issued after the May 13,2019 election)<br></td>
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
                                                <td class="text-left"><strong>9.&nbsp;Birth Certificate</strong><br></td>
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
                                                <td class="text-left"><strong>10.&nbsp;Other necessary documents&nbsp;</strong>to facilitate the processing of your scholarship application (Transcript or True Copy of Grades since start of college for New Applicants who are continuing students, F137, Course Curriculum,&nbsp;<strong>PDAO Endorsement and ID</strong>&nbsp;(for PWD Applicants), etc.&nbsp;<strong>(Compile all other necessary documents in one PDF file)</strong><br></td>
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
                            </div>
                {{-- end --}}
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
                           
                            
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </form>
    
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 style="text-align: center;color: rgb(199,20,14);">Scholar's Evaluation</h1>
                <div class="row">
                    <div class="col">
                        <p style="font-size: 20 px;">- Click the&nbsp;<strong>ACCEPTED </strong>button if the scholar are eligible to the scholarship program.<br>- Click the&nbsp;<strong>RESOLVE</strong>&nbsp;button if the scholar's application form are incomplete or has inaccurate information/s.<br>- Click the&nbsp;<strong>REJECTED </strong>button if the scholar/student are not eligible to the scholarship.<br></p>
                    </div>
                </div>
                <form action="{{ route('entry.update',$entry->entriesId) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="row text-center">
                    <div class="col-xl-12 text-center">
                        <div class="text-secondary btn-group btn-group-toggle" data-toggle="buttons">

                        <label class="btn btn-outline-success" style="font-size: 30px;">ACCEPTED<input type="radio" id="btnradio1" name="entriesStatus" value="accepted" <?php if(old('entriesStatus') == 'accepted') {echo 'checked="checked"';} ?>></label>


                        <label class="btn btn-outline-primary" style="font-size: 30px;">RESOLVE<input type="radio" id="btnradio-2" name="entriesStatus" value="resolve" <?php if(old('entriesStatus') == 'resolve') {echo 'checked="checked"';} ?>></label>


                        <label class="btn btn-outline-dark" style="font-size: 30px;">REJECTED<input type="radio" id="btnradio-3" name="entriesStatus" value="rejected"  <?php if(old('entriesStatus') == 'rejected') {echo 'checked="checked"';} ?>></label>
                        
                    </div>
                     @if($errors->has('entriesStatus'))
                                        <small style="color: red"><i>*{{ $errors->first('entriesStatus') }}</i></small>
                                    @endif  
                    </div>
                    </div>

                <div class="row" style="margin-top: 25px;">
                    <div class="col-xl-5">
                        <p><br>If <strong>RESOLVE</strong>&nbsp;or <strong>REJECTED,&nbsp;</strong>please state the reason/s:</p>
                    </div>
                    <div class="col"><textarea class="form-control-lg" name="entriesComment"  >{{ old('entriesComment') }}</textarea>
                           @if($errors->has('entriesComment'))
                                        <small style="color: red"><i>*{{ $errors->first('entriesComment') }}</i></small>
                           @endif  
                    </div>

                </div>
 <div class="row" style="margin-top: 25px;">
                    <div class="col-xl-5">
                        <p><br>If <strong>ACCEPTED</strong> please specify the distribution date of allowance:</p>
                    </div>
<div class="form-group row" style="position: relative; top: 20px; ">
  <label for="example-date-input" class="col-2 col-form-label"></label>
  <div class="col-10">
    <input class="form-control" type="date" name="transactionDateRecieving"  id="example-date-input" style="border: 1px solid black" min="{{ date('Y-m-d') }}"
    value="<?php if (count($errors)>0){
                 echo old('transactionDateRecieving');
                }
                else{ 
                echo @$transaction->transactionDateRecieving;
                }?>">
    @if($errors->has('transactionDateRecieving'))
        <small style="color: red"><i>*{{ $errors->first('transactionDateRecieving') }}</i></small>
    @endif 
  </div>
    </div>
                </div>

                <div class="row" style="margin-bottom: 50px;">
                    <div class="col" style="margin-top: 10px;">
                        <p style="text-align: center;">If <strong>ACCEPTED,&nbsp;</strong>the scholar will receive an email about the evaluation</p>
                        <div class="row">
                            <div class="col text-center"><button class="btn btn-danger btn-lg" type="submit" onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();">FINISH EVALUATION</button></div>
                        </div>
                    </div>
                </div>
               
                <input type="hidden" name="scholarEmail" value="{{ $get_data1['scholarInfo']['scholarEmail'] }}">
                <input type="hidden" name="applicationId" value="{{ $applications->applicationId }}">
                <input type="hidden" name="submissionBatch" value="{{ $entry->submissionBatch }}">
                <input type="hidden" name="submissionSem" value="{{ $entry->submissionSem }}">
                <input type="hidden" name="submissionYear" value="{{ $entry->submissionYear }}">
                <input type="hidden" name="username" value="{{ $scholar[0]['username'] }}">
                <input type="hidden" name="scholarId" value="{{ $scholar[0]['scholarId'] }}">
                <input type="hidden" name="applicationScholarStatus" value="{{  $applications->applicationScholarStatus }}">
            </form>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>
@stop