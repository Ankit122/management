@extends('master')
@section('title', 'Daily Employee Report')
         @section('content')
                  <div class="container">
                     <h3 style="color: white;">Sign In | Sign Out Report</h3>
                     @include('layout.error-notification')
                    <input type="button" onclick="tableToExcel('datatable', 'W3C Example Table')" value="Export to Excel">
                     <table id="datatable" class="display">
                    <thead>
                      <tr style="color: white;">
                        <th>Sr.No.</th>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Screen Name</th>
                        <th>Employee ID</th>
                        <th>Comments</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>System Date</th>
                        <th>Sign In Time</th>
                        <th class="nosort">Sign Out Time</th>
                        <th>Publilc IP Address</th>
                        <th>Local IP Address</th>
                       </tr>
                    </thead>
                       <tbody>
                      <?php
                     $employee_report =  DB::table('employee_detail')->select('employee_detail.emp_photo','employee_detail.emp_firstname','employee_detail.emp_middlename','employee_detail.emp_lastname','employee_detail.emp_id','employee_detail.emp_designation','employee_detail.emp_department','emp_signin_signout.system_date','emp_signin_signout.system_time_signin','emp_signin_signout.emp_screenname','emp_signin_signout.comments','emp_signin_signout.system_time_signout','emp_signin_signout.public_ip','emp_signin_signout.local_ip')->join('emp_signin_signout', 'employee_detail.id', '=', 'emp_signin_signout.fk_id')->orderBy('fk_id', 'asc')->get();

                      $i=1;
                      foreach($employee_report  as $val){
                      ?>
                      <tr>
                        <td>{{$i}}</td>
                        <td><img onerror="this.style.display='none'" src="{{url('emp/thumb200x300/'.$val->emp_photo)}}" width="64"></td>
                        <span>
                        <td>{{$val->emp_firstname}} {{$val->emp_middlename}} {{$val->emp_lastname}}</td></span>
                        <td>{{$val->emp_screenname}}</td>
                        <td>{{$val->emp_id}}</td>
                        <td>{{$val->comments}}</td>
                        <td>{{$val->emp_designation}}</td>
                        <td>{{$val->emp_department}}</td>
                        <td>{{date('d-M-Y', strtotime($val->system_date))}}</td>
                        <td>{{$val->system_time_signin}}</td>
                        <td>{{$val->system_time_signout}}</td>
                        <td>{{$val->public_ip}}</td>
                        <td>{{$val->local_ip}}</td>
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

}


</style>

        @endsection

