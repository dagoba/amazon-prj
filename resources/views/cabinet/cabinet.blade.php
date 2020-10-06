@extends('layouts.cabinet')

@section('title')
 @lang('view_cabinet.cabinet_title')
@endsection

@section('content')

<div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('view_cabinet.cabinet_h4')</h4>
                </div>
                <div class="card-body">
                    <form id="edit_profile" action="{{route('editprofile')}}" role="form"  novalidate method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">@lang('view_cabinet.cabinet_name')</label>
                                    <input id="name" type="text" class="form-control" name="name" placeholder="@lang('view_cabinet.cabinet_name')" value="{{Auth::user()->name}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">@lang('view_cabinet.cabinet_email')</label>
                                    <input id="email" type="email" class="form-control" name="email" placeholder="@lang('view_cabinet.cabinet_email')" value="{{Auth::user()->email}}">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="firstname">@lang('view_cabinet.cabinet_first_name')</label>
                                    <input id="firstname" type="text" class="form-control" name="firstname" placeholder="@lang('view_cabinet.cabinet_first_name')" value="{{Auth::user()->firstname}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lastname">@lang('view_cabinet.cabinet_last_name')</label>
                                    <input id="lastname" type="text" class="form-control" name="lastname" placeholder="@lang('view_cabinet.cabinet_last_name')" value="{{Auth::user()->lastname}}">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="address">@lang('view_cabinet.cabinet_address')</label>
                                    <input id="address" type="text" class="form-control" name="address" placeholder="@lang('view_cabinet.cabinet_address')" value="{{Auth::user()->address}}">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="city">@lang('view_cabinet.cabinet_city')</label>
                                    <input id="city" type="text" class="form-control" name="city" placeholder="@lang('view_cabinet.cabinet_city')" value="{{Auth::user()->city}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="country">@lang('view_cabinet.cabinet_country')</label>
                                    <input id="country" type="text" class="form-control" name="country" placeholder="@lang('view_cabinet.cabinet_country')" value="{{Auth::user()->country}}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="postcode">@lang('view_cabinet.cabinet_post')</label>
                                    <input id="postcode" type="number" class="form-control" name="postcode" placeholder="@lang('view_cabinet.cabinet_post')" value="{{Auth::user()->postcode}}">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="aboutme">@lang('view_cabinet.cabinet_about_me')</label>
                                <textarea id="aboutme" rows="4" cols="80" class="form-control" name="aboutme" placeholder="@lang('view_cabinet.cabinet_about_me_des')" value="Mike">{{Auth::user()->aboutme}}</textarea>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-submit btn-fill pull-right">@lang('view_cabinet.cabinet_update')</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<script>
document.addEventListener('DOMContentLoaded', function(){ 
    $('#edit_profile input, #edit_profile textarea').on('focus', function(){
        $(this).removeClass('form-control-error');
    });
    $('#edit_profile').submit(function(e){
        e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                // dataType: "html",
                data: $(this).serialize(),
                success: function(response){           
                    demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', response.success, 2);
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
