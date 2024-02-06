@extends('layouts.admin')

@section('sidebar_active')
   @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => 'active', 'vehicle_company' => '', 'vehicle_modal' => 'active', 'vehicle_type' => '',
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
    'title' => 'Vehicle Modals',
    'from' => 'Admin',
    'to' => 'Vehicle Modals',
  ])
@endsection

@section('content')
  <div class="box-body">
    <button type="button" class="btn btn-add btn-default" data-toggle="modal" data-target="#createModal">Create Modal</button>
  </div>
  <!-- Create Modal -->
  <div id="createModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Vehicle Modal</h4>
        </div>
        {{ html()->form('POST', action('AdminVehicleModalController@store'))->open() }}
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('vehicle_company_id') ? ' has-error' : '' }}">
                  {{ html()->label('Vehicle Company', 'vehicle_company_id') }}
                  {{ html()->select('vehicle_company_id', array('' => 'Select Vehicle Company') + $vehicle_companies)->class('form-control select2')->required() }}
                  <small class="text-danger">{{ $errors->first('vehicle_company_id') }}</small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('vehicle_modal') ? ' has-error' : '' }}">
                  {{ html()->label('Vehicle Modal', 'vehicle_modal') }}
                  {{ html()->text('vehicle_modal')->class('form-control')->required()->placeholder('Enter Modal') }}
                  <small class="text-danger">{{ $errors->first('vehicle_modal') }}</small>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {{ html()->reset("Reset", ['class' => 'btn btn-yellow btn-default']) }}
              {{ html()->submit("Add Modal")->class('btn btn-default btn-add') }}
            </div>
          </div>
        {{ html()->form()->close() }}
      </div>
    </div>
  </div>
  <div class="box-body table-responsive">
    <table class="table table-hover">
      <thead>
        <tr class="info">
          <th>S.No.</th>
          <th>Vehicle Company</th>
          <th>Vehicle Modal</th>
          <th>Created at</th>
          <th>updated at</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @if ($vehicle_modals)
          @php($i = 1)
          @foreach ($vehicle_modals as $vehicle_modal)
            <tr>
              <td>
                {{$i}}
                @php($i++)
              </td>
              <td>{{$vehicle_modal->vehicle_company->vehicle_company}}</td>
              <td>{{$vehicle_modal->vehicle_modal}}</td>
              <td>{{$vehicle_modal->created_at->diffForHumans()}}</td>
              <td>{{$vehicle_modal->updated_at->diffForHumans()}}</td>
              <td>
                <div class="action-btns">
                  <!-- Edit Button -->
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#{{$vehicle_modal->id}}editModal">Edit</button>
                  <!-- Edit Modal -->
                  <div id="{{$vehicle_modal->id}}editModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Vehicle Modal</h4>
                        </div>
                        {{ html()->modelForm($vehicle_modal, 'PATCH', action('AdminVehicleModalController@update', [$vehicle_modal->id]))->open() }}
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group{{ $errors->has('vehicle_company_id') ? ' has-error' : '' }}">
                                  {{ html()->label('Vehicle Company', 'vehicle_company_id') }}
                                  {{ html()->select('vehicle_company_id', array('' => 'Select Vehicle Company') + $vehicle_companies)->class('form-control select2')->required() }}
                                  <small class="text-danger">{{ $errors->first('vehicle_company_id') }}</small>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group{{ $errors->has('vehicle_modal') ? ' has-error' : '' }}">
                                  {{ html()->label('Vehicle Modal', 'vehicle_modal') }}
                                  {{ html()->text('vehicle_modal')->class('form-control')->required() }}
                                  <small class="text-danger">{{ $errors->first('vehicle_modal') }}</small>
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
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#{{$vehicle_modal->id}}DeleteModal">Delete</button>
                  <!-- Delete Modal -->
                  <div id="{{$vehicle_modal->id}}DeleteModal" class="delete-modal modal fade" role="dialog">
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
                          {{ html()->form('DELETE', action('AdminVehicleModalController@destroy', [$vehicle_modal->id]))->open() }}
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
@endsection
