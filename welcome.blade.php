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
</head>
<body>
    <!-- Navigation -->
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
                        <a href="{{URL('signin')}}">Employee Login Panel</a>
                    </li>
                     <li>
                        <a href="{{URL('signOut')}}">Employee Logout Panel</a>
                    </li>
                     
                    </ul>
                      <?php } else {?>
                    <ul class="nav navbar-nav">
                    <li>
                        <a href="{{URL('emp_list')}}">Employee List</a>
                    </li>
                    <li>
                        <a href="{{URL('signin')}}">Employee Login Panel</a>
                    </li>
                    <li>
                        <a href="{{URL('signOut')}}">Employee Logout Panel</a>
                    </li>
                 </ul>
                  <?php } ?> 

                                     
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
     <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12" style="float: right;">
                <h3>Intact Management Panel</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, iusto, unde, sunt incidunt id sapiente rerum soluta voluptate harum veniam fuga odit ea pariatur vel eaque sint sequi tenetur eligendi.</p>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
<style type="text/css">
    body {
    margin-top: 50px;
    margin-bottom: 50px;
    background: none;
}

.full {
  background: url(images/management.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>