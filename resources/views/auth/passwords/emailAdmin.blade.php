@extends('layouts.base')

@include('designs.newcss')

@include('layouts.navRegisterAdmin')

@section('body')

<div class="container" style="margin-top: 100px">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin-bottom: 10px; padding: 15px; font-size: 15px">
                              <strong></strong>{{Session::get('error')}} !!!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                    @endif

                     @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: 10px; padding: 15px; font-size: 15px">
                              <strong></strong>{{Session::get('success')}} !!!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                    @endif

                     @if (session('send'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin-bottom: 10px; padding: 15px; font-size: 15px">
                              <strong></strong>{{Session::get('send')}} !!!
                              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                    @endif
                   
                    <form method="POST" action="{{ route('validatepasswordAdmin') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="adminEmail" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="adminEmail" type="email" class="form-control @error('adminEmail') is-invalid @enderror" name="adminEmail" value="{{ old('adminEmail') }}" required autocomplete="adminEmail" autofocus>

                                @error('adminEmail')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-danger">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
