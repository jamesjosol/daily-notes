
@extends('layouts.app')

@section('content')

<div class="mt-5">
    <h1 class="font-weight-light text-white">Search Note</h1>
    <div class="container p-2 rounded dashcon mb-3">
       <div class="col">
        {!! Form::open(['route' => ['search'], 'method'=>'get']) !!}
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

        @if(!$notes->isEmpty())
        <table class="table table-hover table-lg table-dark" id="myTable">
            <thead class="theadstyle">
                <th><h4>Date</h4></th>
            </thead> 
            <tbody>
                @foreach($notes as $n)
                <tr class="table-row" data-href="{{url("/note/$n->id")}}">
                    <td class="name">{{$n->title}}</td>
                </tr>
                @endforeach
                @else
                <tr> <h4  class="text-white ml-3">No notes recorded.</h4> </tr>
                @endif
            </tbody>
        </table>  
       
    </div>
</div>
<script>
    $(document).ready(function($) {
        $(".table-row").click(function() {
            window.document.location = $(this).data("href");
        });
    });
</script>
@stop