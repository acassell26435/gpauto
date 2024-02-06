@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'home_settings_section' => '','home_section'=>'','slider' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 
    'settings_section'=> 'active', 'settings'=>'','company_social' => '','opening_hours' => 'active', 'mail_setting'=>'', 'other_api'=>'','pwa'=>'','social_login' => '',
    'help'=>'','system_status'=>'','remove_public'=>'','clear_cache'=>'',
    'booking_report'=>'',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Opening Hours',
    'from' => 'Admin',
    'to' => 'Opening hours',
  ])
@endsection

@section('content')
  <div class="opening-hours-main-block">
    <div class="box-body">
      <button type="button" class="btn btn-default btn-md add-btn" data-toggle="modal" data-target="#createModal">Add Time</button>
    </div>
    <!-- Create Modal -->
    <div id="createModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Create Opening Hours</h4>
          </div>
          {{ html()->form('POST', action('AdminOpeningHoursController@store'))->open() }}
            <div class="modal-body">
              <div class="form-group{{ $errors->has('day') ? ' has-error' : '' }}">
                  {{ html()->label('Day', 'day') }}
                  {{ html()->select('day', array('Monday' => 'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday', 'Saturday' => 'Saturday', 'Sunday' => 'Sunday'))->class('form-control select2')->required()->placeholder('Chooes Day') }}
                  <small class="text-danger">{{ $errors->first('day') }}</small>
              </div>
              <div class="bootstrap-timepicker">
                <div class="form-group{{ $errors->has('opening_time') ? ' has-error' : '' }}">
                  {{ html()->label('Opening Time', 'opening_time') }}
                  {{ html()->text('opening_time')->class('form-control timepicker') }}
                  <small class="text-danger">{{ $errors->first('opening_time') }}</small>
                </div>
              </div>
              <div class="bootstrap-timepicker">
                <div class="form-group{{ $errors->has('closing_time') ? ' has-error' : '' }} bootstrap-timepicker">
                    {{ html()->label('Closing Time', 'closing_time') }}
                    {{ html()->text('closing_time')->class('form-control timepicker')->placeholder('eg: 8:00 pm') }}
                    <small class="text-danger">{{ $errors->first('closing_time') }}</small>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <div class="btn-group pull-right">
                {{ html()->reset("Reset", ['class' => 'btn btn-yellow btn-default']) }}
                {{ html()->submit("Add Time")->class('btn btn-default btn-add') }}
              </div>
            </div>
          {{ html()->form()->close() }}
        </div>
      </div>
    </div>
    <div class="box-body table-responsive">
      <table class="table">
        <thead>
          <tr class="info">
            <th>S.No.</th>
            <th>Day</th>
            <th>Opening Time</th>
            <th>Closing Time</th>
            <th>Created at</th>
            <th>updated at</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @if ($timings)
            @php($i = 1)
            @foreach ($timings as $timing)
              <tr>
                <td>
                  {{$i}}
                  @php($i++)
                </td>
                <td>{{$timing->day}}</td>
                <td>{{$timing->opening_time}}</td>
                <td>{{$timing->closing_time}}</td>
                <td>{{$timing->created_at->diffForHumans()}}</td>
                <td>{{$timing->updated_at->diffForHumans()}}</td>
                <td>
                  <div class="action-btns">
                    <!-- Edit Button -->
                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#{{$timing->id}}editModal">Edit</button>
                    <!-- Edit Modal -->
                    <div id="{{$timing->id}}editModal" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Edit Timing</h4>
                          </div>
                          {{ html()->modelForm($timing, 'PATCH', action('AdminOpeningHoursController@update', [$timing->id]))->open() }}
                            <div class="modal-body">
                              <div class="form-group{{ $errors->has('day') ? ' has-error' : '' }}">
                                  {{ html()->label('Day', 'day') }}
                                  {{ html()->select('day', array('-' => 'Choose Day', 'Monday' => 'Monday', 'Tuesday' => 'Tuesday', 'Wednesday' => 'Wednesday', 'Thursday' => 'Thursday', 'Friday' => 'Friday', 'Saturday' => 'Saturday', 'Sunday' => 'Sunday'))->class('form-control select2')->required() }}
                                  <small class="text-danger">{{ $errors->first('day') }}</small>
                              </div>
                              <div class="bootstrap-timepicker">
                                <div class="form-group{{ $errors->has('opening_time') ? ' has-error' : '' }}">
                                    {{ html()->label('Opening Time', 'opening_time') }}
                                    {{ html()->text('opening_time')->class('form-control timepicker')->placeholder('eg: 9:00 am') }}
                                    <small class="text-danger">{{ $errors->first('opening_time') }}</small>
                                </div>
                              </div>
                              <div class="bootstrap-timepicker">
                                <div class="form-group{{ $errors->has('closing_time') ? ' has-error' : '' }}">
                                    {{ html()->label('Closing Time', 'closing_time') }}
                                    {{ html()->text('closing_time')->class('form-control timepicker')->placeholder('eg: 8:00 pm') }}
                                    <small class="text-danger">{{ $errors->first('closing_time') }}</small>
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
                    <button type="button" class="btn btn-info btn-sm btn-danger" data-toggle="modal" data-target="#{{$timing->id}}DeleteModal">Delete</button>
                    <!-- Delete Modal -->
                    <div id="{{$timing->id}}DeleteModal" class="delete-modal modal fade" role="dialog">
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
                            {{ html()->form('DELETE', action('AdminOpeningHoursController@destroy', [$timing->id]))->open() }}
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
  </div>
@endsection
