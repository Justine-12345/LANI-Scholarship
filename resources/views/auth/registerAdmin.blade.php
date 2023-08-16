@extends('layouts.base')
@section('body')
@include('layouts.navRegisterAdmin')
@include('designs.logincss')


<body class="bg-light">

    <style type="text/css">
        i{
            color: red;
        }
    </style>
{{-- {{ count($errors->default) }} --}}


  <div class="text-md-right text-center bg-dark" style="background-attachment: fixed;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 py-4">
          <h1 class="display-4 text-center text-light"><strong>REGISTRATION (ADMIN)</strong></h1>
        </div>
      </div>
    </div>
  </div>


  <div class="h-100 w-100 text-light bg-light py-1" style="">
    <div class="container shadow">
      <div class="row">
        <div class="col-md-12 bg-light text-dark" style="   box-shadow: 0px 0px 10px  black;padding-top: 20px">

@if(@ count($errors->default) > 0)
   <div class="alert alert-danger" role="alert" style="margin: 10px">
  <h4 class="alert-heading">Invalid Input</h4>
  <p>
    Invalid input encountered while validating. Please review your inputs
  </p>
  <hr>
  <p class="mb-0">After fixing click the Register button again</p>
</div>
@endif


@if(Session::get('success'))
   <div class="alert alert-success" role="alert" style="margin: 10px">
  <h4 class="alert-heading">Yehey!!!</h4>
  <p>
    {{Session::get('success')}}
  </p>
  <hr>
  <p class="mb-0">Congratulation!!!</p>
</div>
@endif

@if(Session::get('fail'))
   <div class="alert alert-danger" role="alert" style="margin: 10px">
  <h4 class="alert-heading">Opppssss</h4>
  <p>
    {{Session::get('fail')}}
  </p>
  <hr>
  <p class="mb-0">Sorry!!!</p>
</div>
@endif

     <form method="post" action="{{ route('registerAdmin') }}">
            @csrf
          
            <div class="form-group row" style=""> <label for="inputmailh" class="col-form-label col-2 col-form-label-lg" style="">First Name</label>
         

                <input type="text" name="adminFirstName" id="FirstName" placeholder="Enter First Name" class="form-control text-secondary @error('adminFirstName') is-invalid @enderror" required value="{{ old('adminFirstName') }}"  autocomplete="adminFirstName">
                @if($errors->has('adminFirstName'))
                <small><i>*{{ $errors->first('adminFirstName') }}</i></small>
                @endif
            </div>

            {{-- middle Name --}}

           <div class="form-group row" style=""> 
            <label for="inputpasswordh" class="col-form-label col-2 col-form-label-lg" style="">Middle Name</label>
           
                <input type="text" name=" adminMiddleName" id="MiddleName" placeholder="Enter Middle Name" class="form-control @error(' adminMiddleName') is-invalid @enderror" value="{{ old(' adminMiddleName') }}" autocomplete="  adminMiddleName">
                @if($errors->has('  adminMiddleName'))
                <small><i>*{{ $errors->first('  adminMiddleName') }}</i></small>
                @endif 
            </div>



            {{-- surname Name --}}
             <div class="form-group row" style="">
                <label class="col-2 col-form-label col-form-label-lg" style="">Surname</label>
              <input type="text" name="adminLastName" id="Surname" placeholder="Enter Surname"  class="form-control @error('adminLastName') is-invalid @enderror" required value="{{ old('adminLastName') }}" autocomplete="adminLastName">

               @if($errors->has('adminLastName'))
              <small><i>*{{ $errors->first('adminLastName') }}</i></small>
               @endif
             </div>


            {{-- birthday --}}
             <div class="form-group row" style="">
                <label class="col-2 col-form-label col-form-label-lg" style="">Birthday</label>
              <input type="date" name="adminBirthDate" id="Surname" placeholder="Enter Surname"  class="form-control @error('adminBirthDate') is-invalid @enderror" required value="{{ old('adminBirthDate') }}" autocomplete="adminBirthDate">
               @if($errors->has('adminBirthDate'))
              <small><i>*{{ $errors->first('adminBirthDate') }}</i></small>
               @endif
              </div>
            
  

            {{-- ADDRESS --}}
             <div class="form-group row" style="">
            <label class="col-2 col-form-label col-form-label-lg" style="">Complete Address</label>
           

              {{-- house Number --}}
              {{-- <label class="col-2 col-form-label col-form-label-lg" style="">House Number</label> --}}
              <input type="text" name="adminAddressline" id="HouseNumber" placeholder="ex. BLK LOT" required="required" class="form-control @error('adminAddressline') is-invalid @enderror" required value="{{ old('adminAddressline') }}" autocomplete="adminAddressline">
               @if($errors->has('adminAddressline'))
              <small><i>*{{ $errors->first('adminAddressline') }}</i></small>
               @endif
             </div>
            {{-- email --}}
            <div class="form-group row" style=""><label class="col-2 col-form-label col-form-label-lg">Email</label>
              <input type="email" name="adminEmail" id="  adminEmail" placeholder="mail@example.com" required class="form-control @error('adminEmail') is-invalid @enderror" required  value="{{ old('adminEmail') }}" autocomplete="adminEmail">
               @if($errors->has('adminEmail'))
              <small><i>*{{ $errors->first('adminEmail') }}</i></small>
               @endif
            </div>

            {{-- password --}}
            <div class="form-group row">

            <label class="col-2 col-form-label col-form-label-lg" style="margin-top: 50px">Password</label>
              <div class="col-10 col-md-3" style=""><input  type="password"  id="Password" required="required" placeholder="Enter Password"
                class="form-control @error('password') is-invalid @enderror" name="adminPassword" required value="{{ old('adminPassword') }}" autocomplete="new-password" style="margin-top: 50px">
                @if($errors->has('adminPassword'))
              <small><i>*{{ $errors->first('adminPassword') }}</i></small>
               @endif
            </div>

              {{-- confirm Password --}}
              <label class="col-2 col-form-label col-form-label-lg"  style="margin-top: 50px">Confirm Password</label>
              <div class="col-10 col-md-3" style="margin-top: 50px"><input style=" style="margin-top: 50px; type="password" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password"  style="margin-top: 50px"></div>

            </div>

           <input type="hidden" name="userTitle" value="admin">
           <input type="hidden" name="adminStatus" value="new">

                <h2 style="text-align: center;">
            <button type="submit" class="btn btn-danger"  style="text-align: center;" onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();">Register</button>
                </h2>
        
          </form>
        </div>
      </div>
    </div>
  </div>
  

</body>

@endsection
