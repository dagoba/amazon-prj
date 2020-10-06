@extends('layouts.cabinet')

@section('title')
    @lang('view_cabinet.active_tickets_title')
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
                <div class="card table-with-links">
                    <div class="card-header ">
                        <h4 class="card-title">@lang('view_cabinet.active_tickets_h4')</h4>
                        <p class="card-category">@lang('view_cabinet.active_tickets_description')</p>
                    </div>
                    <div class="card-body table-full-width">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>@lang('view_cabinet.active_tickets_theme')</th>
                                    <th>@lang('view_cabinet.active_tickets_status')</th>
                                    <th class="text-right">@lang('view_cabinet.active_tickets_cteated')</th>
                                    <th class="text-right">@lang('view_cabinet.active_tickets_actions')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                <tr>
                                    <td class="text-center">{{$ticket->id}}</td>
                                    <td><a href="{{route('active-tickets')}}/{{$ticket->id}}">{{$ticket->theme}}</a></td>
                                    <td>
                                        @if($ticket->status == 1)
                                            @lang('view_cabinet.active_tickets_processing')
                                        @elseif($ticket->status == 2)
                                            @lang('view_cabinet.active_tickets_received')
                                        @endif
                                    </td>
                                    <td class="text-right">{{$ticket->created_at}}</td>
                                    <td class="td-actions text-right">
                                        <a rel="tooltip" title="@lang('view_cabinet.active_tickets_message')" class="btn btn-info btn-link btn-xs" href="{{route('active-tickets')}}/{{$ticket->id}}">
                                            <i class="fa fa-edit"></i>
                                        </a>                                   
                                        <a rel="tooltip" data-action="remove" title="@lang('view_cabinet.active_tickets_remove')" class="btn btn-link btn-danger table-action admin-new-tickets" href="{{route('closed-ticket')}}" data-ticket="{{$ticket->id}}">
                                            <i class="fa fa-remove"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="fixed-table-pagination">
                        <div class="pull-right pagination">
                          {{ $tickets->links() }}
                        </div>
                      </div>
                </div>
            </div>
</div>
<script>
        document.addEventListener('DOMContentLoaded', function(){ 
            $('a.admin-new-tickets').click(function(e){
                e.preventDefault();
                var action = $(this);
                $.ajax({
                    url: $(this).attr('href'),
                    type: "POST",
                    dataType: "html",
                    data: {
                        // 'action': $(this).data('action'),
                        'ticket': $(this).data('ticket'),
                        '_token': '{{ csrf_token() }}'
                    },
                    success: function(response){   
                        if(action.data('action') === 'remove') {
                            action.parents('tr').hide(200);
                        }       
                        var result = JSON.parse(response);
                        demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', result.success, 2);
                    },
                    error: function(response){
                      var result = JSON.parse(response.responseText);
                      $.each(result.error, function(key, value){
                        demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', value, 4);
                      });
                    },
                });
            });
        });
    </script>
@endsection