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
@endsection
