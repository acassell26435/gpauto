@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'home_settings_section' => '','home_section'=>'','slider' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 
    'settings_section'=> 'active', 'settings'=>'','company_social' => 'active','opening_hours' => '', 'mail_setting'=>'', 'other_api'=>'','pwa'=>'','social_login' => '',
    'help'=>'','system_status'=>'','remove_public'=>'','clear_cache'=>'',
    'booking_report'=>'',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Company Socials',
    'from' => 'Admin',
    'to' => 'company socials',
  ])
@endsection

@section('content')

  <div class="box-body">
    <button type="button" class="btn btn-default btn-add" data-toggle="modal" data-target="#createModal">Add Social</button>
  </div>
  <!-- Create Modal -->
  <div id="createModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Company Social</h4>
        </div>
        {{ html()->form('POST', action('AdminCompanySocialController@store'))->open() }}
          <div class="modal-body">
            <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
              {{ html()->label('Link', 'link') }}
              {{ html()->text('link')->class('form-control')->required()->placeholder('social url') }}
              <small class="text-danger">{{ $errors->first('url') }}</small>
            </div>
            <div class="form-group{{ $errors->has('social') ? ' has-error' : '' }}">
              {{ html()->label('Social Site', 'social_site') }}
              {{ html()->select('social_site', ["" => "Social Networks", "Facebook" => "Facebook", "Instagram" => "Instagram", "Twitter" => "Twitter", "Google" => "Google", "Pinterest" => "Pinterest", "You Tube" => "You Tube", "Tumblr" => "Tumblr", "Dribbble" => 'Dribbble', "Flickr" => "Flickr", "Github" => "Github", "Linkedin" => "Linkedin", "Skype" => "Skype"])->class('form-control select2')->required() }}
              <small class="text-danger">{{ $errors->first('social') }}</small>
            </div>
            <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
              {{ html()->label('Social Icons', 'social_icon') }}
              {{ html()->text('social_icon')->class('form-control social-icon-picker')->required()->placeholder('Choose social icon') }}
              <small class="text-danger">{{ $errors->first('inputname') }}</small>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {{ html()->reset("Reset", ['class' => 'btn btn-yellow btn-default']) }}
              {{ html()->submit("Add Social")->class('btn btn-default btn-add') }}
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
          <th>Social</th>
          <th>Social Icon</th>
          <th>Link</th>
          <th>Created at</th>
          <th>updated at</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @if ($socials)
          @php($i = 1)
          @foreach ($socials as $social)
            <tr>
              <td>
                {{$i}}
                @php($i++)
              </td>
              <td>{{$social->social_site}}</td>
              <td><i class="fa {{$social->social_icon}}"></i></td>
              <td>{{$social->link}}</td>
              <td>{{$social->created_at->diffForHumans()}}</td>
              <td>{{$social->updated_at->diffForHumans()}}</td>
              <td>
                <div class="action-btns">
                  <!-- Edit Button -->
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#{{$social->id}}editModal">Edit</button>
                  <!-- Edit Modal -->
                  <div id="{{$social->id}}editModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Company Social</h4>
                        </div>
                        {{ html()->modelForm($social, 'PATCH', action('AdminCompanySocialController@update', [$social->id]))->open() }}
                          <div class="modal-body">
                            <div class="form-group{{ $errors->has('url') ? ' has-error' : '' }}">
                              {{ html()->label('Link', 'link') }}
                              {{ html()->text('link')->class('form-control')->required()->placeholder('social url') }}
                              <small class="text-danger">{{ $errors->first('url') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('social') ? ' has-error' : '' }}">
                              {{ html()->label('Social Site', 'social_site') }}
                              {{ html()->select('social_site', ["" => "Social Networks", "Facebook" => "Facebook", "Instagram" => "Instagram", "Twitter" => "Twitter", "Google" => "Google", "Pinterest" => "Pinterest", "You Tube" => "You Tube", "Tumblr" => "Tumblr", "Dribbble" => 'Dribbble', "Flickr" => "Flickr", "Github" => "Github", "Linkedin" => "Linkedin", "Skype" => "Skype"])->class('form-control select2')->required() }}
                              <small class="text-danger">{{ $errors->first('social') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('inputname') ? ' has-error' : '' }}">
                              {{ html()->label('Social Icons', 'social_icon') }}
                              {{ html()->text('social_icon')->class('form-control social-icon-picker')->required()->placeholder('Choose social icon') }}
                              <small class="text-danger">{{ $errors->first('inputname') }}</small>
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
                  <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#{{$social->id}}DeleteModal">Delete</button>
                  <!-- Delete Modal -->
                  <div id="{{$social->id}}DeleteModal" class="delete-modal modal fade" role="dialog">
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
                          {{ html()->form('DELETE', action('AdminCompanySocialController@destroy', [$social->id]))->open() }}
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
