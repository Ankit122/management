@extends('master')
@section('title', 'Application Detail')
         @section('content')
<h3>Application Detail</h3>
 @include('layout.error-notification')
      <section class="content">
          <ol class="breadcrumb">
            <li><a href="{{url('leave_application')}}"><i class="fa fa-dashboard"></i>Leave Application Form</a></li>
            <li><a href="{{url('leaveApplicationList')}}">Application List</a></li>
            <li class="active">Application Details</li>
          </ol>
        </section>

       <?php
        $applicationStatus = $applicationForm[0]->status;
        $callout_class = '';
        $statustext = '';
        switch ($applicationStatus) {
          case '0':
            $callout_class = 'callout-warning';
            $statustext = 'Approval Pending';
            break;

          case '1':
            $callout_class = 'callout-success';
            $statustext = 'Approved';
            break;
          
          case '2':
            $callout_class = 'callout-success';
            $statustext = 'Rejected';
            break;

          default:
            $callout_class = 'callout-danger';
            $statustext = 'Rejected';
            break;
        }
        ?>



        <!-- Main content -->
        <section class="content">

          <div class="">
            <h4>Application Status</h4>
            <p>{{ $statustext }}.</p>
          </div>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Application Details</h3>
            <!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
              <p><strong>Employee ID:</strong> {{$applicationForm[0]->emp_id}}</p>
              <p><strong>Name:</strong> {{$applicationForm[0]->name}}</p>
              <p><strong>Date From:</strong> {{$applicationForm[0]->leave_date_to}}</p>
              <p><strong>Date To:</strong> {{$applicationForm[0]->date_from}}</p>
              <p><strong>Description:</strong> {{$applicationForm[0]->description}}</p>
            </div><!-- /.box-body -->
          </div><!-- /.box -->

          <?php if($applicationForm[0]->status==0) {?>
          <a href="{{url('approve_application/'.$applicationForm[0]->id)}}" class="btn btn-success">Approve</a>
          
          <hr>
          
          <form class="form-group" method="post" action="{{url('reject_application')}}" enctype="multipart/form-data">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <input type="hidden" name="id" value="{{$applicationForm[0]->id}}">
          <div class="box box-solid box-default">
            <div class="box-header with-border">
              <h3 class="box-title">Reject Application <small>Reason</small></h3>
             <!-- /.box-tools -->
            </div><!-- /.box-header -->
            <div class="box-body">
              <textarea name="reason"  class="form-control" style="height: 100px;"></textarea>
            </div><!-- /.box-body -->
            <div class="box-footer with-border">
              
              <button type="submit" class="btn btn-worning">Reject</button>
            </div><!-- /.box-header -->
          </div><!-- /.box -->
          </form>
          <?php }?>

        </section><!-- /.content -->
       @endsection

         @section('pagescript')

   
