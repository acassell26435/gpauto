@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'home_settings_section' => '','home_section'=>'','slider' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 
    'settings_section'=> 'active', 'settings'=>'active','company_social' => '','opening_hours' => '', 'mail_setting'=>'', 'other_api'=>'','pwa'=>'','social_login' => '',
    'help'=>'','system_status'=>'','remove_public'=>'','clear_cache'=>'',
    'booking_report'=>'',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Settings',
    'from' => 'Admin',
    'to' => 'Settings',
  ])
@endsection

@section('content')

  @if ($contacts)
    <div class="box-header bg-info">
      <div class="box-title">Basic Settings</div>
    </div>
   <div class="box-body">
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Logo</th>
            <th>Logo 2</th>
            <th>Company Name</th>
            <th>Mobile No.</th>
            <th>Phone No.</th>
            <th>Address</th>
            <th>Email</th>
            <th>Website</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>

         
            <tr>
              <td><img src="{{asset('images/logo')}}/{{$contacts->logo}}" class="img-responsive" alt="logo"></td>
              <td>
                @if ($contacts->logo_two)
                  <img src="{{asset('/images/logo')}}/{{$contacts->logo_two}}" class="img-responsive" alt="logo_two">
                @endif
              </td>
              <td title="{{$contact->c_name}}">{{str_limit($contacts->c_name, 20)}}</td>
              <td>{{$contacts->mobile}}</td>
              <td>{{$contacts->phone}}</td>
              <td>{{$contacts->address}}</td>
              <td>{{$contacts->email}}</td>
              <td>{{$contacts->website}}</td>
              <td>
                <!-- Edit Button -->
                <button type="button" class="btn btn-info btn-sm add-btn" data-toggle="modal" data-target="#{{$contacts->id}}type_edit_Modal">Edit</button>
                <!-- Edit Modal -->
                <div id="{{$contacts->id}}type_edit_Modal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Contact Information</h4>
                      </div>
                      {!! Form::model($contact, ['method' => 'PATCH', 'action' => ['AdminContactController@update', $contacts->id], 'files'=>true]) !!}
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('c_name') ? ' has-error' : '' }}">
                                  {!! Form::label('c_name', 'Company Name') !!}
                                  {!! Form::text('c_name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Your Company Name']) !!}
                                  <small class="text-danger">{{ $errors->first('c_name') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                                {!! Form::label('mobile', 'Mobile No.') !!}
                                {!! Form::text('mobile', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Mobile No.']) !!}
                                <small class="text-danger">{{ $errors->first('mobile') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                {!! Form::label('phone', 'Phone No.') !!}
                                {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Phone No.']) !!}
                                <small class="text-danger">{{ $errors->first('phone') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                  {!! Form::label('email', 'Email address') !!}
                                  {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
                                  <small class="text-danger">{{ $errors->first('email') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                                {!! Form::label('website', 'Your Website') !!}
                                {!! Form::text('website', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'eg: www.xyz.com']) !!}
                                <small class="text-danger">{{ $errors->first('website') }}</small>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                  {!! Form::label('address', 'Address') !!}
                                  {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>'5', 'required' => 'required', 'placeholder'=>'Enter Your Address']) !!}
                                  <small class="text-danger">{{ $errors->first('address') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                                  {!! Form::label('logo', 'Choose Logo') !!}
                                  {!! Form::file('logo') !!}
                                  <p class="help-block">Help block text</p>
                                  <small class="text-danger">{{ $errors->first('logo') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('logo_two') ? ' has-error' : '' }}">
                                  {!! Form::label('logo_two', 'Logo 2') !!}
                                  {!! Form::file('logo_two') !!}
                                  <p class="help-block">Help block text</p>
                                  <small class="text-danger">{{ $errors->first('logo_two') }}</small>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('inspect') ? ' has-error' : '' }} switch-main-block">
                                <div class="row">
                                  <div class="col-xs-6">
                                    {!! Form::label('inspect', 'Inspect Element') !!}
                                  </div>
                                  <div class="col-xs-5 pad-0">
                                    <label class="switch">                
                                      <input class="checkbox-switch" type="checkbox" name="inspect" {{$contacts->inspect == 1 ? 'checked': ''}}>
                                      <span class="slider round"></span>
                                    </label>
                                  </div>
                                </div>
                              </div>
                            </div>
                         
                             <div class="col-md-6">
                               <div class="form-group{{ $errors->has('rightclick') ? ' has-error' : '' }} switch-main-block">
                                  <div class="row">
                                    <div class="col-xs-4">
                                      {!! Form::label('rightclick', 'Rightclick') !!}
                                    </div>
                                    <div class="col-xs-5 pad-0">
                                      <label class="switch">                
                                        <input class="checkbox-switch" type="checkbox" name="rightclick" {{$contacts->rightclick == 1 ? 'checked': ''}}>
                                        <span class="slider round"></span>
                                      </label>
                                    </div>
                                  </div>
                                 
                                </div>
                             </div>

                             <div class="col-md-6">
                               <div class="form-group{{ $errors->has('APP_DEBUG') ? ' has-error' : '' }} switch-main-block">
                                  <div class="row">
                                    <div class="col-xs-6">
                                      {!! Form::label('APP_DEBUG', 'Debug Mode') !!}
                                    </div>
                                    <div class="col-xs-5 pad-0">
                                      <label class="switch">                
                                         <input class="checkbox-switch" type="checkbox" name="APP_DEBUG" {{env('APP_DEBUG') == true ? 'checked' : ''}}>
                                        <span class="slider round"></span>
                                      </label>
                                    </div>
                                  </div>
                                </div>
                             </div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <div class="btn-group pull-right">
                              {!! Form::submit("Save", ['class' => 'btn btn-default btn-add']) !!}
                          </div>
                        </div>
                      {!! Form::close() !!}
                    </div>
                  </div>
                </div>
                <!-- End Edit Button -->
              </td>
            </tr>
        
        </tbody>
      </table>
      {{-- {!! Form::model($contacts, ['method' => 'PATCH', 'action' => ['AdminContactController@update', $contacts->id], 'files'=>true]) !!}
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('c_name') ? ' has-error' : '' }}">
                  {!! Form::label('c_name', 'Company Name') !!}
                  {!! Form::text('c_name', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Your Company Name']) !!}
                  <small class="text-danger">{{ $errors->first('c_name') }}</small>
              </div>
              <div class="form-group{{ $errors->has('mobile') ? ' has-error' : '' }}">
                {!! Form::label('mobile', 'Mobile No.') !!}
                {!! Form::text('mobile', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Mobile No.']) !!}
                <small class="text-danger">{{ $errors->first('mobile') }}</small>
              </div>
              <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                {!! Form::label('phone', 'Phone No.') !!}
                {!! Form::text('phone', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'Enter Phone No.']) !!}
                <small class="text-danger">{{ $errors->first('phone') }}</small>
              </div>
              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                  {!! Form::label('email', 'Email address') !!}
                  {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']) !!}
                  <small class="text-danger">{{ $errors->first('email') }}</small>
              </div>
              <div class="form-group{{ $errors->has('website') ? ' has-error' : '' }}">
                {!! Form::label('website', 'Your Website') !!}
                {!! Form::text('website', null, ['class' => 'form-control', 'required' => 'required', 'placeholder'=>'eg: www.xyz.com']) !!}
                <small class="text-danger">{{ $errors->first('website') }}</small>
              </div>
              <div class="form-group{{ $errors->has('APP_DEBUG') ? ' has-error' : '' }}">
                  <label for=""> APP Debug</label>
                  <input type="checkbox" name="APP_DEBUG" {{env('APP_DEBUG') == true ? 'checked' : ''}}>
                  <small class="text-danger">{{ $errors->first('APP_DEBUG') }}</small>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                  {!! Form::label('address', 'Address') !!}
                  {!! Form::textarea('address', null, ['class' => 'form-control', 'rows'=>'5', 'required' => 'required', 'placeholder'=>'Enter Your Address']) !!}
                  <small class="text-danger">{{ $errors->first('address') }}</small>
              </div>
              <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
                  {!! Form::label('logo', 'Choose Logo') !!}
                  {!! Form::file('logo') !!}
                  <p class="help-block">Help block text</p>
                  <small class="text-danger">{{ $errors->first('logo') }}</small>
              </div>
              <div class="form-group{{ $errors->has('logo_two') ? ' has-error' : '' }}">
                  {!! Form::label('logo_two', 'Logo 2') !!}
                  {!! Form::file('logo_two') !!}
                  <p class="help-block">Help block text</p>
                  <small class="text-danger">{{ $errors->first('logo_two') }}</small>
              </div>

              <div class="form-group{{ $errors->has('inspect') ? ' has-error' : '' }}">
               <label for="">Inspect Element</label>
                  <input type="checkbox" name="inspect" {{$contacts->inspect == 1 ? 'checked': ''}}>
                  
                <small class="text-danger">{{ $errors->first('inspect') }}</small>
              </div>

              <div class="form-group{{ $errors->has('rightclick') ? ' has-error' : '' }}">
               <label for="">Right click Disable</label>
                  <input type="checkbox" name="rightclick" {{$contacts->rightclick == 1 ? 'checked': ''}}>
                <small class="text-danger">{{ $errors->first('rightclick') }}</small>
              </div>
            </div>
           
          </div>
        </div>
        <div class="box-footer">
           <div class="btn-group">
                {!! Form::submit("Save", ['class' => 'btn btn-default btn-add']) !!}
            </div>
        </div>
      {!! Form::close() !!} --}}
        
   </div>
  @endif
@endsection
