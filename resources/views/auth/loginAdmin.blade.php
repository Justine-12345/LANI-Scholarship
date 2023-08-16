@extends('layouts.base')
@section('body')
@include('layouts.navRegisterAdmin')
@include('designs.logincss')
{{-- {{ Session::forget('UserId') }} --}}
{{-- {{ dd(Session::all()) }} --}}
<style type="text/css">
    i {
        color:white;
    }
    
</style>
<body style="background: url(&quot;{{ asset('loginAssets/img/1.webp') }}&quot;);">
    
    <div class="login-clean" style="background: url(&quot; {{ url('https://us.123rf.com/450wm/topntp/topntp1607/topntp160701889/59706742-blurred-abstract-background-interior-view-looking-out-toward-to-empty-office-lobby-and-entrance-door.jpg?ver=6') }}&quot;);background-repeat: no-repeat;background-size: cover;">
        <form data-aos-duration="300" action="{{ route('checkAdmin') }}" method="post"> 
            @csrf
             @if(Session::get('needlog'))
              <div class="alert alert-success" role="alert" style="margin: 10px">
              <h4 class="alert-heading">Welcome</h4>
              <p>
                {{ Session::get('needlog') }}
                <a href="{{ route('scholar.create') }}"><b style="color: darkgreen;text-decoration: none;">Resgister</b></a>
              </p>
              <hr>
              <p class="mb-0">Fill-up the form to log-in</p>
              </div>
            @endif

            @if(Session::get('fail'))
              <div class="alert alert-danger" role="alert" style="margin: 10px">
              <h4 class="alert-heading">Invalid Input</h4>
              <p>
                {{ Session::get('fail') }}
              </p>
              <hr>
              <p class="mb-0">Try Again</p>
              </div>
            @endif


            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"><i class="fas fa-user-cog" data-aos="zoom-in-up" data-aos-duration="500" data-aos-delay="150" style="color: rgb(255,243,243);"></i></div>

            {{-- Email --}}
            <div class="form-group"><input class="form-control bounce animated" type="email" name="adminEmail" placeholder="Email" required value="{{ old('adminEmail') }}">
                @if($errors->has('adminEmail'))
                <small><i>*{{ $errors->first('adminEmail') }}</i></small>
                @endif

            {{-- birthdate --}}
            <label class="bounce animated" style="color: rgb(255,255,255);font-size: 20px;margin-top: 8px;">Birthdate:&nbsp;</label><input class="form-control bounce animated" name="  adminBirthDate" type="date" required value="{{ old('adminBirthDate') }} ">
                @if($errors->has('  adminBirthDate'))
                <small><i>*{{ $errors->first('adminBirthDate') }}</i></small>
                @endif
        </div>


            {{-- Password --}}
            <div class="form-group"><input class="form-control bounce animated" type="password" name="adminPassword" placeholder="Password" required value="{{ old('adminPassword') }}">
                @if($errors->has('adminPassword'))
                <small><i>*{{ $errors->first('adminPassword') }}</i></small>
                @endif
            </div>

           {{--  <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch1">
             <label class="custom-control-label" for="customSwitch1" style="color: white;">Remeber me!</label>
            </div> --}}


           {{-- Submit --}}
            <div class="form-group" style="color: rgb(80, 94, 108);"><button class="btn btn-primary btn-block bounce animated" type="submit" style="font-size: 20px;" onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();">Log In</button></div>

      

            {{-- Forgot Password --}}
            <a class="wobble animated forgot" href="{{ route('forgotpasswordAdmin') }}" style="color: rgb(255,255,255);font-size: 16px;">Forgot your email or password?</a>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body
@stop
