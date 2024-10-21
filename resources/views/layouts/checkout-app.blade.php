<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
   <head>
       <meta charset="UTF-8">
       <meta name="description" content="Studio Gallery">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
   
       <!-- Title  -->
       <title>@yield('title')</title>
   
       <!-- Core Style CSS -->
       <link rel="stylesheet" href="{{ asset('frontend/css/core-style.css') }}">
       <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
   </head>
   <body>

       <div class="container">
           @yield('content')
       </div>

       {{-- javascript --}}
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
   </body>
</html>

