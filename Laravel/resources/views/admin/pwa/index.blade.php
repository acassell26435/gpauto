@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'home_settings_section' => '','home_section'=>'','slider' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 
    'settings_section'=> 'active', 'settings'=>'','company_social' => '','opening_hours' => '', 'mail_setting'=>'', 'other_api'=>'','pwa'=>'active','social_login' => '',
    'help'=>'','system_status'=>'','remove_public'=>'','clear_cache'=>'',
    'booking_report'=>'',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'PWA Settings',
    'from' => 'Admin',
    'to' => 'PWA Settings',
  ])
@endsection
@section('content')
	<div class="box-header">
	   Progressive Web App Setting
	 </div>

	<div class="box-body">

		<!-- Nav tabs -->
		<ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
		  
		  <li role="presentation" class="nav-item">
			<a class="nav-link active" data-toggle="pill" href="#home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Basic Settings</a>
		  </li>
		  <li role="presentation" class="nav-item">
			<a class="nav-link" data-toggle="pill" href="#profile" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Icons Settings</a>
		  </li>
		  
		</ul>

		<!-- Tab panes -->
		<div class="tab-content" id="custom-tabs-four-tabContent">
		  <div role="tabpanel" class="tab-pane active" id="home">
				<br>
			  <div class="callout callout-success">
				  <i class="fa fa-info-circle"></i>
				   Progessive Web App Requirements
				   <ul>
					   <li><b>HTTPS</b> must required in your domain (for enable contact your host provider for SSL configuration).</li>
					   <li><b>All icons and splash screens should be in png format</b></li>
				   </ul>
			  </div>

			  <div class="row">
				  <div class="col-md-12">
					  <form action="{{ route('pwa.setting.update') }}" method="POST" enctype="multipart/form-data">
						  @csrf

						   <div class="form-group switch-main-block">
		            <div class="row">
		             <label for="" class="col-xs-3"> {{__('Enable PWA :')}} <span class="text-red">*</span></label>
		              <div class="col-xs-5 pad-0">
		                <label class="switch">                
		                 	<input class="checkbox-switch" {{ env("PWA_ENABLE") =='1' ? "checked" : "" }} type="checkbox"  name="PWA_ENABLE">
		                  <span class="slider round"></span>
		                </label>
		              </div>
		            </div>
		          </div>

						 
						  
						  <div class="form-group">
							  <label>App Name: </label>
							  <input  class="form-control" type="text" name="app_name" value="{{ env("PWA_NAME")}}"/>
						  </div>

						  <div class="row">
							  <div class="col-md-6">
								  <div class="form-group">
									  <label>Theme Color for header: </label>
									  <input name="PWA_THEME_COLOR" class="form-control" type="color" value="{{env('PWA_THEME_COLOR') ?? '' }}"/>
								  </div>
							  </div>
							  <div class="col-md-6">
								  <div class="form-group">
									  <label for="">Background Color:</label>
									  <input name="PWA_BG_COLOR" class="form-control" type="color" value="{{ env('PWA_BG_COLOR') ?? '' }}"/>
								  </div>
							  </div>
						  </div>

						  <div class="row">
							  <div class="col-md-5">

								  <div class="form-group">
						
							
									<label for="">Shortcut icon for Home: <span class="text-danger">*</span> </label>
									
									<div class="custom-file">
									  <input name="shorticon_1" type="file" class="custom-file-input @error('shorticon_1') is-invalid @enderror" id="shorticon_1">
									  <label class="custom-file-label" for="shorticon_1">{{ __("Select icon for login (96 x 96)") }}</label>
									</div>
					  
									@error('shorticon_1')
									  <span class="invalid-feedback" role="alert">
										  <strong>{{ $message }}</strong>
									  </span>
									@enderror
								  </div>
							  </div>

							  <div class="col-md-1 card text-center">
								<div class="card-body">
									<img class="img img-responsive" src="{{ url('images/icons/'.env('SHORTCUT_ICON1'))}}" alt="{{ 'shorticon_1' }}">
								  </div>
							  </div>

							  <div class="col-md-5">
								  <div class="form-group">
						
							
									<label for="">Shortcut icon for Login: <span class="text-danger">*</span> </label>
									
									<div class="custom-file">
									  <input name="shorticon_2" type="file" class="custom-file-input @error('shorticon_2') is-invalid @enderror" id="shorticon_2">
									  <label class="custom-file-label" for="shorticon_2">{{ __("Select icon for home (96 x 96)") }}</label>
									</div>
					  
									@error('shorticon_2')
									  <span class="invalid-feedback" role="alert">
										  <strong>{{ $message }}</strong>
									  </span>
									@enderror
								  </div>
							  </div>

							  <div class="col-md-1 card text-center">
								  <div class="card-body">
									<img class="img img-responsive" src="{{ url('images/icons/'.env('SHORTCUT_ICON2'))}}" alt="{{ 'shorticon_2' }}">
								  </div>
							  </div>

							  

						  </div>
  

						  <button  data-loading-text="<i class='fa fa-spinner fa-spin'></i> Saving..." type="submit" class="btn btn-default btn-add">
							 Save Changes
						</button>
					  </form>
				  </div>

			  </div>
			  
		  </div>
		  <div role="tabpanel" class="tab-pane" id="profile">
				<br>
			  <h4>PWA Icons:</h4>

			  <hr>

			  <form action="{{ route('pwa.icons.update') }}" method="POST" enctype="multipart/form-data">
				  @csrf
				  <div class="row">
					
					  <div class="col-md-6">
						  <div class="form-group">
						
							
							<label>PWA Icon (512x512): <span class="text-danger">*</span> </label>
							
							<div class="custom-file">
							  <input name="icon_512" type="file" class="custom-file-input @error('icon_512') 'is-invalid' @enderror" id="icon_512">
							  <label class="custom-file-label" for="icon_512">{{ __("Select icon (512 x 512)") }}</label>
							</div>
			  
							@error('icon_512')
							  <span class="invalid-feedback" role="alert">
								  <strong>{{ $message }}</strong>
							  </span>
							@enderror
						  </div>
					  </div>

					  <div class="offset-md-1 col-md-2 card">
						  <div class="card-body">
							<img class="img img-responsive" src="{{ url('images/icons/icon-512x512.png') }}" alt="icon_512x512.png">
						  </div>
					  </div>

					  <div class="col-md-12">
						  <button  data-loading-text="<i class='fa fa-spinner fa-spin'></i> Updating..." type="submit" class="btn btn-default btn-add">
							 Update Icon
						  </button>
					  </div>

				  </div>

				  <br>

				  <h4>Splash Screens:</h4>
				  <hr>

				  <div class="row">

					  <div class="col-md-6">
						  
						  <div class="form-group">
						
							
							<label>PWA Splash Screen (2048x2732): <span class="text-danger">*</span> </label>
							
							<div class="custom-file">
							  <input name="splash_2048" type="file" class="custom-file-input @error('splash_2048') 'is-invalid' @enderror" id="splash_2048">
							  <label class="custom-file-label" for="splash_2048">{{ __("Select splash screen (2048x2732)") }}</label>
							</div>
			  
							@error('splash_2048')
							  <span class="invalid-feedback" role="alert">
								  <strong>{{ $message }}</strong>
							  </span>
							@enderror
						  </div>
					  </div>

					  <div class="offset-md-1 col-md-2 card">
						 <div class="card-body">
							<img class="img img-responsive" src="{{ url('images/icons/splash-2048x2732.png') }}" alt="splash-2048x2732.png">
						 </div>
					  </div>

					  <div class="col-md-12">
						<button  data-loading-text="<i class='fa fa-spinner fa-spin'></i> Updating..." type="submit" class="btn btn-default btn-add">
							Update Screen
						</button>
					  </div>
					  

				  </div>



			  </form>
		  </div>
		</div>
	</div>
@endsection
@section('script')
		<script>
			$("input[data-bootstrap-switch]").each(function(){
				$(this).bootstrapSwitch();
			});
		</script>
@endsection