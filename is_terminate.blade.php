@extends('master')
@section('title', 'Terminated')
         @section('content')
         <div class="container">
<h3 style="color: white;">Terminated</h3>
 @include('layout.error-notification')
                    <table class="display" id="datatable">
                    <thead>
                      <tr style="color: white;">
                        <th>Sr.No.</th>
                        <th> Name</th>
                        <th>Employee ID</th>
                        <th>Joining Date</th>
                        <th>Termination Date</th>
                        <!-- <th>Terminated</th>
                         <th>Status</th> -->
                         <!-- <th>Action</th> -->
                          <th>Action</th>
                       
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      $employee_details = DB::table('employee_detail')->select('*')->where('is_terminate', '=', 'yes')->orderBy('emp_firstname', 'asc')->get();
                      $i=1;
                      foreach($employee_details  as $val){
                      ?>
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$val->emp_firstname}} {{$val->emp_middlename}} {{$val->emp_lastname}}</td>
                        <td>{{$val->emp_id}}</td>
                        <td>{{date('d-m-Y', strtotime($val->joining_date))}}</td>
                        <td>{{$val->termination_date}}</td>
                        <!-- <td>{{$val->is_terminate}}</td>
                        <td>
                          {{$val->status}}
                        </td> -->
                        <!-- <td><a href="#">Edit</a></td> -->
                        </td>
                        <td>
                        <a onclick="return confirm('Delete this Event?')"  href ="{{url('delete/'.$val->id) }}"<button  class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-trash"></button></span></a></td>
                        <!-- <td><a href="{{url('edit_Empform/'.$val->id)}}">Edit</a>|<a onclick="return confirm('Delete this Event?')" href="{{url('delete/'.$val->id) }}">Delete</a></td> -->
                      </tr>
                      <?php
                      $i++;
                      }
                      ?>
                       </tbody>
                    </table>
                    </div>
            
               
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
