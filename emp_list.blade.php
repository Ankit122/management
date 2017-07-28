@extends('master')
@section('title', 'Employee List')
         @section('content')
          @section('pagescript')
          <div class="container">
<h3 style="color: white;">Employee List</h3>
 @include('layout.error-notification')
 <input type="button" onclick="tableToExcel('datatable', 'W3C Example Table')" value="Export to Excel">            
                    <table class="display" id="datatable">
                    <thead>
                      <tr style="color: white;">
                        <th>Sr.No.</th>
                        <th>Name</th>
                        <th>Employee ID</th>
                        <th>Photo</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Joining Date</th>
                        <th>Status</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      $employee_details = DB::table('employee_detail')->select('*')
                      ->where('is_terminate', 'no')->orderBy('emp_firstname', 'asc')->get();
                      $i=1;
                      //print_r($employee_details);
                      foreach ($employee_details as $key => $value) {
                      
                      ?>
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$employee_details[$key]->emp_firstname}} {{$employee_details[$key]->emp_middlename}} {{$employee_details[$key]->emp_lastname}}</td>
                        <td>{{$employee_details[$key]->emp_id}}</td>
                       <td><img src="{{url('emp/thumb200x300/'.$employee_details[$key]->emp_photo)}}" width="64"></td>
                        <td>{{$employee_details[$key]->emp_designation}}</td>
                        <td>{{$employee_details[$key]->emp_department}}</td>
                        <td>{{date('d-M-Y', strtotime($employee_details[$key]->joining_date))}}</td>
                        <td><?php 
                      $ancTxt = '';
                      if($employee_details[$key]->status == '1'){
                        $ancTxt = '<span class="text-success">At Work</span>';
                      }
                      
                      if($employee_details[$key]->status == '0'){
                        $ancTxt = '<span class="text-warning">De-Active</span>';
                      }
                      echo $ancTxt;
                      ?></td>
                        <td><a href="{{url('edit_Empform/'.$employee_details[$key]->id)}}"><button class="btn btn-primary btn-xs" href ="#"><span class="glyphicon glyphicon-pencil"></span></button></a>
                        <a onclick="return confirm('Delete this Event?')"  href ="{{url('delete/'.$employee_details[$key]->id)}}"<button  class="btn btn-danger btn-xs">
                        <span class="glyphicon glyphicon-trash"></button></span></a></td>
                        <!-- <a href="{{url('edit_Empform/'.$employee_details[$key]->id)}}">Edit</a> --><!-- |<a onclick="return confirm('Delete this Event?')" href="{{url('delete/'.$employee_details[$key]->id) }}">Delete</a> -->
                      </tr>
                      <?php
                      $i++;
                      }
                      ?>
                       </tbody>
                    </table>
                    </div>
               
       
                     
                
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
        <script type="text/javascript">
var tableToExcel = (function() {
  var uri = 'data:application/vnd.ms-excel;base64,'
    , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
    , base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
    , format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
  return function(table, name) {
    if (!table.nodeType) table = document.getElementById(table)
    var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
    window.location.href = uri + base64(format(template, ctx))
  }
})()
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
  background-color: #939393;

}


</style>
        @endsection
 