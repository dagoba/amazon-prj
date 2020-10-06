@extends('layouts.cabinet')

@section('title')
    @lang('view_cabinet.active_tickets_message_title')
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card ">
            <div class="card-header ">
                <h4 class="card-title">{{$ticket->theme}}</h4>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form id="form-add-message" action="{{route('add-message')}}" method="POST">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="message" name="message" placeholder="@lang('view_cabinet.active_tickets_message_placeholder')">
                                        <div class="input-group-append">
                                            <button class="btn btn-info btn-outline-secondary">@lang('view_cabinet.active_tickets_message_submit')</button>
                                        </div>
                                    </div>
                                </div>
                                {{ csrf_field() }}
                                <input type="hidden" name="ticket" value="{{$ticket->id}}"/>
                            </form>
                        </div>
                    <ul class="ticket-messages">
                        @foreach ($messages as $message)
                        <li>
                            <div data-message="{{$message->message_id}}" class="message_ticket @if($message->id === Auth::user()->id) user-message-right @else user-message-left @endif">
                                <b class="user_name">{{$message->name}}</b>
                                <div class="user_message">{{$message->message}}</div>
                                <div class="user_created">{{$message->created_at}}</div>
                            </div>
                        </li>
                        @endforeach
                    </ul>                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
        document.addEventListener('DOMContentLoaded', function(){ 
          $('#form-add-message input[type="text"]').on('focus', function(){
            $(this).removeClass('form-control-error');
          });
            $('#form-add-message').submit(function(e){
                e.preventDefault();
                var element_form = $(this).serializeArray();
                var data_form = {};
                $.each(element_form, function(key,val){
                    data_form[val.name] = val.value;
                });
                data_form['last_message'] = $('ul.ticket-messages li:first div.message_ticket').data('message');
                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    dataType: "html",
                    data: data_form,
                    success: function(response){      
                        var result = JSON.parse(response);
                        $.each(result.ticket_messages, function(key, value){     
                            var message_class = '';                       
                            if(value.author_id == result.auth_user){
                                message_class = 'user-message-right';
                            }else{
                                message_class = 'user-message-left';
                            }
                            $('.ticket-messages').prepend(
                                '<li>'+
                                '<div data-message="'+value.ticket_id+'" class="message_ticket '+message_class+'">'+
                                '<b>'+value.name+'</b>'+
                                '<div>'+value.message+'</div>'+
                                '<div>'+value.created_at+'</div>'+
                                '</div>'+
                                '</li>'
                            );
                        });   
                        demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', result.success, 2);
                        $('#form-add-message input[type="text"]').val('');
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

            function newMessage(message) {
                $.ajax({
                    url: "{{route('add-new-message')}}",
                    type: "POST",
                    dataType: "html",
                    data: {
                        'message': message,
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response){
                        var result = JSON.parse(response);
                        $.each(result.ticket_messages, function(key, value){     
                            var message_class = '';                       
                            if(value.author_id == result.auth_user){
                                message_class = 'user-message-right';
                            }else{
                                message_class = 'user-message-left';
                            }
                            $('.ticket-messages').prepend(
                                '<li>'+
                                '<div data-message="'+value.ticket_id+'" class="message_ticket '+message_class+'">'+
                                '<b>'+value.name+'</b>'+
                                '<div>'+value.message+'</div>'+
                                '<div>'+value.created_at+'</div>'+
                                '</div>'+
                                '</li>'
                            );
                        }); 
                    },
                    error: function(response){
                        console.log(response);
                    },
                });
            }
            setInterval(function() {
                newMessage($('ul.ticket-messages li:first div.message_ticket').data('message'));
            }, 10000);
        });
    </script>
@endsection