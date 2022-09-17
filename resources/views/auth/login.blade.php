@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-5">
        <div class="col-md-4 offset-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title font-weight-light"><i class="fas fa-lock"></i> User Login</h3>
                </div>

                <div class="card-body">
                    {!! Form::open(['url'=>'/login', 'method'=>'post']) !!}
                        <div class="form-group _auth @error('username') is-invalid @enderror">
                            {!! Form::label('username','<i class="fas fa-user"></i> Username',[],false) !!}
                            {!! Form::text('username', null, ['class'=>'form-control' .  ($errors->has('username') ? ' is-invalid' : null)]) !!}
                            <span class="errspan" id="errspan">{{ $errors->first('username') }}</span>
                        </div> 
                        <div class="form-group _auth @error('password') is-invalid @enderror">
                            {!! Form::label('password', '<i class="fas fa-key"></i> Password',[],false) !!}
                            {!! Form::password('password', ['class'=>'form-control' .  ($errors->has('password') ? ' is-invalid' : null)]) !!}
                            <span class="errspan" id="errspan">{{ $errors->first('password') }}</span>
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-primary" id="actionBtn" onclick="btnload('Logging in...')" type="submit"><i class="fas fa-sign-in-alt"></i>  Login</button>
                        </div>
                    {!! Form::close() !!}
                </div>

                {{-- <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
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
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
