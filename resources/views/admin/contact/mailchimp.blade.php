@extends('layouts.admin')

@section('sidebar_active')
 @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'home_settings_section' => '','home_section'=>'','slider' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 
    'settings_section'=> 'active', 'settings'=>'','company_social' => '','opening_hours' => '', 'mail_setting'=>'', 'other_api'=>'active','pwa'=>'','social_login' => '',
    'help'=>'','system_status'=>'','remove_public'=>'','clear_cache'=>'',
    'booking_report'=>'',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Other Settings',
    'from' => 'Admin',
    'to' => 'Other Settings',
  ])
@endsection

@section('content')
  <div class="box-header bg-info">
    <div class="box-title">Mailchimp Settings</div>
  </div>
  <form method="POST" action="{{route('store.mailchimpsetting',$env_files)}}">
    @csrf
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label for="">Mailchimp Api Key</label>
            <input type="text" class="form-control" name="MAILCHIMP_API_KEY" value="{{$env_files['MAILCHIMP_API_KEY']}}">
          </div>
        </div>

        <div class="col-md-6">
          <div class="form-group">
            <label for="">Mailchimp List Id</label>
            <input type="text" class="form-control" name="MAILCHIMP_LIST_ID" value="{{$env_files['MAILCHIMP_LIST_ID']}}">
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
@endsection