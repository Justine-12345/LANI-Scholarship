@extends('layouts.base')
@include('designs.aboutcss')
@include('layouts.navAdmin')
@section('body')
{{-- {{ dd($transaction) }} --}}
<body>
    <div class="row">
        <div class="col-lg-12 text-center" data-aos="fade-up" style="color: rgb(0,0,0);background: #807d7d;border-radius: 0px;margin: 0px;margin-top: 0px;margin-bottom: 9px;">
           
            <h2 class="text-uppercase" style="border-color: #000000;color: rgb(255,255,255);font-size: 40px;"><br><strong>GCASH CONFIRMATION</strong><br><br></h2>
        </div>
    </div>
    <section id="about" style="background: #ffffff;">
       {{--  {{ dd($scholar) }} --}}
      <div class="container">
        <div class="row">
          <div class="col-md-5" style="border-right: solid 1px gray; padding-top: 50px">
          @if($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ $message }} <i class="fas fa-check-circle"></i></strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif
          @if($transaction->transactionDateReceived != "")
          <h4>The allowance is already sent</h4>
          <br>
            <p><b>Gcash Number:</b> {{ $transaction->transactionGcashNum}}</p>
            <p><b>Gcash Name:</b> {{ $transaction->transactionGcashName}}</p>
            <p><b>Recieving Date:</b> {{ $transaction->transactionDateRecieving}}</p>
            <p><b>Allowance Amout:</b> ₱ {{ $transaction->transactionAmount}}</p>
            <p><b>Recieved Date:</b> {{ $transaction->transactionDateReceived}}</p>
            <p><b>Status:</b> <label style="color: red">Sent</label></p>
          @else
          <form action="{{ route('transaction.update',$transaction->transactionId) }}" method="post">
            @csrf
            @method('PATCH') 
              <input type="hidden" name="scholarEmail" value="{{ $scholar['scholar']['scholarEmail'] }}">
             <input type="hidden" name="mode" value="gcash">
           <h4>Use the number below to send allowance via Gcash</h4>
          <br>
            <p><b>Gcash Number:</b> {{ $transaction->transactionGcashNum}}</p>
            <p><b>Gcash Name:</b> {{ $transaction->transactionGcashName}}</p>
            <p><b>Recieving Date:</b> {{ $transaction->transactionDateRecieving}}</p>
            <p><b>Status:</b> <label style="color: red">Not Send Yet</label></p>
             <p><b>Allowance Amout:</b> ₱ <input type="text" name="transactionAmout" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="
              <?php
          if (count($errors)>0){
          echo old('transactionAmout');
                                }?>
              "> 
               @if($errors->has('transactionAmout'))
                                                    <small style="color: red"><i><b>*{{ $errors->first('transactionAmout') }}</i></b></small>
                                                @endif



            </p>

             <small><b>Note: Make sure that you sent the allowance via Gcash before clicking the confirm button</b></small><br>
             <button type="submit" class="btn btn-danger">Confirm</button>

          </form>

          @endif

          </div>
           <div class="col-lg" style=" text-align: center;">
           <h2>Please use Gcash to send the allowance </h2>
           <a href="https://www.gcash.com/" target="_blank"><img src="https://www.underconsideration.com/brandnew/archives/gcash_logo_before_after.jpg" width="500px"></a></div>




           
          </div>
        </div>
      </div>


    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>