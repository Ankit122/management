
 <head>
        <title>HR Login</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"><link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
         <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
          <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>   
    </head>
   <!--  <div style="width: 80%; text-align: right; margin-top: 20px; margin-left: 200px;">
                 <button class="button button2"><a href="{{URL('/')}}">HOME</a></button>
                </div> -->
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
                <a class="navbar-brand" href="{{URL('/')}}">HR Site</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <?php if(!Auth::check()) { ?>
                <ul class="nav navbar-nav">
                    
                    <li>
                        <a href="{{URL('signin')}}">Employee Sign IN Panel</a>
                    </li>
                    <li>
                        <a href="{{URL('signOut')}}">Employee Sign Out Panel</a>
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
            <!-- <div class="col-md-6 col-sm-12">
                <h3 style="color: white">Intact HR</h3>
                <p style="color: white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, iusto, unde, sunt incidunt id sapiente rerum soluta voluptate harum veniam fuga odit ea pariatur vel eaque sint sequi tenetur eligendi.</p>
            </div> -->
        </div>
        <!-- /.row -->
    </div>
    <div class="vid-container">
 
  <div class="inner-container">
    
    <div class="box">
      <h1>Login</h1>
      @include('layout.error-notification') 
      <form class="form-group" method="POST" action="{{url('hrLogin')}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
      <input type="text"  name="email" placeholder="xyz@email.com" value="{{ old('email') }}"/>
      <input type="password"  name="password" id="password" placeholder="Password"/>
      <button type="submit">Login</button>
      </form>
    </div>
  </div>
</div>
<style type="text/css">
    body{
    background: url(images/hr_banner.jpg) no-repeat center center fixed;
     -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  padding:0;
  margin:0;
}
.vid-container{
  position:relative;
  height:100vh;
  overflow:hidden;
}
.bgvid.back {
  position: fixed; right: 0; bottom: 0;
  min-width: 100%; min-height: 100%;
  width: auto; height: auto; z-index: -100;
}
.inner {
  position: absolute;
}
.inner-container{
  width:400px;
  height:400px;
  position:absolute;
  top:calc(50vh - 200px);
  left:calc(50vw - 200px);
  overflow:hidden;
}
.bgvid.inner{
  top:calc(-50vh + 200px);
  left:calc(-50vw + 200px);
  -webkit-filter:blur(10px);
  -ms-filter: blur(10px);
  -o-filter: blur(10px);
  filter:blur(10px);
}
.box{
  
  position:absolute;
  height:100%;
  width:100%;
  font-family:Helvetica;
  color:#fff;
  background:rgba(0,0,0,0.45);
  padding:30px 0px;
}
.box h1{
  text-align:center;
  margin:30px 0;
  font-size:30px;
}
.box input{

  display:block;
  width:330px;
  margin:20px auto;
  padding:15px;
  background:rgba(0,0,0,0.55);
  color:#fff;
  border:0;
}
.box input:focus,.box input:active,.box button:focus,.box button:active{
  outline:none;
}
.box button{
  background:#ff7100;
  border:0;
  color:#fff;
  padding:10px;
  font-size:20px;
  width:330px;
  margin:20px auto;
  display:block;
  cursor:pointer;
}
.box button:active{
  background:#27ae60;
}
.box p{
  font-size:14px;
  text-align:center;
}
.box p span{
  cursor:pointer;
  color:#666;
}
</style>
