@extends('layouts.base')
@section('body')
@include('layouts.navAdmin')
<body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    <div class="text-md-right text-center bg-dark" style="	background-attachment: fixed;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-4">
                    <h1 class="display-4 text-center text-light"><strong>EDIT SUBMISSION</strong></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('submission.update', $submission[0]['submissionId']) }}" method="post" id="c_form-h" class="p-4 my-3" style="box-shadow: 0px 0px 10px black;">
                        {{method_field('PATCH')}}
                        @csrf
                        <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">Batch No.</label>
                            <div class="col-10 col-md-5" style="">
                            <input name="submissionBatch" value="{{$submission[0]['submissionBatch']}}" type="number" class="form-control" style="" required> </div>
                        </div>

                        <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">Semester</label>
                            <div class="col-md-5 " style="">
                                <div class="form-group">
                                    <select name="submissionSem" class="form-control" required>
                                        @if($submission[0]['submissionSem'] == 1)
                                            <option value="1" selected>1</option>
                                            <option value="2">2</option>
                                        @else
                                            <option value="1">1</option>
                                            <option value="2" selected>2</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">School Year</label>
                            <div class="col-md-5" style="">
                                <div class="form-group">
                                    <select name="submissionYear" class="form-control" required>
                                        @if($submission[0]['submissionYear'] == '2020-2021')
                                            <option value="2020-2021" selected>2020-2021</option>
                                            <option value="2021-2022">2021-2022</option>
                                            <option value="2022-2023">2022-2023</option>
                                            <option value="2022-2023">2023-2024</option>
                                            <option value="2022-2023">2024-2025</option>
                                            <option value="2022-2023">2025-2026</option>
                                            <option value="2022-2023">2026-2027</option>
                                            <option value="2022-2023">2027-2028</option>
                                            <option value="2022-2023">2028-2029</option>
                                            <option value="2022-2023">2029-2030</option>
                                        @elseif($submission[0]['submissionYear'] == '2021-2022')
                                            <option value="2020-2021">2020-2021</option>
                                            <option value="2021-2022" selected>2021-2022</option>
                                            <option value="2022-2023">2022-2023</option>
                                            <option value="2022-2023">2023-2024</option>
                                            <option value="2022-2023">2024-2025</option>
                                            <option value="2022-2023">2025-2026</option>
                                            <option value="2022-2023">2026-2027</option>
                                            <option value="2022-2023">2027-2028</option>
                                            <option value="2022-2023">2028-2029</option>
                                            <option value="2022-2023">2029-2030</option>
                                        @elseif($submission[0]['submissionYear'] == '2022-2023')
                                            <option value="2020-2021">2020-2021</option>
                                            <option value="2021-2022">2021-2022</option>
                                            <option value="2022-2023" selected>2022-2023</option>
                                            <option value="2022-2023">2023-2024</option>
                                            <option value="2022-2023">2024-2025</option>
                                            <option value="2022-2023">2025-2026</option>
                                            <option value="2022-2023">2026-2027</option>
                                            <option value="2022-2023">2027-2028</option>
                                            <option value="2022-2023">2028-2029</option>
                                            <option value="2022-2023">2029-2030</option>
                                        @elseif($submission[0]['submissionYear'] == '2023-2024')
                                            <option value="2020-2021">2020-2021</option>
                                            <option value="2021-2022">2021-2022</option>
                                            <option value="2022-2023">2022-2023</option>
                                            <option value="2022-2023" selected>2023-2024</option>
                                            <option value="2022-2023">2024-2025</option>
                                            <option value="2022-2023">2025-2026</option>
                                            <option value="2022-2023">2026-2027</option>
                                            <option value="2022-2023">2027-2028</option>
                                            <option value="2022-2023">2028-2029</option>
                                            <option value="2022-2023">2029-2030</option>
                                        @elseif($submission[0]['submissionYear'] == '2024-2025')
                                            <option value="2020-2021">2020-2021</option>
                                            <option value="2021-2022">2021-2022</option>
                                            <option value="2022-2023">2022-2023</option>
                                            <option value="2022-2023">2023-2024</option>
                                            <option value="2022-2023" selected>2024-2025</option>
                                            <option value="2022-2023">2025-2026</option>
                                            <option value="2022-2023">2026-2027</option>
                                            <option value="2022-2023">2027-2028</option>
                                            <option value="2022-2023">2028-2029</option>
                                            <option value="2022-2023">2029-2030</option>
                                        @elseif($submission[0]['submissionYear'] == '2025-2026')
                                            <option value="2020-2021">2020-2021</option>
                                            <option value="2021-2022">2021-2022</option>
                                            <option value="2022-2023">2022-2023</option>
                                            <option value="2022-2023">2023-2024</option>
                                            <option value="2022-2023">2024-2025</option>
                                            <option value="2022-2023" selected>2025-2026</option>
                                            <option value="2022-2023">2026-2027</option>
                                            <option value="2022-2023">2027-2028</option>
                                            <option value="2022-2023">2028-2029</option>
                                            <option value="2022-2023">2029-2030</option>
                                        @elseif($submission[0]['submissionYear'] == '2026-2027')
                                            <option value="2020-2021">2020-2021</option>
                                            <option value="2021-2022">2021-2022</option>
                                            <option value="2022-2023">2022-2023</option>
                                            <option value="2022-2023">2023-2024</option>
                                            <option value="2022-2023">2024-2025</option>
                                            <option value="2022-2023">2025-2026</option>
                                            <option value="2022-2023" selected>2026-2027</option>
                                            <option value="2022-2023">2027-2028</option>
                                            <option value="2022-2023">2028-2029</option>
                                            <option value="2022-2023">2029-2030</option>
                                        @elseif($submission[0]['submissionYear'] == '2027-2028')
                                            <option value="2020-2021">2020-2021</option>
                                            <option value="2021-2022">2021-2022</option>
                                            <option value="2022-2023">2022-2023</option>
                                            <option value="2022-2023">2023-2024</option>
                                            <option value="2022-2023">2024-2025</option>
                                            <option value="2022-2023">2025-2026</option>
                                            <option value="2022-2023">2026-2027</option>
                                            <option value="2022-2023" selected>2027-2028</option>
                                            <option value="2022-2023">2028-2029</option>
                                            <option value="2022-2023">2029-2030</option>
                                        @elseif($submission[0]['submissionYear'] == '2028-2029')
                                            <option value="2020-2021">2020-2021</option>
                                            <option value="2021-2022">2021-2022</option>
                                            <option value="2022-2023">2022-2023</option>
                                            <option value="2022-2023">2023-2024</option>
                                            <option value="2022-2023">2024-2025</option>
                                            <option value="2022-2023">2025-2026</option>
                                            <option value="2022-2023">2026-2027</option>
                                            <option value="2022-2023">2027-2028</option>
                                            <option value="2022-2023" selected>2028-2029</option>
                                            <option value="2022-2023">2029-2030</option>
                                        @else
                                            <option value="2020-2021">2020-2021</option>
                                            <option value="2021-2022">2021-2022</option>
                                            <option value="2022-2023">2022-2023</option>
                                            <option value="2022-2023">2023-2024</option>
                                            <option value="2022-2023">2024-2025</option>
                                            <option value="2022-2023">2025-2026</option>
                                            <option value="2022-2023">2026-2027</option>
                                            <option value="2022-2023">2027-2028</option>
                                            <option value="2022-2023">2028-2029</option>
                                            <option value="2022-2023" selected>2029-2030</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">Submission Start</label>
                            <div class="col-10 col-md-5" style="">
                                @if(date('Y-m-d') >= $submission[0]['submissionStart'])
                                    <input name="submissionStart" value="{{$submission[0]['submissionStart']}}" type="date" class="form-control" style="" disabled required>

                                @else
                                    <input name="submissionStart" value="{{$submission[0]['submissionStart']}}" type="date" class="form-control" style="" required>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">Submission End</label>
                            <div class="col-10 col-md-5" style="">
                                <input name="submissionEnd" value="{{$submission[0]['submissionEnd']}}" type="date" class="form-control" style="" required>
                            </div>
                        </div>

                        <div class="form-group row"> <label for="inputmailh" class="col-form-label col-form-label-lg col-3" style="">Submission Description</label>
                            <div class="col-10 col-md-12" style="">
                                <textarea rows="4" cols="50" name="submissionDesc" class="w-100" required>{{$submission[0]['submissionDesc']}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-10 col-md-12" style="">
                                <input type="checkbox" name="submissionStatus" value="close">
                                <label for="inputmailh" class="col-form-label col-form-label-lg col-3" style="">Close Submission</label>
                            </div>
                        </div>

                        <input type="hidden" name="adminId" value="{{$submission[0]['adminId']}}">
                        
                        <div class="row mb-2">
                            <div class="mx-auto"><button type="submit" class="btn border-dark btn-info">Edit</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

@stop