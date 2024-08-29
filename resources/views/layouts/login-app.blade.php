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
   </head>
   <body>

       <div class="container">
           @yield('content')
       </div>
       
   </body>
</html>