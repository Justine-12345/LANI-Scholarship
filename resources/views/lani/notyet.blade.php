
@extends('layouts.base')

@include('designs.notyetcss')

{{-- @include('layouts.nav') --}}

@section('body')
<body>
    <div class="contact-clean" style="padding-top: 50px; padding-bottom: 50px;background: rgb(128,125,125);">
        <h1 class="text-center" method="post" style="background: rgb(199,20,14); width: auto;"><label style="filter: blur(0px);font-size: 30px;color: rgb(255,255,255);">
            @if(@$soon != "na")
            Submission Opening : {{ $soon }}
             <br>
            @endif
            <br><strong><em>Application for the LANI Scholarship Program is not yet open.&nbsp;</em></strong></label>
            <div class="form-group"><label style="color: rgb(255,255,255);font-size: 20px;"><em>
             @if(@$soon == "na")
            Wait for the upcoming announcements and please get ready these following documents:&nbsp;
            @else
             Please get ready these following documents:&nbsp;
             @endif
        </em></label><br><br></div>
        </h1>
    </div>
    <div class="container" style="background: rgb(255,255,255);text-align: left;margin-top: 15px;margin-bottom: 15px;box-shadow: 0px 0px 20px;">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th style="text-align: center;width: 465px;color: rgb(199,20,14);font-size: 20px;">For New Applicants</th>
                        <th style="text-align: center;width: 465px;color: rgb(199,20,14);font-size: 20px;">For Renewal Applicants</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: justify;">-<strong> Filled-up Application Form</strong> with 2X2 Recent Picture<br>- <strong>Enrolment Form</strong> for Current Semester/Term with Official Receipt, if applicable<br>- <strong>Authenticated or True Copy of Grades</strong> last semester, with school seal/official signature (for trimester, grades for the past 2 terms)<br>- <strong>Junior &amp; Senior High School Report Card/Diploma</strong>/Other valid proof of having Graduated from High School<br>-<strong> Certificate of Good Moral Character</strong> (Issued within the school year)<br>- <strong>School ID</strong> (back to back photocopy in a single page)<br>- <strong>Certificate of Academic Excellence</strong> for Top 10 graduates of Taguig public high school (for Honors/Full scholar applicants)<br>- <strong>Voter’s Certification</strong> issued by COMELEC, showing that at least one of the parents&nbsp;of the applicant is a registered voter <strong><em>(Issued after the May 13, 2019 election)</em></strong><br>- <strong>Voter's Certification of the applicant</strong> if 18 years old and above <strong><em>(Issued after the May 13,2019 election)</em></strong><br>- <strong>Birth Certificate</strong><br>- Other necessary documents to facilitate the processing of your scholarship application (Transcript or True Copy of Grades since start of college for New Applicants who are continuing students, F137, Course Curriculum, <strong>PDAO Endorsement and ID (for PWD Applicants), etc.</strong><br>- <strong>Scanned or Digital Signature</strong> of Applicant and the Parent/Legal Guardian.<br></td>
                        <td style="text-align: justify;">-&nbsp;<strong>Filled-up Application Form</strong> with 2X2 Recent Picture<br>-&nbsp;<strong>Enrolment Form</strong> for Current Semester/Term with Official Receipt, if applicable<br>- <strong>Authenticated or True Copy of Grades</strong> last semester, with school seal/official&nbsp;signature (for trimester, grades for the past 2 terms)<br>-<strong> Certificate of Good Moral Character</strong> (Issued within the school year)<br>- <strong>School ID</strong> (back to back photocopy in a single page)<br>- <strong>Voter’s Certification</strong> issued by COMELEC, showing that at least one of the parents&nbsp;of the applicant is a registered voter <strong><em>(Issued after the May 13, 2019&nbsp;election)</em></strong><br>- <strong>Voter's Certification of the applicant</strong> if 18 years old and above <strong><em>(Issued after the May 13,2019 election)</em></strong><br>- <strong>Birth Certificate</strong><br>- Other necessary documents to facilitate the processing of your scholarship application (Transcript or True Copy of Grades since start of college for New Applicants who are continuing students, F137, Course Curriculum, <strong>PDAO Endorsement and ID (for PWD Applicants), etc.</strong><br>-&nbsp;<strong>Scanned or Digital Signature </strong>of Applicant and the&nbsp; Parent/Legal Guardian.<br><br></td>
                    </tr>
                    <tr></tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
{{-- @stop --}}