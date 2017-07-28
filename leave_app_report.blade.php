@extends('master')
@section('title', 'Leave Application')
         @section('content')
<h3>Leave Application</h3>
 @include('layout.error-notification')
 
              <table id="datatable" class="display">
                <thead>
                  <tr>
                    <th style="width: 80px;">S No.</th>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Leave Type</th>
                    <th>Status</th>
                    <th style="width: 80px;" data-orderable="false">Action</th>
                  </tr>
                </thead>
                <tbody>
                  
                <?php
                     $employee_report =  DB::table('employee_detail')->select('employee_detail.emp_photo','employee_detail.emp_firstname','employee_detail.emp_middlename','employee_detail.emp_lastname','employee_detail.emp_id','employee_detail.emp_designation','employee_detail.emp_department','emp_signin_signout.system_date','emp_signin_signout.system_time_signin','emp_signin_signout.emp_screenname','emp_signin_signout.comments','emp_signin_signout.system_time_signout','emp_signin_signout.machine_mac_name')->join('emp_signin_signout', 'employee_detail.id', '=', 'emp_signin_signout.fk_id')->orderBy('fk_id', 'asc')->get();

                      $i=1;
                      foreach($employee_report  as $val){
                      ?>
                    <td>{{$val->emp_id}}</td>
                    <td>{{$val->emp_firstname}}</td>
                    <td>{{$val->comments}}</td>
                    <td>
                      <?php 
                      $ancTxt = '';
                      if($val->Status == '1'){
                        $ancTxt = '<span class="text-success">Approved</span>';
                      }
                      if($val->Status == '2'){
                        $ancTxt = '<span class="text-danger">Rejected</span>';
                      }
                      if($val->Status == '0'){
                        $ancTxt = '<span class="text-warning">Pending</span>';
                      }
                      echo $ancTxt;
                      ?>
                    </td> 
                    <td><a href="{{ url('admin/membership_detail/'.$val->id) }}">View Application</a></td>
                   
                  </tr>
                  <?php 
                  $i++;
                  }?> 
                   
                   </tbody>
                    <tfoot>
                    <tr>
                      <th style="width: 80px;">S No.</th>
                      <th>Membership Name</th>
                      <th>Email</th>
                      <th>Mobile</th>
                      <th>Join Date</th>
                      <th>Status</th>
                      <th style="width: 80px;" data-orderable="false">Action</th>
                    </tr>
                    </tfoot>
                  </table>
                
               
        @endsection

        @section('pagescript')
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

        <script type="text/javascript">
          $(document).ready(function(){
            $('#datatable').DataTable();
          });
        </script>

        @endsection

