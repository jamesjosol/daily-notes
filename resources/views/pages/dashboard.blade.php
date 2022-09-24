
@extends('layouts.app')

@section('content')

{{-- <div class="mt-5 text-center">
    <div class="container text-white pt-5">
        <h1 class="font-weight-light mt-5">Dashboard</h1>
    </div>
</div> --}}
<div class="mt-5">
    <div class="float-right mt-2">
        <a class="btn btn-outline-primary" href="{{ route('new')}}">
            <i class="fa fa-plus" aria-hidden="true"></i> New Note
        </a>
    </div>
    <h1 class="font-weight-light text-white">Recent Notes</h1>
    <div class="container p-2 rounded dashcon mb-3">
       <div class="col-md-3">
        <div class="input-group mb-2 prepend">
            <div class="input-group-prepend">
                <div class="input-group-text search-box-prepend"><i class="fa fa-search"></i></div>
            </div>
            <input type="text" class="form-control search-box" id="myInput" onkeyup="myFunction()" placeholder="example: 09/20/2022">
        </div>
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

    function myFunction() {
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("myInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("myTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
            }       
        }
    }
</script>
@stop