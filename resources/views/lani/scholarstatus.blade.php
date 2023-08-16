@extends('layouts.base')
@section('body')
@include('layouts.navAdmin')

<body>
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <h1 style="text-align: center;color: rgb(255,255,255);background: rgb(128,125,125);margin-bottom: 41px;"><br><strong>SCHOLAR'S&nbsp;APPLICATION</strong><br><br></h1>
    <div class="container">
        <div class="row">
            <div class="col-xl-2 offset-xl-0">
                <p><strong>Sort By:</strong></p>
            </div>

            <div class="col-xl-3">
                <form class="form-inline" action="{{ route('scholarStatus', $type) }}" method="get">
                    @csrf
                    <div class="form-group">
                        <select name="sort1" class="form-control" >
                            @if($sort1 == 'applicationId')
                                <option value="applicationId" selected>ID</option>
                                <option value="scholarFirstName">Name</option>
                                <option value="applicationSubmitDate">Date</option>
                                <option value="scholarBarangay">Baranggay</option>
                                <option value="entriesStatus">Status</option>
                            @elseif($sort1 == 'scholarFirstName')
                                <option value="applicationId">ID</option>
                                <option value="scholarFirstName" selected>Name</option>
                                <option value="applicationSubmitDate">Date</option>
                                <option value="scholarBarangay">Baranggay</option>
                                <option value="entriesStatus">Status</option>
                            @elseif($sort1 == 'applicationSubmitDate')
                                <option value="applicationId">ID</option>
                                <option value="scholarFirstName">Name</option>
                                <option value="applicationSubmitDate" selected>Date</option>
                                <option value="scholarBarangay">Baranggay</option>
                                <option value="entriesStatus">Status</option>
                            @elseif($sort1 == 'scholarBarangay')
                                <option value="applicationId">ID</option>
                                <option value="scholarFirstName">Name</option>
                                <option value="applicationSubmitDate">Date</option>
                                <option value="scholarBarangay" selected>Baranggay</option>
                                <option value="entriesStatus">Status</option>
                            @else
                                <option value="applicationId">ID</option>
                                <option value="scholarFirstName">Name</option>
                                <option value="applicationSubmitDate">Date</option>
                                <option value="scholarBarangay">Baranggay</option>
                                <option value="entriesStatus" selected>Status</option>
                            @endif
                        </select>
                    </div>

                    @if($sort2 == 'asc')
                    <div class="col-lg-3 col-xl-2" style="position: relative; left: 200px">
                        <div class="form-check"><input name="sort2" value="asc" class="form-check-input" type="radio" id="formCheck-1" checked><label class="form-check-label" for="formCheck-1"><strong>Ascending</strong></label></div>
                    </div>

                    <div class="col-lg-3" style="position: relative; left: 300px">
                        <div class="form-check"><input name="sort2" value="desc" class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1"><strong>Descending</strong></label></div>
                    </div>
                    @else
                        <div class="col-lg-3 col-xl-2" style="position: relative; left: 200px">
                        <div class="form-check"><input name="sort2" value="asc" class="form-check-input" type="radio" id="formCheck-1"><label class="form-check-label" for="formCheck-1"><strong>Ascending</strong></label></div>
                    </div>

                    <div class="col-lg-3 col-xl-2 offset-lg-1 offset-xl-0" style="position: relative; left: 300px">
                        <div class="form-check"><input name="sort2" value="desc" class="form-check-input" type="radio" id="formCheck-1" checked><label class="form-check-label" for="formCheck-1"><strong>Descending</strong></label></div>
                    </div>
                    @endif

                    <div class="col-lg-2 col-xl-3 offset-lg-0 offset-xl-0" style="position: relative; left: 600px; bottom: 40px"><button class="btn btn-primary" type="submit" style="background: #c7140e;color: rgb(255,255,255);"><strong>SORT</strong></button></div>
                </form>
            </div>
        </div>
    </div>
<div class="container">
<div class="row">
    <div class="col-md-4">
<form>
</form>
</div>
</div>
</div>


    <div class="" style="box-shadow: 0px 0px 20px;margin-top: 40px;margin-bottom: 20px; width: 95%; margin: auto">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr></tr>
                </thead>
                <tbody>
                    @foreach ($scholars as $key => $scholar)
                    <tr>
                        <td><strong>ID:</strong> {{$scholar->applicationId}}</td>
                        <td><strong>Name:</strong> {{$scholar->scholarFirstName}} {{$scholar->scholarLastName}}</td>
                        <td><strong>Submitted Date:</strong> {{$scholar->applicationSubmitDate}}</td>
                        <td><strong>Barangay:</strong> {{$scholar->scholarBarangay}}</td>
                        <td><strong>Status:</strong>
                        @if($scholar->entriesStatus == "accepted")
                            <b style="color: green">{{ucwords($scholar->entriesStatus)}}</b>
                        @elseif($scholar->entriesStatus == "updated")
                             <b style="color: #E8DD26">{{ucwords($scholar->entriesStatus)}}</b>
                        @elseif($scholar->entriesStatus == "resolve")
                             <b style="color: orange">{{ucwords($scholar->entriesStatus)}}</b>
                        @elseif($scholar->entriesStatus == "rejected")
                             <b style="color: red">{{ucwords($scholar->entriesStatus)}}</b>
                        @elseif($scholar->entriesStatus == "process")
                             <b style="color: gray">{{ucwords($scholar->entriesStatus)}}</b>
                        @endif
                        </td>
                       
                        <td>
                             @if($scholar->entriesStatus == "accepted")
                            <strong>Allowance:
                            @if(@$scholar->transactionAmount == "")
                            <a href="{{ route('transaction.edit',$scholar->applicationId) }}"><b style="color: green">Unclaimed</b></a>
                            @else
                            <a href="{{ route('transaction.edit',$scholar->applicationId) }}">
                            <b style="color: red">Claimed</b>
                            </a>
                            @endif
                        </strong>
                             @endif
                    </td>
                       

                        <td>
                @php
                $flag = 0;    
                @endphp
                @foreach($transactions as $transaction)

                    @if($transaction->applicationId == $scholar->applicationId)
                            @if($transaction->transactionGcashNum != "")
                             @php
                              $flag++;   
                             @endphp
                            <b>Gcash</b>
                            @endif
                    @else
                    @endif
                @endforeach
                @if($flag == 0)
                <b>Cash</b>
                @endif
                        </td>
                        <td>
                            <a href="{{ route('entry.edit', $scholar->entriesId) }}">
                            <i class="fas fa-angle-double-right" style="font-size: 20px"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
      <script src="https://kit.fontawesome.com/6360280a4c.js" crossorigin="anonymous"></script>
</body>

@stop