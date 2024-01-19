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
    'title' => 'Edit Slider',
    'from' => 'Admin',
    'to' => 'Edit Slider',
  ])
@endsection

@section('content')

  <div class="box-header">
    <div class="box-title">Slider Edit Form : <b>{{$slider->heading}}</b></div>
  </div>
  <form method="POST" action="{{route('slider.update',$id)}}" enctype="multipart/form-data">
    @csrf
   @method('PUT')
    <div class="box-body">
      <div class="row">
        <div class="col-md-8">
          <div class="form-group">
            <label for="">Heading</label>
            <input type="text" name="heading" class="form-control" value="{{$slider->heading ? $slider->heading : '' }}" required>
          </div>
          <div class="form-group">
            <label for="">Sub Heading</label>
            <input type="text" name="sub_heading" value="{{$slider->sub_heading ? $slider->sub_heading : '' }}" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="">Detail</label>
            <textarea class="form-control" name="detail" id="" cols="30" rows="10">{{$slider->detail ? $slider->detail : '' }}</textarea>
          </div>
          <div class="form-group{{ $errors->has('button1') ? ' has-error' : '' }} switch-main-block">
            <div class="row">
              <div class="col-xs-4">
                {!! Form::label('button1', 'Button1') !!}
              </div>
              <div class="col-xs-5 pad-0">
                <label class="switch">                
                  {!! Form::checkbox('button1', 1, $slider->button1, ['class' => 'checkbox-switch', 'id'=>'button1_enable']) !!}
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="col-xs-12">
              <small class="text-danger">{{ $errors->first('button1') }}</small>
            </div>
          </div>
          <div id="buttonbox1" style="{{$slider->button1 == 1 ? '': 'display:none;' }}">
            <div class="form-group">
              <label for="">Button Text</label>
              <input type="input" class="form-control" name="button1_text" value="{{$slider->button1_text ? $slider->button1_text : '' }}" placeholder="Please enter button text ex:- Read More">
            </div>
            <div class="form-group">
              <label for="">Button Link</label>
              <input type="url" class="form-control" name="button1_link" value="{{$slider->button1_link ? $slider->button1_link : '' }}" placeholder="Please enter button link ex:- https://yourdomain.com/read-more">
            </div>
          </div>

          <div class="form-group{{ $errors->has('button2') ? ' has-error' : '' }} switch-main-block">
            <div class="row">
              <div class="col-xs-4">
                {!! Form::label('button2', 'Button2') !!}
              </div>
              <div class="col-xs-5 pad-0">
                <label class="switch">                
                  {!! Form::checkbox('button2', 1, $slider->button2, ['class' => 'checkbox-switch', 'id'=>'button2_enable']) !!}
                  <span class="slider round"></span>
                </label>
              </div>
            </div>
            <div class="col-xs-12">
              <small class="text-danger">{{ $errors->first('button2') }}</small>
            </div>
          </div>
          <div id="buttonbox2" style="{{$slider->button2 == 1 ? '': 'display:none;' }}">
            <div class="form-group">
              <label for="">Button Text</label>
              <input type="input" class="form-control" name="button2_text" value="{{$slider->button2_text ? $slider->button2_text : '' }}" placeholder="Please enter button text ex:- contact">
            </div>
            <div class="form-group">
              <label for="">Button Link</label>
              <input type="url" class="form-control" name="button2_link" value="{{$slider->button2_link ? $slider->button2_link : '' }}" placeholder="Please enter button link ex:- https://yourdomain.com/contact">
            </div>
          </div>
          
          <div class="form-group">
            <label for="">Image</label>
            <input type="file" name="image">
          </div>
         
         
        </div>
      </div>
    </div>
    <div class="box-footer">
      <div class="btn-group">
        <input type="submit" value="Update" class="btn btn-default btn-add">
      </div>
    </div>
  </form>
 
@endsection
@section('script')
<script>
  $(function(){
    $('#button1_enable').on('change',function(){
      if($('#button1_enable').is(':checked')){
        //show
        $('#buttonbox1').show();
      }else{
        //hide
         $('#buttonbox1').hide();
      }
    });

    $('#button2_enable').on('change',function(){
      if($('#button2_enable').is(':checked')){
        //show
        $('#buttonbox2').show();
      }else{
        //hide
         $('#buttonbox2').hide();
      }
    });
  });

  
</script>
@endsection