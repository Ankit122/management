@extends('master')
@section('title', 'Edit')
         @section('content')
                @include('layout.error-notification')
                <form class="form-group" method="post" action="{{url('editEmployee')}}" enctype="multipart/form-data">  
                <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                <input type="hidden" name="id" value="{{$emp_detail[0]->id}}">   
                  <?php if($emp_detail[0]->emp_photo){?>
                   <div class="col-lg-3">
                    <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Employee Picture</h3>
                    </div>
                    <div class="panel-body">
                    <div class="thumbnail">
                      <img class="img-circle" src="{{url('emp/thumb200x300/'.$emp_detail[0]->emp_photo)}}" width="100" height="100">
                    </div>
                  </div> 
                  </div>
                  </div>
                  <?php }?>
                  <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Edit Employee Detail</h3>
                    </div>
                    <div class="panel-body">
                      
                <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Edit Employee Full Name</h3>
                    </div>
                    <div class="panel-body">
                    <h4 style="margin-top: 30px">First Name</h4>
                <input type="text" class="form-control" name="emp_firstname" placeholder="First Name" maxlength="15" id="emp_firstname" value ="{{$emp_detail[0]->emp_firstname}}"/>
                 <h4 style="margin-top: 30px">Middle Name</h4>
                <input type="text" class="form-control" name="emp_middlename" placeholder="Middle Name" maxlength="15" id="emp_middlename" value="{{$emp_detail[0]->emp_middlename}}"/>
                  <h4 style="margin-top: 30px">Last Name</h4>
                <input type="text" class="form-control" name="emp_lastname" placeholder="Last Name" maxlength="15" id="emp_lastname" value="{{$emp_detail[0]->emp_lastname}}"/>
                    </div>
                    </div>
                    </div>
                    <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Edit Employee Full Name</h3>
                    </div>
                    <div class="panel-body">
                    <h4 style="margin-top: 30px">Employee ID</h4>
                <input type="text" class="form-control" name="emp_id" placeholder="Employee ID"maxlength="10" id="emp_id" value="{{$emp_detail[0]->emp_id}}"/>
               
                <h4 style="margin-top: 30px">Designation *</h4>
                    <!-- <input type="text" class="form-control" name="emp_designation" placeholder="Designation" maxlength="35" value="{{old('emp_designation')}}"/> -->
                    <select class="form-control"  name="emp_designation" value="{{$emp_detail[0]->emp_designation}}" id = "emp_designation" placeholder="Designation">
                      <option value=" ">Select One</option>
                      <option value="Sr.Software Engineer" <?php echo($emp_detail[0]->emp_designation=='Sr.Software Engineer')?'selected="selected"':'';?>>Sr.Software Engineer</option>
                      <option value="Software Engineer" <?php echo($emp_detail[0]->emp_designation=='Software Engineer')?'selected="selected"':'';?>>Software Engineer</option>
                      <option value="Project Manager" <?php echo($emp_detail[0]->emp_designation=='Project Manager')?'selected="selected"':'';?>>Project Manager</option>
                      <option value="Team Lead" <?php echo($emp_detail[0]->emp_designation=='Team Lead')?'selected="selected"':'';?>>Team Lead</option>
                      <option value="Project Co-ordinator" <?php echo($emp_detail[0]->emp_designation=='Project Co-ordinator')?'selected="selected"':'';?>>Project Co-ordinator</option>
                      <option value="Product Manager" <?php echo($emp_detail[0]->emp_designation=='Product Manager')?'selected="selected"':'';?>>Product Manager</option>
                      <option value="Trainee Software Engineer" <?php echo($emp_detail[0]->emp_designation=='Trainee Software Engineer')?'selected="selected"':'';?>>Trainee Software Engineer</option>
                      <option value="Network Engineer" <?php echo($emp_detail[0]->emp_designation=='Network Engineer')?'selected="selected"':'';?>>Network Engineer</option>
                      <option value="Technical Support Engineer" <?php echo($emp_detail[0]->emp_designation=='Technical Support Engineer')?'selected="selected"':'';?>>Technical Support Engineer</option>
                      <option value="Desktop Engineer Engineer" <?php echo($emp_detail[0]->emp_designation=='Desktop Engineer Engineer')?'selected="selected"':'';?>>Desktop Engineer Engineer</option>
                      <option value="Business Development Executive(BDE)" <?php echo($emp_detail[0]->emp_designation=='Desktop Engineer Engineer')?'selected="selected"':'';?>>Business Development Executive(BDE)</option>
                      <option value="Business Development Manager(BDM)" <?php echo($emp_detail[0]->emp_designation=='Business Development Manager(BDM)')?'selected="selected"':'';?>>Business Development Manager(BDM)</option>
                      <option value="Human Resource Manager(HRM)" <?php echo($emp_detail[0]->emp_designation=='Human Resource Manager(HRM)')?'selected="selected"':'';?>>Human Resource Manager(HRM)</option>
                      <option value="Administrator" <?php echo($emp_detail[0]->emp_designation=='Administrator')?'selected="selected"':'';?>>Administrator</option>
                      <option value="Peon" <?php echo($emp_detail[0]->emp_designation=='Peon')?'selected="selected"':'';?>>Peon</option>
                    </select>
                     <h4 style="margin-top: 30px">Department *</h4>
                     <select class="form-control"  name="emp_department" id = "emp_department" placeholder="Department" >
                      <option value="">Select One</option>
                      <option value="Engineering" <?php echo($emp_detail[0]->emp_department=='Engineering')?'selected="selected"':'';?>>Engineering</option>
                      <option <?php echo($emp_detail[0]->emp_department=='HR Department')?'selected="selected"':'';?> value="HR Department">HR Department</option>
                      <option <?php echo($emp_detail[0]->emp_department=='Infra-structure')?'selected="selected"':'';?> value="Infra-structure">Infra-structure</option>
                      <option <?php echo($emp_detail[0]->emp_department=='Admin Department')?'selected="selected"':'';?> value="Admin Department">Admin Department</option>
                      <option <?php echo($emp_detail[0]->emp_department=='Facility Department')?'selected="selected"':'';?> value="Facility Department">Facility Department</option>
                    </select>
                    </div>
                    </div>
                    </div>
                    <div class="col-lg-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                      <h3 class="panel-title">Edit Employee Full Name</h3>
                    </div>
                    <div class="panel-body">
                    <h4>Joining Date</h4>
                <input type="date" class="form-control" name="joining_date" placeholder="Joining Date" id="joining_date"value="{{$emp_detail[0]->joining_date}}"/>
                
                 <h4>Termination Date</h4>
                <input type="date" class="form-control" name="termination_date" placeholder="Termination Date" id="termination_date" value="{{$emp_detail[0]->termination_date}}"/>
                  <label class="radio-inline">
                  <h4>Status</h4>
                      <input type="radio" name="status" value="1"<?php echo ($emp_detail[0]->status==1)?'checked':''?>>Active&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" name="status" value="0"<?php echo ($emp_detail[0]->status==0)?'checked':''?>>De-Active
                    </label>
                    <div class="form-group" >
                    <label style="margin-top: 15px" >Select a image to upload</label>
                   <input type="file" name="emp_photo">
                    </div>
                    </div>
                    </div>
                    </div>
                    <div class="col-lg-12"><button class="btn btn-lg btn-primary" type="submit" style="float: right; ">Update Employee</button></div>
                    </div>
                    </div>
                    </div>
                    </form>
                     </div>&nbsp;&nbsp;
                     @endsection
                       @section('pagescript')
<script type="text/javascript">
    $(function() {

    var date = new Date();
    var currentMonth = date.getMonth();
    var currentDate = date.getDate();
    var currentYear = date.getFullYear();
    $('#joining_date').datepicker({
    maxDate: new Date(currentYear, currentMonth, currentDate)
    });

    $('#termination_date').datepicker({
    maxDate: new Date(currentYear, currentMonth, currentDate)
    });

  });
</script>
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


</style>
  @endsection