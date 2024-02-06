@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => 'active', 'appointment' => 'active', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'home_settings_section' => '','home_section'=>'','slider' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 
    'settings_section'=> '', 'settings'=>'','company_social' => '','opening_hours' => '', 'mail_setting'=>'', 'other_api'=>'','pwa'=>'','social_login' => '',
    'help'=>'','system_status'=>'','remove_public'=>'','clear_cache'=>'',
    'booking_report'=>'',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection
@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Appointment',
    'from' => 'Admin',
    'to' => 'Appointment',
  ])
@endsection

@section('content')

@if (Auth::user()->role == 'A')
  <div class="box-body">
    <button type="button" class="btn btn-default btn-add" data-toggle="modal" data-target="#createModal">Add Appointment</button>
  </div>
  <!-- Create Modal -->
  <div id="createModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Appointment</h4>
        </div>
        {{ html()->form('POST', action('AdminAppointmentController@store'))->open() }}
          <div class="modal-body">
            <div class="row">
              <div class="col-md-4">
                <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                    {{ html()->label('Select User', 'user_id') }}
                    {{ html()->select('user_id', array('' => 'Select User') + $users)->class('form-control select2')->required() }}
                    <small class="text-danger">{{ $errors->first('user_id') }}</small>
                </div>
                <div class="form-group{{ $errors->has('vehicle_company_id') ? ' has-error' : '' }}">
                    {{ html()->label('Select Vehicle Company', 'vehicle_company_id') }}
                    {{ html()->select('vehicle_company_id', array('' => 'Select Vehicle Company') + $vehicle_companies)->class('form-control select2')->required() }}
                    <small class="text-danger">{{ $errors->first('vehicle_company_id') }}</small>
                </div>
                <div class="form-group{{ $errors->has('vehicle_modal_id') ? ' has-error' : '' }}">
                    {{ html()->label('Select Vehicle Modal', 'vehicle_modal_id') }}
                    {{ html()->select('vehicle_modal_id', array('' => 'Select Vehicle Modal') + $vehicle_modals)->class('form-control select2')->required() }}
                    <small class="text-danger">{{ $errors->first('vehicle_modal_id') }}</small>
                </div>
                <div class="form-group{{ $errors->has('vehicle_types_id') ? ' has-error' : '' }}">
                    {{ html()->label('Select Vehicle Type', 'vehicle_types_id') }}
                    {{ html()->select('vehicle_types_id', array('' => 'Select Vehicle Type') + $vehicle_types)->class('form-control select2')->required() }}
                    <small class="text-danger">{{ $errors->first('vehicle_types_id') }}</small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group{{ $errors->has('washing_plan_id') ? ' has-error' : '' }}">
                    {{ html()->label('Select Washing Plan', 'washing_plan_id') }}
                    {{ html()->select('washing_plan_id', array('' => 'Select Washing Plan') + $washing_plans)->class('form-control select2')->required() }}
                    <small class="text-danger">{{ $errors->first('washing_plan_id') }}</small>
                </div>
                <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
                    {{ html()->label('Select Status', 'status_id') }}
                    {{ html()->select('status_id', array('' => 'Select Status') + $status)->class('form-control select2') }}
                    <small class="text-danger">{{ $errors->first('status_id') }}</small>
                </div>
                <div class="form-group{{ $errors->has('appointment_date') ? ' has-error' : '' }}">
                    {{ html()->label('Appointment Date', 'appointment_date') }}
                    {{ html()->text('appointment_date')->class('form-control date-pick')->required()->placeholder('Appointment date') }}
                    <small class="text-danger">{{ $errors->first('appointment_date') }}</small>
                </div>
                <div class="form-group{{ $errors->has('vehicle_no') ? ' has-error' : '' }}">
                    {{ html()->label('Vehicle No', 'vehicle_no') }}
                    {{ html()->text('vehicle_no')->class('form-control')->required()->placeholder('Vehicle No.') }}
                    <small class="text-danger">{{ $errors->first('vehicle_no') }}</small>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group{{ $errors->has('time_frame') ? ' has-error' : '' }}">
                    {{ html()->label('Time Frame', 'time_frame') }}
                    {{ html()->select('time_frame', array('' => 'Choose Time Frame', 'morning' => 'Morning', 'afternoon' => 'Afternoon', 'evening' => 'Evening'))->class('form-control select2') }}
                    <small class="text-danger">{{ $errors->first('time_frame') }}</small>
                </div>
                <div class="form-group{{ $errors->has('appx_hour') ? ' has-error' : '' }}">
                    {{ html()->label('Approx Hour', 'appx_hour') }}
                    {{ html()->text('appx_hour')->class('form-control')->placeholder('eg: 5 hrs') }}
                    <small class="text-danger">{{ $errors->first('appx_hour') }}</small>
                </div>
                <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
                    {{ html()->label('Remark', 'remark') }}
                    {{ html()->textarea('remark')->class('form-control')->rows('5')->placeholder('Enter Remark') }}
                    <small class="text-danger">{{ $errors->first('remark') }}</small>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {{ html()->reset("Reset", ['class' => 'btn btn-yellow btn-default']) }}
              {{ html()->submit("Add Appointment")->class('btn btn-default btn-add') }}
            </div>
          </div>
        {{ html()->form()->close() }}
      </div>
    </div>
  </div>
  <div class="currency-crud-table table-responsive box-body">
    <table class="table table-hover">
      <thead>
        <tr class="info">
          <th>S.No.</th>
          <th>User</th>
          <th>Vehicle Company</th>
          <th>Vehicle Modal</th>
          <th>Vehicle Type</th>
          <th>Washing Plan</th>
          <th>Appointment Date</th>
          <th>Vehicle No.</th>
          <th>Time Frame</th>
          <th>Price</th>
          <th>Approx Hour</th>
          <th>Remark</th>
          <th>Status</th>
          <th>Submited At</th>
          <th>Modified At</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @if ($appointments)
          @php($i = 1)
          @foreach ($appointments as $appointment)
            <tr>
              <td>
                {{$i}}
                @php($i++)
              </td>
              <td>{{$appointment->user->name}}</td>
              <td>{{$appointment->vehicle_company->vehicle_company}}</td>
              <td>{{$appointment->vehicle_modal->vehicle_modal}}</td>
              <td>{{$appointment->vehicle_type->type}}</td>
              <td>{{$appointment->washing_plan->name}}</td>
              <td>{{$appointment->appointment_date}}</td>
              <td>{{$appointment->vehicle_no}}</td>
              <td>{{$appointment->time_frame}}</td>
              <td>
                @foreach ($washing_prices as $washing_price)
                  @if ($washing_price->washing_plan_id == $appointment->washing_plan_id && $washing_price->vehicle_type_id == $appointment->vehicle_types_id)
                    {{$washing_price->price}}
                  @endif
                @endforeach
              </td>
              <td>{{$appointment->appx_hour}}</td>
              <td>{{$appointment->remark}}</td>
              <td>
                  @if ($appointment->status_id == '')
                    -
                  @else
                    {{$appointment->status->status}}
                  @endif
              </td>
              <td>{{$appointment->created_at->diffForHumans()}}</td>
              <td>{{$appointment->updated_at->diffForHumans()}}</td>
              <td>
                <div class="action-btns">
                  <!-- Edit Button -->
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#{{$appointment->id}}editModal">Edit</button>
                  <!-- Edit Modal -->
                  <div id="{{$appointment->id}}editModal" class="modal fade" role="dialog">
                    <div class="modal-dialog modal-lg">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Appointment</h4>
                        </div>
                        {{ html()->modelForm($appointment, 'PATCH', action('AdminAppointmentController@update', [$appointment->id]))->open() }}
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                                    {{ html()->label('Select User', 'user_id') }}
                                    {{ html()->select('user_id', array('' => 'Select User') + $users)->class('form-control select2')->required() }}
                                    <small class="text-danger">{{ $errors->first('user_id') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('vehicle_company_id') ? ' has-error' : '' }}">
                                    {{ html()->label('Select Vehicle Company', 'vehicle_company_id') }}
                                    {{ html()->select('vehicle_company_id', array('' => 'Select Vehicle Company') + $vehicle_companies)->class('form-control select2')->required() }}
                                    <small class="text-danger">{{ $errors->first('vehicle_company_id') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('vehicle_modal_id') ? ' has-error' : '' }}">
                                    {{ html()->label('Select Vehicle Modal', 'vehicle_modal_id') }}
                                    {{ html()->select('vehicle_modal_id', array('' => 'Select Vehicle Modal') + $vehicle_modals)->class('form-control select2')->required() }}
                                    <small class="text-danger">{{ $errors->first('vehicle_modal_id') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('vehicle_types_id') ? ' has-error' : '' }}">
                                    {{ html()->label('Select Vehicle Type', 'vehicle_types_id') }}
                                    {{ html()->select('vehicle_types_id', array('' => 'Select Vehicle Type') + $vehicle_types)->class('form-control select2')->required() }}
                                    <small class="text-danger">{{ $errors->first('vehicle_types_id') }}</small>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group{{ $errors->has('washing_plan_id') ? ' has-error' : '' }}">
                                    {{ html()->label('Select Washing Plan', 'washing_plan_id') }}
                                    {{ html()->select('washing_plan_id', array('' => 'Select Washing Plan') + $washing_plans)->class('form-control select2')->required() }}
                                    <small class="text-danger">{{ $errors->first('washing_plan_id') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('status_id') ? ' has-error' : '' }}">
                                    {{ html()->label('Select Status', 'status_id') }}
                                    {{ html()->select('status_id', array('' => 'Select Status') + $status)->class('form-control select2') }}
                                    <small class="text-danger">{{ $errors->first('status_id') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('appointment_date') ? ' has-error' : '' }}">
                                    {{ html()->label('Appointment Date', 'appointment_date') }}
                                    {{ html()->text('appointment_date')->class('form-control date-pick')->required()->placeholder('Appointment date') }}
                                    <small class="text-danger">{{ $errors->first('appointment_date') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('vehicle_no') ? ' has-error' : '' }}">
                                    {{ html()->label('Vehicle No', 'vehicle_no') }}
                                    {{ html()->text('vehicle_no')->class('form-control')->required()->placeholder('Vehicle No.') }}
                                    <small class="text-danger">{{ $errors->first('vehicle_no') }}</small>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group{{ $errors->has('time_frame') ? ' has-error' : '' }}">
                                    {{ html()->label('Time Frame', 'time_frame') }}
                                    {{ html()->select('time_frame', array('' => 'Choose Time Frame', 'morning' => 'Morning', 'afternoon' => 'Afternoon', 'evening' => 'Evening'))->class('form-control select2') }}
                                    <small class="text-danger">{{ $errors->first('time_frame') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('appx_hour') ? ' has-error' : '' }}">
                                    {{ html()->label('Approx Hour', 'appx_hour') }}
                                    {{ html()->text('appx_hour')->class('form-control')->placeholder('eg: 5 hrs') }}
                                    <small class="text-danger">{{ $errors->first('appx_hour') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('remark') ? ' has-error' : '' }}">
                                    {{ html()->label('Remark', 'remark') }}
                                    {{ html()->textarea('remark')->class('form-control')->rows('5')->placeholder('Enter Remark') }}
                                    <small class="text-danger">{{ $errors->first('remark') }}</small>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <div class="btn-group pull-right">
                              {{ html()->submit("Update")->class('btn btn-default btn-add') }}
                            </div>
                          </div>
                        {{ html()->closeModelForm() }}
                      </div>
                    </div>
                  </div>
                  <!-- Delete Button -->
                  <button type="button" class="btn btn-info btn-sm btn-danger" data-toggle="modal" data-target="#{{$appointment->id}}DeleteModal">Delete</button>
                  <!-- Delete Modal -->
                  <div id="{{$appointment->id}}DeleteModal" class="delete-modal modal fade" role="dialog">
                    <div class="modal-dialog modal-sm">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <div class="delete-icon"></div>
                        </div>
                        <div class="modal-body text-center">
                          <h4 class="modal-heading">Are You Sure ?</h4>
                          <p>Do you really want to delete these records? This process cannot be undone.</p>
                        </div>
                        <div class="modal-footer">
                          {{ html()->form('DELETE', action('AdminAppointmentController@destroy', [$appointment->id]))->open() }}
                              {{ html()->reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) }}
                              {{ html()->submit("Yes")->class('btn btn-danger') }}
                          {{ html()->form()->close() }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        @endif
      </tbody>
    </table>
  </div>
@endif
@if (Auth::user()->role == 'S')
  <div class="box-body profile-card">
    <button type="button" class="btn btn-default btn-add appointment-btn" data-toggle="modal" data-target="#userAppointmentModal">Book Appointment</button>
    <!-- Create Modal -->
    <div id="userAppointmentModal" class="modal fade" role="dialog">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Create Appointment</h4>
          </div>
          {{ html()->form('POST', action('AdminAppointmentController@store'))->open() }}
            <div class="modal-body">
              <div class="row">
                <div class="col-md-4">
                  {{ html()->hidden('user_id', Auth::user()->id) }}
                  <div class="form-group{{ $errors->has('vehicle_company_id') ? ' has-error' : '' }}">
                      {{ html()->label('Select Vehicle Company', 'vehicle_company_id') }}
                      {{ html()->select('vehicle_company_id', array('' => 'Select Vehicle Company') + $vehicle_companies)->class('form-control')->required() }}
                      <small class="text-danger">{{ $errors->first('vehicle_company_id') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('vehicle_modal_id') ? ' has-error' : '' }}">
                      {{ html()->label('Select Vehicle Modal', 'vehicle_modal_id') }}
                      {{ html()->select('vehicle_modal_id', array('' => 'Select Vehicle Modal') + $vehicle_modals)->class('form-control')->required() }}
                      <small class="text-danger">{{ $errors->first('vehicle_modal_id') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('vehicle_types_id') ? ' has-error' : '' }}">
                      {{ html()->label('Select Vehicle Type', 'vehicle_types_id') }}
                      {{ html()->select('vehicle_types_id', array('' => 'Select Vehicle Type') + $vehicle_types)->class('form-control')->required() }}
                      <small class="text-danger">{{ $errors->first('vehicle_types_id') }}</small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group{{ $errors->has('washing_plan_id') ? ' has-error' : '' }}">
                      {{ html()->label('Select Washing Plan', 'washing_plan_id') }}
                      {{ html()->select('washing_plan_id', array('' => 'Select Washing Plan') + $washing_plans)->class('form-control')->required() }}
                      <small class="text-danger">{{ $errors->first('washing_plan_id') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('appointment_date') ? ' has-error' : '' }}">
                      {{ html()->label('Appointment Date', 'appointment_date') }}
                      {{ html()->text('appointment_date')->class('form-control date-pick')->required()->placeholder('Enter Appointment Date') }}
                      <small class="text-danger">{{ $errors->first('appointment_date') }}</small>
                  </div>
                  <div class="form-group{{ $errors->has('vehicle_no') ? ' has-error' : '' }}">
                      {{ html()->label('Vehicle No', 'vehicle_no') }}
                      {{ html()->text('vehicle_no')->class('form-control')->required()->placeholder('Enter Vehicle No.') }}
                      <small class="text-danger">{{ $errors->first('vehicle_no') }}</small>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group{{ $errors->has('time_frame') ? ' has-error' : '' }}">
                      {{ html()->label('Time Frame', 'time_frame') }}
                      {{ html()->select('time_frame', array('' => 'Choose Time Frame', 'morning' => 'Morning', 'afternoon' => 'Afternoon', 'evening' => 'Evening'))->class('form-control') }}
                      <small class="text-danger">{{ $errors->first('time_frame') }}</small>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="btn-group pull-right">
                {{ html()->reset("Reset", ['class' => 'btn btn-yellow btn-default']) }}
                {{ html()->submit("Add Appointment")->class('btn btn-default btn-add') }}
              </div>
            </div>
          {{ html()->form()->close() }}
        </div>
      </div>
    </div>
    @if ($appointments)
      @php ($i = 1)
      @foreach ($appointments as $appointment)
        @if ($appointment->user_id == Auth::user()->id)
          <div class="user-appointment-block">
            <h5 class="appointment-count">Appointment No. {{$i}}</h5>
            @php ($i++)
            <div class="info-table table-responsive">
              <table class="table">
                <thead>
                  <tr class="info">
                    <th>Vehicle Company</th>
                    <th>Vehicle Modal</th>
                    <th>Vehicle Type</th>
                    <th>Washing Plan</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$appointment->vehicle_company->vehicle_company}}</td>
                    <td>{{$appointment->vehicle_modal->vehicle_modal}}</td>
                    <td>{{$appointment->vehicle_type->type}}</td>
                    <td class="name">{{$appointment->washing_plan->name}}</td>
                  </tr>
                </tbody>
              </table>
              <table class="table">
                <thead>
                  <tr class="info">
                    <th>Appointment Date</th>
                    <th>Vehicle No.</th>
                    <th>Time Frame</th>
                    <th>Price</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>{{$appointment->appointment_date}}</td>
                    <td>{{$appointment->vehicle_no}}</td>
                    <td>{{$appointment->time_frame}}</td>
                    <td>
                      @foreach ($washing_prices as $washing_price)
                        @if ($washing_price->washing_plan_id == $appointment->washing_plan_id && $washing_price->vehicle_type_id == $appointment->vehicle_types_id)
                          {{$washing_price->price}}
                        @endif
                      @endforeach
                    </td>
                  </tr>
                </tbody>
              </table>
              <table class="table">
                <thead>
                  <tr class="info">
                    <th>Status</th>
                    <th>Submited At</th>
                    <th>Modified At</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      @if ($appointment->status_id == '')
                        -
                      @else
                        {{$appointment->status->status}}
                      @endif
                    </td>
                    <td>{{$appointment->created_at->diffForHumans()}}</td>
                    <td>{{$appointment->updated_at->diffForHumans()}}</td>
                    <td>
                      <div class="action-btns">
                        <!-- Edit Button -->
                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#{{$appointment->id}}editModal">Edit</button>
                        <!-- Edit Modal -->
                        <div id="{{$appointment->id}}editModal" class="modal fade" role="dialog">
                          <div class="modal-dialog modal-lg">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Edit Appointment</h4>
                              </div>
                              {{ html()->modelForm($appointment, 'PATCH', action('AdminAppointmentController@update', [$appointment->id]))->open() }}
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-4">
                                      {{ html()->hidden('user_id', Auth::user()->id) }}
                                      <div class="form-group{{ $errors->has('vehicle_company_id') ? ' has-error' : '' }}">
                                          {{ html()->label('Select Vehicle Company', 'vehicle_company_id') }}
                                          {{ html()->select('vehicle_company_id', array('' => 'Select Vehicle Company') + $vehicle_companies)->class('form-control')->required() }}
                                          <small class="text-danger">{{ $errors->first('vehicle_company_id') }}</small>
                                      </div>
                                      <div class="form-group{{ $errors->has('vehicle_modal_id') ? ' has-error' : '' }}">
                                          {{ html()->label('Select Vehicle Modal', 'vehicle_modal_id') }}
                                          {{ html()->select('vehicle_modal_id', array('' => 'Select Vehicle Modal') + $vehicle_modals)->class('form-control')->required() }}
                                          <small class="text-danger">{{ $errors->first('vehicle_modal_id') }}</small>
                                      </div>
                                      <div class="form-group{{ $errors->has('vehicle_types_id') ? ' has-error' : '' }}">
                                          {{ html()->label('Select Vehicle Type', 'vehicle_types_id') }}
                                          {{ html()->select('vehicle_types_id', array('' => 'Select Vehicle Type') + $vehicle_types)->class('form-control')->required() }}
                                          <small class="text-danger">{{ $errors->first('vehicle_types_id') }}</small>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group{{ $errors->has('washing_plan_id') ? ' has-error' : '' }}">
                                          {{ html()->label('Select Washing Plan', 'washing_plan_id') }}
                                          {{ html()->select('washing_plan_id', array('' => 'Select Washing Plan:') + $washing_plans)->class('form-control')->required() }}
                                          <small class="text-danger">{{ $errors->first('washing_plan_id') }}</small>
                                      </div>
                                      <div class="form-group{{ $errors->has('appointment_date') ? ' has-error' : '' }}">
                                          {{ html()->label('Appointment Date', 'appointment_date') }}
                                          {{ html()->text('appointment_date')->class('form-control date-pick')->required() }}
                                          <small class="text-danger">{{ $errors->first('appointment_date') }}</small>
                                      </div>
                                      <div class="form-group{{ $errors->has('vehicle_no') ? ' has-error' : '' }}">
                                          {{ html()->label('Vehicle No', 'vehicle_no') }}
                                          {{ html()->text('vehicle_no')->class('form-control')->required() }}
                                          <small class="text-danger">{{ $errors->first('vehicle_no') }}</small>
                                      </div>
                                    </div>
                                    <div class="col-md-4">
                                      <div class="form-group{{ $errors->has('time_frame') ? ' has-error' : '' }}">
                                          {{ html()->label('Time Frame', 'time_frame') }}
                                          {{ html()->select('time_frame', array('' => 'Choose Time Frame', 'morning' => 'Morning', 'afternoon' => 'Afternoon', 'evening' => 'Evening'))->class('form-control') }}
                                          <small class="text-danger">{{ $errors->first('time_frame') }}</small>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <div class="btn-group pull-right">
                                    {{ html()->submit("Update")->class('btn btn-default btn-add') }}
                                  </div>
                                </div>
                              {{ html()->closeModelForm() }}
                            </div>
                          </div>
                        </div>
                        <!-- Delete Button -->
                        <button type="button" class="btn btn-info btn-sm btn-danger" data-toggle="modal" data-target="#{{$appointment->id}}DeleteModal">Delete</button>
                        <!-- Delete Modal -->
                        <div id="{{$appointment->id}}DeleteModal" class="delete-modal modal fade" role="dialog">
                          <div class="modal-dialog modal-sm">
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <div class="delete-icon"></div>
                              </div>
                              <div class="modal-body text-center">
                                <h4 class="modal-heading">Are You Sure ?</h4>
                                <p>Do you really want to delete these records? This process cannot be undone.</p>
                              </div>
                              <div class="modal-footer">
                                {{ html()->form('DELETE', action('AdminAppointmentController@destroy', [$appointment->id]))->open() }}
                                    {{ html()->reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) }}
                                    {{ html()->submit("Yes")->class('btn btn-danger') }}
                                {{ html()->form()->close() }}
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        @endif
      @endforeach
    @endif
  </div>
@endif
@endsection
