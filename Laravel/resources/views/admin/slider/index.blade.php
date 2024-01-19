@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'home_settings_section' => 'active','home_section'=>'','slider' => 'active', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 
    'settings_section'=> '', 'settings'=>'','company_social' => '','opening_hours' => '', 'mail_setting'=>'', 'other_api'=>'','pwa'=>'','social_login' => '',
    'help'=>'','system_status'=>'','remove_public'=>'','clear_cache'=>'',
    'booking_report'=>'',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Slider',
    'from' => 'Admin',
    'to' => 'Slider',
  ])
@endsection

@section('content')
<div class="box-header">
    <div class="box-title">All Slider</div>
    <a  href="{{route('slider.create')}}" class="btn btn-default btn-add pull-right">Add Slider</a>
</div>
<div class="box-body table-responsive">
    <table class="table table-hover">
      <thead>
        <tr class="info">
          <th>S.No.</th>
          <th>Image</th>
          <th>Heading</th>
          <th>Detail</th>
          <th>Created at</th>
          <th colspan="2">Actions</th>
        </tr>
      </thead>
        @if($sliders)
          @php
            $i = 1;
          @endphp
          @foreach($sliders as $item)
            <tr>
              <td>{{$i++}}</td>
              <td><img src="{{url('/images/slider',$item->image)}}" class="img img-responsive"></td>
              <td>{{$item->heading}}</td>
              <td>{{str_limit($item->detail,50,'...')}}</td>
              <td>{{$item->created_at}}</td>
              <td><a href="{{route('slider.edit', $item->id)}}" class="btn btn-sm btn-info">Edit</a></td>
              <td>
                <button type="button" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#{{$item->id}}deleteModal">Delete</button>
                <!-- Modal -->
                <div id="{{$item->id}}deleteModal" class="delete-modal modal fade" role="dialog">
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
                        {!! Form::open(['method' => 'DELETE', 'action' => ['HomeSliderController@destroy', $item->id]]) !!}
                          {!! Form::reset("No", ['class' => 'btn btn-gray', 'data-dismiss'=>'modal']) !!}
                          {!! Form::submit("Yes", ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                      </div>
                    </div>
                  </div>
                </div>
              </td>
            </tr>
          @endforeach
        @endif
      <tbody>
      </tbody>
    </table>
</div>
@endsection