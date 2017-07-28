@extends('master')
@section('title', 'Grand Total List')
         @section('content')
         @section('pagescript')
<h3>Grand Total List</h3>
 @include('layout.error-notification')
 <input type="button" onclick="tableToExcel('datatable', 'W3C Example Table')" value="Export to Excel">                  <?php echo $purch_id; ?>
                    <table class="display" id="datatable">
                    <thead>
                      <tr>
                        <th>Sr.No.</th>
                        <th>Item name</th>
                        <th>Purchase ID</th>
                        <th>Purchase From</th>
                        <th>Purchase Date</th>
                        <th>Quantity</th>
                        <th>Net Rate</th>
                        <th>Total</th>
                      </tr>
                       
                      </thead>
                      <tbody>
                      <?php
                      $purchase_detail = DB::table('expence')->select('*')->where('purchase_id','=',$purch_id)->get();
                      
                      $expence_grand_total = DB::table('expence_grand_total')->select('*')->where('purchase_id','=',$purch_id)->get();

                      $i=1;
                      foreach ($purchase_detail as $key => $value) {
                      ?>
                      <tr>
                        <td>{{$i}}</td>
                        <td>{{$purchase_detail[$key]->item_name}}</td>
                        <td>{{$purchase_detail[$key]->purchase_id}}</td>
                        <td>{{$purchase_detail[$key]->pur_from}}</td>
                        <td>{{date('d-M-Y', strtotime($purchase_detail[$key]->pur_date))}}</td>
                        <td>{{$purchase_detail[$key]->quantity}}</td>
                        <td>{{$purchase_detail[$key]->rate}}</td>
                        <td>{{$purchase_detail[$key]->total}}</td>
                      </tr>
                      <?php
                      $i++;
                      }
                      ?>
                     
                      <tr>
                        <th colspan="7" style="font-size: 18px; color: #990000;">Grand Total</th>
                      <td style="font-size: 18px; color: #990000;">{{$expence_grand_total[0]->grand_total}}</td>
                      </tr>
                       </tbody>
                    </table>
            
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
 