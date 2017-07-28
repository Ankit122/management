@extends('master')
@section('title', 'Non-Terminated')
         @section('content')
<h3>Non-Terminated</h3>
 @include('layout.error-notification')
                    <table class="display" id="datatable">
                    <thead>
                      <tr>
                        <th>Sr.No.</th>
                        <th> Name</th>
                        <th>Employee ID</th>
                        <th>Joining Date</th>
                        <th>Termination Date</th>
                        <th>Terminated</th>
                        <th>Status</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                       $employee_details = DB::table('employee_detail')->select('*')->where('is_terminate', '=', 'no')->orderBy('emp_firstname', 'asc')->get();
                      $i=1;
                      foreach($employee_details  as $val){
                      ?>
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$val->emp_firstname}} {{$val->emp_middlename}} {{$val->emp_lastname}}</td>
                        <td>{{$val->emp_id}}</td>
                        <td>{{date('d-m-Y', strtotime($val->joining_date))}}</td>
                        <td>{{$val->termination_date}}</td>
                        <td>{{$val->is_terminate}}</td>
                        <td>{{$val->status}}</td>
                      </tr>
                      <?php
                      $i++;
                      }
                      ?>
                       </tbody>
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
        <script type="text/javascript">
          $('#datatable').dataTable({
    'columnDefs': [{ 'orderable': false, 'targets': 5 }], // hide sort icon on header of first column
    'aaSorting': [[6, 'asc']] // start to sort data in second column
});
        </script>
       

        @endsection
