
@extends('layouts.app')

@section('content')

<div class="mt-5">
    {!! Form::open(['route' => ['updateNote', $note->id], 'method'=>'patch']) !!}
    <div class="float-right mt-2">
        <button class="btn btn-primary float">
            <i class="fa fa-save my-float" aria-hidden="true"></i>
        </button>
    </div>
    <h1 class="font-weight-light text-white">{{ $note->title }}</h1>
    <div class="bg-white p-3 rounded dashcon mb-3">
        
            {!! Form::textarea('content', $note->content, ['rows' => 40, 'cols' => 20, 'wrap'=>'hard', 'class'=>'form-control' .  ($errors->has('content') ? ' is-invalid' : null)]) !!}
      
    </div>
    {!! Form::close() !!}
</div>
@stop