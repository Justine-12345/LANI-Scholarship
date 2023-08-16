@extends('layouts.base')
@section('body')
@include('layouts.navAdmin')
  <style type="text/css">
        *{padding:0;margin:0;}

body{
    font-family:Verdana, Geneva, sans-serif;
    font-size:18px;
    background-color:#CCC;
}

.float{
    position:fixed;
    width:60px;
    height:60px;
    bottom:40px;
    right:40px;
    background-color:#0C9;
    color:#FFF;
    border-radius:50px;
    text-align:center;
    box-shadow: 2px 2px 3px #999;
}

.my-float{
    margin-top:22px;
}
</style>
<body>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <h1 class="text-center" style="background: rgb(128,125,125);color: rgb(255,255,255);margin-bottom: 30px;"><br><strong>SUBMISSIONS</strong><br><br></h1>

    @if($message=Session::get('fail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width: 80%; margin: auto; margin-bottom: 10px">
      <strong>{{ $message }}!!! </strong>  
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </div>
    @endif
    
    <div class="container" style="margin-bottom: 40px;">
        <div class="row">
            <div class="col-lg-2">
                <p><strong>Sort by:&nbsp;</strong></p>
            </div>

            <div class="col-lg-3">
                <form class="form-inline" action="{{ route('submission.index') }}" method="get">

                    <div class="form-group">
                        <select name="sort1" class="form-control" >
                            @if($sort1 == 'submissionId')
                                <option value="submissionId" selected>Submission ID</option>
                                <option value="submissionBatch">Batch No.</option>
                                <option value="submissionYear">School Year</option>
                            @elseif($sort1 == 'submissionBatch')
                                <option value="submissionId">Submission ID</option>
                                <option value="submissionBatch" selected>Batch No.</option>
                                <option value="submissionYear">School Year</option>
                            @else
                                <option value="submissionId">Submission ID</option>
                                <option value="submissionBatch">Batch No.</option>
                                <option value="submissionYear" selected>School Year</option>
                            @endif
                        </select>
                    </div>

                    @if($sort2 == 'asc')
                        <div class="col-lg-2 offset-lg-0" style="position: relative; left: 200px">
                            <div class="form-check"><input name="sort2" value="asc" class="form-check-input" type="radio" id="formCheck-2" checked><label class="form-check-label" for="formCheck-1"><strong>Ascending</strong></label></div>
                        </div>

                        <div class="col-lg-2" style="position: relative; left: 300px">
                            <div class="form-check"><input name="sort2" value="desc" class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1"><strong>Descending</strong></label></div>
                        </div>
                    @else
                        <div class="col-lg-2 offset-lg-0" style="position: relative; left: 200px">
                            <div class="form-check"><input name="sort2" value="asc" class="form-check-input" type="radio" id="formCheck-2"><label class="form-check-label" for="formCheck-1"><strong>Ascending</strong></label></div>
                        </div>

                        <div class="col-lg-2" style="position: relative; left: 300px">
                            <div class="form-check"><input name="sort2" value="desc" class="form-check-input" type="radio" id="formCheck-1" checked><label class="form-check-label" for="formCheck-1"><strong>Descending</strong></label></div>
                        </div>
                    @endif

                    <div class="col" style="position: relative; left: 600px; bottom: 40px"><button class="btn btn-primary" type="submit" style="background: rgb(199,20,14);color: rgb(255,255,255);"><strong>SORT</strong></button></div>
                </form>
            </div>
        </div>
    </div>

    <div class="container" style="box-shadow: 0px 0px 20px;margin-top: 20px;margin-bottom: 20px;">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr></tr>
                </thead>
                <tbody>
                    @foreach($submissions as $submission)
                        <tr>
                            <td><strong>Sub ID:</strong>&nbsp;{{$submission['submissionId']}}<br></td>
                            <td><strong>Batch No:&nbsp;</strong>{{$submission['submissionBatch']}}<br></td>
                            <td><strong>Semester:&nbsp;</strong>{{$submission['submissionSem']}}<br></td>
                            <td><strong>Year:&nbsp;</strong>{{$submission['submissionYear']}}<br></td>
                            <td><strong>Status:</strong>&nbsp;
                                <b 
                                @if($submission['submissionStatus'] == "open")
                                style="color: green"
                                @elseif($submission['submissionStatus'] == "close")
                                style="color: red"
                                @endif
                                >
                        {{strtoupper($submission['submissionStatus'])}}</b>
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

                               <span class="badge badge-secondary">{{$applicationCount[$submission['submissionId']]}}</span>


                                <br></td>
                            <td><a href="{{ action('SubmissionController@edit', $submission['submissionId'])}}" class="btn btn-danger">Edit</a></td>
                            <td>
                                <td>
                                    <a href="{{ url('/no_of_application',$submission['submissionId']) }}">
                                    <i class="fas fa-angle-double-right" style="font-size: 25px"></i>
                                    </a>
                                </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



<div style="z-index: 1">
<a href="{{route('submission.create')}}" class="float" style="background-color: rgb(199,20,14) ;" id="add">
   

<i class="fa fa-plus my-float" style="color: rgb(255,255,255);"></i>

</a>
</div>


<script src="https://kit.fontawesome.com/6360280a4c.js" crossorigin="anonymous"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    
</body>
@stop