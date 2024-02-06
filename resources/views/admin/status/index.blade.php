@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => 'active', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => 'active',
    'home_settings_section' => '','home_section'=>'','slider' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 
    'settings_section'=> '', 'settings'=>'','company_social' => '','opening_hours' => '', 'mail_setting'=>'', 'other_api'=>'','pwa'=>'','social_login' => '',
    'help'=>'','system_status'=>'','remove_public'=>'','clear_cache'=>'',
    'booking_report'=>'',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'All Status',
    'from' => 'Admin',
    'to' => 'Status',
  ])
@endsection

@section('content')

  <div class="box-body">
    <button type="button" class="btn btn-default btn-add" data-toggle="modal" data-target="#status_modal">Add Status</button>
  </div>
  <!-- Create Modal -->
  <div id="status_modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Status</h4>
        </div>
        {{ html()->form('POST', action('AdminTaskStatusController@store'))->open() }}
          <div class="modal-body">
            <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                {{ html()->label('Status Name', 'status') }}
                {{ html()->text('status')->class('form-control')->required()->placeholder('eg: pending, complete') }}
                <small class="text-danger">{{ $errors->first('status') }}</small>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {{ html()->reset("Reset", ['class' => 'btn btn-yellow btn-default']) }}
              {{ html()->submit("Add Status")->class('btn btn-default btn-add') }}
            </div>
          </div>
        {{ html()->form()->close() }}
      </div>
    </div>
  </div>
  @if ($statuses)
    <div class="box-body table-responsive">
      <table class="table table-hover">
        <thead>
          <tr class="info">
            <th>S.No.</th>
            <th>Status</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @php($i = 1)
          @foreach ($statuses as $status)
            <tr>
              <td>
                {{$i}}
                @php($i++)
              </td>
              <td>{{$status->status}}</td>
              <td>{{$status->created_at->diffForHumans()}}</td>
              <td>{{$status->updated_at->diffForHumans()}}</td>
              <td>
                <!-- Edit Button -->
                <button type="button" class="btn btn-info btn-sm add-btn" data-toggle="modal" data-target="#{{$status->id}}edit_Modal">Edit</button>
                <!-- Edit Modal -->
                <div id="{{$status->id}}edit_Modal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Status</h4>
                      </div>
                      {{ html()->modelForm($status, 'PATCH', action('AdminTaskStatusController@update', [$status->id]))->open() }}
                        <div class="modal-body">
                          <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                              {{ html()->label('Status Name', 'status') }}
                              {{ html()->text('status')->class('form-control')->required() }}
                              <small class="text-danger">{{ $errors->first('status') }}</small>
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
                <!-- End Edit Button -->
                <!-- Delete Button -->
                <button type="button" class="btn btn-danger btn-sm add-btn" data-toggle="modal" data-target="#{{$status->id}}delete_Modal">Delete</button>
                <!-- Delete Modal -->
                <div id="{{$status->id}}delete_Modal" class="delete-modal modal fade" role="dialog">
                  <div class="modal-dialog modal-sm">
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
                        {{ html()->form('DELETE', action('AdminTaskStatusController@destroy', [$status->id]))->open() }}
                            {{ html()->reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) }}
                            {{ html()->submit("Yes")->class('btn btn-danger') }}
                        {{ html()->form()->close() }}
                      </div>
                    </div>
                  </div>
                </div>
                <!-- End Delete Modal -->
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif

@endsection
