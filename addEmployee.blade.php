 @extends('master')
@section('title', 'Add Employee')
         @section('content')
           @section('pagescript')
 <head>
        <title>Add Employee</title>

        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css"><link rel="stylesheet" type="text/css" href="{{url('css/bootstrap.min.css')}}">
         <meta name="viewport" content="width=device-width, initial-scale=1">
          <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
          <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>   
    </head>
<div class="container auth">
    @include('layout.error-notification') 
    <div id="big-form" class="well auth-box">
      <form class="form-group" method="post" action="{{url('addNewEmployee')}}" enctype="multipart/form-data">
       <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <fieldset>

          <!-- Form Name -->
          <legend>Add New Employee</legend>

          <!-- Text input-->
          <div class="form-group">
            <label class=" control-label" for="textinput">First Name*</label>  
            <div class="">
              <input id="emp_firstname" name="emp_firstname" placeholder="Employee First Name" value="{{old('emp_firstname')}}" class="form-control input-md" type="text" maxlength="35">
            </div>
          </div>
          <!-- Text input-->
          <div class="form-group">
            <label class=" control-label" for="textinput"> Middle Name</label>  
            <div class="">
              <input id="emp_middlename" name="emp_middlename" value="{{old('emp_middlename')}}" placeholder="Employee Middle Name" class="form-control input-md" type="text" maxlength="35">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Last name*</label>  
            <div class="">
              <input id="emp_lastname" name="emp_lastname" placeholder="Employee Last Name" value="{{old('emp_lastname')}}" class="form-control input-md" type="text" maxlength="35">
            </div>
          </div>

          <!-- Text input-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Employee ID*</label>  
            <div class="">
              <input id="emp_id" name="emp_id" placeholder="Enter Employee ID                                    (Ex.-IITPL1234)" value="{{old('emp_id')}}" class="form-control input-md" type="text" maxlength="10">
            </div>
          </div>
        

          <!-- Select Basic -->
          <div class="form-group">
            <label class=" control-label" for="Designation">Designation*</label>
            <div class="">
              <select id="emp_designation" name="emp_designation" class="form-control" value="{{old('emp_designation')}}">
                <option value=" ">Select One</option>
                      <option value="Sr.Software Engineer">Sr.Software Engineer</option>
                      <option value="Software Engineer">Software Engineer</option>
                      <option value="Project Manager">Project Manager</option>
                      <option value="Team Lead">Team Lead</option>
                      <option value="Project Co-ordinator">Project Co-ordinator</option>
                      <option value="Product Manager">Product Manager</option>
                      <option value="Trainee Software Engineer">Trainee Software Engineer</option>
                      <option value="Network Engineer">Network Engineer</option>
                      <option value="Technical Support Engineer">Technical Support Engineer</option>
                      <option value="Desktop Engineer Engineer">Desktop Engineer Engineer</option>
                      <option value="Business Development Executive(BDE)">Business Development Executive(BDE)</option>
                      <option value="Business Development Manager(BDM)">Business Development Manager(BDM)</option>
                      <option value="Human Resource Manager(HRM)">Human Resource Manager(HRM)</option>
                      <option value="Administrator">Administrator</option>
                      <option value="Peon">Peon</option>
              </select>
            </div>
          </div>

          <!-- Select Basic -->
          <div class="form-group">
            <label class=" control-label" for="selectbasic">Department*</label>
            <div class="">
              <select id="emp_department" name="emp_department" class="form-control" value="{{old('emp_department')}}">
                <option value=" ">Select One</option>
                      <option value="Engineering">Engineering</option>
                      <option value="HR Department">HR Department</option>
                      <option value="Infra-structure">Infra-structure</option>
                      <option value="Admin Department">Admin Department</option>
                      <option value="Facility Department">Facility Department</option>
              </select>
            </div>
          </div>

           <!-- Text input-->
          <div class="form-group">
            <label class=" control-label" for="textinput">Joining date*</label>  
            <div class="">
              <input id="joining_date" name="joining_date" value="{{old('joining_date')}}" class="form-control input-md" type="date" value="{{old('joining_date')}}" >
            </div>
          </div>

          <!-- Multiple Radios -->
          <div class="form-group">
            <label class=" control-label" for="radios">Status*</label>
            <div class="">
              <div class="radio">
                <label for="radios-0">
                  <input name="status" id="status" value="1" checked="checked" type="radio">
                  Active
                </label>
              </div>
              <div class="radio">
                <label for="radios-1">
                  <input name="status" id="status" value="2" type="radio">
                  De-Active
                </label>
              </div>
            </div>
          </div>
          <!-- File Button --> 
          <div class="form-group">
            <label class=" control-label" for="filebutton">Upload Employee Photo</label>
            <div class="">
              <input id="emp_photo" name="emp_photo" class="input-file" type="file">
            </div>
          </div>
          <!-- Button -->
              <button type="submit" class="btn btn-success">Submit</button>
     
        </fieldset>
      </form>
    </div>
    <div class="clearfix"></div>
  </div>
 
<style type="text/css">
  .margin-top-20{
  margin-top: 20px;
}
body{
  background:url('http://www.wallpaperup.com/uploads/wallpapers/2012/08/30/12087/3574f899daef41d2f145eba13ff7840f.jpg');
  background-size:100% 100%;
  background-attachment: fixed; 
  background-repeat:no-repeat;
  font-family: 'Open Sans', sans-serif;
  padding-bottom: 40px;
}
.auth h1{
  color:#fff!important;
  font-weight:300;
  font-family: 'Open Sans', sans-serif;
}
.auth h1 span{
  font-size:21px;
  display:block;
  padding-top: 20px;
}
.auth .auth-box legend{
  color:#fff;
  border:none;
  font-weight:300;
  font-size:24px;
}
.auth .auth-box{
  background-color:#fff;
  max-width:460px;
  margin:0 auto;
  border:1px solid rgba(255, 255, 255, 0.4);;
  background-color: rgba(255, 255, 255, 0.2);
  background: rgba(255, 255, 255, 0.2);
  margin-top:40px;
  -webkit-box-shadow: 0px 0px 30px 0px rgba(50, 50, 50, 0.32);
  -moz-box-shadow:    0px 0px 30px 0px rgba(50, 50, 50, 0.32);
  box-shadow:         0px 0px 30px 0px rgba(50, 50, 50, 0.32);
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
  -webkit-transition: background 1s ease-in-out;
  -moz-transition: background 1s ease-in-out;
  -ms-transition: background 1s ease-in-out;
  -o-transition: background 1s ease-in-out;
  transition: background 1s ease-in-out;
}
@media(max-width:460px){
  .auth .auth-box{
   margin:0 10px;
 }
}

.auth .auth-box input::-webkit-input-placeholder { /* WebKit browsers */
  color:    #fff;
  font-weight:300;
}
.auth .auth-box input:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
  color:    #fff;
  font-weight:300;
}
.auth .auth-box input::-moz-placeholder { /* Mozilla Firefox 19+ */
  color:    #fff;
  font-weight:300;
}
.auth .auth-box input:-ms-input-placeholder { /* Internet Explorer 10+ */
  color:    #fff;
  font-weight:300;
}
.auth span.input-group-addon,
.input-group-btn button{
  border:none;
  background: #fff!important;
  color:#000!important;
}
.auth form{
    font-weight:300!important;
}
.auth form input[type="text"],
.auth form input[type="password"],
.auth form input[type="email"],
.auth form input[type="search"]{
  border:none;
  padding:10px 0 10px 0;
  background-color: rgba(255, 255, 255, 0)!important;
  background: rgba(255, 255, 255, 0);
  color:#fff;
  font-size:16px;
  border-bottom:1px dotted #fff;
  border-radius:0;
  box-shadow:none!important;
  height:auto;
}
.auth textarea{
  background-color: rgba(255, 255, 255, 0)!important;
  color:#fff!important;
}
.auth input[type="file"] {
  color:#fff;
}
.auth form label{
    color:#fff;
    font-size:21px;
    font-weight:300;
}
/*for radios & checkbox labels*/
.auth .radio label,
.auth label.radio-inline,
.auth .checkbox label,
.auth label.checkbox-inline{
    font-size: 14px;    
}

.auth form .help-block{
    color:#fff;
}
.auth form select{
  background-color: rgba(255, 255, 255, 0)!important;
  background: rgba(255, 255, 255, 0);
  color:#fff!important;
  border-bottom:1px solid #fff!important;
  border-radius:0;
  box-shadow:none;
}
.auth form select option{
    color:#000;
}
/*multiple select*/
.auth select[multiple] option, 
.auth select[size] {
  color:#fff!important;
}

/*Form buttons*/
.auth form .btn{
  background:none;
  -webkit-transition: background 0.2s ease-in-out;
  -moz-transition: background 0.2s ease-in-out;
  -ms-transition: background 0.2s ease-in-out;
  -o-transition: background 0.2s ease-in-out;
  transition: background 0.2s ease-in-out;
}
.auth form .btn-default{
    color:#fff;
    border-color:#fff;
}
.auth form .btn-default:hover{
    background:rgba(225, 225, 225, 0.3);
  color:#fff;
  border-color:#fff;
}
.auth form .btn-primary:hover{
    background:rgba(66, 139, 202, 0.3);
}
.auth form .btn-success:hover{
    background:rgba(92, 184, 92, 0.3);
}
.auth form .btn-info :hover{
    background:rgba(91, 192, 222, 0.3);
}
.auth form .btn-warning:hover{
    background:rgba(240, 173, 78, 0.3);
}
.auth form .btn-danger:hover{
    background:rgba(217, 83, 79, 0.3);
}
.auth form .btn-link{
  border:none;
  color:#fff;
  padding-left:0;
}
.auth form .btn-link:hover{
  background:none;
}


.auth label.label-floatlabel {
  font-weight: 300;
  font-size: 11px;
  color:#fff;
  left:0!important;
  top: 1px!important;
}</style>
  @endsection