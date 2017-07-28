@extends('master')
@section('title', 'Employee Detail')
         @section('content')
          @section('pagescript')
<script type='text/javascript'src='http://code.jquery.com/jquery-1.10.1.js'></script>
<link rel="stylesheet" type="text/css"
  href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
<script type='text/javascript'
  src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css"
  href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css">
<!-- w  w  w.  ja v a 2s.  c o m-->
<script type='text/javascript'>//<![CDATA[ 
  $(document).ready(function () {
    $(".add").click(function () {
        var length = $('.one').length;
        var cloned = $(this).closest('.one').clone(true);        
        cloned.appendTo("#mainDiv").find('.sno').val(length + 1);
        cloned.find(':input:not(".sno")').val(" ");
        var parent = $(this).closest('.one');
        calculate(parent);
    });
    $('.delete').click(function () {
        var parent = $(this).closest('.one');
        $(this).parents(".one").remove();
        calculate(parent);
    });
});

$(document).on('keyup', '.quantity, .net_rate', function () {
    var parent = $(this).closest('.one');
    calculate(parent);
})


function calculate(e){
    var q = +$(e).find('.quantity').val();
    var n = +$(e).find('.net_rate').val();
    var sum = 0;
    $(e).find('.total').val(q*n);
    $('.total').each(function(i,e){
        sum += +$(e).val();        
    });
    $('#Grand').val(sum);
};

    </script>

</head>

 @include('layout.error-notification')
  <div class = "container-fluid">
   <form class="form-group" method="post" action="{{url('addExpences')}}" enctype="multipart/form-data">  
   <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
  <div id="mainDiv">
    <div class="one">
        <div class="col">
        <table  class="table table-bordered">
        <tr>
        <td>
            <div class="input-field col s1" >
             <label for="Sr">Serial Number</label>
                <input class="sno" type="text" name="Sr[]" value="1" readonly="">
              </div>
            </td>
            <td>
            <div class="input-field col s2" >
              <label for="item_code">Item Name</label>
                <input id="item_code" type="text" name="item_name[]" required="enter Product name">
              </div>
            </td>
            <td>
            <div class="input-field col s2">
              <label for="item_code">Purchase From</label>
                <input id="item_code" type="text" name="pur_from[]" required=" ">
              </div>
            </td>
            <td>
            <div class="input-field col s2">
              <label for="item_code">Purchase Date</label>
                <input id="item_code" type="Date" name="pur_date[]" required="">
              </div>
            </td>
            
            <td>
            <div class="input-field col s2">
                 <label for="quantity">Quantity</label>
                <input type="text" name="quantity[]" class="quantity" required="">
             </div>
            </td>
            <td>
            <div class="input-field col s2">
             <label for="net_rate">Net Price &#8377;</label>
                <input type="text" name="rate[]" class="net_rate" required="">
             </div>
            </td>
            <td>
            <div class="input-field col s2">
             <label for="total">total Price &#8377;</label>
                <input type="text" name="total[]" class="total" readonly="">
             </div>
             </td>
             </tr>
            </table>
            <table style="float: right"s>
            <tr>
            <td>
             <div class="input-field col s1" > <a  class="btn-floating waves-effect waves-light add ">Add<i class="mdi-content-add"></i></a><a href="#" class="btn-floating waves-effect waves-light delete " onclick="return confirm('Delete this Event?')"> |Remove<i class="mdi-content-clear"></i></a>
            </div>
            </td>
            </tr>
            </table>
        </div>
    </div>
</div>
<div class="input-field col s2" style="float: right; margin-right: 135px">
 <label for="net_rate">Grand Total</label>
    <input type="text" name="grand_total" id="Grand" readonly="">
     <button class="btn btn-primary btn-xs" type="submit" >Submit</button> 
</div>
</form>
</div>
    @endsection