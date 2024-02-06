@extends('layouts.theme')
@section('inner_content')
<!--  page banner -->
  <div id="page-banner" class="page-banner-main" style="background-image: url('images/bg/page-banner.jpg')">
    <div class="container">
      <div class="page-banner-block">
        <div class="section">
          <h3 class="section-heading">Contact Us</h3>
        </div>
        <ol class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>
          <li><a href="#">Contact</a></li>
          <li class="active"><a>Contact</a></li>
        </ol>
      </div>
    </div>
  </div>
<!--  end page banner  -->
<!--  contact page   -->
  @if (Session::has('added'))
    <div id="sessionModal" class="sessionmodal alert alert-success">
      <p>{{session('added')}}</p>
    </div>
  @endif
  <div id="contact-page" class="contact-page-main-block">
    <div class="section text-center">
      <h3 class="section-heading">Contact Us</h3>
      <p class="sub-heading">Sollicitudin urna dolor sagittis lacus donec elit libero sodales nec</p>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-sm-4">
          <div class="contact-block">
            <ul>
              @if ($contacts)
                @foreach ($contacts as $contact)
                  @for ($i=1; $i <= 1; $i++)
                    <li><i class="fa fa-mobile-phone" aria-hidden="true"></i><a href="#">{{$contact->mobile}}</a></li>
                    <li><i class="fa fa-phone" aria-hidden="true"></i><a href="#">{{$contact->phone}}</a></li>
                    <li><i class="fa fa-map-marker" aria-hidden="true"></i><a href="#">{{$contact->address}}</a></li>
                    <li><i class="fa fa-envelope-o" aria-hidden="true"></i><a href="#">{{$contact->email}}</a></li>
                    <li><i class="fa fa-globe" aria-hidden="true"></i><a href="#">{{$contact->website}}</a></li>
                  @endfor
                @endforeach
              @endif
            </ul>
          </div>
        </div>
        <div class="col-md-9  col-sm-8">
          {{ html()->form('POST', action('contactMailController@send'))->class('contact-form')->open() }}
          {{ csrf_field() }}
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  {{ html()->text('name')->class('form-control')->required()->placeholder('Full Name') }}
                  <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  {{ html()->email('email')->class('form-control')->attribute('required', 'required')->attribute('placeholder', 'E-Mail') }}
                  <small class="text-danger">{{ $errors->first('email') }}</small>
                </div>
              </div>
            </div>
            <div class="form-group{{ $errors->has('subject') ? ' has-error' : '' }}">
              {{ html()->text('subject')->class('form-control')->required()->placeholder('Subject') }}
              <small class="text-danger">{{ $errors->first('subject') }}</small>
            </div>
            <div class="form-group{{ $errors->has('mail_message') ? ' has-error' : '' }} message">
                {{ html()->textarea('mail_message')->rows('6')->required()->placeholder('Message') }}
                <small class="text-danger">{{ $errors->first('mail_message') }}</small>
            </div>
            <div class="btn-group pull-right">
              <button type="submit" class="btn btn-default">Send Message</button>
            </div>
          {{ html()->form()->close() }}
        </div>
      </div>
    </div>
  </div>
<!--  end contact page  -->
@endsection
