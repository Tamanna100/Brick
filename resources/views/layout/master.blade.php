<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('title')</title>
 

    <!-- Bootstrap -->
   
    <link href="{{ asset('/boot_asset/css/bootstrap.min.css') }}" rel="stylesheet"/>

    <link href="{{URL::asset('/boot_asset/css/custom.css')}} "rel="stylesheet">   
    <link href="{{URL::to('boot_asset/css/reset.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet"> 

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>


<section>
    <div class="container-fluid">
         @yield('top')
    </div>
</section>
 

<section>
    <div class="container-fluid">
       @include('includes.message')
        @yield('content')
    </div>
</section> 


    <section>
        <div class="container">
            @yield('footer')
        </div>
    </section>






    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed --> 
    <script type="text/javascript" src="{{URL::asset('boot_asset/js/bootstrap.min.js')}}"></script>
  </body>
</html>





