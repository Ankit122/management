<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HR SITE</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/the-big-picture.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
              <div style="float:left; width: 80%; text-align: right; margin-top: 1px;">
                 <button class="button button2"><a href="{{URL('/')}}">HOME</a></button>
                </div>
                <nav class="navbar navbar-inverse navbar-fixed-bottom" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">HR Site</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <?php if(!Auth::check()) { ?>
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{URL('hr_login')}}">HR Login Panel</a>
                    </li>
                    <li>
                        <a href="{{URL('signin')}}">Employee Sign IN Panel</a>
                    </li>
                      
                    </ul>
                      <?php } else {?>
                    <ul class="nav navbar-nav">
                    <li>
                        <a href="{{URL('hr_login')}}">HR Login</a>
                    </li>
                    <li>
                        <a href="{{URL('signOut')}}">Sign Out</a>
                    </li>
                    <li>
                        <a href="{{URL('signin')}}">Sign In</a>
                    </li>
                    
                 </ul>
                  <?php } ?>          
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
   
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h3 style="color: white">Intact HR</h3>
                <p style="color: white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, iusto, unde, sunt incidunt id sapiente rerum soluta voluptate harum veniam fuga odit ea pariatur vel eaque sint sequi tenetur eligendi.</p>
            </div>
        </div>
        <!-- /.row -->
    <div class="container">
          <div class="row">
            <div class="col-md-4 col-md-offset-4">
           <div class="form_bg">
     @include('layout.error-notification')
      <form class="form-group" method="POST" action="{{url('emplyeesignOut')}}">
       <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
        <h2 class="form-signin-heading" style="text-align: center;">Employee Logout Here</h2>
        <input type="hidden"  id="system_time_signout" name="system_time_signout">
         <input type="text" class="form-control" name="empsignout_id" value="{{old('emp_id')}}" placeholder="Employee ID" id="emp_id" maxlength="10" /><br>
       
       <button class="btn btn-lg btn-primary btn-block" href="{{URL('logout')}}" type="submit">Sign Out</button>
      </form>
       
      </form>
      </div>
      </div>
      </div>
      </div>
   

    <!-- Page Content -->
   
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<script type="text/javascript">
   var today1 = new Date();
   // console.log(today1);

    var HH = today1.getHours();
    var MM = today1.getMinutes();
    if(MM<10){
        MM = '0'+MM;
    }
    var SS = today1.getSeconds();
    if(SS<10){
        SS = '0'+SS;
    }
    today1 = HH+':'+MM+':'+SS;

    document.getElementById('system_time_signout').value=today1;
</script>
<style type="text/css">
    body {
    margin-top: 50px;
    margin-bottom: 50px;
    background: none;
}

.full {
  background: url(images/employeeimage.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 13px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;

}
.button2 {background-color: #008CBA;}
a:visited {
    color: white;
}

</style>