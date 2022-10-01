
@extends('layouts.app')

@section('content')

<div class="mt-5">
    <div class="col-md-5 offset-md-4">
        <div class="card mb-3 bg-dark">
            <div class="card-header text-white">
                <h3 class="card-title font-weight-light"><i class="fa fa-user-cog"></i> Profile Settings</h3>
            </div>
            <div class="card-body">
                {!! Form::open(['route'=>'updateProfile', 'method'=>'patch']) !!}
                    <div class="form-group dark-input-form-g _auth @error('name') is-invalid @enderror">
                        {!! Form::label('name','<i class="far fa-user"></i> Full Name',[],false) !!}
                        {!! Form::text('name', auth()->user()->name, ['class'=>'form-control dark-input-form ' .  ($errors->has('name') ? ' is-invalid' : null)]) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('name') }}</span>
                    </div>
                    <div class="form-group dark-input-form-g _auth @error('username') is-invalid @enderror">
                        {!! Form::label('username','<i class="fa fa-user"></i> Username',[],false) !!}
                        {!! Form::text('username', auth()->user()->username, ['class'=>'form-control dark-input-form' .  ($errors->has('username') ? ' is-invalid' : null), 'disabled' => 'disabled']) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('username') }}</span>
                    </div>
                    <div class="form-group dark-input-form-g _auth @error('current_password') is-invalid @enderror">
                        {!! Form::label('current_password', '<i class="fas fa-key"></i> Current Password',[],false) !!}
                        {!! Form::password('current_password', ['class'=>'form-control dark-input-form' .  ($errors->has('current_password') ? ' is-invalid' : null), 'placeholder'=>'leave blank if doesn\'t want to change password.']) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('current_password') }}</span>
                    </div>
                    <div class="form-group dark-input-form-g _auth @error('new_password') is-invalid @enderror">
                        {!! Form::label('new_password', '<i class="fas fa-key"></i> New Password',[],false) !!}
                        {!! Form::password('new_password', ['class'=>'form-control dark-input-form' .  ($errors->has('new_password') ? ' is-invalid' : null), 'placeholder'=>'leave blank if doesn\'t want to change password.']) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('new_password') }}</span>
                    </div>
                    <div class="form-group dark-input-form-g _auth @error('password_confirmation') is-invalid @enderror">
                        {!! Form::label('password_confirmation', '<i class="fas fa-key"></i> Confirm New Password',[],false) !!}
                        {!! Form::password('password_confirmation', ['class'=>'form-control dark-input-form' .  ($errors->has('password_confirmation') ? ' is-invalid' : null)]) !!}
                        <span class="errspan" id="errspan">{{ $errors->first('password_confirmation') }}</span>
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-primary px-4" onclick="btnload('Saving...')" id="actionBtn" type="submit"><i class="fas fa-save"></i> Save</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>


@stop