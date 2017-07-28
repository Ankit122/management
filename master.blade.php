<!DOCTYPE html>
<html lang="en">

<head>
    <title>App Name - @yield('title')</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
</head>
<body>
      <nav role="navigation" class="navbar navbar-inverse">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a href="{{URL('/')}}" class="navbar-brand">HR Site</a>
    </div>
    <!-- Collection of nav links, forms, and other content for toggling -->
    <div id="navbarCollapse" class="collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="active"><a href="{{URL('emp_list')}}">Employee List</a></li>
            <li><a href="{{URL('addEmployee')}}">Add Employee</a></li>
             <li><a href="{{URL('signin_signout_report')}}">Sign In | Sign Out Report</a></li>
             <li><a href="{{URL('is_terminate')}}">Employee Terminations</a></li>
            <!--  <li><a href="{{URL('expence')}}">Add Expenses</a></li>
            <li><a href="{{URL('expence_list')}}">Expenses List</a></li> -->
             
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="{{URL('logout')}}">Logout</a></li>
        </ul>
    </div>
</nav>
  
     <!-- /#wrapper -->
       @yield('content')
     <!-- jQuery -->
     <script src="js/jquery.js"></script>
     <script src="js/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
     
        @yield('pagescript')
  
</body>
</html>
