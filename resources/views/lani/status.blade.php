
@extends('layouts.base')

@include('designs.statuscss')

@include('layouts.nav')

@section('body')
{{-- {{ dd($application) }} --}}
<body>
    <h2 style="text-align: center;background: #807d7d;color: rgb(255,255,255);font-size: 40px;"><br><strong>STUDENT&nbsp;APPLICATION FORM</strong><br><br></h2>
@if(empty($submissions))
<div style="width: 300px; margin:auto;margin-top: 100px">
<p><b>No Application submitted <i class="far fa-folder-open"></i></b></p>
</div>
@endif
@foreach($submissions as $submission)
    
    <div class="container" style="box-shadow: 0px 0px 20px;margin-top: 20px;margin-bottom: 15px;">
        <h4 class="text-center" style="color: rgb(199,20,14);">&nbsp; School Year:&nbsp;<label>{{ $submission->submissionYear}}</label></h4>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr></tr>
                </thead>
                <tbody>

                @foreach($applications as $application)
                    @if($application->submissionYear == $submission->submissionYear)

                    <tr>
                      
                        <td style="width: 310px;"><strong>Semester:&nbsp;</strong><label>
                        @if($application->submissionSem == 1)
                            1st
                        @else
                            2nd
                        @endif

                        </label>&nbsp;</td>
                        <td style="width: 310px;"><strong>Batch no: </strong><label>{{ $application->submissionBatch }}</label></td>
                        <td style="width: 310px;"><strong>Submitted date: </strong><label>
                            @php 
                            $date=date_create($application->applicationSubmitDate);
                            @endphp
                            {{ date_format( $date, "M. d, Y") }}</label></td>
                        <td style="width: 310px;"><strong>Status:&nbsp;</strong><label>{{ ucwords($application->entriesStatus) }} | {{ $application->applicationScholarType }}</label></td>
                             <td>


                            @if($application->entriesStatus == "updated" || $application->entriesStatus == "process" )
                             <a href="{{ route('application.show', $application->applicationId) }}"><i class="far fa-eye" style="
                             font-size: 20px"></i></a>


                            @elseif($application->entriesStatus == "resolve")
                             <a
                            href="{{ route('application.edit',$application->applicationId) }}"><i class="fas fa-edit"></i></a>


                            @elseif(($application->entriesStatus == "rejected"))
                            <a href="{{ route('application.show', $application->applicationId) }}"><i class="far fa-eye" style="
                             font-size: 20px; color: red"></i></a>


                            @elseif(($application->entriesStatus == "accepted"))
                            <a href="{{ route('application.show', $application->applicationId) }}"><i class="far fa-eye" style="
                             font-size: 20px; color: #24CA31"></i></a>
                            @endif



                            </td>
                    </tr>
                  
                    @endif
                @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>

@endforeach
    <script src="https://kit.fontawesome.com/6360280a4c.js" crossorigin="anonymous"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/PHP-Contact-Form-dark-1.js"></script>
    <script src="assets/js/PHP-Contact-Form-dark.js"></script>
</body>
@stop