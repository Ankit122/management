@extends('master')
@section('title', 'Employee List')
         @section('content')
          @section('pagescript')
<h3>IFSC</h3>


                    <table class="display" id="datatable">
                    <thead>
                      <tr>
                       
                        <th>Bank Name</th>
                        <th>IFSC Code</th>
                        <th>MICR Code</th>
                        <th>Branch Code</th>
                        <th>Branch Name</th>
                        <th>Address</th>
                        <th>District</th>
                        <th>State</th>
                        <th>Pincode</th>
                        <th>Phone</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php
                      $bank_details = DB::table('ifsc_data')->select('*')->orderBy('id', 'asc')->get();
                      $i=1;
                      //print_r($employee_details);
                      foreach ($bank_details as $key => $value) {
                      
                      ?>
                      <tr>
                        
                        <td>{{$bank_details[$key]->bank_name}}</td>
                        <td>{{$bank_details[$key]->ifsc_code}}</td>
                        <td>{{$bank_details[$key]->micr_code}}</td>
                        <td>{{$bank_details[$key]->branch_code}}</td>
                        <td>{{$bank_details[$key]->branch_name}}</td>
                        <td>{{$bank_details[$key]->address}}</td>
                        <td>{{$bank_details[$key]->dist}}</td>
                        <td>{{$bank_details[$key]->state}}</td>
                        <td>{{$bank_details[$key]->pincode}}</td>
                        <td>{{$bank_details[$key]->phone}}</td>
                      </tr>
                      <?php
                      $i++;
                      }
                      ?>
                       </tbody>
                    </table>
            
               
       
                     
                
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
         <script type="text/javascript" src="//code.jquery.com/jquery-1.12.3.js"></script>

        <script type="text/javascript">
          $(document).ready(function() {
    $('#datatable').DataTable( {
        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
    } );
} );
        </script>
       
        @endsection
 