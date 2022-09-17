<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->    
    {{-- <link rel="stylesheet" href="{{asset('css/bootstrapv5.1/bootstrap.min.css')}}"> --}}
    <link rel="stylesheet" href="{{asset('css/bootstrapv4.5/bootstrap.min.css')}}">
   
  
    <script src="{{asset('js/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/fontawesome.css')}}">
    <link rel="stylesheet" href="{{asset('css/fontawesome-5.10.0/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr/toastr.min.css')}}">
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <title>Daily Notes</title>
</head>
<body>
    @include('partials.nav')
    @include('partials.messages')
   
    <div class="container">
        @yield('content')
    </div>
</body>
<script src="{{asset('js/samepos.js')}}"></script>
</html>