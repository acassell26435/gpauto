@extends('layouts.admin')

@section('sidebar_active')
   @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'home_settings_section' => 'ative','home_section'=>'','slider' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => 'active', 'blog' => '', 'clients' => '', 
    'settings_section'=> '', 'settings'=>'','company_social' => '','opening_hours' => '', 'mail_setting'=>'', 'other_api'=>'','pwa'=>'','social_login' => '',
    'help'=>'','system_status'=>'','remove_public'=>'','clear_cache'=>'',
    'booking_report'=>'',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'All Testimonials',
    'from' => 'Admin',
    'to' => 'Testimonials',
  ])
@endsection

@section('content')

  <div class="box-body">
    <button type="button" class="btn btn-default btn-add" data-toggle="modal" data-target="#testimonialModal">Add Testimonial</button>
  </div>
  <!-- Create Testimonial Modal -->
  <div id="testimonialModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Create Testimonial</h4>
        </div>
        {{ html()->form('POST', action('AdminTestimonialController@store'))->acceptsFiles()->open() }}
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                  {{ html()->label('Name', 'name') }}
                  {{ html()->text('name')->class('form-control')->required()->placeholder('Enter Name') }}
                  <small class="text-danger">{{ $errors->first('name') }}</small>
                </div>
                <div class="form-group{{ $errors->has('post') ? ' has-error' : '' }}">
                  {{ html()->label('Post', 'post') }}
                  {{ html()->text('post')->class('form-control')->required()->placeholder('Enter Post') }}
                  <small class="text-danger">{{ $errors->first('post') }}</small>
                </div>
                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                  {{ html()->label('Client Image', 'image') }}
                  {{ html()->file('image') }}
                  <p class="help-block">Help block text</p>
                  <small class="text-danger">{{ $errors->first('image') }}</small>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                  {{ html()->label('Detail', 'detail') }}
                  {{ html()->textarea('detail')->class('form-control')->rows('9')->required()->placeholder('Enter Details') }}
                  <small class="text-danger">{{ $errors->first('detail') }}</small>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <div class="btn-group pull-right">
              {{ html()->reset("Reset", ['class' => 'btn btn-yellow btn-default']) }}
              {{ html()->submit("Add Testimonial")->class('btn btn-default btn-add') }}
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
          <th>Photo</th>
          <th>Name</th>
          <th>Post</th>
          <th>Details</th>
          <th>Created at</th>
          <th>updated at</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @if ($testimonials)
          @php($i = 1)
          @foreach ($testimonials as $testimonial)
            <tr>
              <td>
                {{$i}}
                @php($i++)
              </td>
              <td><img width="50px" height="50px" src="{{asset('images/testimonial')}}/{{$testimonial->image}}" class="img-responsive" alt=""></td>
              <td>{{$testimonial->name}}</td>
              <td>{{$testimonial->post}}</td>
              <td title="{{$testimonial->detail}}">{{Str::limit($testimonial->detail, 50)}}</td>
              <td>{{$testimonial->created_at->diffForHumans()}}</td>
              <td>{{$testimonial->updated_at->diffForHumans()}}</td>
              <td>
                <div class="action-btns">
                  <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#{{$testimonial->id}}TestimonialUpdateModal">Edit</button>
                  <!-- Testimonial Update Modal -->
                  <div id="{{$testimonial->id}}TestimonialUpdateModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">  
                      <!-- Modal content-->
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">Edit Testimonial</h4>
                        </div>
                        {{ html()->modelForm($testimonial, 'PATCH', action('AdminTestimonialController@update', [$testimonial->id]))->acceptsFiles()->open() }}
                          <div class="modal-body">
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                  {{ html()->label('Name', 'name') }}
                                  {{ html()->text('name')->class('form-control')->required()->placeholder('Enter Name') }}
                                  <small class="text-danger">{{ $errors->first('name') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('post') ? ' has-error' : '' }}">
                                  {{ html()->label('Post', 'post') }}
                                  {{ html()->text('post')->class('form-control')->required()->placeholder('Enter Post') }}
                                  <small class="text-danger">{{ $errors->first('post') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                                  {{ html()->label('Client Image', 'image') }}
                                  {{ html()->file('image') }}
                                  <p class="help-block">Help block text</p>
                                  <small class="text-danger">{{ $errors->first('image') }}</small>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group{{ $errors->has('detail') ? ' has-error' : '' }}">
                                  {{ html()->label('Detail', 'detail') }}
                                  {{ html()->textarea('detail')->class('form-control')->rows('9')->required()->placeholder('Enter Details') }}
                                  <small class="text-danger">{{ $errors->first('detail') }}</small>
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
                  <button type="button" class="btn btn-info btn-sm btn-danger" data-toggle="modal" data-target="#{{$testimonial->id}}TestimonialDeleteModal">Delete</button>
                  <!-- Testimonial Delete Modal -->
                  <div id="{{$testimonial->id}}TestimonialDeleteModal" class="delete-modal modal fade" role="dialog">
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
                          {{ html()->form('DELETE', action('AdminTestimonialController@destroy', [$testimonial->id]))->open() }}
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
