
@extends('layouts.admin')
@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'home_settings_section' => '','home_section'=>'','slider' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 
    'settings_section'=> 'active', 'settings'=>'','company_social' => '','opening_hours' => '', 'mail_setting'=>'', 'other_api'=>'','pwa'=>'','social_login' => 'active',
    'help'=>'','system_status'=>'','remove_public'=>'','clear_cache'=>'',
    'booking_report'=>'',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'Social Login',
    'from' => 'Admin',
    'to' => 'Social Login',
  ])
@endsection
@section('content')

	<div class="box-body">
		@if ($errors->any())
		    <div class="alert alert-danger">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
		<div class="row">
		
		
			<div class="col-md-6">
				
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-facebook"></i> Facebook Login Setting
					</div>
					
					<div class="panel-body">
						<form action="{{ route('key.facebook') }}" method="POST">
						    {{ csrf_field() }}

						    <div class="form-group switch-main-block">
		            <div class="row">
		             <label for="" class="col-xs-5"> {{__('Enable Facebook Login:')}} <span class="text-red"></span></label>
		              <div class="col-xs-5 pad-0">
		                <label class="switch">                
		                 <input  {{ $social_login->fb_login == 1 ? 'checked' : "" }} type="checkbox" class="checkbox-switch" name="fb_check" id="fb_check" >
		                  <span class="slider round"></span>
		                </label>
		              </div>
		            </div>
		          </div>
						  
							<div id="fb_box_dtl" style="{{ $social_login->fb_login == 1 ? '' : "display: none
							" }}">
								<div class="form-group">
									<label for="">Facebook Client ID:</label>
									<input type="text" value="{{ $env_files['FACEBOOK_CLIENT_ID'] }}" name="FACEBOOK_CLIENT_ID" class="form-control">
								</div>
								<div class="search form-group">
									<label for="">Facebook Secret ID:</label>	
									<input type="password" value="{{ $env_files['FACEBOOK_CLIENT_SECRET'] }}" name="FACEBOOK_CLIENT_SECRET" class="form-control" id="password-field" >
									
								</div>
							
								<div class="form-group">
									<label for="">Facebook Redirect URL:</label>
									<input type="text" placeholder="https://yourdomain.com/auth/facebook/callback" value="{{ $env_files['FACEBOOK_CALLBACK'] }}" name="FACEBOOK_CALLBACK" class="form-control">
								</div>
							</div>
							<button type="submit" class="btn btn-default btn-add">
								 Save
							</button>
						</form>
					</div>
				</div>
				
				
			</div>
			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="fa fa-google"></i> Google Login Setting
					</div>
					
					<div class="panel-body">
						
						<form action="{{  route('key.google') }}" method="POST">
			     		{{ csrf_field() }}
			     		 <div class="form-group switch-main-block">
		            <div class="row">
		             <label for="" class="col-xs-5"> {{__('Enable Google Login:')}} <span class="text-red"></span></label>
		              <div class="col-xs-5 pad-0">
		                <label class="switch">                
		                 <input  {{ $social_login->google_login == 1 ? 'checked' : "" }} type="checkbox" class="checkbox-switch" name="google_login" id="google_login" >
		                  <span class="slider round"></span>
		                </label>
		              </div>
		            </div>
		          </div>
							
					
							<div id="g_box_detail" style="{{ $social_login->google_login == 1 ? '' : "display: none
							" }}">
								<div class="form-group">
									<label for="">Google Client ID:</label>
									<input type="text" value="{{ $env_files['GOOGLE_CLIENT_ID'] }}" name="GOOGLE_CLIENT_ID" class="form-control" >
								</div>
					
					
								<div class="search form-group">
									<label for="">Google Secret ID:</label>
									<input type="text" value="{{ $env_files['GOOGLE_CLIENT_SECRET'] }}" name="GOOGLE_CLIENT_SECRET" class="form-control" id="password-field2" >
									

								</div>
					
								<div class="form-group">
									<label for="">Google Redirect URL:</label>
									<input type="text" placeholder="https://yourdomain.com/auth/google/callback" value="{{ $env_files['GOOGLE_CALLBACK'] }}" name="GOOGLE_CALLBACK" class="form-control"  >
								</div>
							</div>
							<button type="submit" class="btn btn-default btn-add">
								 Save
							</button>
						</form>
					</div>
				</div>
			</div>

		
		</div>
	</div>


@endsection
@section('script')
<script type="text/javascript">

 $('#fb_check').on('change',function(){
 	if ($('#fb_check').is(':checked')){
   		$('#fb_box_dtl').show('fast');
	}else{
		$('#fb_box_dtl').hide('fast');
	}
 });

 $('#google_login').on('change',function(){
 	if ($('#google_login').is(':checked')){
   		$('#g_box_detail').show('fast');
	}else{
		$('#g_box_detail').hide('fast');
	}
 });
</script>



@endsection