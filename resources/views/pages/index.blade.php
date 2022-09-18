
@extends('layouts.app')

@section('content')

<div class="mt-5 text-center">
<div class="container text-white pt-5">
        <h1 class="font-weight-light mt-5">Welcome to Daily Notes</h1>
        @if (!Auth::check())
            <a href="{{ route('login') }}" class="btn index-btn mt-5 px-5 font-weight-light">Login</a>
        @endif
    </div>
</div>
<div class="font-weight-light credits"><i>Developed by: JP</i></div>
@stop