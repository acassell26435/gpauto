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
    'help'=>'active','system_status'=>'','remove_public'=>'active','clear_cache'=>'',
    'booking_report'=>'',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Remove Public',
    'from' => 'Admin',
    'to' => 'Remove Public',
  ])
@endsection

@section('content')
 <div class="box-body">
    <div class="admin-gallery-main-block box-body">
      <div class="row">
        <div class="col-lg-10 col-xs-6">
          <div class="admin-form-block z-depth-1">
            <div class="callout callout-danger">
            <i class="fa fa-info-circle"></i>
             {{__('Important Notes')}}
             <ol type="1">
              <li> {{__('Removing public from URL is only works when you have installed script in main domain.')}}</li>
              <li> {{__('Do not remove public when you have Installed script in subfolders.')}}</li>
             </ol>
          </div>
            <form method="POST" action="{{route('remove.public')}}">
              @csrf
              <button type="submit" class="btn btn-success">{{__('Remove Public')}}</button>
              
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection