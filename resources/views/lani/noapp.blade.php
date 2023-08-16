@extends('layouts.base')
@section('body')
@include('layouts.navAdmin')
<style type="text/css">
    button{
        border: none;
        background-color: inherit;
        position: relative;
        right: 20px;
        top: 24px;
        color: blue;
    }
</style>
<body style="background-color: #ffffff;height: 500px;">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <h1 style="background: #807d7d;text-align: center;color: rgb(255,255,255);"><br><strong>SCHOLAR TYPE</strong><br><br></h1>

    <div class="container" style="margin-top: 40px;">
        <div class="table-responsive" style="box-shadow: 0px 0px 20px;">
            <table class="table">
                <thead>
                    <tr style="border-color: rgb(33, 37, 41);border-top-color: rgb(33,;border-right-color: 37,;border-bottom-color: 41);border-left-color: 37,;box-shadow: 0px 0px;">
                        <th>ALL</th>
                        <th class="text-right" style="text-align: center;width: 534px;">
@if($all > 0)
<span style=" top: 4px; position: relative;">

<form action="{{ route('scholarStatus','all') }}" method="get">
 @csrf   
<input type="hidden" name="submissionId" value="{{ $subId }}">
<button type="submit"><i class="fas fa-angle-double-right" style="font-size: 25px; margin-left: 10px;"></i></button>
</form>


 </span>
 @endif
<span class="badge badge-secondary">{{$all}}</span>

</th>

                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
<hr>
    <div class="container" style="margin-top: 40px;">
        <div class="table-responsive" style="box-shadow: 0px 0px 20px;">
            <table class="table">
                <thead>
                    <tr style="border-color: rgb(33, 37, 41);border-top-color: rgb(33,;border-right-color: 37,;border-bottom-color: 41);border-left-color: 37,;box-shadow: 0px 0px;">
                        <th>Honors</th>
                        <th class="text-right" style="text-align: center;width: 534px;">
@if($honors > 0)
<span style=" top: 4px; position: relative;">
<form action="{{ route('scholarStatus','Honors') }}" method="get">
 @csrf   
<input type="hidden" name="submissionId" value="{{ $subId }}">
<button type="submit"><i class="fas fa-angle-double-right" style="font-size: 25px; margin-left: 10px;"></i></button>
</form>
 </span>
@endif
<span class="badge badge-secondary">{{$honors}}
</span>

</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <div class="container" style="margin-top: 40px;">
        <div class="table-responsive" style="box-shadow: 0px 0px 20px;">
            <table class="table">
                <thead>
                    <tr style="border-color: rgb(33, 37, 41);border-top-color: rgb(33,;border-right-color: 37,;border-bottom-color: 41);border-left-color: 37,;box-shadow: 0px 0px;">
                        <th>Premier</th>
                        <th class="text-right" style="text-align: center;width: 534px;">
@if($premier > 0)
<span style=" top: 4px; position: relative;">
<form action="{{ route('scholarStatus','Premier') }}" method="get">
 @csrf   
<input type="hidden" name="submissionId" value="{{ $subId }}">
<button type="submit"><i class="fas fa-angle-double-right" style="font-size: 25px; margin-left: 10px;"></i></button>
</form>
 </span>
@endif
<span class="badge badge-secondary">{{$premier}}</span>

                   </th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <div class="container" style="margin-top: 40px;">
        <div class="table-responsive" style="box-shadow: 0px 0px 20px;">
            <table class="table">
                <thead>
                    <tr style="border-color: rgb(33, 37, 41);border-top-color: rgb(33,;border-right-color: 37,;border-bottom-color: 41);border-left-color: 37,;box-shadow: 0px 0px;">
                        <th>Priority</th>
                        <th class="text-right" style="text-align: center;width: 534px;">
@if($priority > 0)
<span style=" top: 4px; position: relative;">
<form action="{{ route('scholarStatus','Priority') }}" method="get">
 @csrf   
<input type="hidden" name="submissionId" value="{{ $subId }}">
<button type="submit"><i class="fas fa-angle-double-right" style="font-size: 25px; margin-left: 10px;"></i></button>
</form>
 </span>
@endif
<span class="badge badge-secondary">{{$priority}}</span>

                       </th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <div class="container" style="margin-top: 40px;">
        <div class="table-responsive" style="box-shadow: 0px 0px 20px;">
            <table class="table">
                <thead>
                    <tr style="border-color: rgb(33, 37, 41);border-top-color: rgb(33,;border-right-color: 37,;border-bottom-color: 41);border-left-color: 37,;box-shadow: 0px 0px;">
                        <th>SUC/LCU</th>
                        <th class="text-right" style="text-align: center;width: 534px;">
@if($sucLcu > 0)
<span style=" top: 4px; position: relative;">
<form action="{{ route('scholarStatus','SUCLCU') }}" method="get">
 @csrf   
<input type="hidden" name="submissionId" value="{{ $subId }}">
<button type="submit"><i class="fas fa-angle-double-right" style="font-size: 25px; margin-left: 10px;"></i></button>
</form>
 </span>
@endif
<span class="badge badge-secondary">{{$sucLcu}}</span>

                        </th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <div class="container" style="margin-top: 40px;">
        <div class="table-responsive" style="box-shadow: 0px 0px 20px;">
            <table class="table">
                <thead>
                    <tr style="border-color: rgb(33, 37, 41);border-top-color: rgb(33,;border-right-color: 37,;border-bottom-color: 41);border-left-color: 37,;box-shadow: 0px 0px;">
                        <th>Basic</th>
                        <th class="text-right" style="text-align: center;width: 534px;">
@if($basic > 0)
<span style=" top: 4px; position: relative;">
<form action="{{ route('scholarStatus','Basic') }}" method="get">
 @csrf   
<input type="hidden" name="submissionId" value="{{ $subId }}">
<button type="submit"><i class="fas fa-angle-double-right" style="font-size: 25px; margin-left: 10px;"></i></button>
</form>
 </span>
@endif
<span class="badge badge-secondary">{{$basic}}</span>
                        </th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <div class="container" style="margin-top: 40px; ">
        <div class="table-responsive" style="box-shadow: 0px 0px 20px;">
            <table class="table">
                <thead>
                    <tr style="border-color: rgb(33, 37, 41);border-top-color: rgb(33,;border-right-color: 37,;border-bottom-color: 41);border-left-color: 37,;box-shadow: 0px 0px;">
                        <th>Basic Plus</th>
                        <th class="text-right" style="text-align: center;width: 534px;">
@if($basicPlus > 0)
<span style=" top: 4px; position: relative;">
<form action="{{ route('scholarStatus','Basic Plus') }}" method="get">
 @csrf   
<input type="hidden" name="submissionId" value="{{ $subId }}">
<button type="submit"><i class="fas fa-angle-double-right" style="font-size: 25px; margin-left: 10px;"></i></button>
</form>
 </span>
@endif
<span class="badge badge-secondary">{{$basicPlus}}</span>

                        </th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
    </div>
    <p style="padding-bottom: 40px;"></p>
    <script src="https://kit.fontawesome.com/6360280a4c.js" crossorigin="anonymous"></script>
</body>


@stop