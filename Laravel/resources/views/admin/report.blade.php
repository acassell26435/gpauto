@extends('layouts.admin')

@section('sidebar_active')
   @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'home_settings_section' => '','home_section'=>'','slider' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 
    'settings_section'=> '', 'settings'=>'','company_social' => '','opening_hours' => '', 'mail_setting'=>'', 'other_api'=>'','pwa'=>'','social_login' => '',
    'help'=>'','system_status'=>'','remove_public'=>'','clear_cache'=>'',
    'booking_report'=>'active',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection


@section('breadcum')
  @if (Auth::user()->role == 'A') 
    @include('include.breadcum', [
    'title' => 'Booking Report',
    'from' => 'Admin',
    'to' => 'Booking Report',
  ])

  @else
    @include('include.breadcum', [
    'title' => 'Booking Report',
    'from' => 'Customer',
    'to' => 'Booking Report',
  ])
    @endif
@endsection

<style>
input[type=date]::-webkit-inner-spin-button {
    -webkit-appearance: none;
    display: none;
}
</style>
@section('content')
<div class="teams-table-block table-responsive">
    {!! Form::open(['method' => 'GET', 'action' => 'AdminAppointmentController@downloadPDF']) !!}


    <div class="col-sm-2 pull-right form-group{{ $errors->has('date') ? ' has-error' : '' }}">
        
        <label>Select Date </label>
        
        {!! form::date('date',null,['class'=>'form-control','id'=>'mydate'])!!}
        
        <small class="text-danger">{{ $errors->first('date') }}</small>
    </div>

    <div class="col-sm-1 pull-right form-group">
      <br>
       <button type="button" onclick="window.print();" class="btn btn-primary"> Print </button>
    </div>

      <div class="col-sm-1 pull-right form-group">
      <br>
       <!-- <button type="button" onclick="window.location='{{ url("admin/downloadPDF/date") }}'" class="btn btn-danger"> PDF </button> -->
       <!-- <button type="button" id="mypdf" class="btn btn-danger"> PDF </button> -->
       <button type="submit" class="btn btn-danger"> PDF </button>
    </div>
  &emsp;
  {!! form::close()!!}
  
  <div id="maindata">
     
  </div>
    
</div>
@endsection
@section('script')



  <script type="text/javascript">
     $(document).ready(function(){
       
        // var year = $('#yearbox').val();
        // var month  = $('#monthbox').val();

        var date = $('#mydate').val();


        $.ajax({
          type : 'GET',
          // data : {month_id : month, year_id : year},
          data: {date : date},
          url  : '{{ route("ajaxreport") }}',
          dataType : 'html',
          success : function(data){
             $('#maindata').html('');
             $('#maindata').append(data);
          }
        });
     });
  </script>

  <script type="text/javascript">
    $('#mydate').on('change',function(){
      var k = $(this).val();
      // var i = $('#monthbox').val();


      $.ajax({
          type : 'GET',
          data : {date : k},
          url  : '{{ route("ajaxreport") }}',
          dataType : 'html',
          success : function(data){
            console. log(data);
             $('#maindata').html('');
             $('#maindata').append(data);
          }
      });

    });
  </script>

@endsection