@extends('layouts.cabinet')

@section('title')
    @lang('view_cabinet.add_tickets_title')
@endsection

@section('content')
<div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('view_cabinet.add_tickets_title')</h4>
                </div>
                <div class="card-body">
                    <form id="form-add-ticket" action="{{route('add-tickets')}}" method="POST">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="theme">@lang('view_cabinet.add_tickets_theme')</label>
                                    <input type="text" class="form-control" id="theme" name="theme" placeholder="@lang('view_cabinet.add_tickets_theme_des')" value="">
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="message">@lang('view_cabinet.add_tickets_message')</label>
                                <textarea rows="4" cols="80" class="form-control" id="message" name="message" placeholder="@lang('view_cabinet.add_tickets_message_des')" value=""></textarea>
                                </div>
                            </div>
                        </div>
                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-submit btn-fill pull-right">@lang('view_cabinet.add_tickets_submit')</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
            document.addEventListener('DOMContentLoaded', function(){ 
              $('#form-add-ticket input[type="text"], #form-add-ticket textarea').on('focus', function(){
                $(this).removeClass('form-control-error');
              });
                $('#form-add-ticket').submit(function(e){
                    e.preventDefault();
                    $.ajax({
                        url: $(this).attr('action'),
                        type: "POST",
                        dataType: "html",
                        data: $(this).serialize(),
                        success: function(response){      
                            var result = JSON.parse(response);            
                            demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', result.success, 2);
                            $('#form-add-ticket input[type="text"], #form-add-ticket textarea').val('');
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