@extends('layouts.cabinet')

@section('title')
 @lang('view_cabinet.change_password_title')
@endsection

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">@lang('view_cabinet.change_password_title')</h4>
            </div>
            <div class="card-body ">
                <form id="form-change-password" role="form" method="POST" action="{{ route('change-password') }}" novalidate class="form-horizontal">
                    <div class="row">                        
                        <div class="col-sm-12">
                            <div class="form-group ">
                                <label for="current-password" class="control-label">@lang('view_cabinet.change_password_current_pw')</label>
                                <input type="password" class="form-control" id="current-password" name="current-password" placeholder="@lang('view_cabinet.change_password_password')">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group ">
                                <label for="password" class="control-label">@lang('view_cabinet.change_password_new_password')</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="@lang('view_cabinet.change_password_password')">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group ">
                                    <label for="password_confirmation" class="control-label">@lang('view_cabinet.change_password_re-enter')</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="@lang('view_cabinet.change_password_re-enter')">
                            </div>
                        </div>
                    </div>
                    {{ csrf_field() }}
                        <button type="submit" class="btn btn-submit btn-fill pull-right">@lang('view_cabinet.add_tickets_submit')</button>
                   
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function(){ 
      $('#form-change-password input[type="password"]').on('focus', function(){
        $(this).removeClass('form-control-error');
      });
        $('#form-change-password').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                type: "POST",
                dataType: "html",
                data: $(this).serialize(),
                success: function(response){      
                    var result = JSON.parse(response);            
                    demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', result.success, 2);
                    $('#form-change-password input[type="password"]').val('');
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