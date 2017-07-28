@extends('master')
@section('title', 'Employee List')
         @section('content')
               <h4><p style="color: red; text-align: right; margin-right: 60px;">mandatory fields(*)</p></h4>
                 @include('layout.error-notification') 
                 <div class = "container-fluid">
                <form class="form-group" method="post" action="{{url('addNewEmployee')}}" enctype="multipart/form-data" id="register_form">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Add Employee</h3>
                    </div>
                    <div class="panel-body">
                <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Fill Employee Full Name</h3>
                    </div>
                    <div class="panel-body">
                    <h4>First Name *</h4>
                    <input type="text" class="form-control" name="emp_firstname" placeholder="First Name"   maxlength="30" value="{{old('emp_firstname')}}" id="emp_firstname"/>
                    <h4>Middle Name</h4>
                 <input type="text" class="form-control" name="emp_middlename" placeholder="Middle Name"  maxlength="30" value="{{old('emp_middlename')}}"/>
                  <h4>Last Name *</h4>
                    <input type="text" class="form-control" name="emp_lastname" placeholder="Last Name"  maxlength="15" value="{{old('emp_lastname')}}" id = "emp_lastname"/>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Fill Employee ID,Designation,Department</h3>
                    </div>
                    <div class="panel-body">
                    <h4>Employee ID  *</h4>
                    <input type="text" class="form-control" name="emp_id" placeholder="Employee ID                                    (Ex - IITPL1234)"   maxlength="10" id = "emp_id"  value="{{old('emp_id')}}"/>
                     <h4>Designation *</h4>
                    <!-- <input type="text" class="form-control" name="emp_designation" placeholder="Designation" maxlength="35" value="{{old('emp_designation')}}"/> -->
                    <select class="form-control"  name="emp_designation" value="{{old('emp_designation')}}" id = "emp_designation">
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
                     <h4>Department *</h4>
                   <!--   <input type="text" class="form-control" name="emp_department" placeholder="Department"  maxlength="35" value="{{old('emp_department')}}"/> -->
                     <select class="form-control"  name="emp_department" value="{{old('emp_department')}}" id = "emp_department" >
                      <option value=" ">Select One</option>
                      <option value="Engineering">Engineering</option>
                      <option value="HR Department">HR Department</option>
                      <option value="Infra-structure">Infra-structure</option>
                      <option value="Admin Department">Admin Department</option>
                      <option value="Facility Department">Facility Department</option>
                    </select>
                    </div>
                    </div>
                </div>
                <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Choose Joining Date,Status,Photo</h3>
                    </div>
                    <div class="panel-body">
                    <h4>Joining Date *</h4>
                     <input type="date" class="form-control" name="joining_date" placeholder="Joining Date"value="{{old('joining_date')}}" id = "joining_date"/>
                      <h4 style="margin-top: 15px">Status *</h4>
                      <input type="radio" name="status" value="1" checked=" ">Active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" name="status" value="0">De-Active
                       <div class="form-group" >
                    <label style="margin-top: 20px" >Select a image to upload</label>
                   <input type="file" name="emp_photo" id = "emp_photo">
                 </div>
                    </div>
                    </div>
                    <div class="col-sm-4">
                  <button type="submit" class="btn btn-lg btn-primary" style="margin-top: 20px;">Save Employee</button>
                  </div>
                </div>
                  </div>
                  </div>
                  </div>
                  </form>
                  </div>
                <head><script src="//code.jquery.com/jquery-1.9.1.js"></script>
                <script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script></head>
                
  
  <!-- jQuery Form Validation code -->
  <script>
  
  // When the browser is ready...
  $(function() {
  
    // Setup form validation on the #register-form element
    $("#register_form").validate({
    
        // Specify the validation rules
        rules: {
            emp_id: "required",
            emp_firstname: "required",
            emp_lastname: "required",
            emp_designation: "required",
            emp_department: "required", 
            emp_photo: "required"
               
        },
        
        // Specify the validation error messages
        messages: {
            emp_id: "*",
            emp_firstname: "*",
            emp_lastname: "*",
            emp_designation: "*",
            emp_department: "*", 
            emp_photo: "*", 
            
        },
        
        submitHandler: function(form) {
            form.submit();
        }
    });

  });
  
  </script>
 
    @endsection
  @section('pagescript')
 
