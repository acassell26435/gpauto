@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => 'active', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'home_settings_section' => '','home_section'=>'','slider' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 
    'settings_section'=> '', 'settings'=>'','company_social' => '','opening_hours' => '', 'mail_setting'=>'', 'other_api'=>'','pwa'=>'','social_login' => '',
    'help'=>'','system_status'=>'','remove_public'=>'','clear_cache'=>'',
    'booking_report'=>'',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Edit User',
    'from' => 'Admin',
    'to' => 'User Edit',
  ])
@endsection

@section('content')
  <div class="box-header">
    <div class="box-title">User Edit Form</div>
  </div>
  {{ html()->modelForm($user, 'PATCH', action('AdminUsersController@update', [$user->id]))->acceptsFiles()->open() }}
    <div class="box-body">
      <div class="row">
        <div class="col-md-3">
          <div class="user-img-block">
            <img src="{{asset('images/users')}}/{{$user->photo}}" alt="" class="img-responsive img-thumbnail">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {{ html()->label('Name', 'name') }}
            {{ html()->text('name')->class('form-control')->required()->placeholder('Enter your name')->autofocus() }}
            <small class="text-danger">{{ $errors->first('name') }}</small>
          </div>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {{ html()->label('Email address', 'email') }}
            {{ html()->email('email')->class('form-control')->attribute('required', 'required')->attribute('placeholder', 'eg: foo@bar.com') }}
            <small class="text-danger">{{ $errors->first('email') }}</small>
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              {{ html()->label('Password', 'password') }}
              {{ html()->password('password')->class('form-control')->attribute('placeholder', 'Enter Password') }}
              <small class="text-danger">{{ $errors->first('password') }}</small>
          </div>
          <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
            {{ html()->label('Date Of Birth', 'dob') }}
            {{ html()->text('dob')->id('')->class('form-control date-pick')->required()->placeholder('Date of birth') }}
            <small class="text-danger">{{ $errors->first('dob') }}</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
            {{ html()->label('Mobile', 'mobile') }}
            {{ html()->text('mobile')->class('form-control')->required()->placeholder('Mobile no') }}
            <small class="text-danger">{{ $errors->first('mobile') }}</small>
          </div>
          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            {{ html()->label('Phone', 'phone') }}
            {{ html()->text('phone')->class('form-control')->placeholder('Phone no') }}
            <small class="text-danger">{{ $errors->first('phone') }}</small>
          </div>
          <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            {{ html()->label('Address', 'address') }}
            {{ html()->textarea('address')->class('form-control')->rows('5')->required()->placeholder('Enter your address') }}
            <small class="text-danger">{{ $errors->first('address') }}</small>
          </div>
        </div>
        <div class="col-md-3">
          @if (Auth::user()->role == 'A')
            <div class="form-group{{ $errors->has('role') ? ' has-error' : '' }}">
              {{ html()->label('Role', 'role') }}
              {{ html()->select('role', ["" => "Choose Role", "A" => "administrator", "S" => "subscriber"])->class('form-control') }}
              <small class="text-danger">{{ $errors->first('role') }}</small>
            </div>
          @endif
          <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
            {{ html()->label('Image', 'photo') }}
            {{ html()->file('photo') }}
            <p class="help-block">Help block text</p>
            <small class="text-danger">{{ $errors->first('photo') }}</small>
          </div>
          <div class="radio{{ $errors->has('sex') ? ' has-error' : '' }} user-create-radio">
            <span>Gendor</span>
            <label for="sex" class="checkbox">
              {{ html()->radio('sex', null, 'M')->id('sex') }} Male
            </label>
            <label for="sex" class="checkbox">
              {{ html()->radio('sex', null, 'F')->id('sex') }} Female
            </label>
          </div>
        </div>
      </div>
    </div>
    <div class="box-footer">
      <div class="btn-group pull-left">
       
        {{ html()->submit("Update")->class('btn btn-add btn-default') }}
      </div>
    </div>
  {{ html()->closeModelForm() }}
@endsection
