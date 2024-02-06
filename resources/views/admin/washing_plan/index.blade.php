@extends('layouts.admin')

@section('sidebar_active')
   @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => 'active', 'all_plan' => 'active', 'plan_price' => '',
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
    'title' => 'Washing Plans',
    'from' => 'Admin',
    'to' => 'Washing Plans',
  ])
@endsection

@section('content')

  <div class="box-body">
    <button type="button" class="btn btn-default btn-add" data-toggle="modal" data-target="#washing_plan_Modal">Add Plan</button>
  </div>
  <!-- Create Washing Plan Modal -->
  <div id="washing_plan_Modal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Washing Plan</h4>
        </div>
        {{ html()->form('POST', action('AdminWashingPlanController@store'))->open() }}
          <div class="modal-body">
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {{ html()->label('Plan Name', 'name') }}
                {{ html()->text('name')->class('form-control')->required()->placeholder('Enter Plan Name') }}
                <small class="text-danger">{{ $errors->first('name') }}</small>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {{ html()->reset("Reset", ['class' => 'btn btn-yellow btn-default']) }}
              {{ html()->submit("Add Plan")->class('btn btn-add btn-default') }}
            </div>
          </div>
        {{ html()->form()->close() }}
      </div>
    </div>
  </div>
  @if ($washing_plans)
    <div class="box-body table-responsive">
      <table class="table table-hover">
        <thead>
          <tr class="info">
            <th>S.No.</th>
            <th>Washing Plan</th>
            <th>Services</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @php($i = 1)
          @foreach ($washing_plans as $washing_plan)
            <tr>
              <td>
                {{$i}}
                @php($i++)
              </td>
              <td>{{$washing_plan->name}}</td>
              <td>
                <a href="#" type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#{{$washing_plan->id}}createModal">Service Include</a>
                <!-- Social Modal -->
                <div id="{{$washing_plan->id}}createModal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Washing Plan Services</h4>
                      </div>
                      <div class="modal-body">
                        <div class="box box-primary table-responsive">
                          <table class="table table-hover teams-social-table">
                            <thead>
                              <tr class="info">
                                <th>S.No.</th>
                                <th>Washing plan Services</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody>
                              @php($k = 1)
                              @foreach ($washing_includes as $washing_include)
                                @if ($washing_include->washing_plan_id == $washing_plan->id)
                                  <tr>
                                    <td>
                                      {{$k}}
                                      @php($k++)
                                    </td>
                                    <td>{{$washing_include->washing_plan_include}}</td>
                                    <td>
                                      <a href="" type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit_modal{{$washing_include->id}}">Edit</a>
                                      <!-- Social Modal -->
                                      <div id="edit_modal{{$washing_include->id}}" class="modal fade" role="dialog">
                                        <div class="modal-dialog modal-sm">
                                          <!-- Modal content-->
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                                              <h4 class="modal-title">Update includes</h4>
                                            </div>
                                            {{ html()->modelForm($washing_include, 'PATCH', action('AdminWashingIncludeController@update', [$washing_include->id]))->open() }}
                                              <div class="modal-body">
                                                <div class="form-group{{ $errors->has('washing_plan_include') ? ' has-error' : '' }}">
                                                    {{ html()->label('Include Plan', 'washing_plan_include') }}
                                                    {{ html()->text('washing_plan_include')->class('form-control')->required()->placeholder('Enter Plan Include') }}
                                                    <small class="text-danger">{{ $errors->first('washing_plan_include') }}</small>
                                                </div>
                                                {{ html()->hidden('washing_plan_id', $washing_plan->id) }}
                                              </div>
                                              <div class="modal-footer">
                                                <div class="btn-group pull-right">
                                                  {{ html()->submit("Update")->class('btn btn-add btn-default') }}
                                                </div>
                                              </div>
                                            {{ html()->closeModelForm() }}
                                          </div>
                                        </div>
                                      </div>
                                      <!-- delete button -->
                                      <a href="" type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete_modal{{$washing_include->id}}">Delete</a>
                                      <!-- Social Modal -->
                                      <div id="delete_modal{{$washing_include->id}}" class="delete-modal modal fade" role="dialog">
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
                                              {{ html()->form('DELETE', action('AdminWashingIncludeController@destroy', [$washing_include->id]))->open() }}
                                                  {{ html()->reset("No", ['class' => 'btn btn-gray', 'data-dismiss' => 'modal']) }}
                                                  {{ html()->submit("Yes")->class('btn btn-danger') }}
                                              {{ html()->form()->close() }}
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </td>
                                  </tr>
                                @endif
                              @endforeach
                            </tbody>
                          </table>
                        </div>
                        {{ html()->form('POST', action('AdminWashingIncludeController@store'))->open() }}
                        <div class="form-group{{ $errors->has('washing_plan_include') ? ' has-error' : '' }}">
                            {{ html()->label('Plans Include', 'washing_plan_include') }}
                            {{ html()->text('washing_plan_include')->class('form-control')->required()->autofocus() }}
                            <small class="text-danger">{{ $errors->first('washing_plan_include') }}</small>
                        </div>
                      </div>
                      <div class="modal-footer">
                        {{ html()->hidden('washing_plan_id', $washing_plan->id) }}
                        <div class="btn-group pull-right">
                          {{ html()->reset("Reset", ['class' => 'btn btn-yellow btn-default']) }}
                          {{ html()->submit("Service Include")->class('btn btn-add btn-default') }}
                        </div>
                        {{ html()->form()->close() }}
                      </div>
                    </div>
                  </div>
                </div>
              </td>
              <td>{{$washing_plan->created_at->diffForHumans()}}</td>
              <td>{{$washing_plan->updated_at->diffForHumans()}}</td>
              <td>
                <!-- Edit Button -->
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#{{$washing_plan->id}}washing_edit_Modal">Edit</button>
                <!-- Edit Washing Plan Modal -->
                <div id="{{$washing_plan->id}}washing_edit_Modal" class="modal fade" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit Washing Plan</h4>
                      </div>
                      {{ html()->modelForm($washing_plan, 'PATCH', action('AdminWashingPlanController@update', [$washing_plan->id]))->open() }}
                        <div class="modal-body">
                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              {{ html()->label('Plan Name', 'name') }}
                              {{ html()->text('name')->class('form-control')->required() }}
                              <small class="text-danger">{{ $errors->first('name') }}</small>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <div class="btn-group pull-right">
                            {{ html()->submit("Update")->class('btn btn-add btn-default') }}
                          </div>
                        </div>
                      {{ html()->closeModelForm() }}
                    </div>
                  </div>
                </div>
                <!-- End Edit Button -->
                <!-- Delete Button -->
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#{{$washing_plan->id}}del_Modal">Delete</button>
                <!-- Delete Modal -->
                <div id="{{$washing_plan->id}}del_Modal" class="delete-modal modal fade" role="dialog">
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
                        {{ html()->form('DELETE', action('AdminWashingPlanController@destroy', [$washing_plan->id]))->open() }}
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
