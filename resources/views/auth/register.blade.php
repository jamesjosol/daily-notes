@extends('layouts.app')

@section('content')

<div class="row mt-5">
    <div class="col-md-4 offset-md-4">
        <div class="card mb-3">
            <div class="card-header bg-primary text-white">
                <h3 class="card-title font-weight-light"><i class="fa fa-user"></i> User Registration</h3>
            </div>
            <div class="card-body">
                {!! Form::open(['url'=>'/register', 'method'=>'post']) !!}
                    <div class="form-group _auth @error('name') is-invalid @enderror">
                        {!! Form::label('name','<i class="far fa-user"></i> Full Name',[],false) !!}
                        {!! Form::text('name', null, ['class'=>'form-control' .  ($errors->has('name') ? ' is-invalid' : null)]) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group _auth @error('username') is-invalid @enderror">
                        {!! Form::label('username','<i class="fa fa-user"></i> Username',[],false) !!}
                        {!! Form::text('username', null, ['class'=>'form-control' .  ($errors->has('username') ? ' is-invalid' : null)]) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('username') }}</span>
                    </div>
                    <div class="form-group _auth @error('password') is-invalid @enderror">
                        {!! Form::label('password', '<i class="fas fa-key"></i> Password',[],false) !!}
                        {!! Form::password('password', ['class'=>'form-control' .  ($errors->has('password') ? ' is-invalid' : null)]) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('password') }}</span>
                    </div>
                    <div class="form-group _auth @error('password_confirmation') is-invalid @enderror">
                        {!! Form::label('password_confirmation', '<i class="fas fa-key"></i> Confirm Password',[],false) !!}
                        {!! Form::password('password_confirmation', ['class'=>'form-control' .  ($errors->has('password_confirmation') ? ' is-invalid' : null)]) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('password_confirmation') }}</span>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary" onclick="btnload()" id="actionBtn" type="submit">Register</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
@endsection
