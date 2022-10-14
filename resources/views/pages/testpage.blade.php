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
    <link rel="stylesheet" href="{{asset('css/test.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr/toastr.min.css')}}">
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <title>Daily Notes</title>
</head>
<body>
    <div class="container">
        

        <div class="chickyboxes mt-5">
            <input type="checkbox" id="box-1" class="custom-checkbox" data-task-id="1">
            <label for="box-1">Pellentesque sit amet quam</label>
            
            <input type="checkbox" id="box-2" class="custom-checkbox" data-task-id="2">
            <label for="box-2">Morbi faucibus interdum magna vel</label>
            
            <input type="checkbox" id="box-3" class="custom-checkbox" data-task-id="3">
            <label for="box-3">Donec ultrices diam sed</label>
        </div>
    </div>
</body>
<script>
    const checkbox = document.getElementById('box-1')

    checkbox.addEventListener('change', (event) => {
    if (event.currentTarget.checked) {
        var el = $(".custom-checkbox")
        var id = el.data('task-id');
        alert(id);
        } else {
        alert('not checked');
        }
    })
</script>
<script src="{{asset('js/samepos.js')}}"></script>
</html>