
@extends('layouts.app')

@section('content')

<div class="mt-5">
    {!! Form::open(['route' => ['updateNote', $note->id], 'method'=>'patch', 'id'=>'noteForm']) !!}
    <div class="float-right mt-2">
        <button class="btn btn-primary float subBtn" id="subBtn" type="button" onclick="subForm()">
            <i class="fa fa-save my-float" aria-hidden="true"></i>
        </button>
    </div>
    
    <div class="float-right mt-2">
        <button class="btn btn-outline-primary downloadBtn" type="button" onclick="saveFile()">
            <i class="fa fa-download" aria-hidden="true"></i>
        </button>
      
    </div>
    {{-- <div class="float-right mt-2 mr-5">
        <a href="{{ route('dashboard') }}" class="btn btn-outline-info" type="button" title="dashboard">
            <i class="fas fa-th-large" aria-hidden="true"></i> Dashboard
        </a>
    </div> --}}
    <h1 class="font-weight-light text-white title">{{ $note->title }}</h1>
    
    <div class="bg-white p-3 rounded dashcon mb-3">
            <input type="hidden" name="title_" id="title_" value="{{$note->title}}.txt">        
            {!! Form::textarea('content', $note->content, ['rows' => 40, 'cols' => 20, 'wrap'=>'hard', 'id'=>'content', 'class'=>'form-control' .  ($errors->has('content') ? ' is-invalid' : null)]) !!}
        
    </div>
    {!! Form::close() !!}
</div>
<script>
    function subForm (){
        var url = '{{ "/note/$note->id" }}';
        var message = '{{"Note $note->title"}}';
        $.ajax({
            url: url,
            type: 'post',
            data: $('#noteForm').serialize(),
            error: function(){
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true,
                    "positionClass": "toast-bottom-right",
                }
                toastr.success(message + " save failed.", "", {"iconClass": 'custom-error'});
            },
            success: function(){
                toastr.options =
                {
                    "closeButton" : true,
                    "progressBar" : true,
                    "positionClass": "toast-bottom-right",
                }
                toastr.success(message + " saved.", "", {"iconClass": 'custom-success'});
            }
        });
    }

    // $(document).bind("keyup keydown", function(e){
    //     if(e.ctrlKey && e.which == 83) {
    //         subForm();
    //     }
    // });


    </script>

@stop