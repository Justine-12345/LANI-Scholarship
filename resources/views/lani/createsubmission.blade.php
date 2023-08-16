@extends('layouts.base')
@section('body')
@include('layouts.navAdmin')
<body>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
 
    <div class="text-md-right text-center bg-dark" style="	background-attachment: fixed;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 py-4">
                    <h1 class="display-4 text-center text-light"><strong>CREATE NEW SUBMISSION</strong></h1>
                </div>
            </div>
        </div>
    </div>

    <div class="">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('submission.store') }}" method="post" id="c_form-h" class="p-4 my-3" style="box-shadow: 0px 0px 10px black;">

                        @csrf
                        <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">Batch No.</label>
                            <div class="col-10 col-md-5" style="">
                            <input name="submissionBatch" type="number" class="form-control" style="" required> </div>
                        </div>

                        <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">Semester</label>
                            <div class="col-md-5 " style="">
                                <div class="form-group">
                                    <select name="submissionSem" class="form-control" required>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">School Year</label>
                            <div class="col-md-5" style="">
                                <div class="form-group">
                                    <select name="submissionYear" class="form-control" required>
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2022-2023">2023-2024</option>
                                        <option value="2022-2023">2024-2025</option>
                                        <option value="2022-2023">2025-2026</option>
                                        <option value="2022-2023">2026-2027</option>
                                        <option value="2022-2023">2027-2028</option>
                                        <option value="2022-2023">2028-2029</option>
                                        <option value="2022-2023">2029-2030</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">Submission Start</label>
                            <div class="col-10 col-md-5" style="">
                                <input name="submissionStart" type="date" class="form-control" style="" required>
                            </div>
                        </div>

                        <div class="form-group row"> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">Submission End</label>
                            <div class="col-10 col-md-5" style="">
                                <input name="submissionEnd" type="date" class="form-control" style="" required>
                            </div>
                        </div>

                        <div class="form-group row"> <label for="inputmailh" class="col-form-label col-form-label-lg col-3" style="" contenteditable="true">Submission Description</label>
                            <div class="col-10 col-md-12" style="">
                                <textarea rows="4" cols="50" name="submissionDesc" class="w-100" required></textarea>
                            </div>
                        </div>

                        <input type="hidden" name="adminId" value="{{$adminId}}">
                        <input type="hidden" name="submissionStatus" value="open">

                        <div class="row mb-2">
                            <div class="mx-auto"><button type="submit" class="btn border-dark btn-info">Create</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

@stop