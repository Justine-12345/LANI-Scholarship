
@extends('layouts.base')
@include('designs.newcss')
@include('layouts.nav')

@section('body')

   
@if(@empty($message['openSubmission']) && @$message['entryStatus'][0]->entriesStatus != "process")

<p>
@include('lani.notyet')
</p>

{{--  if the application is in processing stage this will appear --}}
@elseif(@$message['entryStatus'][0]->entriesStatus == "process")
<p style="width: 500px; margin: auto;text-align: center; margin-top: 100px"><b style="color: green; font-size: 30px">Your Application is on Process <b><i class="fas fa-cogs" style="font-size: 30px"></i>
    <br>
<small>Click the button below to view your current submitted application</small>
<br>
<br>

<a class="btn btn-success
" href="{{ route('application.show',$myEntry[0]->applicationId) }}" role="button">View Application</a>
</p>

{{-- add if renew wait for interview --}}

{{-- if applcation need to resolve --}}
 @elseif(@$message['entryStatus'][0]->entriesStatus == "resolve")
<p style="width: 500px; margin: auto;text-align: center; margin-top: 100px"><b style="color: red; font-size: 30px">Admin encountered problem in your application <b><i class="fas fa-exclamation-circle" style="font-size: 30px"></i>

    <br>
<small>Click the button below to resolve the problem. Try resolve the problem immediately.</small>
<br>
<br>

<a class="btn btn-danger
" href="{{ route('application.edit',$myEntry[0]->applicationId) }}" role="button">Resolve Application</a>
</p>
{{--  if applcation is accepted --}}
 @elseif(@$message['entryStatus'][0]->entriesStatus == "accepted")
<p style="width: 500px; margin: auto;text-align: center; margin-top: 100px"><b style="color: green; font-size: 30px">Congratulation Your Application is Accepted!!! <b><i class="fas fa-check-circle"></i>
    <br>
<small>Wait For Allowance Distribution</small>
<br>
<br>

<a class="btn btn-success
" href="{{ route('application.show',$myEntry[0]->applicationId) }}" role="button">View Application</a>
</p>

 
{{--   if applcation is rejected --}}
 @elseif(@$message['entryStatus'][0]->entriesStatus == "rejected")
 <p style="width: 500px; margin: auto;text-align: center; margin-top: 100px"><b style="color: red; font-size: 30px">Sorry Your Application<br> is Rejected <b><i class="fas fa-times-circle"></i>
    <br>
<small>Click the button below to see your application</small>
<br>
<br>

<a class="btn btn-danger
" href="{{ route('application.show',$myEntry[0]->applicationId) }}" role="button">View Application</a>
</p>



{{--   if applcation is updated --}}
 @elseif(@$message['entryStatus'][0]->entriesStatus == "updated")
 <p style="width: 500px; margin: auto;text-align: center; margin-top: 100px"><b style="color: green; font-size: 30px">Your Application is Updated <b><i class="fas fa-tools" style="font-size: 30px"></i>
    <br>
<small>Click the button below to view your updated application</small>
<br>
<br>

<a class="btn btn-success
" href="{{ route('application.show',$myEntry[0]->applicationId) }}" role="button">View Application</a>
</p>
@else

    @php
        $timeStart = strtotime($message['openSubmission'][0]->submissionStart); 
        $timeEnd = strtotime($message['openSubmission'][0]->submissionEnd);
    @endphp

    <style type="text/css">
        i {
            color: red;
        }
    </style>

    <div style="height: 0;background-color: rgba(128,125,125,0);"></div>
    <main>
        <section>
            <h1 class="text-center" data-aos="fade-down" style="color: rgb(255,255,255);background-color: #807d7d;font-size: 40px;box-shadow: 0px 0px;border-color: rgb(255,255,255);border-radius: 0px;"><br><strong>RENEWAL APPLICANTS</strong><br><br></h1>
            <div></div>
        </section>
    </main>


@if(count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 90%; margin: auto; margin-bottom: 30px">
  <strong><h3>{{ count($errors) }} invalid input encountered !!!</h3></strong> 
    <p>You can click the bold text to find the errors, these are the following errors:</p>
    @if($errors->has('scholarType'))
        <li>No input in <b><a href="#scholarType">Scholar Type</a></b></li>
    @endif

    @if($errors->has('courseGwa'))
        <li>Invalid input in <b> <a href="#gwa">GWA</a></b></li>
    @endif

    @if($errors->has('courseUnitsEnrolled'))
        <li>Invalid input in <b><a href="#courseUnitsEnrolled">No. of Unit Enrolled</a></b></li>
    @endif

    @if($errors->has('courseDuration'))
        <li>No input in <b> <a href="#courseDuration">Course Duration</a></b></li>
    @endif

    @if($errors->has('courseGraduating'))
        <li>No input in <b> <a href="#courseGraduating">Graduating this Term?</a></b></li>
    @endif

    @if($errors->has('courseGraduatingHonor'))
        <li>No input in <b> <a href="#courseGraduatingHonor">Graduating with honor?</a></b></li>
    @endif


    @if($errors->has('courseNeededSemester'))
        <li>Invalid input in <b> <a href="#courseNeededSemester">Remaining Sem Before Graduate</a> </b></li>
    @endif

    @if($errors->has('courseOthers'))
        <li>No input in <b> <a href="#courseOthers">Octoberian/Regular/Irregular</a></b></li>
    @endif


    @if($errors->has('guardianSignature'))
        <li>No input in <b> <a href="#guardianSignature"> Guardian Signature</a></b></li>
    @endif


    @if($errors->has('scholarSignature'))
            <li>No input in <b> <a href="#scholarSignature"> Scholar Signature</a></b></li>
    @endif
        

    @if($errors->has('idPicture'))
            <li>No input in <b> <a href="#twoByTwo"> 2x2 ID Picture</a></b></li>
    @endif


    @if($errors->has('applicationEnrollmentForm') || $errors->has('applicationReportCard') || $errors->has('applicationGoodMoral')|| $errors->has('applicationSchoolId')||$errors->has('applicationVotersCertificateP') || $errors->has('applicationVotersCertificate') || $errors->has('applicationBirthCertificate'))
        <li>One or more has no input in <b><a href="#reqdoc">Required Documents</a></b></li>
    @endif

    @if($errors->has('transMode'))
            <li>No input in <b> <a href="#transMode"> Preferred mode of receiving</a></b></li>
    @endif


    @if($errors->has('transactionGcashNum')||$errors->has('transactionGcashName'))
            <li>Invalid input in <b> <a href="#transMode"> Preferred mode of receiving</a></b></li>
    @endif
    
@if($errors->has('applicationApplicantParent')||$errors->has('signatureDateParent'))
            <li>Invalid input in <b> <a href="#scholarSignature">Parent Signature</a></b></li>
@endif


@if($errors->has('applicationApplicant')||$errors->has('signatureDate'))
            <li>Invalid input in <b> <a href="#scholarSignature">Scholar Signature</a></b></li>
@endif

<br>

  Please review your inputs to fix the problem then click the "Submit Application" button again
 {{--  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
</div>
@else
<p> </p>
@endif


<div class="alert alert-success" role="alert" style="width: 90%; margin: auto;margin-bottom: 30px">
  <h4 class="alert-heading">Submission Is Now Open!</h4>
  <p>Batch : <b>{{ $message['openSubmission'][0]->submissionBatch }}</b></p>
  <p>Sem :<b> {{ $message['openSubmission'][0]->submissionSem }}</b></p>
  <p>School Year :<b> {{ $message['openSubmission'][0]->submissionYear }}</b></p>
  <p>Start:<b> {{ $newformat = date('M-d-Y h:i A',$timeStart) }}</b></p>
   <p>End:<b> {{ $newformat = date('M-d-Y h:i A',$timeEnd) }}</b></p>

  <hr>
  <p class="mb-0"><i>"{{ $message['openSubmission'][0]->submissionDesc }}"</i></p>
</div>



    <form data-aos="slide-up" action="{{ route('application.store') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div class="form-group">
            <section>
                <div class="container">
                    <div class="col text-center" style="box-shadow: 0px 0px 20px;"><h1 style="font-size: 30px; "><br />OFFICE OF THE MAYOR<br />Taguig City, Philippines</h1>


                        <div>
                            <h1 style="font-size: 30px;"><br>LIFELINE ASSISTANCE FOR NEIGHBORS IN-NEED<br>(L.A.N.I.) SCHOLARSHIP APPLICATION FORM<br>For RENEWING Applicants<br><br></h1>
                            <p style="color: rgb(33, 37, 41);font-size: 20px;"><strong>INSTRUCTIONS:</strong><br><strong>1. PRINT all entries. Leave blank the appropriate inputs.</strong><br><strong>2. Be HONEST and ACCURATE with your answers.</strong></p>
                        </div>
                        <div>
                            <p class="text-left" id="twoByTwo"><strong>Upload Recent 2 x 2 ID&nbsp;Picture</strong><br></p>
                            <div class="form-row">
                                <div class="col text-left"><p><input type="file"   accept="image/*" name="idPicture[]" id="file"  onchange="loadFile(event)" style="display: none;" required></p>

<p><img id="output" width="200" class="border border-danger" /></p>
<p><label class="btn btn-outline-secondary" for="file" style="cursor: pointer;">Upload Image</label></p>
@if($errors->has('idPicture'))
    <small><i>*{{ $errors->first('idPicture') }}</i></small>
    @endif
<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script></div>
                            </div>
                            <div class="form-row">
                                <div class="col-xl-2">
                                    <h1 class="text-left" style="font-size: 16px;"><strong>Scholarship Type :</strong></h1>
                                </div>
                                <div class="col text-left">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons" id="scholarType">

                                        <label class="btn btn-outline-secondary">Honors<input type="radio" id="btnradio-11" name="scholarType" value="Honors" <?php if(old('scholarType') == 'Honors') {echo 'checked="checked"';} ?> /></label>

                                        <label class="btn btn-outline-secondary">Premier<input type="radio" id="btnradio-11" name="scholarType" value="Premier" <?php if(old('scholarType') == 'Premier') {echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">Priority<input type="radio" id="btnradio-12" name="scholarType" value="Priority" <?php if(old('scholarType') == 'Priority') {echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">SUC/LCU<input type="radio" id="btnradio-12" name="scholarType" value="SUC/LCU" <?php if(old('scholarType') == 'SUC/LCU') {echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">Basic Plus<input type="radio" id="btnradio-13" name="scholarType" value="Basic Plus" <?php if(old('scholarType') == 'Basic Plus') {echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">Basic<input type="radio" id="btnradio-13" name="scholarType" value="Basic" <?php if(old('scholarType') == 'Basic') {echo 'checked="checked"';} ?> ></label>

                                    </div>
                                    
                                    @if($errors->has('scholarType'))
                                        <small><i>*{{ $errors->first('scholarType') }}</i></small>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-row" style="margin-top: 20px;">
                                <div class="col">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th><strong>SCHOLARSHIP TYPE</strong></th>
                                                    <th><strong>INTENDED BENEFICIARIES</strong></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td style="width: 300px;">Honors (Full)<br></td>
                                                    <td class="text-left">Top 10 graduates of public high schools in Taguig.<br></td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 300px;">Premier<br></td>
                                                    <td class="text-left">Those enrolling in, or enrolled in the University of the Philippines System (Luzon Campuses) &amp; other<br>public &amp; private colleges and universities certified by CHED as Centers of Excellence in the NCR.<br>Priority<br></td>
                                                </tr>
                                                <tr>
                                                    <td>Priority</td>
                                                    <td class="text-left">Those enrolling in or enrolled in BS Social Work, DOST-listed priority courses in DOST-listed schools,<br>or if persons with disabilities, must be endorsed by the city PDAO, or if taking up law or medicine, must<br>be enrolled or enrolling in top performing schools as listed by the Program based on the listing of<br>PRC/CHED. Preferably enrolled within the NCR. <br></td>
                                                </tr>
                                                <tr>
                                                    <td>SUC/LCU (Private-Public)</td>
                                                    <td class="text-left">Graduates of any private school in Taguig or nearby LGUs in the NCR, who are enrolled or enrolling in<br>a State University/College (SUC) or Local College/University (LCU) in the NCR.<br></td>
                                                </tr>
                                                <tr>
                                                    <td>Basic Plus (Public-Public)<br></td>
                                                    <td class="text-left">Graduates of any public high school in Taguig or nearby LGUs in the NCR, who are enrolled or enrolling<br>in a State University/College (SUC) or Local College/University (LCU) in the NCR<br></td>
                                                </tr>
                                                <tr>
                                                    <td>Basic (Public-Private)<br></td>
                                                    <td class="text-left">Graduates of any public high school in Taguig or nearby LGUs in the NCR who are enrolled in any<br>private college or university, or in any accredited technical-vocational institution in the NCR<br></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <p class="text-left" >1.&nbsp; Scan all the original required documents and upload the files. All scanned documents should be original and true copy. All edited documents are subject to disqualification and the students cannot apply anymore in the scholarship.<br>2. Fill in ALL the data required in the Application Form and submit ALL the documents during the application. Scholarship application forms must<br>be answered completely and those with incomplete requirements shall NOT be accepted, or IF inadvertently accepted, it shall NOT be processed.<br>3. Submit your Scholarship Application during the application period ONLY.<br>Check the Scholarship Secretariat (Taguig) FB Account and www. taguig.gov.ph (Programs &amp; Services) regularly for announcements.<br></p>
                                            <h1 style="color: rgb(199,20,14);">Course and School</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="form-row">
                                <div class="col-xl-2 offset-xl-0">
                                    <p class="text-left">Course:&nbsp;</p>
                                </div>
                                <div class="col-xl-10 offset-xl-0 text-left"><input class="form-control" type="text" required="" placeholder="Enter course" name="courseName" value="{{ old('courseName') }}"></div>
                                
                                @if($errors->has('courseName'))
                                    <small><i>*{{ $errors->first('courseName') }}</i></small>
                                @endif
                            </div>
                            <div class="form-row text-left">
                                <div class="col-xl-2 offset-xl-0 text-left">
                                    <p>Ladderized?&nbsp;</p>
                                </div>
                                <div class="col-xl-2 offset-xl-0">
                     
                              
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">


                                        <label class="btn btn-outline-secondary">Yes<input type="radio" id="btnradio-2" name="courseLadderized" value="Yes" <?php if(old('courseLadderized') == 'Yes') {echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">No<input type="radio" id="btnradio-15" name="courseLadderized" value="No" <?php if(old('courseLadderized') == 'No') {echo 'checked="checked"';} ?> ></label>

                                        
                                    </div>

                                    @if($errors->has('courseLadderized'))
                                        <small><i>*{{ $errors->first('courseLadderized') }}</i></small>
                                    @endif
                                </div>
                                <div class="col-xl-1 offset-xl-0">
                                    <p class="text-left" id="gwa">GWA:&nbsp;</p>
                                </div>
                                <div class="col-xl-3"><input class="form-control" type="text" required placeholder="Enter GWA" name="courseGwa" value="{{ old('courseGwa') }}"/>
                                    @if($errors->has('courseGwa'))
                                        <small><i>*{{ $errors->first('courseGwa') }}</i></small>
                                    @endif
                                </div>
                                <div class="col-xl-1">
                                    <p class="text-left">Year Level:</p>
                                </div>

                                <div class="col-xl-3"><input class="form-control" type="text" required="" placeholder="Enter Year Level" name="courseYearLevel" value="{{ old('courseYearLevel') }}">
                                    @if($errors->has('courseYearLevel'))
                                        <small><i>*{{ $errors->first('courseYearLevel') }}</i></small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row text-left">
                                <div class="col-xl-2 offset-xl-0 text-left" id="courseUnitsEnrolled">
                                    <p>No. of units enrolled:&nbsp;&nbsp;</p>
                                </div>
                                
                                <div class="col-xl-2" id="courseUnitsEnrolled"><input class="form-control" type="text" placeholder="Enter Number of units enrolled" required="" name="courseUnitsEnrolled" value="{{ old('courseUnitsEnrolled') }}">
                                    @if($errors->has('courseUnitsEnrolled'))
                                        <small><i>*{{ $errors->first('courseUnitsEnrolled') }}</i></small>
                                    @endif
                                </div>

                                <div class="col-xl-2">
                                    <p class="text-left">Course Duration:&nbsp;</p>
                                </div>
                                <div class="col">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                        <label class="btn btn-outline-secondary" id="courseDuration">Months<input type="radio" id="btnradio-2" name="courseDuration" value="Months" <?php if(old('courseDuration') == 'Months') {echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">2 Years<input type="radio" id="btnradio-15" name="courseDuration" value="2 Years" <?php if(old('courseDuration') == '2 Years') {echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">3 Years<input type="radio" id="btnradio-3" name="courseDuration" value="3 Years" <?php if(old('courseDuration') == '3 Years') {echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">4 Years<input type="radio" id="btnradio-14" name="courseDuration" value="4 Years" <?php if(old('courseDuration') == '4 Years') {echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">5 Years<input type="radio" id="btnradio-1" name="courseDuration" value="5 Years" <?php if(old('courseDuration') == '5 Years') {echo 'checked="checked"';} ?> ></label>
                                    
                                    </div>

                                    @if($errors->has('courseDuration'))
                                        <small><i>*{{ $errors->first('courseDuration') }}</i></small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-xl-2">
                                    <p class="text-left">Name of the School:&nbsp;</p>
                                </div>

                                <div class="col"><input class="form-control" name="schoolName" type="text" required="" placeholder="Enter Name of School" value="{{ old('schoolName') }}">
                                    @if($errors->has('schoolName'))
                                        <small><i>*{{ $errors->first('schoolName') }}</i></small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-xl-2">
                                    <p class="text-left">School Address:&nbsp;</p>
                                </div>

                                <div class="col"><input class="form-control" name="schoolAddress" type="text" required placeholder="Enter School Address" value="{{ old('schoolAddress') }}" />
                                    @if($errors->has('schoolAddress'))
                                        <small><i>*{{ $errors->first('schoolAddress') }}</i></small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row text-left">
                                <div class="col-xl-2 offset-xl-0 text-left" id="courseGraduating">
                                    <p>Graduating this term?&nbsp;</p>
                                </div>

                                <div class="col-xl-2">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-secondary">Yes<input type="radio" id="btnradio1" name="courseGraduating" value="Yes" <?php if(old('courseGraduating') == 'Yes') {echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">No<input type="radio" id="btnradio-2" name="courseGraduating" value="No" <?php if(old('courseGraduating') == 'No') {echo 'checked="checked"';} ?> ></label></div>

                                        @if($errors->has('courseGraduating'))
                                            <small><i>*{{ $errors->first('courseGraduating') }}</i></small>
                                        @endif
                                </div>

                                <div class="col-xl-4 offset-xl-1">
                                    <p class="text-left" id="courseGraduatingHonor">If yes, are you graduating with honors?:&nbsp;</p>
                                </div>

                                <div class="col-xl-2">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons"></div>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <label class="btn btn-outline-secondary">Yes<input type="radio" id="btnradio-2" name="courseGraduatingHonor" value="Yes" <?php if(old('courseGraduatingHonor') == 'Yes') {echo 'checked="checked"';} ?> ></label>

                                    <label class="btn btn-outline-secondary">No<input type="radio" id="btnradio-29" name="courseGraduatingHonor" value="No" <?php if(old('courseGraduatingHonor') == 'No') {echo 'checked="checked"';} ?> ></label></div>

                                    @if($errors->has('courseGraduatingHonor'))
                                        <small><i>*{{ $errors->first('courseGraduatingHonor') }}</i></small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row" style="height: 40px;">
                                <div class="col-xl-8 offset-xl-0" style="height: 40px;">
                                    <p class="text-left" style="height: 40px;" id="courseNeededSemester">If no, how many semesters more to go before you graduate, including the current sem/term?<br><br></p>
                                </div>

                                <div class="col">
                                    <div></div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col"><input class="form-control" name="courseNeededSemester" type="text" placeholder="Enter Remaining Sem" value="{{ old('courseNeededSemester') }}" />
                                    @if($errors->has('courseNeededSemester'))
                                        <small><i>*{{ $errors->first('courseNeededSemester') }}</i></small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row text-left">
                                <div class="col-xl-5 offset-xl-0 text-left">
                                    <p id="courseOthers">Others:&nbsp;</p>
                                </div>

                                <div class="col">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-secondary">Octoberian<input type="radio" id="btnradio-2" name="courseOthers" value="Octoberian" <?php if(old('courseOthers') == 'Octoberian') {echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">Regular Student<input type="radio" id="btnradio-31" name="courseOthers" value="Regular" <?php if(old('courseOthers') == 'Regular') {echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">Irregular Student<input type="radio" id="btnradio-3" name="courseOthers" value="Irregular Student" <?php if(old('courseOthers') == 'Irregular Student') {echo 'checked="checked"';} ?> ></label>
                                    </div>

                                    @if($errors->has('courseOthers'))
                                        <small><i>*{{ $errors->first('courseOthers') }}</i></small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-xl-2" style="width: 250px;height: 40px;">
                                    <p class="text-left">Transferee(Previous School):</p>
                                </div>
                                <div class="col-xl-3"><input class="form-control" name="courseTransferee" type="text" placeholder="Enter Name of the Previous School" value="{{ old('courseTransferee') }}"></div>
                                
                                <div class="col-xl-2" style="width: 250px;">
                                    <p class="text-left" style="width: 250px;">Shiftee(Previous Course):</p>
                                </div>
                                
                                <div class="col-xl-4"><input class="form-control" type="text" placeholder="Enter the Previous Course" name="courseShiftee" value="{{ old('courseShiftee') }}"></div>
                            </div>
                        </div>
                       <!--  <div>
                            <h1 style="color: rgb(199,20,14);margin-top: 15px;">Educational Background</h1>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 100px;"></th>
                                        <th style="width: 320px;">Name of School Attended<br></th>
                                        <th style="width: 160px;">School Type<br></th>
                                        <th>School Address<br></th>
                                        <th style="width: 140px;">Year Started - Year Graduated<br></th>
                                        <th style="width: 150px;">Awards Received<br></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-left"><strong>SHS</strong></td>

                                        <td><input class="form-control" type="text" required="" placeholder="Enter Name of School" name="educationSHName"></td>

                                        <td style="width: 160px;">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            
                                            <label class="btn btn-outline-secondary">Public<input type="radio" id="btnradio-6" name="educationSHType" value="Public"></label>

                                            <label class="btn btn-outline-secondary">Private<input type="radio" id="btnradio-7" name="educationSHType"  value="Private"></label></div>
                                        </td>

                                        <td><input class="form-control" type="text" placeholder="Enter School Address " required="" name="educationSHAddress"></td>
                                        
                                        <td>
                                        <input class="form-control" type="text" placeholder="Enter Year Started - Year Graduated" required="" name="educationSHGraduated"></td>

                                        <td>
                                        <input class="form-control" type="text" placeholder="Enter Awards Received" required="" name="educationSHHonor">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-left"><strong>JHS</strong></td>
                                        <td><input class="form-control" type="text" placeholder="Enter Name of School" required="" name="educationJHName"></td>
                                        <td style="width: 160px;">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons"><label class="btn btn-outline-secondary">Public<input type="radio" id="btnradio-4" name="educationJHType" value="Public"></label>

                                            <label class="btn btn-outline-secondary">Private<input type="radio" id="btnradio-5" name="educationJHType" value="Public"></label></div>
                                        </td>
                                        <td><input class="form-control" type="text" placeholder="Enter School Address" required="" name="educationJHAddress"></td>

                                        <td><input class="form-control" type="text" placeholder="Enter Year Started - Year Graduated" required="" name="educationJHGraduated"></td>

                                        <td><input class="form-control" type="text" placeholder="Enter Awards Received" required="" name="educationJHHonor"></td>
                                    </tr>
                                    <tr>
                                        <td class="text-left"><strong>Elementary</strong></td>
                                        <td><input class="form-control" type="text" placeholder="Enter Name of School" required="" name="educationELName"></td>

                                        <td style="width: 160px;">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-outline-secondary">Public<input type="radio" id="btnradio-6" name="educationELType" value="Public"></label>

                                            <label class="btn btn-outline-secondary">Private<input type="radio" id="btnradio-7" name="educationELType" value="Private"></label></div>
                                        </td>
                                        <td><input class="form-control" type="text" placeholder="Enter School Address" required="" name="educationElAddress"></td>
                                        <td><input class="form-control" type="text" placeholder="Enter Year Started - Year Graduated" required="" name="educationElGraduated"></td>
                                        <td><input class="form-control" type="text" placeholder="Enter Awards Received" required="" name="educationElHonor"></td>
                                    </tr>
                                    <tr></tr>
                                </tbody>
                            </table>
                        </div>
                        <h1 style="color: rgb(199,20,14);">Family Background</h1>
                        <div style="margin: 0px;padding: 0;">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 180px;"></th>
                                            <th style="width: 300px;">FATHER<br>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-outline-secondary">Living<input type="radio" id="btnradio1" name="familyFatherLiving" value="Living"></label>

                                            <label class="btn btn-outline-secondary">Deceased<input type="radio" id="btnradio-2" name="familyFatherLiving" value="Living"></label></div><br>
                                            </th>
                                            <th style="width: 300px;">MOTHER<br>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons"></div>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Living<input type="radio" id="btnradio1" name="btnradio"  name="familyMotherLiving" value="Living"></label>

                                                <label class="btn btn-outline-secondary">Deceased<input type="radio" id="btnradio-2" name="btnradio"  name="familyMotherLiving" value="Deceased"></label></div>
                                            </th>
                                            <th style="width: 300px;">HUSBAND/WIFE<br>(if married)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-left"><strong>Name:</strong></td>
                                            
                                            <td><input class="form-control" type="text" required="" placeholder="Father's Name" name="familyFatherName"></td>

                                            <td><input class="form-control" type="text" required="" placeholder="Mother's Name" name="familyMotherName"></td>

                                            <td><input class="form-control" type="text" placeholder="Spouse's Name" name="familySpouseName"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Address:</strong></td>
                                            <td><input class="form-control" type="text" required="" placeholder="Father's Address" name="familyFatherAddress"></td>

                                            <td><input class="form-control" type="text" required="" placeholder="Mother's Address" name="familyMotherAddress"></td>

                                            <td><input class="form-control" type="text" placeholder="Spouse's Address" name="familySpouseAddress"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Contact No.:</strong></td>
                                            <td><input class="form-control" type="text" required="" placeholder="Father's Contact No." name="familyFatherContact"></td>
                                            <td><input class="form-control" type="text" required="" placeholder="Mother's Contact No." name="familyMotherContact"></td>
                                            <td><input class="form-control" type="text" placeholder="Spouse's Contact No." name="familySpouseContact"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Occupation:</strong></td>
                                            <td><input class="form-control" type="text" required="" placeholder="Father's Occupation" name="familyFatherOccupation"></td>
                                            <td><input class="form-control" type="text" required="" placeholder="Mother's Occupation" name="familyMotherOccupation"></td>
                                            <td><input class="form-control" type="text" placeholder="Spouse's Occupation" name="familySpouseOccupation"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Place of Work:</strong></td>
                                            <td><input class="form-control" type="text" required="" placeholder="Father's Place of Work" name="familyFatherWorkPlace"></td>
                                            <td><input class="form-control" type="text" required="" placeholder="Mother's Place of Work" name="familyMotherWotkPlace"></td>
                                            <td><input class="form-control" type="text" placeholder="Spouse's Place of Work" name="familySpouseWorkPlace"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Highest Educational</strong><br><strong>Attainment:</strong></td>
                                            <td><input class="form-control" type="text" required="" placeholder="Father's Highest Edicational Attainment" name="familyFatherHighestEduc"></td>
                                            <td><input class="form-control" type="text" required="" placeholder="Mother's Highest Educational Attainment" name="familyMotherHighestEduc"></td>
                                            <td><input class="form-control" type="text" placeholder="Spouse's Highest Educational Attainment" name="familySpouseHighestEduc"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div></div>
                            <div class="form-row">
                                <div class="col-xl-5" style="width: 450px;">
                                    <p class="text-left"><strong>Number of siblings in the family (including applicant):</strong><br></p>
                                </div>
                                <div class="col-xl-2"><input class="form-control" name="siblingsNumber" type="text" required="" placeholder="No. of siblings"></div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p class="text-left"><strong>Please fill out the information about your FIRST</strong>&nbsp;<strong>FIVE SIBLINGS IN DESCENDING ORDER (if the applicant has 4 or more siblings):</strong><br></p>
                                </div>
                            </div>
                            <div style="margin-top: 15px;">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th style="width: 300px;text-align: center;">Name</th>
                                                <th style="width: 100px;">Age</th>
                                                <th>Civil Status</th>
                                                <th style="width: 250px;">Highest Educational Attainement</th>
                                                <th>Working</th>
                                                <th style="width: 190px;">If working, Average Monthly Income<br></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input class="form-control" type="text" placeholder="Sibling's Name" name="siblingName1"></td>

                                                <td style="width: 100px;"><input class="form-control" type="text" style="width: 100px;" placeholder="Sibling's Age" name="siblingAge1"></td>

                                                <td style="height: 62px;">
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons" style="margin: 0px;">

                                                    <label class="btn btn-outline-secondary">Single<input type="radio" id="btnradio1" name="siblingCivilStatus1" value="Single"></label>

                                                    <label class="btn btn-outline-secondary">Married<input type="radio" id="btnradio-2" name="siblingCivilStatus1" value="Married"></label></div>
                                                </td>
                                                <td><input class="form-control" type="text" placeholder="Sibling's Highest Educational Attainment" name="siblingHighestEduc1"></td>
                                                <td>
                                
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Yes<input type="radio" id="btnradio1" name="siblingWork1" value="Yes"></label>

                                                <label class="btn btn-outline-secondary">No<input type="radio" id="btnradio-2" name="btnradio"  name="siblingWork1" value="No"></label>

                                                </div>
                                                </td>
                                                <td><input class="form-control" type="text" inputmode="numeric" name="siblingMonthlyIncome1"></td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-control" type="text" placeholder="Sibling's Name" name="siblingName2"></td>
                                                <td style="width: 100px;"><input class="form-control" type="text" style="width: 100px;" placeholder="Sibling's Age" name="siblingAge2"></td>
                                                <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Single<input type="radio" id="btnradio-25" name="siblingCivilStatus2" value="Single"></label>

                                                <label class="btn btn-outline-secondary">Married<input type="radio" id="btnradio-26" name="siblingCivilStatus2" value="Married"></label>

                                                </div>
                                                </td>
                                                <td><input class="form-control" type="text" placeholder="Sibling's Highest Educational Attainment" name="siblingHighestEduc2"></td>
                                                <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Yes<input type="radio" id="btnradio-27" name="siblingWork2" value="Yes"></label>

                                                <label class="btn btn-outline-secondary">No<input type="radio" id="btnradio-28" name="siblingWork2" value="No"></label>

                                                </div>
                                                </td>
                                                <td><input class="form-control" type="text" name="siblingMonthlyIncome2"></td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-control" type="text" placeholder="Sibling's Name" name="siblingName3"></td>
                                                <td style="width: 100px;"><input class="form-control" type="text" style="width: 100px;" placeholder="Sibling's Age" name="siblingAge3"></td>
                                                <td>
                                                
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Single<input type="radio" id="btnradio-21" name="siblingCivilStatus3" value="Single"></label>

                                                <label class="btn btn-outline-secondary">Married<input type="radio" id="btnradio-22" name="siblingCivilStatus3" value="Married"></label></div>

                                                </td>
                                                <td><input class="form-control" type="text" placeholder="Sibling's Highest Educational Attainment" name="siblingHighestEduc3"></td>
                                                <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Yes<input type="radio" id="btnradio-23" name="siblingWork3" value="Yes"></label>

                                                <label class="btn btn-outline-secondary">No<input type="radio" id="btnradio-24"  name="siblingWork3" value="Yes"></label>

                                                </div>
                                                </td>
                                                <td><input class="form-control" type="text" name="siblingMonthlyIncome3"></td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-control" type="text" placeholder="Sibling's Name" name="siblingName4"></td>
                                                <td style="width: 100px;"><input class="form-control" type="text" style="width: 100px;" placeholder="Sibling's Age" name="siblingAge4"></td>
                                                <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Single<input type="radio" id="btnradio-17" name="siblingCivilStatus4" value="Single"></label>

                                                <label class="btn btn-outline-secondary">Married<input type="radio" id="btnradio-18" name="siblingCivilStatus4" value="Single"></label></div>
                                                </td>
                                                <td><input class="form-control" type="text" placeholder="Sibling's Highest Educational Attainment" name="siblingHighestEduc4"></td>
                                                <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Yes<input type="radio" id="btnradio-19" name="siblingWork4" value="Yes"></label>

                                                <label class="btn btn-outline-secondary">No<input type="radio" id="btnradio-20" name="siblingWork4" value="No"></label>

                                                </div>
                                                </td>
                                                <td><input class="form-control" type="text" name="siblingMonthlyIncome4"></td>
                                            </tr>
                                            <tr>
                                                <td><input class="form-control" type="text" placeholder="Sibling's Name" name="siblingName5"></td>
                                                <td style="width: 100px;"><input class="form-control" type="text" style="width: 100px;" placeholder="Sibling's Age" name="siblingAge5"></td>
                                                <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Single<input type="radio" id="btnradio-8" name="siblingCivilStatus5" value="Single"></label>

                                                <label class="btn btn-outline-secondary">Married<input type="radio" id="btnradio-9"  name="siblingCivilStatus5" value="Married"></label></div>
                                                </td>
                                                <td><input class="form-control" type="text" placeholder="Sibling's Highest Educational Attainment" name="siblingHighestEduc5"></td>
                                                <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons"><label class="btn btn-outline-secondary">Yes<input type="radio" id="btnradio-10" name="siblingWork5" value="Yes"></label>

                                                <label class="btn btn-outline-secondary">No<input type="radio" id="btnradio-16"  name="siblingWork5" value="No"></label></div>
                                                </td>
                                                <td><input class="form-control" type="text" name="siblingMonthlyIncome5"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div> -->
                            <div>
                                <h1 style="color: rgb(199,20,14);margin-top: 10px;">Required Documents</h1>
                            </div>
                            <p class="text-left"><strong>Instructions:</strong><br><strong>1. Scan all the required documents.</strong><br><strong>2. Upload all the scanned documents in the specific box (Applicants can upload 1 or more images/files in each table).</strong><br><strong>3. Make sure that the documents you have uploaded are in the right box.</strong></p>
@if(count($errors)>0)
<div class="alert alert-danger" role="alert"><b>
  Reupload the Required Documents again<b><a href="#" class="alert-link">
</div>    
@endif 
                            <div style="margin-top: 30px;">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr></tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-left" id="reqdoc"><strong>1. Enrolment Form&nbsp;</strong>for Current Semester/Term with Official Receipt, if applicable<br></td>
                                                <td>


  <input type="file" accept="image/*" id="applicationEnrollmentForm" name="applicationEnrollmentForm[]" required multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">

@if($errors->has('applicationEnrollmentForm'))
    <small><i>*{{ $errors->first('applicationEnrollmentForm') }}</i></small>
    @endif
</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>2.Authenticated or True Copy of Grades</strong>&nbsp;last semester, with school seal/official signature (for trimester, grades for the past 2 terms)<br></td>
                                                <td>
  <input type="file" accept="image/*" id="applicationReportCard" name="applicationReportCard[]" required multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">
@if($errors->has('applicationReportCard'))
    <small><i>*{{ $errors->first('applicationReportCard') }}</i></small>
    @endif

</td>
                                            </tr>
                                            
                                            <tr>
                                                <td class="text-left"><strong>3.Certificate of Good Moral Character&nbsp;</strong>(Issued within the school year)<br></td>
                                                <td>
  <input type="file" accept="image/*" id="applicationGoodMoral" name="applicationGoodMoral[]" required multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">
  @if($errors->has('applicationGoodMoral'))
    <small><i>*{{ $errors->first('applicationGoodMoral') }}</i></small>
    @endif
</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>4. School ID</strong>&nbsp;(back to back in a single page)<br></td>
                                                <td>
  <input type="file" accept="image/*" id="applicationSchoolId" name="applicationSchoolId[]" required multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">
    @if($errors->has('applicationSchoolId'))
    <small><i>*{{ $errors->first('applicationSchoolId') }}</i></small>
    @endif
</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>5. Certificate of Academic Excellence for Top 10 graduates</strong><br><strong>of Taguig public high school</strong>&nbsp;(for Honors/Full scholar applicants)<br></td>
                                                <td>
  <input type="file" accept="image/*" id="files" name="applicationAcademicExcellence[]" multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">

</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>6. Voter’s Certification</strong>&nbsp;issued by COMELEC, showing that<strong>&nbsp;at least one of the parents</strong>&nbsp;of the applicant is a registered voter (Issued after the May 13, 2019 election)<br></td>
                                                <td>
  <input type="file" accept="image/*" id="applicationVotersCertificateP" name="applicationVotersCertificateP[]" required multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">
  @if($errors->has('applicationVotersCertificateP'))
    <small><i>*{{ $errors->first('applicationVotersCertificateP') }}</i></small>
    @endif
</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>7. Voter's Certification of the applicant if 18 years old and above</strong><br>(Issued after the May 13,2019 election)<br></td>
                                                <td>
  <input type="file" accept="image/*" id="applicationVotersCertificate" name="applicationVotersCertificate[]" multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">
    @if($errors->has('applicationVotersCertificate'))
    <small><i>*{{ $errors->first('applicationVotersCertificate') }}</i></small>
    @endif
</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>8.&nbsp;Birth Certificate</strong><br></td>
                                                <td>
  <input type="file" accept="image/*" id="applicationBirthCertificate" name="applicationBirthCertificate[]" required multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">
      @if($errors->has('applicationBirthCertificate'))
    <small><i>*{{ $errors->first('applicationBirthCertificate') }}</i></small>
    @endif
</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>9.&nbsp;Other necessary documents&nbsp;</strong>to facilitate the processing of your scholarship application (Transcript or True Copy of Grades since start of college for New Applicants who are continuing students, F137, Course Curriculum,&nbsp;<strong>PDAO Endorsement and ID</strong>&nbsp;(for PWD Applicants), etc.&nbsp;<strong>(Compile all other necessary documents in one PDF file)</strong><br></td>
                                                <td>
  <input type="file" accept="image/*" id="files" name="applicationOtherDocs[]" multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">
</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>
                                <p class="text-center"><br>I hereby certify that <strong>ALL </strong>the answers given above are <strong>TRUE</strong> and<strong> CORRECT</strong> to the best of my knowledge, and the<br>attached documents are <strong>FAITHFUL REPRODUCTION </strong>of the original copies. I further acknowledge that <strong>ANY ACT OF</strong><br><strong>DISHONESTY OR FALSIFICATION MAY BE A GROUND FOR MY DISQUALIFICATION</strong> from this scholarship program.<br><br>I also understand that this submission of application does <strong>NOT</strong> automatically qualify me for the scholarship grant and<br>that I will abide by the decision of the L.A.N.I. Scholarship Management.<br><br>Thank you so much.<br><br></p>
                            </div>
                            <div>
                                <div class="form-row">
                                    <div class="col">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr></tr>
                                                </thead>
                                                <tbody>
                                                    <tr id="scholarSignature">
<td style="width: 545.2px;height: 152.8px;"><p><input type="file"   accept="image/*" name="scholarSignature[]" id="filee"  onchange="loadFiles(event)" style="display: none;" required ></p>
<p><img id="outputt" width="200" class="border border-danger" /></p>
<p><label class="btn btn-outline-secondary" for="filee" style="cursor: pointer;">Upload Signature</label></p>

 @if($errors->has('scholarSignature'))
    <small><i>*{{ $errors->first('scholarSignature') }}</i></small>
    @endif

<script>
var loadFiles = function(event) {
	var imagee = document.getElementById('outputt');
	imagee.src = URL.createObjectURL(event.target.files[0]);
};
</script></td>
                                                    </tr>

                                                    <tr>
                                            <td><input class="form-control" type="text" required="" placeholder="Enter Printed Name of Applicant" name="applicationApplicant" value="{{ old('applicationApplicant') }}">
                                                @if($errors->has('applicationApplicant'))
                                                    <small><i>*{{ $errors->first('applicationApplicant') }}</i></small>
                                                @endif
                                            </td>

                                            <td class="text-center"><input class="form-control" type="date" required name="signatureDate" value="{{ old('signatureDate') }}">
                                                @if($errors->has('signatureDate'))
                                                    <small><i>*{{ $errors->first('signatureDate') }}</i></small>
                                                @endif
                                            </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="height: 40.2px;"><strong>&nbsp;Printed Name &amp; Signature of Applicant</strong><br></td>
                                                        <td class="text-center"><strong>Date</strong></td>
                                                    </tr>

                                                    <tr>
                                                        <td class="text-left" style="height: 40.2px;"><strong id="guardianSignature">Attested by:</strong><br></td>
                                                    </tr>

                                                    <tr>
<td style="width: 545.2px;height: 152.8px;"><p><input type="file"   accept="image/*" name="guardianSignature[]" id="fileee"  onchange="loadFiless(event)" style="display: none;" required ></p>
<p><img id="outputtt" width="200" class="border border-danger" /></p>
<p><label class="btn btn-outline-secondary" for="fileee" style="cursor: pointer;">Upload Signature</label></p>
 @if($errors->has('guardianSignature'))
    <small><i>*{{ $errors->first('guardianSignature') }}</i></small>
    @endif

<script>
var loadFiless = function(event) {
	var image = document.getElementById('outputtt');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script></td>
                                                    </tr>
                                                    <tr>
                                                    <td>

                                                    <input class="form-control" type="text" required="" placeholder="Enter Printed Name of Parent/Guardian" name="applicationApplicantParent" value="{{ old('applicationApplicantParent') }}">
                                                        @if($errors->has('applicationApplicantParent'))
                                                            <small><i>*{{ $errors->first('applicationApplicantParent') }}</i></small>
                                                        @endif
                                                    </td>
                                                   
                                                    <td class="text-center"><input class="form-control" type="date" required="" name="signatureDateParent" value="{{ old('signatureDateParent') }}">
                                                        @if($errors->has('signatureDateParent'))
                                                            <small><i>*{{ $errors->first('signatureDateParent') }}</i></small>
                                                        @endif
                                                    </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td style="height: 40.2px;"><strong>&nbsp;Printed Name &amp; Signature of Parent/Guardian</strong><br></td>
                                                        <td class="text-center"><strong>Date</strong></td>
                                                    </tr>

                                                    <td style="height: 62px;" id="transMode">

                                                   <b>Preferred mode of receiving allowance</b>
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons" style="margin: 0px;">

                                                    <label class="btn btn-outline-secondary">Cash<input type="radio" id="btnradio1" name="transMode" value="Cash" <?php if(old('transMode') == 'Cash') {echo 'checked="checked"';} ?> ></label>

                                                    <label class="btn btn-outline-secondary">Gcash<input type="radio" id="btnradio-2" name="transMode" value="Gcash" <?php if(old('transMode') == 'Gcash') {echo 'checked="checked"';} ?> ></label></div>
                                             <br>
                                                 <small></small>


                         @if($errors->has('transMode'))
                    <small><i>*{{ $errors->first('transMode') }}</i></small>
                                                        @endif

                                                </td>
                                                <tr>
                                                <td>
                                                     <b>if Gcash, enter your Gcash Number </b>

                                                    <input class="form-control" type="text" style="width: 280px" placeholder="Enter Gcash Number" name="   transactionGcashNum" value="{{ old('transactionGcashNum') }}">
                    @if($errors->has('transactionGcashNum'))
                    <small><i>*{{ $errors->first('transactionGcashNum') }}</i></small>
                    @endif
                    <br>
                                                    <b>if Gcash, enter your Gcash Name </b>
                                                    <input class="form-control" type="text" style="width: 280px" placeholder="Enter Gcash Name" name="   transactionGcashName" value="{{ old('transactionGcashName') }}">
                    @if($errors->has('transactionGcashName'))
                    <small><i>*{{ $errors->first('transactionGcashName') }}</i></small>
                    @endif

                                                </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                        <div style="margin: 0px;margin-top: 25px;padding-bottom: 100px;height: 75px;">
                           {{--  <button class="btn btn-danger" type="submit">SUBMIT APPLICATION</button> --}}
        

                           <button type="submit" id="submit_document" tabindex="0" class="hoverable btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus"  onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();"
 disabled>SUBMIT APPLICATION</button>
        <div class="show-on-hover" style="background-color: darkred; color: white; padding: 5px; border-radius: 5px; margin-top: 10px"><small><b>Upload the ff :</b> scholar signature, parent signature, 2x2 ID Picture, and all required documents (no.9 optional) then click the SUBMIT APPLICATION button</small></div> 
                        </div>


                            </div>
                        </div>

                        <input type="hidden" name="applicationSubmitDate" value="{{ date('Y-m-d') }}">
                        {{-- ADD --}}
                        <input type="hidden" name="scholarId" value="{{ $get_data['scholarInfo']['scholarId'] }}">

                        <input type="hidden" name="sem" value="{{ $message['openSubmission'][0]->submissionSem }}">
                        <input type="hidden" name="year" value="{{ $message['openSubmission'][0]->submissionYear }}">
                        <input type="hidden" name="batch" value="{{ $message['openSubmission'][0]->submissionBatch }}">

                        <input type="hidden" name="applicationNumOfEdit" value="0">

                        <input type="hidden" name="applicationScholarStatus" value="renew">

                    </div>
                </div>
            </section>
        </div>
    </form>
    @endif

<style type="text/css">
    .hoverable:not(:hover) + .show-on-hover {
    display: none;
}
</style>
    <script src="{{ asset('js/documentValidationRenew.js') }}"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/Bootstrap-Image-Uploader.js"></script>
    <script src="assets/js/Custom-File-Upload.js"></script>
<script src="https://kit.fontawesome.com/6360280a4c.js" crossorigin="anonymous"></script>



@stop