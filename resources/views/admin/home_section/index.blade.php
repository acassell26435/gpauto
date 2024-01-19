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
            {!! Form::label('slider_section', 'Slider Section') !!}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">  
              {!! Form::checkbox('slider_section', 1,$homesection->slider_section ? $homesection->slider_section : null, ['class' => 'checkbox-switch']) !!}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
           <div class="col-xs-7">
            {!! Form::label('about_section', 'About Section') !!}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {!! Form::checkbox('about_section', 1, $homesection->about_section ? $homesection->about_section : null, ['class' => 'checkbox-switch']) !!}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-xs-7">
            {!! Form::label('service_section', 'Our Service Section') !!}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {!! Form::checkbox('service_section', 1, $homesection->service_section ? $homesection->service_section : null, ['class' => 'checkbox-switch']) !!}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-xs-7">
            {!! Form::label('gallery_section', 'Gallery Section') !!}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {!! Form::checkbox('gallery_section', 1, $homesection->gallery_section ? $homesection->gallery_section : null, ['class' => 'checkbox-switch']) !!}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
         <div class="col-md-6">
          <div class="col-xs-7">
            {!! Form::label('facts_section', 'Fact Section') !!}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {!! Form::checkbox('facts_section', 1, $homesection->facts_section ? $homesection->facts_section : null, ['class' => 'checkbox-switch']) !!}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-xs-7">
            {!! Form::label('team_section', 'Team Section') !!}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {!! Form::checkbox('team_section', 1, $homesection->team_section ? $homesection->team_section : null, ['class' => 'checkbox-switch']) !!}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-xs-7">
            {!! Form::label('plan_section', 'Plan Section') !!}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {!! Form::checkbox('plan_section', 1, $homesection->plan_section ? $homesection->plan_section : null, ['class' => 'checkbox-switch']) !!}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-xs-7">
            {!! Form::label('appointment_section', 'Appointment Section') !!}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {!! Form::checkbox('appointment_section', 1, $homesection->appointment_section ? $homesection->appointment_section : null, ['class' => 'checkbox-switch']) !!}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-xs-7">
            {!! Form::label('testinomial_section', 'Testinomial Section') !!}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {!! Form::checkbox('testinomial_section', 1, $homesection->testinomial_section ? $homesection->testinomial_section : null, ['class' => 'checkbox-switch']) !!}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-xs-7">
            {!! Form::label('blog_section', 'News / Blog Section') !!}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {!! Form::checkbox('blog_section', 1, $homesection->blog_section ? $homesection->blog_section : null, ['class' => 'checkbox-switch']) !!}
              <span class="slider round"></span>
            </label>
          </div>
        </div>
        <div class="col-md-6">
          <div class="col-xs-7">
            {!! Form::label('client_section', 'Client Section') !!}
          </div>
          <div class="col-xs-5 pad-0">
            <label class="switch">                
              {!! Form::checkbox('client_section', 1, $homesection->client_section ? $homesection->client_section : null, ['class' => 'checkbox-switch']) !!}
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