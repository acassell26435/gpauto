@extends('layouts.admin')

@section('sidebar_active')
  @include('include.sidebar_links', [
    'users' => '', 'all_user' => '', 'create_user' => '',
    'teams' => '', 'all_team' => '', 'create_team' => '', 'team_task' => '',
    'plan' => '', 'all_plan' => '', 'plan_price' => '',
    'vehicle' => '', 'vehicle_company' => '', 'vehicle_modal' => '', 'vehicle_type' => '',
    'appointments' => '', 'appointment' => '', 'payment' => '', 'payment_mode' => '', 'currency' => '', 'status' => '',
    'home_settings_section' => '','home_section'=>'','slider' => '', 'services' => '', 'gallery' => '', 'facts' => '', 'testimonial' => '', 'blog' => '', 'clients' => '', 
    'settings_section'=> '', 'settings'=>'','company_social' => '','opening_hours' => '', 'mail_setting'=>'', 'other_api'=>'','pwa'=>'','social_login' => '',
    'help'=>'active','system_status'=>'active','remove_public'=>'','clear_cache'=>'',
    'booking_report'=>'',
    'profile' => '', 'sub_appointment' => '',

  ])
@endsection

@section('breadcum')
  @include('include.breadcum', [
    'title' => 'System Status',
    'from' => 'Admin',
    'to' => 'System Status',
  ])
@endsection

@section('content')
 <div class="box-body">
    <div class="admin-gallery-main-block box-body">
      <div class="row">
         @php

        $results = DB::select( DB::raw('SHOW VARIABLES LIKE "%version%"') );
    
        foreach ($results as $key => $result) {

            if($result->Variable_name == 'version' ){
                $db_info[] = array(
                    'value'   => $result->Value
                );
            }

            if($result->Variable_name == 'version_comment' ){
                $db_info[] = array(
                    'value'   => $result->Value
                );
            }
        }

        $servercheck= array();

    @endphp

   

        
        <div id="message"></div>

        <table class="table table-striped">
          

            <tbody>
                <tr>
                    <td>
                        <b>{{__('Laravel Version')}}</b>
                    </td>
                    <td>
                        {{ App::version() }} <i class="fa fa-check-circle text-green"></i>
                    </td>
                </tr>
            </tbody>
        </table>

        <hr>

        <table class="table table-bordered table-striped">
            <thead>
                
                <th colspan="2">
                    {{__('MYSQL version info')}}
                </th>
                <th>
                    {{__('Status')}}
                </th>
                
            </thead>
            

            <tbody>
               @foreach($db_info as $key => $info)
                    <tr>
                        <td>
                            {{ $key == 0 ? __('MYSQL Version') : __('Server Type') }}
                        </td>
                        <td>
                            {{ $info['value'] }}
                        </td>
                        <td>
                            @if($key == 0 && $info['value'] < 5.7)
                                @php
                                    array_push($servercheck, 0);
                                @endphp
                                <i class="fa fa-times-circle text-red"></i>
                            @else
                                @php
                                    array_push($servercheck, 1);
                                @endphp
                            <i class="fa fa-check-circle text-green"></i>
                            @endif
                        </td>
                    </tr>
               @endforeach
            </tbody>
        </table>
        <hr>
        <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>{{ __('PHP Extensions') }}</th>
                <th>{{ __('Status') }}</th>
              </tr>
            </thead>

            <tbody>

              <tr>
                @php
                    $v = phpversion();
                @endphp
                <td>
                  {{ __('php version') }} (<b>{{ $v }}</b>)
                  <br>
                  <small class="text-muted">{{__('php version required less than 7.5 and greater than 7.0')}}</small>
                </td>
                <td>

                 @if($v = 7.0 && $v < 7.5) <i class="text-green fa fa-check-circle"></i>
                        @php
                            array_push($servercheck, 1);
                        @endphp
                    @else
                        @php
                            array_push($servercheck, 1);
                        @endphp
                    <i class="text-red fa fa-times-circle"></i>
                    <br>
                    <small>
                      {{__('Your php version is')}} <b>{{ $v }}</b>{{__('which is not supported')}}
                    </small>
                   
                    @endif
                </td>
              </tr>

              <tr>
                <td>{{ __('pdo') }}</td>
                <td>

                  @if (extension_loaded('pdo'))

                        @php
                            array_push($servercheck, 1);
                        @endphp

                    <i class="text-green fa fa-check-circle"></i>
                 
                  @else

                        @php
                            array_push($servercheck, 1);
                        @endphp
                  
                    <i class="text-red fa fa-times-circle"></i>
                 
                  @endif
                </td>
              </tr>

              <tr>
                <td>{{ __('BCMath') }}</td>
                <td>

                  @if (extension_loaded('BCMath'))

                        @php
                            array_push($servercheck, 1);
                        @endphp

                    <i class="text-green fa fa-check-circle"></i>
                 
                  @else

                        @php
                            array_push($servercheck, 1);
                        @endphp
                    
                    <i class="text-red fa fa-times-circle"></i>
                 
                  @endif
                </td>
              </tr>

              <tr>
                <td>{{ __('openssl') }}</td>
                <td>

                  @if (extension_loaded('openssl'))

                        @php
                            array_push($servercheck, 1);
                        @endphp

                    <i class="text-green fa fa-check-circle"></i>
                
                  @else

                        @php
                            array_push($servercheck, 1);
                        @endphp
                  
                    <i class="text-red fa fa-times-circle"></i>
                 
                  @endif
                </td>
              </tr>

              <tr>
                <td>{{ __('fileinfo') }}</td>
                <td>

                  @if (extension_loaded('fileinfo'))

                        @php
                            array_push($servercheck, 1);
                        @endphp

                    <i class="text-green fa fa-check-circle"></i>
                  
                  @else

                        @php
                            array_push($servercheck, 1);
                        @endphp
                    
                    <i class="text-red fa fa-times-circle"></i>
                 
                  @endif
                </td>
              </tr>

              <tr>
                <td>{{ __('json') }}</td>
                <td>

                  @if (extension_loaded('json'))

                        @php
                            array_push($servercheck, 1);
                        @endphp

                    <i class="text-green fa fa-check-circle"></i>
                  
                  @else

                        @php
                            array_push($servercheck, 1);
                        @endphp
                  
                    <i class="text-red fa fa-times-circle"></i>
                  
                  @endif
                </td>
              </tr>

              <tr>
                <td>{{ __('session') }}</td>
                <td>
                    

                  @if (extension_loaded('session'))

                        @php
                            array_push($servercheck, 1);
                        @endphp

                    <i class="text-green fa fa-check-circle"></i>
                 
                  @else

                        @php
                            array_push($servercheck, 1);
                        @endphp

                    <i class="text-red fa fa-times-circle"></i>
                 
                  @endif
                </td>
              </tr>

              <tr>
                <td>{{ __('gd') }}</td>
                <td>

                  @if (extension_loaded('gd'))

                        @php
                            array_push($servercheck, 1);
                        @endphp

                    <i class="text-green fa fa-check-circle"></i>
                 
                  @else

                        @php
                            array_push($servercheck, 1);
                        @endphp
                  
                    <i class="text-red fa fa-times-circle"></i>
                  
                  @endif
                </td>
              </tr>



              <tr>
                <td>{{ __('allow_url_fopen') }}</td>
                <td>

                  @if (ini_get('allow_url_fopen'))

                        @php
                            array_push($servercheck, 1);
                        @endphp

                    <i class="text-green fa fa-check-circle"></i>
                  
                  @else

                        @php
                            array_push($servercheck, 1);
                        @endphp
                    
                    <i class="text-red fa fa-times-circle"></i>
                  
                  @endif
                </td>
              </tr>





              <tr>
                <td>{{ __('xml') }}</td>
                <td>

                  @if (extension_loaded('xml'))

                        @php
                            array_push($servercheck, 1);
                        @endphp

                    <i class="text-green fa fa-check-circle"></i>
                 
                  @else

                        @php
                            array_push($servercheck, 1);
                        @endphp
                  
                    <i class="text-red fa fa-times-circle"></i>
                 
                  @endif
                </td>
              </tr>

              <tr>
                <td>{{ __('tokenizer') }}</td>
                <td>

                  @if (extension_loaded('tokenizer'))

                        @php
                            array_push($servercheck, 1);
                        @endphp

                    <i class="text-green fa fa-check-circle"></i>
                 
                  @else

                        @php
                            array_push($servercheck, 1);
                        @endphp
                  
                    <i class="text-red fa fa-times-circle"></i>
                  
                  @endif
                </td>
              </tr>
              <tr>
                <td>{{ __('standard') }}</td>
                <td>

                  @if (extension_loaded('standard'))

                        @php
                            array_push($servercheck, 1);
                        @endphp

                    <i class="text-green fa fa-check-circle"></i>
                  
                  @else

                        @php
                            array_push($servercheck, 1);
                        @endphp
                  
                    <i class="text-red fa fa-times-circle"></i>
                 
                  @endif
                </td>
              </tr>

              <tr>
                <td>{{ __('mysqli') }}</td>
                <td>

                  @if (extension_loaded('mysqli'))

                        @php
                            array_push($servercheck, 1);
                        @endphp

                    <i class="text-green fa fa-check-circle"></i>
                 
                  @else

                        @php
                            array_push($servercheck, 1);
                        @endphp

                    <i class="text-red fa fa-times-circle"></i>
                 
                  @endif
                </td>
              </tr>

              <tr>
                <td>{{ __('mbstring') }}</td>
                <td>

                  @if (extension_loaded('mbstring'))

                        @php
                            array_push($servercheck, 1);
                        @endphp

                    <i class="text-green fa fa-check-circle"></i>
                 
                  @else

                        @php
                            array_push($servercheck, 1);
                        @endphp
                  
                    <i class="text-red fa fa-times-circle"></i>
                  
                  @endif
                </td>
              </tr>

              <tr>
                <td>{{ __('ctype') }}</td>
                <td>

                  @if (extension_loaded('ctype'))

                        @php
                            array_push($servercheck, 1);
                        @endphp

                    <i class="text-green fa fa-check-circle"></i>
                  
                  @else

                        @php
                            array_push($servercheck, 1);
                        @endphp

                    <i class="text-red fa fa-times-circle"></i>
                  
                  @endif
                </td>
              </tr>

              <tr>
                <td>{{ __('exif') }}</td>
                <td>

                  @if (extension_loaded('exif'))

                        @php
                            array_push($servercheck, 1);
                        @endphp

                  <i class="text-green fa fa-check-circle"></i>
                
                  @else

                        @php
                            array_push($servercheck, 1);
                        @endphp
                  
                  <i class="text-red fa fa-times-circle"></i>
                 
                  @endif
                </td>
              </tr>

              <tr>
                <td><b>{{storage_path()}}</b> {{ __('is writable') }}?</td>
                <td>
                  @php
                    $path = storage_path();
                  @endphp
                  @if(is_writable($path))

                    @php
                        array_push($servercheck, 1);
                    @endphp
                  <i class="text-green fa fa-check-circle"></i>
                  @else

                    @php
                        array_push($servercheck, 1);
                    @endphp

                  <i class="text-red fa fa-times-circle"></i>
                  @endif
                </td>
              </tr>

              <tr>
                <td><b>{{base_path('bootstrap/cache')}}</b> {{ __('is writable') }}?</td>
                <td>
                  @php
                    $path = base_path('bootstrap/cache');
                  @endphp
                  @if(is_writable($path))

                    @php
                        array_push($servercheck, 1);
                    @endphp

                  <i class="text-green fa fa-check-circle"></i>
                  @else

                    @php
                        array_push($servercheck, 1);
                    @endphp

                  <i class="text-red fa fa-times-circle"></i>
                  @endif
                </td>
              </tr>

              <tr>
                <td><b>{{storage_path('framework/sessions')}}</b> {{ __('is writable') }}?</td>
                <td>
                  @php
                    $path = storage_path('framework/sessions');
                  @endphp
                  @if(is_writable($path))

                    @php
                        array_push($servercheck, 1);
                    @endphp

                  <i class="text-green fa fa-check-circle"></i>
                  @else

                    @php
                        array_push($servercheck, 1);
                    @endphp

                  <i class="text-red fa fa-times-circle"></i>
                  @endif
                </td>
              </tr>


            </tbody>
          </table>

      </div>
    </div>
  </div>
@endsection
@section('script')
    <script>
        @if(!in_array(0, $servercheck))
            $("#message").html('<div class="callout callout-success"><i class="fa fa-check-circle"></i> {{ __("All good ! No problem detected so far") }}</div>');
        @else
            $('#message').html(' <div class="callout callout-danger"><i class="fa fa-times-circle"></i> {{ __("Something went wrong ! Please check status column") }}</div>');
        @endif
    </script>
@endsection
