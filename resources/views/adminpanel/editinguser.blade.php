@extends('layouts.admin')

@section('title')
 @lang('view_adminpanel.editing_user_title')
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('view_adminpanel.editing_user_h4') "{{$user->name}}"</h4>
                </div>
                <div class="card-body">
                    <form id="edit_profile" action="{{route('editing-user')}}" role="form"  novalidate method="POST">
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="name">@lang('view_adminpanel.editing_user_name')</label>
                                    <input id="name" type="text" class="form-control" name="name" placeholder="@lang('view_adminpanel.editing_user_name')" value="{{$user->name}}">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="email">@lang('view_adminpanel.editing_user_email')</label>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="@lang('view_adminpanel.editing_user_email')" value="{{$user->email}}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="firstname">@lang('view_adminpanel.editing_user_group')</label>
                                    <select class="form-control" id="group" name="group">
                                        @foreach ($user_groups as $user_group)
                                            <option value="{{$user_group->id}}" @if($user->group == $user_group->id) selected @endif>
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
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="rating">@lang('view_adminpanel.editing_user_rating')</label>
                                    <input type="number" class="form-control" id="rating" name="rating" placeholder="@lang('view_adminpanel.editing_user_rating_placeholder')" min="0.00" max="5.00" step="0.01" value="{{$user->rating}}">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-6 pr-1">
                                <div class="form-group">
                                    <label for="firstname">@lang('view_adminpanel.editing_user_first')</label>
                                    <input id="firstname" type="text" class="form-control" name="firstname" placeholder="@lang('view_adminpanel.editing_user_first')" value="{{$user->firstname}}">
                                </div>
                            </div>
                            <div class="col-md-6 pl-1">
                                <div class="form-group">
                                    <label for="lastname">@lang('view_adminpanel.editing_user_last')</label>
                                    <input id="lastname" type="text" class="form-control" name="lastname" placeholder="@lang('view_adminpanel.editing_user_last')" value="{{$user->lastname}}">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">@lang('view_adminpanel.editing_user_address')</label>
                                    <input id="address" type="text" class="form-control" name="address" placeholder="@lang('view_adminpanel.editing_user_address')" value="{{$user->address}}">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-4 pr-1">
                                <div class="form-group">
                                    <label for="city">@lang('view_adminpanel.editing_user_city')</label>
                                    <input id="city" type="text" class="form-control" name="city" placeholder="@lang('view_adminpanel.editing_user_city')" value="{{$user->city}}">
                                </div>
                            </div>
                            <div class="col-md-4 px-1">
                                <div class="form-group">
                                    <label for="country">@lang('view_adminpanel.editing_user_country')</label>
                                    <input id="country" type="text" class="form-control" name="country" placeholder="@lang('view_adminpanel.editing_user_country')" value="{{$user->country}}">
                                </div>
                            </div>
                            <div class="col-md-4 pl-1">
                                <div class="form-group">
                                    <label for="postcode">@lang('view_adminpanel.editing_user_post')</label>
                                    <input id="postcode" type="number" class="form-control" name="postcode" placeholder="@lang('view_adminpanel.editing_user_post')" value="{{$user->postcode}}">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="aboutme">@lang('view_adminpanel.editing_user_about')</label>
                                <textarea id="aboutme" rows="4" cols="80" class="form-control" name="aboutme" placeholder="@lang('view_adminpanel.editing_user_about_placeholder')" value="Mike">{{$user->aboutme}}</textarea>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{$user->id}}"/>
                        <button type="submit" class="btn btn-info btn-fill pull-right">@lang('view_adminpanel.editing_user_update')</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<script>
        document.addEventListener('DOMContentLoaded', function(){ 
          $('#edit_profile input').on('focus', function(){
            $(this).removeClass('form-control-error');
          });
            $('#edit_profile').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    dataType: "html",
                    data: $(this).serialize(),
                    success: function(response){   
                        var result = JSON.parse(response);
                        demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', result.success, 2);  
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
