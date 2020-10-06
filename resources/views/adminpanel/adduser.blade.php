@extends('layouts.admin')

@section('title')
 @lang('view_adminpanel.add_user_title')
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('view_adminpanel.add_new_user')</h4>
                </div>
                <div class="card-body">
                    <form id="form-add-user" action="{{route('add-user')}}" method="POST">
                        <div class="row">
                            <label for="name" class="col-sm-2 control-label">@lang('view_adminpanel.add_user_name')</label>
                            <div class="col-sm-10">
                                <div class="form-group ">
                                    <input type="text" class="form-control" id="name" name="name" autocomplete="off" placeholder="@lang('view_adminpanel.add_user_name')">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="role" class="col-sm-2 control-label">@lang('view_adminpanel.add_user_role')</label>
                            <div class="col-sm-10">
                                <div class="form-group ">
                                    <select class="form-control" id="role" name="role">
                                        @foreach ($user_groups as $user_group)
                                            <option value="{{$user_group->id}}">
                                                @if(LaravelLocalization::getCurrentLocale() == 'en')
                                                    {{$user_group->name_en}}
                                                @else
                                                    {{$user_group->name_ru}}
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="email" class="col-sm-2 control-label">@lang('view_adminpanel.add_user_email')</label>
                            <div class="col-sm-10">
                                <div class="form-group ">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="@lang('view_adminpanel.add_user_email')">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="password" class="col-sm-2 control-label">@lang('view_adminpanel.add_user_passwd')</label>
                            <div class="col-sm-10">
                                <div class="form-group ">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="@lang('view_adminpanel.add_user_passwd')">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <label for="password_confirmation" class="col-sm-2 control-label">@lang('view_adminpanel.add_user_passwd_confirm')</label>
                            <div class="col-sm-10">
                                <div class="form-group ">
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="@lang('view_adminpanel.add_user_passwd_confirm')">
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-info btn-fill pull-right">@lang('view_adminpanel.add_new_user')</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
            document.addEventListener('DOMContentLoaded', function(){ 
              $('input[type="text"], input[type="email"], input[type="password"]').on('focus', function(){
                $(this).removeClass('form-control-error');
              });
                $('#form-add-user').submit(function(e){
                    e.preventDefault();
                    $.ajax({
                        url: $(this).attr('action'),
                        type: "POST",
                        dataType: "html",
                        data: $(this).serialize(),
                        success: function(response){  
                            var result = JSON.parse(response);
                            $.each(result.success, function(key, value){
                                demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', value, 2);
                            });                
                            $('input[type="text"], input[type="email"], input[type="password"]').val('');
                        },
                        error: function(response){
                          var result = JSON.parse(response.responseText);
                          $.each(result.error, function(key, value){
                            $('#'+key).addClass('form-control-error');
                            demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', value, 4);
                          });
                        },
                    });
                });
            });
        </script>
@endsection