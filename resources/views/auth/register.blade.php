@extends('layouts.app')

@section('content')
<div class="container">
  <div class="register-page">
    <div class="logo">
      @if ($contacts)
        @foreach ($contacts as $contact)
          @for ($i=0; $i < 1; $i++)
            <img src="{{asset('/images/logo')}}/{{$contact->logo}}" class="img-responsive" alt="logo">
          @endfor
        @endforeach
      @endif
    </div>
    <h3 class="user-register-heading">Register</h3>
    <form class="form" method="POST" action="{{ route('register') }}">
      {{ csrf_field() }}
      <div class="row">
        <div class="col-md-3">
          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
            {{ html()->label('Name', 'name') }}
            {{ html()->text('name')->class('form-control')->required()->placeholder('Enter your name') }}
            <small class="text-danger">{{ $errors->first('name') }}</small>
          </div>
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
              {{ html()->label('Password', 'password') }}
              {{ html()->password('password')->class('form-control')->attribute('required', 'required')->attribute('placeholder', 'Enter Password') }}
              <small class="text-danger">{{ $errors->first('password') }}</small>
          </div>
          <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
              {{ html()->label('Confirm Password', 'password_confirmation') }}
              {{ html()->password('password_confirmation')->class('form-control')->attribute('required', 'required')->attribute('placeholder', 'Confirm Password') }}
              <small class="text-danger">{{ $errors->first('password_confirmation') }}</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            {{ html()->label('Email address', 'email') }}
            {{ html()->email('email')->class('form-control')->attribute('required', 'required')->attribute('placeholder', 'eg: foo@bar.com') }}
            <small class="text-danger">{{ $errors->first('email') }}</small>
          </div>
          <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
            {{ html()->label('Mobile', 'mobile') }}
            {{ html()->text('mobile')->class('form-control')->required()->placeholder('Mobile no.') }}
            <small class="text-danger">{{ $errors->first('mobile') }}</small>
          </div>
          <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
            {{ html()->label('Phone', 'phone') }}
            {{ html()->text('phone')->class('form-control')->placeholder('Phone no.') }}
            <small class="text-danger">{{ $errors->first('phone') }}</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
            {{ html()->label('Address', 'address') }}
            {{ html()->textarea('address')->class('form-control')->rows('9')->placeholder('Enter your address') }}
            <small class="text-danger">{{ $errors->first('address') }}</small>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
            {{ html()->label('Date Of Birth', 'dob') }}
            {{ html()->date('dob')->class('form-control')->attribute('required', 'required')->attribute('placeholder', 'Date of birth') }}
            <small class="text-danger">{{ $errors->first('dob') }}</small>
          </div>
          <div class="radio{{ $errors->has('sex') ? ' has-error' : '' }} user-create-radio">
            <span>Gender</span>
            <label for="sex" class="checkbox">
              {{ html()->radio('sex', null, 'M')->id('sex') }} Male
            </label>
            <label for="sex" class="checkbox">
              {{ html()->radio('sex', null, 'F')->id('sex') }} Female
            </label>
            <small class="text-danger">{{ $errors->first('sex') }}</small>
          </div>
        </div>
        <div class="col-md-12">
          <div class="btn-group">
            {{ html()->reset("Reset", ['class' => 'btn btn-yellow btn-default']) }}
            {{ html()->submit("Register")->class('btn btn-default btn-add') }}
          </div>
          <br/>
          <h5 class=""> OR </h5>
           @if($social_login->fb_login == 1)
              <a href="{{ url('/auth/facebook') }}" class="btn btn-default btn-add "><i class="fa fa-facebook-f"></i> Login With Facebook</a><br/>
           @endif
           @if($social_login->gogle_login == 1)
              <a href="{{ url('/auth/google') }}" class="btn btn-orange btn-add"><i class="fa fa-google"></i> Login With Google</a>
            @endif
        </div>
      </div>
    </form>
  </div>
</div>
@endsection
