<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/img/apple-icon.png')}}">
      <link rel="icon" type="image/png" href="{{ asset('admin/img/favicon.ico')}}">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>@lang('view_layouts.admin_title')</title>
      <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
      <!-- Fonts and icons -->
      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
      <!-- CSS Files -->
      <link href="{{ asset('admin/css/bootstrap.min.css')}}" rel="stylesheet" />
      <link href="{{ asset('admin/css/light-bootstrap-dashboard.css?v=2.0.1')}}" rel="stylesheet" />
      <!-- CSS Just for demo purpose, don't include it in your project -->
      <link href="{{ asset('admin/css/demo.css')}}" rel="stylesheet" />
      
    </head>
    <body>
        <div class="wrapper">
            <div class="sidebar" data-image="{{ asset('admin/img/bg_lk.jpg')}}">
              <div class="sidebar-wrapper">
                <div class="logo">
                    <a class="simple-text">
                        @lang('view_layouts.admin_title')
                    </a>
                </div>
                <ul class="nav left-sidebar">
                    <li class="nav-item" >
                        <a class="nav-link" href="{{route('admin')}}">
                            <i class="nc-icon nc-chart-pie-35"></i>
                            <p>@lang('view_layouts.admin_dashboard')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin-amz')}}">
                            <i class="nc-icon nc-notes"></i>
                            <p>@lang('view_layouts.admin_table_amz')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-toggle="collapse" href="#shops" aria-expanded="false">
                            <i class="nc-icon nc-istanbul"></i>
                            <p>@lang('view_layouts.admin_shops') <b class="caret"></b></p>
                        </a>
                        <div class="collapse" id="shops" style="">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin-add-shops')}}">
                                        <span class="sidebar-mini"></span>
                                        <span class="sidebar-normal">@lang('view_layouts.admin_add_shops')</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin-all-shops')}}">
                                        <span class="sidebar-mini"></span>
                                        <span class="sidebar-normal">@lang('view_layouts.admin_all_shops')</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin-closed-shops')}}">
                                        <span class="sidebar-mini"></span>
                                        <span class="sidebar-normal">@lang('view_layouts.admin_closed_shops')</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-toggle="collapse" href="#users" aria-expanded="false">
                            <i class="nc-icon nc-circle-09"></i>
                            <p>@lang('view_layouts.admin_users') <b class="caret"></b></p>
                        </a>
                        <div class="collapse" id="users" style="">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('add-user')}}">
                                        <span class="sidebar-mini"></span>
                                        <span class="sidebar-normal">@lang('view_layouts.admin_add_users')</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('admin-all-users')}}">
                                        <span class="sidebar-mini"></span>
                                        <span class="sidebar-normal">@lang('view_layouts.admin_all_users')</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('closed-users')}}">
                                        <span class="sidebar-mini"></span>
                                        <span class="sidebar-normal">@lang('view_layouts.admin_closed_users')</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-toggle="collapse" href="#taransaction" aria-expanded="false">
                            <i class="nc-icon nc-bullet-list-67"></i>
                            <p>@lang('view_layouts.admin_applications') <b class="caret"></b></p>
                        </a>
                        <div class="collapse" id="taransaction" style="">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('users-deposit')}}">
                                        <span class="sidebar-mini"></span>
                                        <span class="sidebar-normal">@lang('view_layouts.admin_replenishment')</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('users-withdrawal')}}">
                                        <span class="sidebar-mini"></span>
                                        <span class="sidebar-normal">@lang('view_layouts.admin_conclusion')</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                            <a class="nav-link collapsed" data-toggle="collapse" href="#support" aria-expanded="false">
                                <i class="nc-icon nc-chat-round"></i>
                                <p>
                                    @lang('view_layouts.admin_support_user')
                                    <b class="caret"></b>
                                </p>
                            </a>
                            <div class="collapse" id="support" style="">
                                <ul class="nav">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{route('admin-new-tickets')}}">
                                            <span class="sidebar-mini"></span>
                                            <span class="sidebar-normal">@lang('view_layouts.admin_new_tickets')</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{route('admin-my-tickets')}}">
                                            <span class="sidebar-mini"></span>
                                            <span class="sidebar-normal">@lang('view_layouts.admin_my_tickets')</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{route('admin-all-tickets')}}">
                                            <span class="sidebar-mini"></span>
                                            <span class="sidebar-normal">@lang('view_layouts.admin_all_tickets')</span>
                                        </a>
                                    </li>
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{route('admin-closed-tickets')}}">
                                            <span class="sidebar-mini"></span>
                                            <span class="sidebar-normal">@lang('view_layouts.admin_closed_tickets')</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                </ul>
              </div>
          </div>
          <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg" color-on-scroll="500">
	            <div class=" container-fluid">
		            <a class="navbar-brand" href="#"> @yield('title') </a>
                  <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"  aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                  </button>
	                <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="{{asset('admin/img/flags/16/'.LaravelLocalization::getCurrentLocale().'.png')}}" alt="{{ LaravelLocalization::getCurrentLocaleNative() }}" class="nav-bar-flag mr-2">
                            {{ LaravelLocalization::getCurrentLocaleNative() }}

                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                            <a class="dropdown-item" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                <img src="{{ asset('admin/img/flags/16/'.$localeCode.'.png')}}" alt="{{ $properties['native'] }}" class="mr-2">
                                <span class="no-icon">{{ $properties['native'] }}</span>
                            </a>
                          @endforeach
                        </div>
                      </li>                      
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="no-icon">{{ Auth::user()->name }}</span>                
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('welcome')}}">@lang('view_layouts.main_page')</a>
                            <a class="dropdown-item" href="{{route('cabinet')}}">@lang('view_layouts.admin_cabinet')</a>
                            <div class="divider"></div>
                            <a rel="nofollow" class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <i class="nc-icon nc-button-power"></i>@lang('view_layouts.log_out')
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                            </form>
                          </div>
                      </li>
                    </ul>
                  </div>
              </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
              <div class="container-fluid">
                @yield('content')
              </div>
            </div>
            <footer class="footer">
              <div class="container">
                <p class="copyright text-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> AMZ-CORP
                </p>
            </div>
        </footer>
      </div>
    </div>
  </body>
    <!--   Core JS Files   -->
    <script src="{{ asset('admin/js/core/jquery.3.2.1.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/core/popper.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/core/bootstrap.min.js')}}" type="text/javascript"></script>    

    <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
    <script src="{{ asset('admin/js/plugins/bootstrap-switch.js')}}"></script>

    <!--  Google Maps Plugin    -->
    {{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}

    <!--  Chartist Plugin  -->
    <script src="{{ asset('admin/js/plugins/chartist.min.js')}}"></script>

    <script src="{{ asset('admin/js/plugins/moment.min.js')}}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/plugins/moment-with-locales.js')}}" type="text/javascript"></script>
    <script src="{{ asset('admin/js/plugins/bootstrap-datetimepicker.js')}}" type="text/javascript"></script>
    

    <!--  Notifications Plugin    -->
    <script src="{{ asset('admin/js/plugins/bootstrap-notify.js')}}"></script>

    <!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
    <script src="{{ asset('admin/js/light-bootstrap-dashboard.js?v=2.0.1')}}" type="text/javascript"></script>

    <!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('admin/js/demo.js')}}"></script>


    <script>
       $(function () {
        var location = window.location.href;
        $('.left-sidebar li a').each(function () {
            var link = this.href;
            if(location == link) {
                $(this).parent('li.nav-item').addClass('active');
                $(this).parents('div.collapse').addClass('show').prev('a.nav-link').attr('aria-expanded', true);
            }
        });
    });
    </script>

</html>
