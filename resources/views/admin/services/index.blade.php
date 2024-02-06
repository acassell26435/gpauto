@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'home_settings_section' => 'active','home_section'=>'','slider' => '', 'services' => 'active', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 
    'settings_section'=> '', 'settings'=>'','company_social' => '','opening_hours' => '', 'mail_setting'=>'', 'other_api'=>'','pwa'=>'','social_login' => '',
    'help'=>'','system_status'=>'','remove_public'=>'','clear_cache'=>'',
    'booking_report'=>'',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'All Services',
    'from' => 'Admin',
    'to' => 'Services',
  ])
@endsection

@section('content')
  <div class="box-body">
    <button type="button" class="btn btn-default btn-add" data-toggle="modal" data-target="#serviceModal">Add Service</button>
  </div>
  <!-- Create Service Modal -->
  <div id="serviceModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Service</h4>
        </div>
        {{ html()->form('POST', action('AdminServiceController@store'))->acceptsFiles()->open() }}
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  {{ html()->label('Service Name', 'name') }}
                  {{ html()->text('name')->class('form-control')->required()->placeholder('Enter Service Name') }}
                  <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                  {{ html()->label('Service Icon', 'icon') }}
                  {{ html()->file('icon')->required() }}
                  <p class="help-block">Help block text</p>
                  <small class="text-danger">{{ $errors->first('icon') }}</small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                  {{ html()->label('Details', 'description') }}
                  {{ html()->textarea('description')->class('form-control')->rows('6')->placeholder('Enter Description') }}
                  <small class="text-danger">{{ $errors->first('description') }}</small>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {{ html()->reset("Reset", ['class' => 'btn btn-yellow btn-default']) }}
              {{ html()->submit("Add")->class('btn btn-default btn-add') }}
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
          <th>Service Icon</th>
          <th>Service Name</th>
          <th>Service Detail</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @if ($services)
          @php($i = 1)
          @foreach ($services as $service)
            <tr>
              <td>
                {{$i}}
                @php($i++)
              </td>
              <td> <img height="50px" width="50px" class="img-responsive" src="{{asset('images/services')}}/{{$service->icon}}" alt=""></td>
              <td>{{$service->name}}</td>
              <td title="{{$service->description}}">{{Str::limit($service->description, 50)}}</td>
              <td>
                <!-- Modal -->
                <a type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#{{$service->id}}serviceEditModal">Edit</a>
                <div id="{{$service->id}}serviceEditModal" class="modal fade" role="dialog">
                  <!-- Service Edit Modal -->
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Service</h4>
                      </div>
                      {{ html()->modelForm($service, 'PATCH', action('AdminServiceController@update', [$service->id]))->acceptsFiles()->open() }}
                        <div class="modal-body">
                          <div class="row">
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                {{ html()->label('Service Name', 'name') }}
                                {{ html()->text('name')->class('form-control')->required()->placeholder('Enter Service Name') }}
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('icon') ? ' has-error' : '' }}">
                                {{ html()->label('Service Icon', 'icon') }}
                                {{ html()->file('icon') }}
                                <p class="help-block">Help block text</p>
                                <small class="text-danger">{{ $errors->first('icon') }}</small>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {{ html()->label('Details', 'description') }}
                                {{ html()->textarea('description')->class('form-control')->rows('6')->placeholder('Enter Description') }}
                                <small class="text-danger">{{ $errors->first('description') }}</small>
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
                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#{{$service->id}}serviceDeleteModal">Delete</button>
                <!-- Modal -->
                <div id="{{$service->id}}serviceDeleteModal" class="delete-modal modal fade" role="dialog">
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
                        {{ html()->form('DELETE', action('AdminServiceController@destroy', [$service->id]))->open() }}
                            {{ html()->reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) }}
                            {{ html()->submit("Yes")->class('btn btn-danger') }}
                        {{ html()->form()->close() }}
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
