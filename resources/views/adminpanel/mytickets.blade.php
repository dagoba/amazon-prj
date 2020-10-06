@extends('layouts.admin')
@section('title')
  @lang('view_adminpanel.my_tickets_title')
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card bootstrap-table">
            <div class="card-body table-full-width">                
                <div class="bootstrap-table">
                  <div class="fixed-table-toolbar">
                    <div class="fixed-table-container">
                      <div class="fixed-table-body">
                        <table id="bootstrap-table" class="table table-hover" style="margin-top: 0px;">
                            <thead style="">
                              <tr>
                                <th class="bs-checkbox " style="width: 36px; " data-field="id">
                                  <div class="th-inner ">ID</div>
                                </th>
                                <th style="" data-field="theme">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.all_tickets_theme')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="author">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.all_tickets_author')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="created">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.all_tickets_status')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="created">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.all_tickets_created')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                {{-- <th style="" data-field="updated">
                                  <div class="th-inner sortable ">Updated</div>
                                  <div class="fht-cell"></div>
                                </th> --}}
                                <th class="td-actions text-right" style="" data-field="actions">
                                  <div class="th-inner ">@lang('view_adminpanel.all_tickets_actions')</div>
                                  <div class="fht-cell"></div>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($tickets as $ticket)
                              <tr data-index="0">
                                <td class="text-center" style="">{{$ticket->id}}</td>
                                <td style="">
                                  <a title="message" href="{{url('admin/message-tikets')}}/{{$ticket->id}}">
                                    {{$ticket->theme}}
                                  </a>
                                </td>
                                <td style="">{{$ticket->name}}</td>
                                <td>
                                  @if($ticket->status == 1)
                                    @lang('view_adminpanel.all_tickets_status_1')
                                  @elseif($ticket->status == 2)
                                    @lang('view_adminpanel.all_tickets_status_2')
                                  @endif
                                </td>
                                <td style="">{{$ticket->created_at}}</td>
                                {{-- <td style="">{{$ticket->updated_at}}</td> --}}
                                <td class="td-actions text-right" style="">
                                  <a rel="tooltip" title="@lang('view_adminpanel.all_tickets_message')" class="btn btn-info btn-link btn-xs" href="{{url('admin/message-tikets')}}/{{$ticket->id}}">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <a rel="tooltip" data-action="remove" title="@lang('view_adminpanel.all_tickets_remove')" class="btn btn-link btn-danger table-action admin-new-tickets" href="{{route('admin-new-tickets')}}" data-theme="{{$ticket->id}}">
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
                'action': $(this).data('action'),
                'theme': $(this).data('theme'),
                '_token': '{{ csrf_token() }}'
              },
              success: function(response){  
                if(action.data('action') === 'remove') {
                  action.parents('tr').hide(200);
                } else if(action.data('action') === 'add') {
                  action.hide(200);
                }                
                demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', response, 2);
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
