@extends('layouts.base')

@include('designs.aboutcss')
@include('layouts.navAdmin')

@section('body')

<body>
    <div class="row">
        <div class="col-lg-12 text-center" data-aos="fade-up" style="color: rgb(0,0,0);background: #807d7d;border-radius: 0px;margin: 0px;margin-top: 0px;margin-bottom: 9px;">
           
            <h2 class="text-uppercase" style="border-color: #000000;color: rgb(255,255,255);font-size: 40px;"><br><strong>QR CODE CHECKER</strong><br><br></h2>
        </div>
    </div>
    <section id="about" style="background: #ffffff;">
        
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
{{-- {{ dd($scholar) }} --}}
            <form action="{{ route('find',$scholar['scholar']['applicationId'])}}" method="get">
              <div class="form-group">
                <label for="exampleInputEmail1"><b style="font-size: 20px">Paste or Type the code here</b></label>
                <input type="text" name="scannedCode" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
               <button type="submit" class="btn btn-danger">Verify</button>
              
            </form>

          @if(@$transaction->transactionQRCode != "")
            
            <b style="font-size: 20px">Result:</b>
            <form action="{{ route('transaction.update', $transaction->transactionId ) }}" method="post">
             @csrf
             @method('PATCH') 
             <input type="hidden" name="scholarEmail" value="{{ $scholar['scholar']['scholarEmail'] }}">
             <input type="hidden" name="mode" value="cash">
            <b>
            <p>Code: {{ $transaction->transactionQRCode}}</p>
            <p>Recieving Date: {{ $transaction->transactionDateRecieving}}</p>
            <p>Allowance Amout:
               @if($transaction->transactionDateReceived == "")
                 ₱ <input type="text" name="transactionAmout" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php
          if (count($errors)>0){
          echo old('transactionAmout');
                                }?>"
                 >
                 @if($errors->has('transactionAmout'))
                                                    <small style="color: red"><i><b>*{{ $errors->first('transactionAmout') }}</i></b></small>
                                                @endif
               @else
              ₱ {{ $transaction->transactionAmount }}
               @endif


            </p>
            <p>Status: 
                @if($transaction->transactionDateReceived == "")
              <label style="color: green">Unclaimed</label>
                @else
              <label style="color: red">Claimed</label>
                @endif
            </p>
          </b>
              @if($transaction->transactionDateReceived == "")
          <button type="submit" class="btn btn-danger">Submit</button>
          <a class="btn btn-danger" href="{{ route('transaction.index') }}">Clear</a>
              @else
          <a class="btn btn-danger" href="{{ route('transaction.index') }}">Clear</a>
              @endif
        </form>
         @endif

         @if($qrResult == "wala")
          <b style="font-size: 20px">Result:</b>
          <p style="color: red">No result found!!!</p>
         @endif


          </div>
           <div class="col-lg" style=" text-align: center;">
           <h2>Please Install The QR Code Reader Etension<br><small><small>(if your already installed it open it to scan Qr codes)</small></small> </h2><img src="https://lh3.googleusercontent.com/R0pOIq05gxRkA76Bp8kJ3Dkkmddxml2lJV1rHWPLQuwbGICk0uAm3Srj0CyJWbPyz3kQmTWuGK5OO0kKxep4dZ_nnQ=w128-h128-e365-rj-sc0x00ffffff">

           <p>This is a chrome extension for reading QR code </p>
           <p><b>Step1: </b>Install the QR Code Reader. for <a class="btn btn-success" href="https://chrome.google.com/webstore/detail/qr-code-reader/jhigigpkpbeofhknomiadocogenlpcde/related?hl=en-US">Google Chrome</a> for <a class="btn btn-success" href="https://microsoftedge.microsoft.com/addons/detail/qr-code-reader/eogfpdlalmeogkfbpfcpcpbjfeajikfo?hl=en-US">Microsoft Edge</a> </p>
           <p><b>Step 2: </b>After installing the extension. You click on the icon <img src="https://lh3.googleusercontent.com/R0pOIq05gxRkA76Bp8kJ3Dkkmddxml2lJV1rHWPLQuwbGICk0uAm3Srj0CyJWbPyz3kQmTWuGK5OO0kKxep4dZ_nnQ=w128-h128-e365-rj-sc0x00ffffff" width="30px" height="30px"> of that extended version.</p>
            <p><b>Step 3: </b> Allow the camera permission</p>
            <p><b>Step 4: </b> Check The Auto Start and Click Start  in the bottom</p>
            <h5>You can now scan your QR code and paste it to verify !!!</h5>
          </div>
        </div>
      </div>


    </section>
    <script src="https://kit.fontawesome.com/6360280a4c.js" crossorigin="anonymous"></script>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body>