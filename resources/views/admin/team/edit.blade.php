@extends('layouts.admin')

@section('sidebar_active')
   @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => 'active', 'all_team' => '', 'create_team' => '', 'team_task' => '',
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
    'title' => 'Edit Team Member',
    'from' => 'Admin',
    'to' => 'Edit Team',
  ])
@endsection

@section('content')
  <div class="box-header">
    <h5 class="box-title">Team Edit Form</h5>
  </div>
  {{ html()->modelForm($team, 'PATCH', action('AdminTeamController@update', [$team->id]))->acceptsFiles()->open() }}
    <div class="box-body">
      <div class="row">
        <div class="col-md-3">
          <div class="user-img-block">
            <img src="{{asset('images/teams')}}/{{$team->photo}}" alt="" class="img-responsive img-thumbnail">
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {{ html()->label('Name', 'name') }}
            {{ html()->text('name')->class('form-control')->required()->placeholder('Enter Name') }}
            <small class="text-danger">{{ $errors->first('name') }}</small>
          </div>
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {{ html()->label('Email address', 'email') }}
            {{ html()->email('email')->class('form-control')->attribute('required', 'required')->attribute('placeholder', 'eg: foo@bar.com') }}
            <small class="text-danger">{{ $errors->first('email') }}</small>
          </div>
          <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
            {{ html()->label('Mobile', 'mobile') }}
            {{ html()->text('mobile')->class('form-control')->required()->placeholder('Mobile No.') }}
            <small class="text-danger">{{ $errors->first('mobile') }}</small>
          </div>
          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            {{ html()->label('Phone', 'phone') }}
            {{ html()->text('phone')->class('form-control')->placeholder('Phone No.') }}
            <small class="text-danger">{{ $errors->first('phone') }}</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
            {{ html()->label('Date Of Birth', 'dob') }}
            {{ html()->text('dob')->class('form-control date-pick')->required()->placeholder('Date Of Birth') }}
            <small class="text-danger">{{ $errors->first('dob') }}</small>
          </div>
          <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
            {{ html()->label('Status', 'status') }}
            {{ html()->select('status', ["" => "Chooes Status", "A" => "Active", "D" => "Inactive"])->class('form-control')->required() }}
            <small class="text-danger">{{ $errors->first('status') }}</small>
          </div>
          <div class="form-group{{ $errors->has('post') ? ' has-error' : '' }}">
            {{ html()->label('Enter Post', 'post') }}
            {{ html()->text('post')->class('form-control')->required()->placeholder('Enter Post') }}
            <small class="text-danger">{{ $errors->first('post') }}</small>
          </div>
          <div class="form-group{{ $errors->has('join_date') ? ' has-error' : '' }}">
            {{ html()->label('Join Date', 'join_date') }}
            {{ html()->text('join_date')->class('form-control date-pick')->placeholder('Join Date') }}
            <small class="text-danger">{{ $errors->first('join_date') }}</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            {{ html()->label('Address', 'address') }}
            {{ html()->textarea('address')->class('form-control')->rows('4')->required()->placeholder('Enter Your Address') }}
            <small class="text-danger">{{ $errors->first('address') }}</small>
          </div>
          <div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
            {{ html()->label('Image', 'photo') }}
            {{ html()->file('photo') }}
            <small class="text-danger">{{ $errors->first('photo') }}</small>
          </div>
          <div class="radio{{ $errors->has('sex') ? ' has-error' : '' }}">
            Gendor
            <label for="sex" class="checkbox">
              {{ html()->radio('sex', null, 'M') }} Male
            </label>
            <label for="sex" class="checkbox">
              {{ html()->radio('sex', null, 'F') }} Female
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
