@extends('master')
@section('title', 'Expences List')
         @section('content')
         @section('pagescript')
<h3>Expences List</h3>
@include('layout.error-notification')
 <input type="button" onclick="tableToExcel('datatable', 'W3C Example Table')" value="Export to Excel">                 
 <div class = "container-fluid">
                    <table class="display" id="datatable">
                    <thead>
                      <tr>
                        <th>Sr.No.</th>
                        <th>Purchase ID</th>
                        <th>Purchase Date</th>
                        <th>Total</th>
                        <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      $expence_details = DB::table('expence_grand_total')->select('*')->orderBy('id', 'asc')->get();
                      //print_r($expence_details);
                      $i=1;
                      foreach ($expence_details as $key => $value) {
                      ?>
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$expence_details[$key]->purchase_id}}</td>
                        <td>{{date('d-M-Y', strtotime($expence_details[$key]->created_at))}}</td>
                        <td>{{$expence_details[$key]->grand_total}}</td>
                         <td><a href="{{ url('exp_grand_total/'.$value->purchase_id) }}">View Detail</a></td>
                      </tr> <?php
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
        @endsection
 
