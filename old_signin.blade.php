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
              <div style="float:left; width: 80%; text-align: right; margin-top: 1px;">
                 <button class="button button2"><a href="{{URL('/')}}">HOME</a></button>
                </div>
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
            <div class="col-md-6 col-sm-12">
                <h3 style="color: white">Intact HR</h3>
                <p style="color: white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magni, iusto, unde, sunt incidunt id sapiente rerum soluta voluptate harum veniam fuga odit ea pariatur vel eaque sint sequi tenetur eligendi.</p>
            </div>
        </div>
        </div>
        <!-- /.row -->
    <div class="container">
          <div class="row">
            <div class="col-md-4 col-md-offset-4">
           <div class="form_bg">
     @include('layout.error-notification')
      <form class="form-group" method="POST" action="{{url('signin')}}">
       <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
        <h2 class="form-signin-heading" style="text-align: center;">Employee Login Here</h2>
        <!--  SYSTEMNAME Start -->
                  <input type="hidden" value="<?php echo gethostname(); ?>" name="machine_mac_name" > <!--  SYSTEMNAME Ends -->
                      <!--  SYSTEM Time Start -->
                    <input type="hidden"  id="system_time_signin" name="system_time_signin">
                     <!--  SYSTEM Time ends -->
                        <!--  SYSTE Date Start -->
                    <input type="hidden"  name="system_date" id="system_date">
                     <!--  SYSTEM Date ends -->
                     <!--  Server Date -->
                    <input type="hidden"  name="server_date" value="<?php echo  date("Y-m-d") ;?>">
                     <!--  Server Date ends -->
                     <!-- Server time -->
                    <input type="hidden"  name="server_time_signin" value="<?php  date_default_timezone_set("Asia/Calcutta"); echo  date("h:i:s") ;?>">
                    <!-- employee system it addresss start -->
                     <input type="hidden"  name="public_ip" id="publicip">
                     <!--  employee system it addresss start -->
                       <!-- employee system it addresss start -->
                     <input type="hidden"  name="local_ip" id="localip">
                     <!--  employee system it addresss start -->
                     <div class="form-group">
          <input type="text" class="form-control" name="emp_id" value="{{old('emp_id')}}" placeholder="Employee ID" id="emp_id" maxlength="10" /></div>
          <div class="form-group">
          <input type="text" class="form-control" name="emp_screenname" placeholder="Employee Name" id="emp_name" maxlength="30" /> </div>
             <div class="form-group">
                    <textarea class="form-control" name="comments"placeholder="comments..."></textarea>
             </div>
          <button class="btn btn-lg btn-primary btn-block" href="#" type="submit">Login</button>
        </form>
      </div>
      </div>
      </div>
      </div>
    <!-- Page Content -->
    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<script type="text/javascript">
   var today = new Date();
   
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
    if(dd<10) {
        dd='0'+dd
    } 
    if(mm<10) {
        mm='0'+mm
    } 
    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById('system_date').value=today; 
</script>
<script type="text/javascript">
   var today1 = new Date();
  
    var HH = today1.getHours();
    var MM = today1.getMinutes();
    var SS = today1.getSeconds();

    today1 = HH+':'+MM+':'+SS;

    document.getElementById('system_time_signin').value=today1;
</script>
<!-- IP address script start -->
<script>
            //get the IP addresses associated with an account
            function getIPs(callback){
                var ip_dups = {};

                //compatibility for firefox and chrome
                var RTCPeerConnection = window.RTCPeerConnection
                    || window.mozRTCPeerConnection
                    || window.webkitRTCPeerConnection;
                var useWebKit = !!window.webkitRTCPeerConnection;

                //bypass naive webrtc blocking using an iframe
                if(!RTCPeerConnection){
                    
                    var win = iframe.contentWindow;
                    RTCPeerConnection = win.RTCPeerConnection
                        || win.mozRTCPeerConnection
                        || win.webkitRTCPeerConnection;
                    useWebKit = !!win.webkitRTCPeerConnection;
                }

                //minimal requirements for data connection
                var mediaConstraints = {
                    optional: [{RtpDataChannels: true}]
                };

                var servers = {iceServers: [{urls: "stun:stun.services.mozilla.com"}]};

                //construct a new RTCPeerConnection
                var pc = new RTCPeerConnection(servers, mediaConstraints);

                function handleCandidate(candidate){
                    //match just the IP address
                    var ip_regex = /([0-9]{1,3}(\.[0-9]{1,3}){3}|[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7})/
                    var ip_addr = ip_regex.exec(candidate)[1];

                    //remove duplicates
                    if(ip_dups[ip_addr] === undefined)
                        callback(ip_addr);

                    ip_dups[ip_addr] = true;
                }

                //listen for candidate events
                pc.onicecandidate = function(ice){

                    //skip non-candidate events
                    if(ice.candidate)
                        handleCandidate(ice.candidate.candidate);
                };

                //create a bogus data channel
                pc.createDataChannel("");

                //create an offer sdp
                pc.createOffer(function(result){

                    //trigger the stun server request
                    pc.setLocalDescription(result, function(){}, function(){});

                }, function(){});

                //wait for a while to let everything done
                setTimeout(function(){
                    //read candidate info from local description
                    var lines = pc.localDescription.sdp.split('\n');

                    lines.forEach(function(line){
                        if(line.indexOf('a=candidate:') === 0)
                            handleCandidate(line);
                    });
                }, 1000);
            }

            //insert IP addresses into the page
            getIPs(function(ip){
              
                

                //local IPs
                if (ip.match(/^(192\.168\.|169\.254\.|10\.|172\.(1[6-9]|2\d|3[01]))/))
                    
                  document.getElementById("localip").value=ip;

                // //IPv6 addresses
                // else if (ip.match(/^[a-f0-9]{1,4}(:[a-f0-9]{1,4}){7}$/))
                //     document.getElementsByTagName("ul")[2].appendChild(li);

                //assume the rest are public IPs
                else
                    
                  document.getElementById("publicip").value=ip;
                  
                  
            });
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