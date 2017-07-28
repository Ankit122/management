@extends('master')
@section('title', 'Application List')
         @section('content')
<h3>Application List</h3>
 @include('layout.error-notification')
 
                <table id="datatable" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th style="width: 80px;">S No.</th>
                    <th>Employee ID</th>
                    <th>Name</th>
                    <th>Date From</th>
                    <th>Date To</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th style="width: 80px;" data-orderable="false">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $applicationForm = DB::table('leave_application')->select('*')->orderBy('id', 'asc')->get();
                
                  $i=1;
                  foreach ($applicationForm as $key => $val) {
                  
                  ?>
                  <tr>
                    <td>{{$i}}</td>
                    <td>{{$val->emp_id}}</td>
                    <td>
                      <?php
                      $name      = $val->name;
                      echo ucfirst($name);
                      ?>
                    </td>
                   <td>{{date('d-m-Y', strtotime($val->leave_date_to))}}</td>
                    <td>{{date('d-m-Y', strtotime($val->date_from))}}</td>
                    <td>{{$val->description}}</td>
                    <td>
                      <?php 
                      $ancTxt = '';
                      if($val->status == '1'){
                        $ancTxt = '<span class="text-success">Approved</span>';
                      }
                      if($val->status == '2'){
                        $ancTxt = '<span class="text-danger">Rejected</span>';
                      }
                      if($val->status == '0'){
                        $ancTxt = '<span class="text-warning">Pending</span>';
                      }
                      echo $ancTxt;
                      ?>
                    </td>
                    <td><a href="{{ url('application_detail/'.$val->id) }}">View Application</a></td>
                  </tr>
                  <?php 
                  $i++;
                  }?>
                  
                  
                </tbody>
                    
                  </table>
                  @endsection

         @section('pagescript')
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

       
        <script type="text/javascript">
          $('#datatable').dataTable({
    'columnDefs': [{ 'orderable': false, 'targets': 5 }], // hide sort icon on header of first column
    'aaSorting': [[6, 'asc']] // start to sort data in second column
});
        </script>
       

