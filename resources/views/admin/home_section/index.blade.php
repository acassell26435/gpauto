@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'home_settings_section' => 'active','home_section'=>'active','slider' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 
    'settings_section'=> '', 'settings'=>'','company_social' => '','opening_hours' => '', 'mail_setting'=>'', 'other_api'=>'','pwa'=>'','social_login' => '',
    'help'=>'','system_status'=>'','remove_public'=>'','clear_cache'=>'',
    'booking_report'=>'',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Home Section Setting',
    'from' => 'Admin',
    'to' => 'Home section setting',
  ])
@endsection

@section('content')
<div class="box-header">
    <div class="box-title">Home Section</div>
</div>
<form action="{{route('home.section.store')}}" method="post">
    @csrf
  <div class="box-body">
  
    <div class="form-group switch-main-block">
      <div class="row">
        <div class="col-md-6">
           <div class="col-xs-7">
            {{ html()->label('Slider Section', 'slider_section') }}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">  
              {{ html()->checkbox('slider_section', $homesection->slider_section ? $homesection->slider_section : null, 1)->class('checkbox-switch') }}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
           <div class="col-xs-7">
            {{ html()->label('About Section', 'about_section') }}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {{ html()->checkbox('about_section', $homesection->about_section ? $homesection->about_section : null, 1)->class('checkbox-switch') }}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-xs-7">
            {{ html()->label('Our Service Section', 'service_section') }}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {{ html()->checkbox('service_section', $homesection->service_section ? $homesection->service_section : null, 1)->class('checkbox-switch') }}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-xs-7">
            {{ html()->label('Gallery Section', 'gallery_section') }}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {{ html()->checkbox('gallery_section', $homesection->gallery_section ? $homesection->gallery_section : null, 1)->class('checkbox-switch') }}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
         <div class="col-md-6">
          <div class="col-xs-7">
            {{ html()->label('Fact Section', 'facts_section') }}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {{ html()->checkbox('facts_section', $homesection->facts_section ? $homesection->facts_section : null, 1)->class('checkbox-switch') }}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-xs-7">
            {{ html()->label('Team Section', 'team_section') }}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {{ html()->checkbox('team_section', $homesection->team_section ? $homesection->team_section : null, 1)->class('checkbox-switch') }}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-xs-7">
            {{ html()->label('Plan Section', 'plan_section') }}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {{ html()->checkbox('plan_section', $homesection->plan_section ? $homesection->plan_section : null, 1)->class('checkbox-switch') }}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-xs-7">
            {{ html()->label('Appointment Section', 'appointment_section') }}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {{ html()->checkbox('appointment_section', $homesection->appointment_section ? $homesection->appointment_section : null, 1)->class('checkbox-switch') }}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-xs-7">
            {{ html()->label('Testinomial Section', 'testinomial_section') }}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {{ html()->checkbox('testinomial_section', $homesection->testinomial_section ? $homesection->testinomial_section : null, 1)->class('checkbox-switch') }}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-xs-7">
            {{ html()->label('News / Blog Section', 'blog_section') }}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {{ html()->checkbox('blog_section', $homesection->blog_section ? $homesection->blog_section : null, 1)->class('checkbox-switch') }}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-xs-7">
            {{ html()->label('Client Section', 'client_section') }}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {{ html()->checkbox('client_section', $homesection->client_section ? $homesection->client_section : null, 1)->class('checkbox-switch') }}
              <span class="slider round"></span>
            </label>
          </div>
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