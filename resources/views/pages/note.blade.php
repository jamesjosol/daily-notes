
@extends('layouts.app')

@section('content')

<div class="mt-5">
    {!! Form::open(['route' => ['updateNote', $note->id], 'method'=>'patch', 'id'=>'noteForm']) !!}
    <div class="float-right mt-2">
        <button class="btn btn-primary float" type="submit">
            <i class="fa fa-save my-float" aria-hidden="true"></i>
        </button>
    </div>
    <div class="float-right mt-2">
        <button class="btn btn-outline-primary downloadBtn" type="button" onclick="saveFile()">
            <i class="fa fa-download" aria-hidden="true"></i>
        </button>
    </div>
    <h1 class="font-weight-light text-white title">{{ $note->title }}</h1>
 
    <div class="bg-white p-3 rounded dashcon mb-3">
            <input type="hidden" name="title_" id="title_" value="{{$note->title}}.txt">        
            {!! Form::textarea('content', $note->content, ['rows' => 40, 'cols' => 20, 'wrap'=>'hard', 'id'=>'content', 'class'=>'form-control' .  ($errors->has('content') ? ' is-invalid' : null)]) !!}
        
    </div>
    {!! Form::close() !!}
</div>

@stop