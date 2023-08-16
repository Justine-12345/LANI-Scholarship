@extends('layouts.base')
@section('body')
@include('layouts.navRegister')
@include('designs.logincss')
{{-- {{ Session::forget('UserId') }} --}}
{{-- {{ dd(Session::all()) }} --}}
<style type="text/css">
    i {
        color:white;
    }
    
</style>
<body style="background: url(&quot;{{ asset('loginAssets/img/1.webp') }}&quot;);">
    
    <div class="login-clean" style="background: url(&quot; {{ asset('loginAssets/img/1.webp') }}&quot;);background-repeat: no-repeat;background-size: cover;">
        <form data-aos-duration="300" action="{{ route('check') }}" method="post"> 
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
            <div class="illustration"><i class="fas fa-user-graduate" data-aos="zoom-in-up" data-aos-duration="500" data-aos-delay="150" style="color: rgb(255,243,243);"></i></div>

            {{-- Email --}}
            <div class="form-group"><input class="form-control bounce animated" type="email" name="scholarEmail" placeholder="Email" required value="{{ old('scholarEmail') }}">
                @if($errors->has('scholarEmail'))
                <small><i>*{{ $errors->first('scholarEmail') }}</i></small>
                @endif

            {{-- birthdate --}}
            <label class="bounce animated" style="color: rgb(255,255,255);font-size: 20px;margin-top: 8px;">Birthdate:&nbsp;</label><input class="form-control bounce animated" name="scholarBirthdate" type="date" required value="{{ old('scholarBirthdate') }} ">
                @if($errors->has('scholarBirthdate'))
                <small><i>*{{ $errors->first('scholarBirthdate') }}</i></small>
                @endif
        </div>


            {{-- Password --}}
            <div class="form-group"><input class="form-control bounce animated" type="password" name="scholarPassword" placeholder="Password" required value="{{ old('scholarPassword') }}">
                @if($errors->has('scholarPassword'))
                <small><i>*{{ $errors->first('scholarPassword') }}</i></small>
                @endif
            </div>

           {{--  <div class="custom-control custom-switch">
            <input type="checkbox" class="custom-control-input" id="customSwitch1">
             <label class="custom-control-label" for="customSwitch1" style="color: white;">Remeber me!</label>
            </div> --}}


           {{-- Submit --}}
            <div class="form-group" style="color: rgb(80, 94, 108);"><button class="btn btn-primary btn-block bounce animated" type="submit" style="font-size: 20px;" onclick="this.disabled=true;this.value='Sending, please wait...';this.form.submit();">Log In</button></div>

      

            {{-- Forgot Password --}}
            <a class="wobble animated forgot" href="{{ route('forgotpassword') }}" style="color: rgb(255,255,255);font-size: 16px;">Forgot your email or password?</a>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
</body
@stop
{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 --}}