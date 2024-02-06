@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'home_settings_section' => 'active','home_section'=>'','slider' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => 'active', 'clients' => '', 
    'settings_section'=> '', 'settings'=>'','company_social' => '','opening_hours' => '', 'mail_setting'=>'', 'other_api'=>'','pwa'=>'','social_login' => '',
    'help'=>'','system_status'=>'','remove_public'=>'','clear_cache'=>'',
    'booking_report'=>'',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Blog CRUD',
    'from' => 'Admin',
    'to' => 'Blog',
  ])
@endsection

@section('content')

  <div class="box-body">
    <button type="button" class="btn btn-default btn-add" data-toggle="modal" data-target="#blogModal">Add Blog</button>
  </div>
  <!-- Create Modal -->
  <div id="blogModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Blog</h4>
        </div>
        {{ html()->form('POST', action('AdminBlogController@store'))->acceptsFiles()->open() }}
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                {{ html()->hidden('user_id', Auth::user()->id) }}
                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                  {{ html()->label('Title', 'title') }}
                  {{ html()->text('title')->class('form-control')->required()->placeholder('Enter Blog Title') }}
                  <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>
                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                    {{ html()->label('Date', 'date') }}
                    {{ html()->date('date')->class('form-control')->attribute('required', 'required')->attribute('placeholder', 'Enter Date') }}
                    <small class="text-danger">{{ $errors->first('date') }}</small>
                </div>
                <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                  {{ html()->label('Image', 'img') }}
                  {{ html()->file('img') }}
                  <p class="help-block">Help block text</p>
                  <small class="text-danger">{{ $errors->first('img') }}</small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('dtl') ? ' has-error' : '' }}">
                  {{ html()->label('Detail', 'dtl') }}
                  {{ html()->textarea('dtl')->class('form-control')->required()->placeholder('Enter Details') }}
                  <small class="text-danger">{{ $errors->first('dtl') }}</small>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {{ html()->reset("Reset", ['class' => 'btn btn-default btn-yellow']) }}
              {{ html()->submit("Add Blog")->class('btn btn-default btn-add') }}
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
          <th>User</th>
          <th>Title</th>
          <th>Date</th>
          <th>Details</th>
          <th>Created at</th>
          <th>updated at</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @if ($blogs)
          @php($i = 1)
          @foreach ($blogs as $blog)
            <tr>
              <td>
                {{$i}}
                @php($i++)
              </td>
              <td>{{$blog->users->name}}</td>
              <td title="{{$blog->title}}">{{Str::limit($blog->title, 25)}}</td>
              <td>{{$blog->date}}</td>
              <td title="{{$blog->dtl}}">{{Str::limit($blog->dtl, 45)}}</td>
              <td>{{$blog->created_at->diffForHumans()}}</td>
              <td>{{$blog->updated_at->diffForHumans()}}</td>
              <td>
                <div class="action-btns">
                  <!-- Edit Button -->
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#{{$blog->id}}editModal">Edit</button>
                  <!-- Edit Modal -->
                  <div id="{{$blog->id}}editModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Blog</h4>
                        </div>
                        {{ html()->modelForm($blog, 'PATCH', action('AdminBlogController@update', [$blog->id]))->acceptsFiles()->open() }}
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-6">
                                {{ html()->hidden('user_id', Auth::user()->id) }}
                                <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                                  {{ html()->label('Title', 'title') }}
                                  {{ html()->text('title')->class('form-control')->required()->placeholder('Enter Blog Title') }}
                                  <small class="text-danger">{{ $errors->first('title') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
                                    {{ html()->label('Date', 'date') }}
                                    {{ html()->date('date')->class('form-control')->attribute('required', 'required')->attribute('placeholder', 'Enter Date') }}
                                    <small class="text-danger">{{ $errors->first('date') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('img') ? ' has-error' : '' }}">
                                  {{ html()->label('Image', 'img') }}
                                  {{ html()->file('img') }}
                                  <p class="help-block">Help block text</p>
                                  <small class="text-danger">{{ $errors->first('img') }}</small>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group{{ $errors->has('dtl') ? ' has-error' : '' }}">
                                  {{ html()->label('Detail', 'dtl') }}
                                  {{ html()->textarea('dtl')->class('form-control')->required()->placeholder('Enter Details') }}
                                  <small class="text-danger">{{ $errors->first('dtl') }}</small>
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
                  <button type="button" class="btn btn-info btn-sm btn-danger" data-toggle="modal" data-target="#{{$blog->id}}DeleteModal">Delete</button>
                  <!-- Testimonial Delete Modal -->
                  <div id="{{$blog->id}}DeleteModal" class="delete-modal modal fade" role="dialog">
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
                          {{ html()->form('DELETE', action('AdminBlogController@destroy', [$blog->id]))->open() }}
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
