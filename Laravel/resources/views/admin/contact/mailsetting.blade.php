@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'home_settings_section' => '','home_section'=>'','slider' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 
    'settings_section'=> 'active', 'settings'=>'','company_social' => '','opening_hours' => '', 'mail_setting'=>'active', 'other_api'=>'','pwa'=>'','social_login' => '',
    'help'=>'','system_status'=>'','remove_public'=>'','clear_cache'=>'',
    'booking_report'=>'',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Mail Settings',
    'from' => 'Admin',
    'to' => 'Mail Settings',
  ])
@endsection

@section('content')
  @if($env_files)

    <div class="box-header bg-info">
      <div class="box-title">Mail Settings</div>
    </div>
    <form method="POST" action="{{route('store.mailsetting',$env_files)}}">
      @csrf
    <div class="box-body">
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Sender Name </label>
            <input type="text" class="form-control" name="MAIL_FROM_NAME" value="{{ $env_files['MAIL_FROM_NAME']}}">
          </div>
        </div>
         <div class="col-md-4">
          <div class="form-group">
            <label for="">Mail From Address</label>
            <input type="text" class="form-control" name="MAIL_FROM_ADDRESS" value="{{$env_files['MAIL_FROM_ADDRESS']}}">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Mail Driver</label>
            <input type="text" class="form-control" name="MAIL_DRIVER" value="{{$env_files['MAIL_DRIVER']}}">
          </div>
        </div>
       
       
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Mail Host</label>
            <input type="text" class="form-control" name="MAIL_HOST" value="{{$env_files['MAIL_HOST']}}">
          </div>
        </div>
         <div class="col-md-4">
          <div class="form-group">
            <label for="">Mail Port</label>
            <input type="text" class="form-control" name="MAIL_PORT" value="{{$env_files['MAIL_PORT']}}">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Mail Username</label>
            <input type="text" class="form-control" name="MAIL_USERNAME" value="{{$env_files['MAIL_USERNAME']}}">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Mail Password</label>
            <input type="text" class="form-control" name="MAIL_PASSWORD" value="{{$env_files['MAIL_PASSWORD']}}">
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="">Mail Encryption</label>
            <input type="text" class="form-control" name="MAIL_ENCRYPTION" value="{{$env_files['MAIL_ENCRYPTION']}}">
          </div>
        </div>
      </div>
    </div>
    <div class="box-footer">
       <div class="btn-group">
        <input type="submit" value="Save" class="btn btn-default btn-add">
        </div>
    </div>
  </form>
  @endif
@endsection