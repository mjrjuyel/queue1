<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rol edd</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-8 offset-2">
                <form action="{{route('role.insert')}}" method="post">
                  
                  @if(Session::has('success'))
                    <div id="aleartDiv" class="bg-info text-center" style="display:block; height:60px; width:100%">
                     <h5 class="text-dark">{{Session::get('success')}}</h5>
                    </div>
                  @endif
                    @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">Role Name : </label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name" aria-describedby="emailHelp">
                      <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                    
                  </form>
            </div>
            
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    {{-- <script>
    $('body').ready(function(){
      $('#demo').on('click',function(){
        $('#aleartDivv').css('display','block');
      })
    });      
    </script> --}}
</body>
</html>