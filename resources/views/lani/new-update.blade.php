
@extends('layouts.base')

@include('designs.newcss')

@include('layouts.nav')

@section('body')


{{-- if submission is close this will appear --}}


@php
    $timeStart = strtotime($message['openSubmission'][0]->submissionStart); 
    $timeEnd = strtotime($message['openSubmission'][0]->submissionEnd);
    $scholarId = $get_data['scholarInfo']['scholarId'];
    $folder = "scholarId-".$scholarId;
                            function exploder($imgString)
                            {
                                $string = $imgString;
                                
                                $exploded = explode("|", $string);
                                return $exploded;
                            }

     $IDs = exploder($applications->applicationIdPicture);

@endphp 




    <style type="text/css">
        i {
            color: red;
        }
    </style>

    <div style="height: 0;background-color: rgba(128,125,125,0);"></div>
    <main>
        <section>
            <h1 class="text-center" data-aos="fade-down" style="color: rgb(255,255,255);background-color: #807d7d;font-size: 40px;box-shadow: 0px 0px;border-color: rgb(255,255,255);border-radius: 0px;"><br><strong>NEW APPLICANTS (RESOLVE)</strong><br><br></h1>
            <div></div>
        </section>




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
   {{--  family --}}
    @if($errors->has('familyFatherContact'))
        <li>Invalid input in <b> <a href="#fam">Father Contact number</a></b></li>
    @endif

    @if($errors->has('familyMotherContact'))
        <li>Invalid input in <b> <a href="#fam">Mother Contact number</a></b></li>
    @endif

    @if($errors->has('familySpouseContact'))
        <li>Invalid input in <b><a href="#fam">Spouse Contact number</a></b></li>
    @endif

    @if($errors->has('familyMotherLiving'))
        <li>Invalid input in <b> <a href="#fam">Mother's info</a></b></li>
    @endif

    @if($errors->has('familyFatherLiving'))
        <li>Invalid input in <b> <a href="#fam">Father's info</a></b></li>
    @endif


    @if($errors->has('familyFatherName'))
        <li>Invalid input in <b> <a href="#fam">Father's name</a></b></li>
    @endif

     @if($errors->has('familyMotherName'))
        <li>Invalid input in <b> <a href="#fam">Mother's name</a></b></li>
    @endif


    @if($errors->has('siblingsNumber'))
        <li>Invalid input in <b> <a href="#siblingsNumber">No. of Siblings</a></b></li>
    @endif


     @if($errors->has('siblingName1') || $errors->has('siblingName2') || $errors->has('siblingName3')|| $errors->has('siblingName4')||$errors->has('siblingName5'))
        <li>Invalid input in <b> <a href="#siblings">Siblings Name</a></b></li>
    @endif

    @if($errors->has('siblingAge1') || $errors->has('siblingAge2') || $errors->has('siblingAge3')|| $errors->has('siblingAge4')||$errors->has('siblingAge5'))
        <li>Invalid input in <b> <a href="#siblings">Siblings Age</a></b></li>
    @endif

    @if($errors->has('siblingMonthlyIncome1') || $errors->has('siblingMonthlyIncome2') || $errors->has('siblingMonthlyIncome3')|| $errors->has('siblingMonthlyIncome4')||$errors->has('siblingMonthlyIncome5'))
        <li>Invalid input in <b> <a href="#siblings">Siblings Income</a></b></li>
    @endif

    @if($errors->has('educationSHType') || $errors->has('educationJHType') || $errors->has('educationELType'))
        <li>Invalid input in <b> <a href="#education">School type</a></b></li>
    @endif

    @if($errors->has('educationSHName') || $errors->has('educationJHName') || $errors->has('educationELName'))
        <li>No input in <b> <a href="#education">School Name</a></b></li>
    @endif

    @if($errors->has('educationSHAddress') || $errors->has('educationJHAddress') || $errors->has('educationELAddress'))
        <li>No input in <b> <a href="#education">School Address</a></b></li>
    @endif


     @if($errors->has('educationSHGraduated') || $errors->has('educationJHGraduated') || $errors->has('educationELGraduated'))
        <li>No input in <b> <a href="#education">Year Started - Year Graduated</a></b></li>
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

       @if($errors->has('applicationEnrollmentForm') || $errors->has('applicationReportCard') || $errors->has('applicationGoodMoral')|| $errors->has('applicationSchoolId')||$errors->has('applicationVotersCertificateP') || $errors->has('applicationVotersCertificate') || $errors->has('applicationBirthCertificate') || $errors->has('applicationDiploma'))
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


<div class="alert alert-danger" role="alert" style="width: 90%; margin: auto;margin-bottom: 30px">
  <h4 class="alert-heading" style="color: red"><b>Need To Resolve:</b></h4>
  <p>{{ $entry->entriesComment }}</p>
  <hr>
  <h5 class="alert-heading">Submission Information!</h5>
  <p>Batch : <b>{{ $message['openSubmission'][0]->submissionBatch }}</b></p>
  <p>Sem :<b> {{ $message['openSubmission'][0]->submissionSem }}</b></p>
  <p>School Year :<b> {{ $message['openSubmission'][0]->submissionYear }}</b></p>
  <p>Start:<b> {{ $newformat = date('M-d-Y h:i A',$timeStart) }}</b></p>
   <p>End:<b> {{ $newformat = date('M-d-Y h:i A',$timeEnd) }}</b></p>


</div>


{{-- 
ForEdit --}}
{{-- @if(@$message['entryStatus'][0]->entriesStatus == 'resolve')
<p>Need To resolve this problems ....<p>
@endif --}}
    </main>
    <form data-aos="slide-up" action="{{ route('application.update',$applications->applicationId) }}" method="post" enctype="multipart/form-data">
        @csrf
        {{ method_field('PATCH') }}
       
        <div class="form-group">
            <section>
                <div class="container">
                    <div class="col text-center" style="box-shadow: 0px 0px 20px;"><h1 style="font-size: 30px;"><br />OFFICE OF THE MAYOR<br />Taguig City, Philippines</h1>


                        <div>
                            <h1 style="font-size: 30px;"><br>LIFELINE ASSISTANCE FOR NEIGHBORS IN-NEED<br>(L.A.N.I.) SCHOLARSHIP APPLICATION FORM<br>For NEW Applicants<br><br></h1>
                            <p style="color: rgb(33, 37, 41);font-size: 20px;"><strong>INSTRUCTIONS:</strong><br><strong>1. PRINT all entries. Leave blank the appropriate inputs.</strong><br><strong>2. Be HONEST and ACCURATE with your answers.</strong></p>
                        </div>
                        <div>
                            <p class="text-left" id="twoByTwo"><strong>Upload Recent 2 x 2 ID&nbsp;Picture</strong><br></p>
                            <div class="form-row">
                                <div class="col text-left">
<p>
<input type="file" required  accept="image/*" name="idPicture[]" id="file"  onchange="loadFile(event)" style="display: none;"></p>
 @foreach($IDs as $ID) 
 @if($ID != "")

<a target="_blank" href="{{asset("images/$folder/idPicture/$ID")}}">
    <img id="output" width="200" class="border border-danger" src="{{ asset("images/$folder/idPicture/$ID") }}" />
</a>
</p>
   <input type="hidden" name="old_idPicture[]" value="{{ $ID }}"> 
 @endif
@endforeach


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
                                    <h1 class="text-left" style="font-size: 16px;" id="scholarType"><strong>Scholarship Type :</strong></h1>
                                </div>
                                <div class="col text-left">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                        <label class="btn btn-outline-secondary">Honors<input type="radio" id="btnradio-11" name="scholarType" value="Honors"  
                <?php if(count($errors)>0 && old('scholarType') == "Honors") {echo 'checked="checked"';} 
                  if(@$applications->applicationScholarType == "Honors" && count($errors) == 0){echo 'checked="checked"';} ?> 

                                        /></label>

                                        <label class="btn btn-outline-secondary">Premier<input type="radio" id="btnradio-11" name="scholarType" value="Premier"   <?php if(count($errors)>0 && old('scholarType') == "Premier") {echo 'checked="checked"';} 
                  if(@$applications->applicationScholarType == "Premier" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">Priority<input type="radio" id="btnradio-12" name="scholarType" value="Priority"  <?php if(count($errors)>0 && old('scholarType') == "Priority") {echo 'checked="checked"';} 
                  if(@$applications->applicationScholarType == "Priority" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">SUC/LCU<input type="radio" id="btnradio-12" name="scholarType" value="SUC/LCU"  <?php if(count($errors)>0 && old('scholarType') == "SUC/LCU") {echo 'checked="checked"';} 
                  if(@$applications->applicationScholarType == "SUC/LCU" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">Basic Plus<input type="radio" id="btnradio-13" name="scholarType" value="Basic Plus" <?php if(count($errors)>0 && old('scholarType') == "Basic Plus") {echo 'checked="checked"';} 
                  if(@$applications->applicationScholarType == "Basic Plus" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">Basic<input type="radio" id="btnradio-13" name="scholarType" value="Basic" <?php if(count($errors)>0 && old('scholarType') == "Basic") {echo 'checked="checked"';} 
                  if(@$applications->applicationScholarType == "Basic" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>
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
                                            <p class="text-left">1.&nbsp; Scan all the original required documents and upload the files. All scanned documents should be original and true copy. All edited documents are subject to disqualification and the students cannot apply anymore in the scholarship.<br>2. Fill in ALL the data required in the Application Form and submit ALL the documents during the application. Scholarship application forms must<br>be answered completely and those with incomplete requirements shall NOT be accepted, or IF inadvertently accepted, it shall NOT be processed.<br>3. Submit your Scholarship Application during the application period ONLY.<br>Check the Scholarship Secretariat (Taguig) FB Account and www. taguig.gov.ph (Programs &amp; Services) regularly for announcements.<br></p>
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
                                <div class="col-xl-10 offset-xl-0 text-left"><input class="form-control" type="text" required="" placeholder="Enter course" name="courseName" value="<?php
                                if (count($errors) > 0){
                                    echo old('courseName');
                                }
                                else{ 
                                    echo $applications->courseName;
                                }
                        
                                 ?>"></div>
                            
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
                                        <label class="btn btn-outline-secondary">Yes<input type="radio" id="btnradio1" name="courseLadderized" value="Yes"
                <?php if(count($errors)>0 && old('courseLadderized') == "Yes") {echo 'checked="checked"';} 
                  if(@$applications->courseLadderized == "Yes" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>
                                           

                                        <label class="btn btn-outline-secondary">No<input type="radio" id="btnradio-2" name="courseLadderized" value="No"  
                <?php if(count($errors)>0 && old('courseLadderized') == "No") {echo 'checked="checked"';} 
                  if(@$applications->courseLadderized == "No" && count($errors) == 0){echo 'checked="checked"';} ?> ></label></div>

                                    @if($errors->has('courseLadderized'))
                                        <small><i>*{{ $errors->first('courseLadderized') }}</i></small>
                                    @endif   
                                </div>
                                <div class="col-xl-1 offset-xl-0">
                                    <p class="text-left" id="gwa">GWA:&nbsp;</p>
                                </div>
                                <div class="col-xl-3"><input class="form-control" type="text" required="" placeholder="Enter GWA" name="courseGwa" value="<?php
                                if (count($errors)>0){
                                    echo old('courseGwa');
                                }
                                else{ 
                                    echo $applications->courseGwa;
                                }
                        
                                 ?>"/>
                                    @if($errors->has('courseGwa'))
                                        <small><i>*{{ $errors->first('courseGwa') }}</i></small>
                                    @endif
                                </div>

                                <div class="col-xl-1">
                                    <p class="text-left">Year Level:</p>
                                </div>
                                <div class="col-xl-3"><input class="form-control" type="text" required="" placeholder="Enter Year Level" name="courseYearLevel" value="<?php
                                if ($errors->has('courseYearLevel')){
                                    echo old('courseYearLevel');
                                }
                                else{ 
                                    echo $applications->courseYearLevel;
                                }
                        
                                 ?>">
                                    @if($errors->has('courseYearLevel'))
                                        <small><i>*{{ $errors->first('courseYearLevel') }}</i></small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row text-left">
                                <div class="col-xl-2 offset-xl-0 text-left" id="courseUnitsEnrolled">
                                    <p>No. of units enrolled:&nbsp;&nbsp;</p>
                                </div>
                                
                                <div class="col-xl-2"><input class="form-control" type="text" placeholder="Enter Number of units enrolled" required="" name="courseUnitsEnrolled" value="<?php
                                if (count($errors)>0){
                                    echo old('courseUnitsEnrolled');
                                }
                                else{ 
                                    echo $applications->courseUnitsEnrolled;
                                }
                        
                                 ?>">
                                    @if($errors->has('courseUnitsEnrolled'))
                                        <small><i>*{{ $errors->first('courseUnitsEnrolled') }}</i></small>
                                    @endif
                                </div>
                                
                                <div class="col-xl-2">
                                    <p class="text-left" id="courseDuration">Course Duration:&nbsp;</p>
                                </div>
                                <div class="col">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                        <label class="btn btn-outline-secondary">Months<input type="radio" id="btnradio-2" name="courseDuration" value="Months"  
                <?php if(count($errors)>0 && old('courseDuration') == "Months") {echo 'checked="checked"';} 
                  if($applications->courseDuration == "Months" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">2 Years<input type="radio" id="btnradio-15" name="courseDuration" value="2 Years" 
                <?php if(count($errors)>0 && old('courseDuration') == "2 Years") {echo 'checked="checked"';} 
                  if($applications->courseDuration == "2 Years" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">3 Years<input type="radio" id="btnradio-3" name="courseDuration" value="3 Years" 
                 <?php if(count($errors)>0 && old('courseDuration') == "3 Years") {echo 'checked="checked"';} 
                  if($applications->courseDuration == "3 Years" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">4 Years<input type="radio" id="btnradio-14" name="courseDuration" value="4 Years" 
                     <?php if(count($errors)>0 && old('courseDuration') == "4 Years") {echo 'checked="checked"';} 
                  if($applications->courseDuration == "4 Years" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">5 Years<input type="radio" id="btnradio-1" name="courseDuration" value="5 Years" 
                     <?php if(count($errors)>0 && old('courseDuration') == "5 Years") {echo 'checked="checked"';} 
                  if($applications->courseDuration == "5 Years" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>
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

                                <div class="col"><input class="form-control" name="schoolName" type="text" required="" placeholder="Enter Name of School" value="<?php
                                if (count($errors)>0){
                                    echo old('schoolName');
                                }
                                else{ 
                                    echo $applications->schoolName;
                                }
                        
                                 ?>">
                                    @if($errors->has('schoolName'))
                                        <small><i>*{{ $errors->first('schoolName') }}</i></small>
                                    @endif 
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-xl-2">
                                    <p class="text-left">School Address:&nbsp;</p>
                                </div>

                                <div class="col"><input class="form-control" name="schoolAddress" type="text" required="" placeholder="Enter School Address" value="<?php
                                if (count($errors)>0){
                                    echo old('schoolAddress');
                                }
                                else{ 
                                    echo $applications->schoolAddress;
                                }
                        
                                 ?>" />
                                    @if($errors->has('schoolAddress'))
                                        <small><i>*{{ $errors->first('schoolAddress') }}</i></small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row text-left">
                                <div class="col-xl-2 offset-xl-0 text-left">
                                    <p id="courseGraduating">Graduating this term?&nbsp;</p>
                                </div>
                                <div class="col-xl-2">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-secondary">Yes<input type="radio" id="btnradio1" name="courseGraduating" value="Yes" 
                <?php if(count($errors)>0 && old('courseGraduating') == "Yes") {echo 'checked="checked"';} 
                  if($applications->courseGraduating == "Yes" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">No<input type="radio" id="btnradio-2" name="courseGraduating" value="No" 
                <?php if(count($errors)>0 && old('courseGraduating') == "No") {echo 'checked="checked"';} 
                  if($applications->courseGraduating == "No" && count($errors) == 0){echo 'checked="checked"';} ?> ></label></div>
                                
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
                                    <label class="btn btn-outline-secondary">Yes<input type="radio" id="btnradio-2" name="courseGraduatingHonor" value="Yes" 
                <?php if(count($errors)>0 && old('courseGraduatingHonor') == "Yes") {echo 'checked="checked"';} 
                  if($applications->courseGraduatingHonor == "Yes" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                    <label class="btn btn-outline-secondary">No<input type="radio" id="btnradio-29" name="courseGraduatingHonor" value="No" 
                <?php if(count($errors)>0 && old('courseGraduatingHonor') == "No") {echo 'checked="checked"';} 
                  if($applications->courseGraduatingHonor == "No" && count($errors) == 0){echo 'checked="checked"';} ?> ></label></div>
                                
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
                                <div class="col"><input class="form-control" name="courseNeededSemester" type="text" placeholder="Enter Remaining Sem" value="<?php
                                if (count($errors)>0){
                                    echo old('courseNeededSemester');
                                }
                                else{ 
                                    echo $applications->courseNeededSemester;
                                }
                        
                                 ?>" />
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
                                        <label class="btn btn-outline-secondary">Octoberian<input type="radio" id="btnradio-2" name="courseOthers" value="Octoberian" 
                    <?php if(count($errors)>0 && old('courseOthers') == "Octoberian") {echo 'checked="checked"';} 
                  if($applications->courseOthers == "Octoberian" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">Regular Student<input type="radio" id="btnradio-31" name="courseOthers" value="Regular" 
                <?php if(count($errors)>0 && old('courseOthers') == "Regular") {echo 'checked="checked"';} 
                  if($applications->courseOthers == "Regular" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                        <label class="btn btn-outline-secondary">Irregular Student<input type="radio" id="btnradio-3" name="courseOthers" value="Irregular Student"  
                <?php if(count($errors)>0 && old('courseOthers') == "Irregular Student") {echo 'checked="checked"';} 
                  if($applications->courseOthers == "Irregular Student" && count($errors) == 0){echo 'checked="checked"';} ?> ></label></div>
                                
                                    @if($errors->has('courseOthers'))
                                        <small><i>*{{ $errors->first('courseOthers') }}</i></small>
                                    @endif
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-xl-2" style="width: 250px;height: 40px;">
                                    <p class="text-left">Transferee(Previous School):</p>
                                </div>

                                <div class="col-xl-3"><input class="form-control" name="courseTransferee" type="text" placeholder="Enter Name of the Previous School" value="<?php
                                if (count($errors)>0){
                                    echo old('courseTransferee');
                                }
                                else{ 
                                    echo $applications->courseTransferee;
                                }
                        
                                 ?>"></div>
                                
                                <div class="col-xl-2" style="width: 250px;">
                                    <p class="text-left" style="width: 250px;">Shiftee(Previous Course):</p>
                                </div>

                                <div class="col-xl-4"><input class="form-control" type="text" placeholder="Enter the Previous Course" name="courseShiftee" value="<?php
                                if (count($errors)>0){
                                    echo old('courseShiftee');
                                }
                                else{ 
                                    echo $applications->courseShiftee;
                                }
                        
                                 ?>"></div>
                            </div>
                        </div>
                        <div id="education">
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

                                        <td><input class="form-control" type="text" required="" placeholder="Enter Name of School" name="educationSHName" value="<?php
                                if (count($errors) > 0){
                                    echo old('educationSHName');
                                }
                                else{ 
                                    echo $applications->educationSHName;
                                }
                        
                                 ?>">
                                        @if($errors->has('educationSHName'))
                                        <small><i>*{{ $errors->first('educationSHName') }}</i></small>
                                          @endif
                                        </td>

                                        <td style="width: 160px;">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            
                                            <label class="btn btn-outline-secondary">Public<input type="radio" id="btnradio-6" name="educationSHType" value="Public" 
                <?php if(count($errors)>0 && old('educationSHType') == "Public") {echo 'checked="checked"';} 
                  if($applications->educationSHType == "Public" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                            <label class="btn btn-outline-secondary">Private<input type="radio" id="btnradio-7" name="educationSHType"  value="Private" 
                <?php if(count($errors)>0 && old('educationSHType') == "Private") {echo 'checked="checked"';} 
                  if($applications->educationSHType == "Private" && count($errors) == 0){echo 'checked="checked"';} ?> ></label></div>

                                @if($errors->has('educationSHType'))
                                 <small><i>*{{ $errors->first('educationSHType') }}</i></small>
                                @endif
                                        </td>

                                        <td><input class="form-control" type="text" placeholder="Enter School Address " required="" name="educationSHAddress" value="<?php
                                if (count($errors) > 0){
                                    echo old('educationSHAddress');
                                }
                                else{ 
                                    echo $applications->educationSHAddress;
                                }
                        
                                 ?>">
                                @if($errors->has('educationSHAddress'))
                                 <small><i>*{{ $errors->first('educationSHAddress') }}</i></small>
                                @endif
                                        </td>
                                        
                                        <td>
                                        <input class="form-control" type="text" placeholder="Enter Year Started - Year Graduated" required="" name="educationSHGraduated" value="<?php
                                if (count($errors) > 0){
                                    echo old('educationSHGraduated');
                                }
                                else{ 
                                    echo $applications->educationSHGraduated;
                                }
                        
                                 ?>">
                                @if($errors->has('educationSHGraduated'))
                                 <small><i>*{{ $errors->first('educationSHGraduated') }}</i></small>
                                @endif
                                    </td>

                                        <td>
                                        <input class="form-control" type="text" placeholder="Enter Awards Received" name="educationSHHonor" value="<?php
                                if (count($errors) > 0){
                                    echo old('educationSHHonor');
                                }
                                else{ 
                                    echo $applications->educationSHHonor;
                                }
                        
                                 ?>">
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="text-left"><strong>JHS</strong></td>
                                        <td><input class="form-control" type="text" placeholder="Enter Name of School" required="" name="educationJHName" value="<?php
                                if (count($errors) > 0){
                                    echo old('educationJHName');
                                }
                                else{ 
                                    echo $applications->educationJHName;
                                }
                        
                                 ?>">
                                        @if($errors->has('educationJHName'))
                                        <small><i>*{{ $errors->first('educationJHName') }}</i></small>
                                          @endif
                                        </td>

                                        <td style="width: 160px;">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                            <label class="btn btn-outline-secondary">Public<input type="radio" id="btnradio-4" name="educationJHType" value="Public" 
                <?php if(count($errors)>0 && old('educationJHType') == "Public") {echo 'checked="checked"';} 
                  if($applications->educationJHType == "Public" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                            <label class="btn btn-outline-secondary">Private<input type="radio" id="btnradio-5" name="educationJHType" value="Private" 
                <?php if(count($errors)>0 && old('educationJHType') == "Private") {echo 'checked="checked"';} 
                  if($applications->educationJHType == "Private" && count($errors) == 0){echo 'checked="checked"';} ?> ></label></div>
                                @if($errors->has('educationJHType'))
                                 <small><i>*{{ $errors->first('educationJHType') }}</i></small>
                                @endif

                                        </td>
                                        <td><input class="form-control" type="text" placeholder="Enter School Address" required="" name="educationJHAddress" value="<?php
                                if (count($errors) > 0){
                                    echo old('educationJHAddress');
                                }
                                else{ 
                                    echo $applications->educationJHAddress;
                                }
                        
                                 ?>">
                                @if($errors->has('educationJHAddress'))
                                 <small><i>*{{ $errors->first('educationJHAddress') }}</i></small>
                                @endif
                                        </td>

                                        <td><input class="form-control" type="text" placeholder="Enter Year Started - Year Graduated" required="" name="educationJHGraduated" value="<?php
                                if (count($errors) > 0){
                                    echo old('educationJHGraduated');
                                }
                                else{ 
                                    echo $applications->educationJHGraduated;
                                }
                        
                                 ?>">
                                @if($errors->has('educationJHGraduated'))
                                 <small><i>*{{ $errors->first('educationJHGraduated') }}</i></small>
                                @endif
                                        </td>

                                        <td><input class="form-control" type="text" placeholder="Enter Awards Received" name="educationJHHonor" value="<?php
                                if (count($errors) > 0){
                                    echo old('educationJHHonor');
                                }
                                else{ 
                                    echo $applications->educationJHHonor;
                                }
                        
                                 ?>"></td>
                                    </tr>

                                    <tr>
                                        <td class="text-left"><strong>Elementary</strong></td>
                                        <td><input class="form-control" type="text" placeholder="Enter Name of School" required="" name="educationELName" value="<?php
                                if (count($errors) > 0){
                                    echo old('educationELName');
                                }
                                else{ 
                                    echo $applications->educationELName;
                                }
                        
                                 ?>">
                                        @if($errors->has('educationELName'))
                                        <small><i>*{{ $errors->first('educationELName') }}</i></small>
                                          @endif
                                        </td>

                                        <td style="width: 160px;">
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-outline-secondary">Public<input type="radio" id="btnradio-6" name="educationELType" value="Public" 
                <?php if(count($errors)>0 && old('educationELType') == "Public") {echo 'checked="checked"';} 
                  if($applications->educationELType == "Public" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                            <label class="btn btn-outline-secondary">Private<input type="radio" id="btnradio-7" name="educationELType" value="Private" 
                <?php if(count($errors)>0 && old('educationELType') == "Private") {echo 'checked="checked"';} 
                  if($applications->educationELType == "Private" && count($errors) == 0){echo 'checked="checked"';} ?> ></label></div>
                                @if($errors->has('educationELType'))
                                 <small><i>*{{ $errors->first('educationELType') }}</i></small>
                                @endif
                                        </td>
                                        <td><input class="form-control" type="text" placeholder="Enter School Address" required="" name="educationELAddress" value="<?php
                                if (count($errors) > 0){
                                    echo old('educationELAddress');
                                }
                                else{ 
                                    echo $applications->educationELAddress;
                                }
                        
                                 ?>">
                                @if($errors->has('educationELAddress'))
                                 <small><i>*{{ $errors->first('educationELAddress') }}</i></small>
                                @endif
                                        </td>
                                        <td><input class="form-control" type="text" placeholder="Enter Year Started - Year Graduated" required="" name="educationELGraduated" value="<?php
                                if (count($errors) > 0){
                                    echo old('educationELGraduated');
                                }
                                else{ 
                                    echo $applications->educationELGraduated;
                                }
                        
                                 ?>">
                                @if($errors->has('educationELGraduated'))
                                 <small><i>*{{ $errors->first('educationELGraduated') }}</i></small>
                                @endif
                                        </td>

                                        <td><input class="form-control" type="text" placeholder="Enter Awards Received" name="educationELHonor" value="<?php
                                if (count($errors) > 0){
                                    echo old('educationELHonor');
                                }
                                else{ 
                                    echo $applications->educationELHonor;
                                }
                        
                                 ?>"></td>
                                    </tr>
                                    <tr></tr>
                                </tbody>
                            </table>
                        </div>
                        <h1 style="color: rgb(199,20,14);" id="fam">Family Background</h1>
                        <div style="margin: 0px;padding: 0;">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th style="width: 180px;"></th>
                                            <th style="width: 300px;">FATHER<br>
                                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-outline-secondary">Living<input type="radio" id="btnradio1" name="familyFatherLiving" value="Living" 
                    <?php if(count($errors)>0 && old('familyFatherLiving') == "Living") {echo 'checked="checked"';} 
                  if($applications->familyFatherLiving == "Living" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                            <label class="btn btn-outline-secondary">Deceased<input type="radio" id="btnradio-2" name="familyFatherLiving" value="Deceased" 
                <?php if(count($errors)>0 && old('familyFatherLiving') == "Deceased") {echo 'checked="checked"';} 
                  if($applications->familyFatherLiving == "Deceased" && count($errors) == 0){echo 'checked="checked"';} ?> ></label></div><br>
                @if($errors->has('familyFatherLiving'))
                                 <small><i>*{{ $errors->first('familyFatherLiving') }}</i></small>
                                @endif
                                            </th>
                                            <th style="width: 300px;">MOTHER<br>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons"></div>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Living<input type="radio" id="btnradio1" name="familyMotherLiving" value="Living" 
                <?php if(count($errors)>0 && old('familyMotherLiving') == "Living") {echo 'checked="checked"';} 
                  if($applications->familyMotherLiving == "Living" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                                <label class="btn btn-outline-secondary">Deceased<input type="radio" id="btnradio-2" name="familyMotherLiving" value="Deceased" 
                <?php if(count($errors)>0 && old('familyMotherLiving') == "Deceased") {echo 'checked="checked"';} 
                  if($applications->familyMotherLiving == "Deceased" && count($errors) == 0){echo 'checked="checked"';} ?> ></label></div>
            @if($errors->has('familyMotherLiving'))
                                 <small><i>*{{ $errors->first('familyMotherLiving') }}</i></small>
                                @endif
                                            </th>
                                            <th style="width: 300px;">HUSBAND/WIFE<br>(if married)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-left"><strong>Name:</strong></td>
                                            
                                            <td><input class="form-control" type="text" required="" placeholder="Father's Name" name="familyFatherName" value="<?php
                                if (count($errors)>0){
                                    echo old('familyFatherName');
                                }
                                else{ 
                                    echo $applications->familyFatherName;
                                }
                        
                                 ?>">
                                                @if($errors->has('familyFatherName'))
                                                    <small><i>*{{ $errors->first('familyFatherName') }}</i></small>
                                                @endif
                                            </td>

                                            <td><input class="form-control" type="text" required="" placeholder="Mother's Name" name="familyMotherName" value="<?php
                                if (count($errors)>0){
                                    echo old('familyMotherName');
                                }
                                else{ 
                                    echo $applications->familyMotherName;
                                }
                                 ?>">
                                                @if($errors->has('familyMotherName'))
                                                    <small><i>*{{ $errors->first('familyMotherName') }}</i></small>
                                                @endif
                                            </td>

                                            <td><input class="form-control" type="text" placeholder="Spouse's Name" name="familySpouseName" value="<?php
                                if (count($errors)>0){
                                    echo old('familySpouseName');
                                }
                                else{ 
                                    echo $applications->familySpouseName;
                                }
                        
                                 ?>">
                                                @if($errors->has('familySpouseName'))
                                                    <small><i>*{{ $errors->first('familySpouseName') }}</i></small>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Address:</strong></td>
                                            <td><input class="form-control" type="text" required="" placeholder="Father's Address" name="familyFatherAddress" value="<?php
                                if (count($errors)>0){
                                    echo old('familyFatherAddress');
                                }
                                else{ 
                                    echo $applications->familyFatherAddress;
                                }
                        
                                 ?>"></td>

                                            <td><input class="form-control" type="text" required="" placeholder="Mother's Address" name="familyMotherAddress" value="<?php
                                if (count($errors)>0){
                                    echo old('familyMotherAddress');
                                }
                                else{ 
                                    echo $applications->familyMotherAddress;
                                }
                        
                                 ?>"></td>

                                            <td><input class="form-control" type="text" placeholder="Spouse's Address" name="familySpouseAddress" value="<?php
                                if (count($errors)>0){
                                    echo old('familySpouseAddress');
                                }
                                else{ 
                                    echo $applications->familySpouseAddress;
                                }
                        
                                 ?>"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left" id="familyFatherContact"><strong>Contact No.:</strong></td>
                                            <td><input class="form-control" type="text" required="" placeholder="Father's Contact No." name="familyFatherContact" value="<?php
                                if (count($errors)>0){
                                    echo old('familyFatherContact');
                                }
                                else{ 
                                    echo $applications->familyFatherContact;
                                }
                        
                                 ?>">
                                                @if($errors->has('familyFatherContact'))
                                                    <small><i>*{{ $errors->first('familyFatherContact') }}</i></small>
                                                @endif
                                            </td>

                                            <td id="familyMotherContact"><input class="form-control" type="text" required="" placeholder="Mother's Contact No." name="familyMotherContact" value="<?php
                                if (count($errors)>0){
                                    echo old('familyMotherContact');
                                }
                                else{ 
                                    echo $applications->familyMotherContact;
                                }
                        
                                 ?>">
                                                @if($errors->has('familyMotherContact'))
                                                    <small><i>*{{ $errors->first('familyMotherContact') }}</i></small>
                                                @endif
                                            </td>

                                            <td id="familySpouseContact"><input class="form-control" type="text" placeholder="Spouse's Contact No." name="familySpouseContact" value="<?php
                                if (count($errors)>0){
                                    echo old('familySpouseContact');
                                }
                                else{ 
                                    echo $applications->familySpouseContact;
                                }
                        
                                 ?>">
                                                @if($errors->has('familySpouseContact'))
                                                    <small><i>*{{ $errors->first('familySpouseContact') }}</i></small>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Occupation:</strong></td>
                                            <td><input class="form-control" type="text" required="" placeholder="Father's Occupation" name="familyFatherOccupation" value="<?php
                                if (count($errors)>0){
                                    echo old('familyFatherOccupation');
                                }
                                else{ 
                                    echo $applications->familyFatherOccupation;
                                }
                        
                                 ?>"></td>
                                            <td><input class="form-control" type="text" required="" placeholder="Mother's Occupation" name="familyMotherOccupation" value="<?php
                                if (count($errors)>0){
                                    echo old('familyMotherOccupation');
                                }
                                else{ 
                                    echo $applications->familyMotherOccupation;
                                }
                        
                                 ?>"></td>
                                            <td><input class="form-control" type="text" placeholder="Spouse's Occupation" name="familySpouseOccupation" value="<?php
                                if (count($errors)>0){
                                    echo old('familySpouseOccupation');
                                }
                                else{ 
                                    echo $applications->familySpouseOccupation;
                                }
                        
                                 ?>"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Place of Work:</strong></td>
                                            <td><input class="form-control" type="text" required="" placeholder="Father's Place of Work" name="familyFatherWorkPlace" value="<?php
                                if (count($errors)>0){
                                    echo old('familyFatherWorkPlace');
                                }
                                else{ 
                                    echo $applications->familyFatherWorkPlace;
                                }
                        
                                 ?>"></td>
                                            <td><input class="form-control" type="text" required="" placeholder="Mother's Place of Work" name="familyMotherWorkPlace" value="<?php
                                if (count($errors)>0){
                                    echo old('familyMotherWorkPlace');
                                }
                                else{ 
                                    echo $applications->familyMotherWorkPlace;
                                }
                        
                                 ?>"></td>
                                            <td><input class="form-control" type="text" placeholder="Spouse's Place of Work" name="familySpouseWorkPlace" value="<?php
                                if (count($errors)>0){
                                    echo old('familySpouseWorkPlace');
                                }
                                else{ 
                                    echo $applications->familySpouseWorkPlace;
                                }
                        
                                 ?>"></td>
                                        </tr>
                                        <tr>
                                            <td class="text-left"><strong>Highest Educational</strong><br><strong>Attainment:</strong></td>
                                            <td><input class="form-control" type="text" required="" placeholder="Father's Highest Edicational Attainment" name="familyFatherHighestEduc" value="<?php
                                if (count($errors)>0){
                                    echo old('familyFatherHighestEduc');
                                }
                                else{ 
                                    echo $applications->familyFatherHighestEduc;
                                }
                        
                                 ?>"></td>
                                            <td><input class="form-control" type="text" required="" placeholder="Mother's Highest Educational Attainment" name="familyMotherHighestEduc" value="<?php
                                if (count($errors)>0){
                                    echo old('familyMotherHighestEduc');
                                }
                                else{ 
                                    echo $applications->familyMotherHighestEduc;
                                }
                        
                                 ?>"></td>
                                            <td><input class="form-control" type="text" placeholder="Spouse's Highest Educational Attainment" name="familySpouseHighestEduc" value="<?php
                                if (count($errors)>0){
                                    echo old('familySpouseHighestEduc');
                                }
                                else{ 
                                    echo $applications->familySpouseHighestEduc;
                                }
                        
                                 ?>"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div></div>
                            <div class="form-row">

                                <div class="col-xl-5" style="width: 450px;">
                                    <p class="text-left" id="siblingsNumber"><strong>Number of siblings in the family (including applicant):</strong><br></p>
                                </div>
                                <div class="col-xl-2"><input class="form-control" name="siblingsNumber" type="text" required="" placeholder="No. of siblings"  value="{{ old('siblingsNumber') }}">
                                    @if($errors->has('siblingsNumber'))
                                        <small><i>*{{ $errors->first('siblingsNumber') }}</i></small>
                                    @endif
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <p class="text-left"><strong>Please fill out the information about your FIRST</strong>&nbsp;<strong>FIVE SIBLINGS IN DESCENDING ORDER (if the applicant has 4 or more siblings):</strong><br></p>
                                </div>
                            </div>
                            <div style="margin-top: 15px;">
                                <div class="table-responsive">
                                    <table class="table" id="siblings">
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

                            @if(isset($siblings[0]))
                            <input type="hidden" name="siblingId1" value="{{ $siblings[0]->id }}">
                            @endif
                                            <tr>
                                                <td><input class="form-control" type="text" placeholder="Sibling's Name" name="siblingName1" value="<?php
                                if (count($errors) > 0 ){
                                    echo old('siblingName1');
                                }
                                else{ 
                                    echo @$siblings[0]->siblingName;
                                }
                        
                                 ?>">
                                                    @if($errors->has('siblingName1'))
                                                        <small><i>*{{ $errors->first('siblingName1') }}</i></small>
                                                    @endif
                                                </td>

                                                <td style="width: 100px;"><input class="form-control" type="text" style="width: 100px;" placeholder="Sibling's Age" name="siblingAge1" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingAge1');
                                }
                                else{ 
                                    echo @$siblings[0]->siblingAge;
                                }
                        
                                 ?>">
                                                    @if($errors->has('siblingAge1'))
                                                        <small><i>*{{ $errors->first('siblingAge1') }}</i></small>
                                                    @endif
                                                </td>

                                                <td style="height: 62px;">
                                                    <div class="btn-group btn-group-toggle" data-toggle="buttons" style="margin: 0px;">

                                                    <label class="btn btn-outline-secondary">Single<input type="radio" id="btnradio1" name="siblingCivilStatus1" value="Single" 
            <?php if(count($errors)>0 && old('siblingCivilStatus1') == "Single") {echo 'checked="checked"';} 
                  if(@$siblings[0]->siblingCivilStatus == "Single" && count($errors) == 0){echo 'checked="checked"';} ?>> </label>

                                                    <label class="btn btn-outline-secondary">Married<input type="radio" id="btnradio-2" name="siblingCivilStatus1" value="Married" 
                <?php if(count($errors)>0 && old('siblingCivilStatus1') == "Married") {echo 'checked="checked"';} 
                  if(@$siblings[0]->siblingCivilStatus == "Married" && count($errors) == 0){echo 'checked="checked"';} ?> ></label></div>
                                                </td>
                                                <td><input class="form-control" type="text" placeholder="Sibling's Highest Educational Attainment" name="siblingHighestEduc1" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingHighestEduc1');
                                }
                                else{ 
                                    echo @$siblings[0]->siblingHighestEduc;
                                }
                        
                                 ?>"></td>
                                                <td>
                                
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Yes<input type="radio" id="btnradio1" name="siblingWork1" value="Yes"  
                <?php if(count($errors)>0 && old('siblingWork1') == "Yes") {echo 'checked="checked"';} 
                  if(@$siblings[0]->siblingWork == "Yes" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                                <label class="btn btn-outline-secondary">No<input type="radio" id="btnradio-2" name="siblingWork1"  name="siblingWork1" value="No" 
                 <?php if(count($errors)>0 && old('siblingWork1') == "No") {echo 'checked="checked"';} 
                  if(@$siblings[0]->siblingWork == "No" && count($errors) == 0){echo 'checked="checked"';} ?>></label>

                                                </div>
                                                </td>
                                                <td><input class="form-control" type="text" inputmode="numeric" name="siblingMonthlyIncome1" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingMonthlyIncome1');
                                }
                                else{ 
                                    echo @$siblings[0]->siblingMonthlyIncome;
                                }
                        
                                 ?>">
                                                    @if($errors->has('siblingMonthlyIncome1'))
                                                        <small><i>*{{ $errors->first('siblingMonthlyIncome1') }}</i></small>
                                                    @endif
                                                </td>
                                            </tr>
                            
                                            <tr>
                              @if(isset($siblings[1]))
                            <input type="hidden" name="siblingId2" value="{{ $siblings[1]->id }}">
                            @endif
                                                <td><input class="form-control" type="text" placeholder="Sibling's Name" name="siblingName2" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingName2');
                                }
                                else{ 
                                    echo @$siblings[1]->siblingName;
                                }
                        
                                 ?>">
                                                    @if($errors->has('siblingName2'))
                                                        <small><i>*{{ $errors->first('siblingName2') }}</i></small>
                                                    @endif
                                                </td>
                                                <td style="width: 100px;"><input class="form-control" type="text" style="width: 100px;" placeholder="Sibling's Age" name="siblingAge2" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingAge2');
                                }
                                else{ 
                                    echo @$siblings[1]->siblingAge;
                                }
                        
                                 ?>">
                                                    @if($errors->has('siblingAge2'))
                                                        <small><i>*{{ $errors->first('siblingAge2') }}</i></small>
                                                    @endif
                                                </td>
                                                <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Single<input type="radio" id="btnradio-25" name="siblingCivilStatus2" value="Single" 
                <?php if(count($errors)>0 && old('siblingCivilStatus2') == "Single") {echo 'checked="checked"';} 
                  if(@$siblings[1]->siblingCivilStatus == "Single" && count($errors) == 0){echo 'checked="checked"';} ?>
                 ></label>

                                                <label class="btn btn-outline-secondary">Married<input type="radio" id="btnradio-26" name="siblingCivilStatus2" value="Married" 
                   <?php if(count($errors)>0 && old('siblingCivilStatus2') == "Married") {echo 'checked="checked"';} 
                  if(@$siblings[1]->siblingCivilStatus == "Married" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                                </div>
                                                </td>
                                                <td><input class="form-control" type="text" placeholder="Sibling's Highest Educational Attainment" name="siblingHighestEduc2" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingHighestEduc2');
                                }
                                else{ 
                                    echo @$siblings[1]->siblingHighestEduc;
                                }
                        
                                 ?>"></td>
                                                <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Yes<input type="radio" id="btnradio-27" name="siblingWork2" value="Yes"
                    <?php if(count($errors)>0 && old('siblingWork2') == "Yes") {echo 'checked="checked"';} 
                  if(@$siblings[1]->siblingWork == "Yes" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                                <label class="btn btn-outline-secondary">No<input type="radio" id="btnradio-28" name="siblingWork2" value="No" 
                  <?php if(count($errors)>0 && old('siblingWork2') == "No") {echo 'checked="checked"';} 
                  if(@$siblings[1]->siblingWork == "No" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                                </div>
                                                </td>
                                                <td><input class="form-control" type="text" name="siblingMonthlyIncome2" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingMonthlyIncome2');
                                }
                                else{ 
                                    echo @$siblings[1]->siblingMonthlyIncome;
                                }
                        
                                 ?>">
                                                    @if($errors->has('siblingMonthlyIncome2'))
                                                        <small><i>*{{ $errors->first('siblingMonthlyIncome2') }}</i></small>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                            @if(isset($siblings[2]))
                            <input type="hidden" name="siblingId3" value="{{ $siblings[2]->id }}">
                            @endif
                                                <td><input class="form-control" type="text" placeholder="Sibling's Name" name="siblingName3" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingName3');
                                }
                                else{ 
                                    echo @$siblings[2]->siblingName;
                                }
                        
                                 ?>">
                                                    @if($errors->has('siblingName3'))
                                                        <small><i>*{{ $errors->first('siblingName3') }}</i></small>
                                                    @endif
                                                </td>
                                                <td style="width: 100px;"><input class="form-control" type="text" style="width: 100px;" placeholder="Sibling's Age" name="siblingAge3" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingAge3');
                                }
                                else{ 
                                    echo @$siblings[2]->siblingAge;
                                }
                        
                                 ?>">
                                                    @if($errors->has('siblingAge3'))
                                                        <small><i>*{{ $errors->first('siblingAge3') }}</i></small>
                                                    @endif
                                                </td>
                                                <td>
                                                
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Single<input type="radio" id="btnradio-21" name="siblingCivilStatus3" value="Single" 
                <?php if(count($errors)>0 && old('siblingCivilStatus3') == "Single") {echo 'checked="checked"';} 
                  if(@$siblings[2]->siblingCivilStatus == "Single" && count($errors) == 0){echo 'checked="checked"';} ?>
 ></label>

                                                <label class="btn btn-outline-secondary">Married<input type="radio" id="btnradio-22" name="siblingCivilStatus3" value="Married" 
                   <?php if(count($errors)>0 && old('siblingCivilStatus3') == "Married") {echo 'checked="checked"';} 
                  if(@$siblings[2]->siblingCivilStatus == "Married" && count($errors) == 0){echo 'checked="checked"';} ?> ></label></div>
                                                </td>

                                                <td><input class="form-control" type="text" placeholder="Sibling's Highest Educational Attainment" name="siblingHighestEduc3" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingHighestEduc3');
                                }
                                else{ 
                                    echo @$siblings[2]->siblingHighestEduc;
                                }
                        
                                 ?>"></td>
                                                <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Yes<input type="radio" id="btnradio-23" name="siblingWork3" value="Yes" 
                    <?php if(count($errors)>0 && old('siblingWork3') == "Yes") {echo 'checked="checked"';} 
                  if(@$siblings[2]->siblingWork == "Yes" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                                <label class="btn btn-outline-secondary">No<input type="radio" id="btnradio-24"  name="siblingWork3" value="No"
                <?php if(count($errors)>0 && old('siblingWork3') == "No") {echo 'checked="checked"';} 
                  if(@$siblings[2]->siblingWork == "No" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                                </div>
                                                </td>
                                                <td><input class="form-control" type="text" name="siblingMonthlyIncome3" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingMonthlyIncome3');
                                }
                                else{ 
                                    echo @$siblings[2]->siblingMonthlyIncome;
                                }
                        
                                 ?>">
                                                    @if($errors->has('siblingMonthlyIncome3'))
                                                        <small><i>*{{ $errors->first('siblingMonthlyIncome3') }}</i></small>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                             @if(isset($siblings[3]))
                            <input type="hidden" name="siblingId4" value="{{ $siblings[3]->id }}">
                            @endif
                                                <td><input class="form-control" type="text" placeholder="Sibling's Name" name="siblingName4" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingName4');
                                }
                                else{ 
                                    echo @$siblings[3]->siblingName;
                                }
                                 ?>">
                                                    @if($errors->has('siblingName4'))
                                                        <small><i>*{{ $errors->first('siblingName4') }}</i></small>
                                                    @endif
                                                </td>

                                                <td style="width: 100px;"><input class="form-control" type="text" style="width: 100px;" placeholder="Sibling's Age" name="siblingAge4" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingAge4');
                                }
                                else{ 
                                    echo @$siblings[3]->siblingAge;
                                }
                        
                                 ?>">
                                                    @if($errors->has('siblingAge4'))
                                                        <small><i>*{{ $errors->first('siblingAge4') }}</i></small>
                                                    @endif
                                                </td>
                                                <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Single<input type="radio" id="btnradio-17" name="siblingCivilStatus4" value="Single" 
                <?php if(count($errors)>0 && old('siblingCivilStatus4') == "Single") {echo 'checked="checked"';} 
                  if(@$siblings[3]->siblingCivilStatus == "Single" && count($errors) == 0){echo 'checked="checked"';} ?>
 ></label>

                                                <label class="btn btn-outline-secondary">Married<input type="radio" id="btnradio-18" name="siblingCivilStatus4" value="Married" 
                 <?php if(count($errors)>0 && old('siblingCivilStatus4') == "Married") {echo 'checked="checked"';} 
                  if(@$siblings[3]->siblingCivilStatus == "Married" && count($errors) == 0){echo 'checked="checked"';} ?> ></label></div>
                                                </td>
                                                <td><input class="form-control" type="text" placeholder="Sibling's Highest Educational Attainment" name="siblingHighestEduc4" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingHighestEduc4');
                                }
                                else{ 
                                    echo @$siblings[3]->siblingHighestEduc;
                                }
                        
                                 ?>"></td>
                                                <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Yes<input type="radio" id="btnradio-19" name="siblingWork4" value="Yes" 
            <?php if(count($errors)>0 && old('siblingWork4') == "Yes") {echo 'checked="checked"';} 
                  if(@$siblings[3]->siblingWork == "Yes" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                                <label class="btn btn-outline-secondary">No<input type="radio" id="btnradio-20" name="siblingWork4" value="No" 
            <?php if(count($errors)>0 && old('siblingWork4') == "No") {echo 'checked="checked"';} 
                  if(@$siblings[3]->siblingWork == "No" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                                </div>
                                                </td>
                                                <td><input class="form-control" type="text" name="siblingMonthlyIncome4" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingMonthlyIncome4');
                                }
                                else{ 
                                    echo @$siblings[3]->siblingMonthlyIncome;
                                }
                        
                                 ?>">
                                                    @if($errors->has('siblingMonthlyIncome4'))
                                                        <small><i>*{{ $errors->first('siblingMonthlyIncome4') }}</i></small>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                @if(isset($siblings[4]))
                            <input type="hidden" name="siblingId5" value="{{ $siblings[4]->id }}">
                            @endif
                                                <td><input class="form-control" type="text" placeholder="Sibling's Name" name="siblingName5" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingName5');
                                }
                                else{ 
                                    echo @$siblings[4]->siblingName;
                                }
                        
                                 ?>">
                                                    @if($errors->has('siblingName5'))
                                                        <small><i>*{{ $errors->first('siblingName5') }}</i></small>
                                                    @endif
                                                </td>
                                                <td style="width: 100px;"><input class="form-control" type="text" style="width: 100px;" placeholder="Sibling's Age" name="siblingAge5" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingAge5');
                                }
                                else{ 
                                    echo @$siblings[4]->siblingAge;
                                }
                        
                                 ?>">
                                                    @if($errors->has('siblingAge5'))
                                                        <small><i>*{{ $errors->first('siblingAge5') }}</i></small>
                                                    @endif
                                                </td>
                                                <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">

                                                <label class="btn btn-outline-secondary">Single<input type="radio" id="btnradio-8" name="siblingCivilStatus5" value="Single" 
                <?php if(count($errors)>0 && old('siblingCivilStatus5') == "Single") {echo 'checked="checked"';} 
                  if(@$siblings[4]->siblingCivilStatus == "Single" && count($errors) == 0){echo 'checked="checked"';} ?>
 ></label>

                                                <label class="btn btn-outline-secondary">Married<input type="radio" id="btnradio-9"  name="siblingCivilStatus5" value="Married" 
                <?php if(count($errors)>0 && old('siblingCivilStatus5') == "Married") {echo 'checked="checked"';} 
                  if(@$siblings[4]->siblingCivilStatus == "Married" && count($errors) == 0){echo 'checked="checked"';} ?> ></label></div>
                                                </td>
                                                <td><input class="form-control" type="text" placeholder="Sibling's Highest Educational Attainment" name="siblingHighestEduc5" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingHighestEduc5');
                                }
                                else{ 
                                    echo @$siblings[4]->siblingHighestEduc;
                                }
                        
                                 ?>"></td>
                                                <td>
                                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                                <label class="btn btn-outline-secondary">Yes<input type="radio" id="btnradio-10" name="siblingWork5" value="Yes"  
                <?php if(count($errors)>0 && old('siblingWork5') == "Yes") {echo 'checked="checked"';} 
                  if(@$siblings[4]->siblingWork == "Yes" && count($errors) == 0){echo 'checked="checked"';} ?> ></label>

                                                <label class="btn btn-outline-secondary">No<input type="radio" id="btnradio-16"  name="siblingWork5" value="No" 
                <?php if(count($errors)>0 && old('siblingWork5') == "No") {echo 'checked="checked"';} 
                  if(@$siblings[4]->siblingWork == "No" && count($errors) == 0){echo 'checked="checked"';} ?> ></label></div>
                                                </td>
                                                <td><input class="form-control" type="text" name="siblingMonthlyIncome5" value="<?php
                                if (count($errors) > 0){
                                    echo old('siblingMonthlyIncome5');
                                }
                                else{ 
                                    echo @$siblings[4]->siblingMonthlyIncome;
                                }
                        
                                 ?>">
                                                    @if($errors->has('siblingMonthlyIncome5'))
                                                        <small><i>*{{ $errors->first('siblingMonthlyIncome5') }}</i></small>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
                            <p class="text-left"><strong>Instructions:</strong><br><strong>1. Scan all the required documents.</strong><br><strong>2. Upload all the scanned documents in the specific box (Applicants can upload 1 or more images/files in each table).</strong><br><strong>3. Make sure that the documents you have uploaded are in the right box.</strong></p>
@if(count($errors)>0)
<div class="alert alert-danger" role="alert"><b>
  Reupload the Required Documents again<b>
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
                                                <td class="text-left"><strong>1. Enrolment Form&nbsp;</strong>for Current Semester/Term with Official Receipt, if applicable<br></td>
                                                <td>
  @foreach($enrollForms as $enrollForm)
                                @if($enrollForm != "")
                                    <picture>
                                    <a target="_blank" href="{{asset("images/$folder/applicationEnrollmentForm/$enrollForm")}}">
                                     <img src="{{asset("images/$folder/applicationEnrollmentForm/$enrollForm")}}" style="height: 150px;">
                                    <input type="hidden" name="old_applicationEnrollmentForm[]" value="{{ $enrollForm }}"> 
                                     </a>  
                                    </picture>
                                    <br>
                                @endif
                                @endforeach
  <small><i i style="color: gray;font-weight: 500">*Upload only if need to resolve</i></small>
  <input type="file" accept="image/*" id="applicationEnrollmentForm" name="applicationEnrollmentForm[]" required="" multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">

  @if($errors->has('applicationEnrollmentForm'))
    <small><i>*{{ $errors->first('applicationEnrollmentForm') }}</i></small>
    @endif

</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>2.Authenticated or True Copy of Grades</strong>&nbsp;last semester, with school seal/official signature (for trimester, grades for the past 2 terms)<br></td>
                                                <td>
     @foreach($authGrades as $authGrade)
                                @if($authGrade != "")
                                    <picture>
                                    <a target="_blank" href="{{asset("images/$folder/applicationReportCard/$authGrade")}}">
                                     <img src="{{asset("images/$folder/applicationReportCard/$authGrade")}}" style="height: 150px;">
                                    <input type="hidden" name="old_applicationReportCard[]" value="{{ $authGrade }}">

                                     </a>  
                                    </picture>
                                    <br>
                                @endif
                                @endforeach
<small><i i style="color: gray;font-weight: 500">*Upload only if need to resolve</i></small>
  <input type="file" accept="image/*" id="applicationReportCard" name="applicationReportCard[]" required="" multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">
  @if($errors->has('applicationReportCard'))
    <small><i>*{{ $errors->first('applicationReportCard') }}</i></small>
    @endif
</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>3. Junior &amp; Senior High School Report Card/Diploma/</strong>&nbsp;Other valid proof of having Graduated from High School<br></td>
                                                <td>
      @foreach($diplomas as $diploma)
                                @if($diploma != "")
                                    <picture>
                                        <a target="_blank" href="{{asset("images/$folder/applicationDiploma/$diploma")}}">
                                        <img src="{{asset("images/$folder/applicationDiploma/$diploma")}}" style="height: 150px;">
                                        <input type="hidden" name="old_applicationDiploma[]" value="{{ $diploma }}">
                                     </a>  
                                    </picture>
                                    <br>
                                @endif
                                @endforeach
<small><i i style="color: gray;font-weight: 500">*Upload only if need to resolve</i></small>
  <input type="file" accept="image/*" id="applicationDiploma" name="applicationDiploma[]" required="" multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">
   @if($errors->has('applicationDiploma'))
    <small><i>*{{ $errors->first('applicationDiploma') }}</i></small>
    @endif
</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>4.Certificate of Good Moral Character&nbsp;</strong>(Issued within the school year)<br></td>
                                                <td>
     @foreach($goodMoral as $gM)
                            @if($gM != "")
                                    <picture>
                                     <a target="_blank" href="{{asset("images/$folder/applicationGoodMoral/$gM")}}">
                                        <img src="{{asset("images/$folder/applicationGoodMoral/$gM")}}" style="height: 150px;">
                                         <input type="hidden" name="old_applicationGoodMoral[]" value="{{ $gM }}">
                                     </a>  
                                    </picture>
                                    <br>
                            @endif
                            @endforeach
<small><i i style="color: gray;font-weight: 500">*Upload only if need to resolve</i></small>
  <input type="file" accept="image/*" id="applicationGoodMoral" name="applicationGoodMoral[]" required="" multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">
   @if($errors->has('applicationGoodMoral'))
    <small><i>*{{ $errors->first('applicationGoodMoral') }}</i></small>
    @endif
</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>5. School ID</strong>&nbsp;(back to back in a single page)<br></td>
                                                <td>
     @foreach($schoolId as $sI)
                            @if($sI != "")
                                    <picture>
                                     <a target="_blank" href="{{asset("images/$folder/applicationSchoolId/$sI")}}">
                                        <img src="{{asset("images/$folder/applicationSchoolId/$sI")}}" style="height: 150px;">
                                         <input type="hidden" name="old_applicationSchoolId[]" value="{{ $sI }}">
                                     </a>  
                                    </picture>
                                    <br>
                            @endif
                            @endforeach
<small><i i style="color: gray;font-weight: 500">*Upload only if need to resolve</i></small>
  <input type="file" accept="image/*" id="applicationSchoolId" name="applicationSchoolId[]" required="" multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">
   @if($errors->has('applicationSchoolId'))
    <small><i>*{{ $errors->first('applicationSchoolId') }}</i></small>
    @endif
</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>6. Certificate of Academic Excellence for Top 10 graduates</strong><br><strong>of Taguig public high school</strong>&nbsp;(for Honors/Full scholar applicants)<br></td>
                                                <td>
     @foreach($certExe as $cE)
                            @if($cE != "")
                                    <picture>
                                     <a target="_blank" href="{{asset("images/$folder/applicationAcademicExcellence/$cE")}}">
                                        <img src="{{asset("images/$folder/applicationAcademicExcellence/$cE")}}" style="height: 150px;">
                                        <input type="hidden" name="old_applicationAcademicExcellence[]" value="{{ $cE }}">
                                     </a>  
                                    </picture>
                                    <br>
                            @endif
                            @endforeach
<small><i i style="color: gray;font-weight: 500">*Upload only if need to resolve</i></small>
  <input type="file" accept="image/*" id="applicationAcademicExcellence" name="applicationAcademicExcellence[]" multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">
</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>7. Voter’s Certification</strong>&nbsp;issued by COMELEC, showing that<strong>&nbsp;at least one of the parents</strong>&nbsp;of the applicant is a registered voter (Issued after the May 13, 2019 election)<br></td>
                                                <td>
     @foreach($votersP as $vP)
                            @if($vP != "")
                                    <picture>
                                     <a target="_blank" href="{{asset("images/$folder/applicationVotersCertificateP/$vP")}}">
                                        <img src="{{asset("images/$folder/applicationVotersCertificateP/$vP")}}" style="height: 150px;">
                                    <input type="hidden" name="old_applicationVotersCertificateP[]" value="{{ $vP }}">
                                     </a>  
                                    </picture>
                                    <br>
                            @endif
                            @endforeach
<small><i i style="color: gray;font-weight: 500">*Upload only if need to resolve</i></small>
  <input type="file" accept="image/*" id="applicationVotersCertificateP" name="applicationVotersCertificateP[]" required="" multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">
   @if($errors->has('applicationVotersCertificateP'))
    <small><i>*{{ $errors->first('applicationVotersCertificateP') }}</i></small>
    @endif
</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>8. Voter's Certification of the applicant if 18 years old and above</strong><br>(Issued after the May 13,2019 election)<br></td>
                                                <td>
     @foreach($voters as $vS)
                            @if($vS != "")
                                    <picture>
                                     <a target="_blank" href="{{asset("images/$folder/applicationVotersCertificate/$vS")}}">
                                        <img src="{{asset("images/$folder/applicationVotersCertificate/$vS")}}" style="height: 150px;">
                                         <input type="hidden" name="old_applicationVotersCertificate[]" value="{{ $vS }}">
                                     </a>  
                                    </picture>
                                    <br>
                            @endif
                            @endforeach
<small><i i style="color: gray;font-weight: 500">*Upload only if need to resolve</i></small>
  <input type="file" accept="image/*" id="applicationVotersCertificate" name="applicationVotersCertificate[]" multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">
    @if($errors->has('applicationVotersCertificate'))
    <small><i>*{{ $errors->first('applicationVotersCertificate') }}</i></small>
    @endif
</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>9.&nbsp;Birth Certificate</strong><br></td>
                                                <td>
    @foreach($birthCert as $bC)
                            @if($bC != "")
                                    <picture>
                                     <a target="_blank" href="{{asset("images/$folder/applicationVotersCertificate/$bC")}}">
                                        <img src="{{asset("images/$folder/applicationBirthCertificate/$bC")}}" style="height: 150px;">
                                        <input type="hidden" name="old_applicationBirthCertificate[]" value="{{ $bC }}">
                                     </a>  
                                    </picture>
                                    <br>
                            @endif
                            @endforeach
<small><i i style="color: gray;font-weight: 500">*Upload only if need to resolve</i></small>
  <input type="file" accept="image/*" id="applicationBirthCertificate" name="applicationBirthCertificate[]" required="" multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">
   @if($errors->has('applicationVotersCertificate'))
    <small><i>*{{ $errors->first('applicationVotersCertificate') }}</i></small>
    @endif
</td>
                                            </tr>
                                            <tr>
                                                <td class="text-left"><strong>10.&nbsp;Other necessary documents&nbsp;</strong>to facilitate the processing of your scholarship application (Transcript or True Copy of Grades since start of college for New Applicants who are continuing students, F137, Course Curriculum,&nbsp;<strong>PDAO Endorsement and ID</strong>&nbsp;(for PWD Applicants), etc.&nbsp;<strong>(Compile all other necessary documents in one PDF file)</strong><br></td>
                                                <td>
     @foreach($otherDocs as $oD)
                            @if($oD != "")
                                    <picture>
                                     <a target="_blank" href="{{asset("images/$folder/applicationOtherDocs/$oD")}}">
                                        <img src="{{asset("images/$folder/applicationOtherDocs/$oD")}}" style="height: 150px;">
                                        <input type="hidden" name="old_applicationOtherDocs[]" value="{{ $oD }}">
                                     </a>  
                                    </picture>
                                    <br>
                            @endif
                            @endforeach
<small><i i style="color: gray;font-weight: 500">*Upload only if need to resolve</i></small>
  <input type="file" accept="image/*" id="applicationOtherDocs" name="applicationOtherDocs[]" multiple style="background-color: lightgrey;  padding: 70px; padding-bottom: 10px; padding-top: 10px; border-radius: 0px; border: dashed 2px black; position: ">
</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div>
                                <p class="text-center"><br>I hereby certify that <strong>ALL </strong>the answers given above are <strong>TRUE</strong> and<strong> CORRECT</strong> to the best of my knowledge, and the<br>attached documents are <strong>FAITHFUL REPRODUCTION </strong>of the original copies. I further acknowledge that <strong>ANY ACT OF</strong><br><strong>DISHONESTY OR FALSIFICATION MAY BE A GROUND FOR MY DISQUALIFICATION</strong> from this scholarship program.<br><br>I also understand that this submission of application does <strong>NOT</strong> automatically qualify me for the scholarship grant and<br>that I will abide by the decision of the L.A.N.I. Scholarship Management.<br><br>Thank you very much.<br><br></p>
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
<td style="width: 545.2px;height: 152.8px;"><p><input type="file"   accept="image/*" name="scholarSignature[]" id="filee"  onchange="loadFiles(event)" style="display: none;" required></p>

 @foreach($scholarSig as $sS)
 @if($sS != "")
<p><a target="_blank" href="{{asset("images/$folder/scholarSignature/$sS")}}"><img id="outputt" width="200" class="border border-danger" src="{{ asset("images/$folder/scholarSignature/$sS") }}" /></a></p>
<p><label class="btn btn-outline-secondary" for="filee" style="cursor: pointer;">Upload Signature</label></p>
 <input type="hidden" name="old_scholarSignature[]" value="{{ $sS }}">
 @endif
 @endforeach
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
                                            <td><input class="form-control" type="text" required="" placeholder="Enter Printed Name of Applicant" name="applicationApplicant" value="<?php
                                if (count($errors)>0){
                                    echo old('applicationApplicant');
                                }
                                else{ 
                                    echo $applications->applicationApplicant;
                                }
                        
                                 ?>">
                                                @if($errors->has('applicationApplicant'))
                                                    <small><i>*{{ $errors->first('applicationApplicant') }}</i></small>
                                                @endif
                                            </td>
                                            
                                            <td class="text-center"><input class="form-control" type="date" required="" name="signatureDate" value="<?php
                                if (count($errors)>0){
                                    echo old('signatureDate');
                                }
                                else{ 
                                    echo $applications->signatureDate;
                                }
                        
                                 ?>">
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
<td style="width: 545.2px;height: 152.8px;"><p><input type="file"   accept="image/*" name="guardianSignature[]" id="fileee"  onchange="loadFiless(event)" style="display: none;" required></p>

@foreach($parentSig as $pS)
@if($pS != "")
<p><a target="_blank" href="{{asset("images/$folder/guardianSignature/$pS")}}"><img id="outputtt" width="200" class="border border-danger" src="{{asset("images/$folder/guardianSignature/$pS")}}"/></a></p>
 <input type="hidden" name="old_guardianSignature[]" value="{{ $pS }}">
@endif
@endforeach

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

                                                    <input class="form-control" type="text" required="" placeholder="Enter Printed Name of Parent/Guardian" name="applicationApplicantParent" value="<?php
                                if (count($errors)>0){
                                    echo old('applicationApplicantParent');
                                }
                                else{ 
                                    echo $applications->applicationApplicantParent;
                                }
                        
                                 ?>">
                                                        @if($errors->has('applicationApplicantParent'))
                                                            <small><i>*{{ $errors->first('applicationApplicantParent') }}</i></small>
                                                        @endif
                                                    </td>
                                                   
                                                    <td class="text-center"><input class="form-control" type="date" required="" name="signatureDateParent" value="<?php
                                if (count($errors)>0){
                                    echo old('signatureDateParent');
                                }
                                else{ 
                                    echo $applications->signatureDateParent;
                                }
                        
                                 ?>">
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

                                                    <label class="btn btn-outline-secondary">Cash<input type="radio" id="btnradio1" name="transMode" value="Cash" 
                    <?php if(count($errors)>0 && old('transMode') == "Cash") {echo 'checked="checked"';} 
                    if($applications->transactionGcashNum != "Gcash" && count($errors) == 0){echo 'checked="checked"';}?> ></label>

                                                    <label class="btn btn-outline-secondary">Gcash<input type="radio" id="btnradio-2" name="transMode" value="Gcash" 
                    <?php if(count($errors)>0 && old('transMode') == "Gcash") {echo 'checked="checked"';} 
                    if($applications->transactionGcashNum == "Gcash" && count($errors) == 0){echo 'checked="checked"';}?> ></label>


                                                </div>
                                                <br>
                                                 <small> </small>

                         @if($errors->has('transMode'))
                    <small><i>*{{ $errors->first('transMode') }}</i></small>
                                                        @endif

                                                </td>
                                                <tr>
                                                <td>
                                                     <b>if Gcash, enter your Gcash Number </b>

                                                    <input class="form-control" type="text" style="width: 280px" placeholder="Enter Gcash Number" name="   transactionGcashNum" value="<?php
                                if (count($errors)>0){
                                    echo old('transactionGcashNum');
                                }
                                else{ 
                                    echo $applications->transactionGcashNum;
                                }
                        
                                 ?>">
                    @if($errors->has('transactionGcashNum'))
                    <small><i>*{{ $errors->first('transactionGcashNum') }}</i></small>
                    @endif
                    <br>

                                                    <b>if Gcash, enter your Gcash Name </b>

                                                    <input class="form-control" type="text" style="width: 280px" placeholder="Enter Gcash Name" name="   transactionGcashName" value="<?php
                                if (count($errors)>0){
                                    echo old('transactionGcashName');
                                }
                                else{ 
                                    echo $applications->transactionGcashName;
                                }
                        
                                 ?>">
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
                            </div>
                        </div>
                        <input type="hidden" name="applicationSubmitDate" value="{{ date('Y-m-d') }}">
                        {{-- ADD --}}
                        <input type="hidden" name="scholarId" value="{{ $get_data['scholarInfo']['scholarId'] }}">

                        <input type="hidden" name="sem" value="{{ $message['openSubmission'][0]->submissionSem }}">
                        <input type="hidden" name="year" value="{{ $message['openSubmission'][0]->submissionYear }}">
                        <input type="hidden" name="batch" value="{{ $message['openSubmission'][0]->submissionBatch }}">

                         <input type="hidden" name="applicationNumOfEdit" value="1">

                         <input type="hidden" name="applicationScholarStatus" value="new">
 
                               <div style="margin: 0px;margin-top: 25px;padding-bottom: 100px;height: 75px;">
                           {{--  <button class="btn btn-danger" type="submit">SUBMIT APPLICATION</button> --}}
        

                           <button type="submit" id="submit_document" tabindex="0" class="hoverable btn btn-lg btn-danger" role="button" data-toggle="popover" data-trigger="focus"  onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();"
 >SUBMIT APPLICATION</button>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </form>


<style type="text/css">
    .hoverable:not(:hover) + .show-on-hover {
    display: none;
}
</style>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script src="assets/js/Bootstrap-Image-Uploader.js"></script>
    <script src="assets/js/Custom-File-Upload.js"></script>
    <script src="https://kit.fontawesome.com/6360280a4c.js" crossorigin="anonymous"></script>
@stop