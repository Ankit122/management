
 <head>
        <title>Sign In</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"><link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
         <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
          <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>   
    </head>
    <!-- <div style="width: 80%; text-align: right; margin-top: 20px; margin-left: 200px;">
    <button class="button button2"><a href="{{URL('/')}}">HOME</a></button></div> -->
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
                        <a href="{{URL('signOut')}}">Employee Sign Out Panel</a>
                    </li>
                      
                    </ul>
                      <?php } else {?>
                    <ul class="nav navbar-nav">
                    <!-- <li>
                        <a href="{{URL('hr_login')}}">HR Login</a>
                    </li> -->
                    <li>
                        <a href="{{URL('signOut')}}">Sign Out</a>
                    </li>
                  <!--   <li>
                        <a href="{{URL('signin')}}">Sign In</a>
                    </li> -->
                    
                 </ul>
                  <?php } ?>          
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="vid-container">
 
  <div class="inner-container">
    
    <div class="box">
      <h1>Login</h1>
       @include('layout.error-notification')
      <form class="form-group" method="POST" action="{{url('signin')}}">
      <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
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
      <input type="text"  name="emp_id" value="{{old('emp_id')}}" placeholder="Employee ID" id="emp_id" maxlength="10" />
      <input type="text"  name="emp_screenname" placeholder="Employee Name" id="emp_name" maxlength="30"/>
       <textarea  name="comments"placeholder="comments..."></textarea>
      <button type="submit">Login</button>
      </form>
    </div>
  </div>
</div>
<script type="text/javascript">
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

</script>
<style type="text/css">
    body{
   background: url(images/employeeimage.jpg) no-repeat center center fixed;
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
  height:500px;
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
  background: rgba(0,0,0,0.45);
  padding:30px 0px;
  margin-top: -50px;
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
.box textarea{
  display:block;
  width:330px;
  margin:20px auto;
  padding:15px;
  background:rgba(0,0,0,0.55);
  color:#fff;
  border:0;
}
.box input:focus,.box input:active,.box textarea:active,.box button:focus,.box button:active{
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
