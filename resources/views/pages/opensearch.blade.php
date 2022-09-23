
@extends('layouts.app')

@section('content')

<div class="mt-5">
    <h1 class="font-weight-light text-white">Search Note</h1>
    <div class="container p-2 rounded dashcon mb-3">
       <div class="col">
        {!! Form::open(['route' => ['searchresult'], 'method'=>'get']) !!}
        <div class="input-group mb-2 prepend">
            <div class="input-group-prepend">
                <div class="input-group-text search-box-prepend"><i class="fa fa-search"></i></div>
            </div>
            <input type="text" class="form-control search-box" id="myInput" name="search" placeholder="Search...">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </div>
       </div>
       {!! Form::close() !!}
    </div>
</div>
@stop