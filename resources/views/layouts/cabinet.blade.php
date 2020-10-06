<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
      <meta charset="utf-8" />
      <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/img/apple-icon.png')}}">
      <link rel="icon" type="image/png" href="{{ asset('admin/img/favicon.ico')}}">
      <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
      <title>@lang('view_layouts.cabinet_title')</title>
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
                      @lang('view_layouts.cabinet_title')
                    </a>
                    
                    <div class="sidebar-card-user">
                        <a rel="tooltip" title="@lang('view_cabinet.cabinet_download_avatar')" href="#" class="modal-avatar">
                        @if(Auth::user()->avatar)
                            <div class="avatar border-gray avatar_cabinet" style="background-image: url('{{asset('storage/'.Auth::user()->avatar)}}');" ></div>
                        @else
                            <img class="avatar border-gray" src="{{asset('admin/img/user_logo.png')}}" alt="...">
                        @endif
                        </a>
                      </div>
                      <div class="sidebar-card-user">
                          @if(Auth::user()->rating >= 1)
                          <span class="fa fa-star checked"></span>
                      @else
                          <span class="fa fa-star"></span>
                      @endif
                      @if(Auth::user()->rating >= 2)
                          <span class="fa fa-star checked"></span>
                      @else
                          <span class="fa fa-star"></span>
                      @endif
                      @if(Auth::user()->rating >= 3)
                          <span class="fa fa-star checked"></span>
                      @else
                          <span class="fa fa-star"></span>
                      @endif
                      @if(Auth::user()->rating >= 4)
                          <span class="fa fa-star checked"></span>
                      @else
                          <span class="fa fa-star"></span>
                      @endif
                      @if(Auth::user()->rating >= 5)
                          <span class="fa fa-star checked"></span>
                      @else
                          <span class="fa fa-star"></span>
                      @endif
                      </div>
                      <div class="sidebar-card-user">
                      <h5 class="title">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</h5>
                      </div>

                </div>
                <ul class="nav left-sidebar">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cabinet')}}">
                            <i class="nc-icon nc-single-02"></i>
                            <p>@lang('view_layouts.cabinet_account')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('balance')}}">
                            <i class="nc-icon nc-bank"></i>
                            <p>@lang('view_layouts.cabinet_balance')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('referrals')}}">
                            <i class="nc-icon nc-vector"></i>
                            <p>@lang('view_layouts.cabinet_referrals')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('all-shops')}}">
                            <i class="nc-icon nc-istanbul"></i>
                            <p>@lang('view_layouts.cabinet_all_shops')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('your-assets')}}">
                            <i class="nc-icon nc-money-coins"></i>
                            <p>@lang('view_layouts.cabinet_your_assets')</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" data-toggle="collapse" href="#support" aria-expanded="false">
                            <i class="nc-icon nc-chat-round"></i>
                            <p>
                                @lang('view_layouts.cabinet_support')
                                <b class="caret"></b>
                            </p>
                        </a>
                        <div class="collapse" id="support" style="">
                            <ul class="nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('add-tickets')}}">
                                        <span class="sidebar-mini"></span>
                                        <span class="sidebar-normal">@lang('view_layouts.cabinet_add_ticket')</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('active-tickets')}}">
                                        <span class="sidebar-mini"></span>
                                        <span class="sidebar-normal">@lang('view_layouts.cabinet_active_tickets')</span>
                                    </a>
                                </li>
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('closed-tickets')}}">
                                        <span class="sidebar-mini"></span>
                                        <span class="sidebar-normal">@lang('view_layouts.cabinet_closed_tickets')</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('change-password')}}">
                            <i class="nc-icon nc-key-25"></i>
                            <p>@lang('view_layouts.cabinet_change_password')</p>
                        </a>
                    </li>     
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('certificate')}}">
                            <i class="nc-icon nc-paper-2"></i>
                            <p>@lang('view_layouts.cabinet_cert')</p>
                        </a>
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
                        @include('includes.clocks')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBalanceLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="">
                                    @lang('view_layouts.cabinet_balance'): <span id="user_balance" class="speccolor_navbar">${{Auth::user()->balance}}</span>
                                </span>                
                            </a>
                            <div class="dropdown-menu " aria-labelledby="navbarDropdownBalanceLink">
                              <a class="dropdown-item" href="{{route('balance-deposit')}}"><i class="nc-icon nc-simple-add"></i> @lang('view_layouts.cabinet_top_up')</a>
                              <a class="dropdown-item" href="{{route('balance-withdrawal')}}"><i class="nc-icon nc-simple-delete"></i> @lang('view_layouts.cabinet_withdraw')</a>
                            </div>
                        </li>
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
                            <span class="speccolor_navbar">{{ Auth::user()->name }}</span>                
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="{{route('welcome')}}">@lang('view_layouts.main_page')</a>
                            @if (Auth::user()->group == 1)
                              <a class="dropdown-item" href="{{ route('admin') }}">@lang('view_layouts.cabinet_admin_page')</a>
                            @endif
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
              {{-- <div class="container"> --}}
                <p class="copyright text-left">
                    &copy; <script>document.write(new Date().getFullYear())</script> AMZ CORPORATE PTY LTD
                </p>
            {{-- </div> --}}
            </footer>
        </div>
    </div>

<!-- Mini Modal -->
<div class="modal fade modal modal-primary" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="avatarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <div class="modal-profile">
                        <i class="nc-icon nc-badge"></i>
                    </div>
                </div>
                <form id="upload_avatar"  action="{{route('upload-avatar')}}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body text-center">
                        <h3 id="title_shop">@lang('view_cabinet.cabinet_download_avatar')</h3>
                        <div class="col-md-12 form-group-fields">
                            <div class="form-group">
                                <input type="file" accept=".jpg, .jpeg, .png" id="avatar" name="avatar"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer ">
                        <div class="col align-items-center">
                            <button type="submit" class="btn btn-success btn-wd">@lang('view_cabinet.cabinet_download')</button>
                            <button type="button" class="btn btn-danger btn-wd pull-right" data-dismiss="modal">@lang('view_cabinet.cabinet_cansel')</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
    <!--  End Modal -->

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

        $('.modal-avatar').click(function(){
        $('#rate_shop .form-group-fields .alert.alert-danger').remove();
        $('#avatarModal').modal('toggle');
    });

    var href = window.location.href;

    $('#upload_avatar').submit(function(e){
        e.preventDefault();
        let formData = new FormData(e.currentTarget);
        $.ajax({
            url: $(this).attr('action'),
            type: "POST",
            dataType: "json",
            contentType: false,
            processData: false,
            data: formData,
            success: function(response){    
                document.location.href = href;  
            },
            error: function(response){
                var result = JSON.parse(response.responseText);
                $.each(result.error, function(key, value){
                    $('#'+key).addClass('form-control-error');
                $('#upload_avatar .form-group-fields').append("<div class=\"alert alert-danger\"><button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\"><i class=\"nc-icon nc-simple-remove\"></i></button><span>"+value+"</span></div>");
                });
            },
        });
    });

    });
    </script>
</html>
