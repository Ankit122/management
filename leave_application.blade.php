<!DOCTYPE html>
<html class="full" lang="en">
<!-- Make sure the <html> tag is set to the .full CSS class. Change the background image in the full.css file. -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>HR Site</title>

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
       <div class="container">
           <div class="row">
        <div class="col-md-6 col-sm-12">
        <h3>Intact HR</h3>
         <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, iusto, unde, sunt incidunt id sapiente rerum soluta voluptate harum veniam fuga odit ea pariatur vel eaque sint sequi tenetur eligendi.</p>
          </div>
           </div>
          /div>
        <!-- /.row -->
    <div class="container">
          <div class="row">
            <div class="col-md-4 col-md-offset-4">
           <div class="form_bg">
     @include('layout.error-notification')
      <form class="form-group" method="post" action="{{url('leaveForm')}}">  
                <input type="hidden" name="_token" value="{{ csrf_token() }}">     
                <h2 class="form-signin-heading" style="text-align: center;">Leave Application</h2>
                <div class="col-md-4 col-md-offset-4">
                 <h4>Employee ID</h4>
                <input type="text" class="form-control" name="emp_id" placeholder="Employee ID" maxlength="10" id="emp_id" value=""/>
                <h4>Name</h4>
                <input type="text" class="form-control" name="name" placeholder="Name" maxlength="15" id="name" />
                
                 <h4>  Leave  To </h4>
                <input type="date" class="form-control" name="leave_date_to" placeholder="Joining Date" id="leave_date_to" />
                 <h4> From </h4>
                <input type="date" class="form-control" name="date_from" placeholder="Joining Date" id="date_from" />
                 <h4>Leave Description</h4>
                 <textarea class="form-control" rows="4" name="description" id="description" placeholder="Describe Here.."></textarea>&nbsp;
                <button class="btn btn-lg btn-primary btn-block" type="submit">Apply</button>   
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
<style type="text/css">
    body {
    margin-top: 50px;
    margin-bottom: 50px;
    background: none;
}

.full {
  background: url(images/application_form1.jpg) no-repeat center center fixed; 
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
    display: inline-block;
    font-size: 14px;
    margin: 4px 2px;
    cursor: pointer;

}
.button2 {background-color: #008CBA;}
a:visited {
    color: white;
}
.button2 a:hover {
  color:  #00ff80;
  text-decoration: none;
}

</style>
