@extends('layouts.admin')
@section('title')
  @lang('view_adminpanel.closed_users_title')
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card bootstrap-table">
            <div class="card-header ">
                <h4 class="card-title">@lang('view_adminpanel.closed_users_h4')</h4>
                <p class="card-category">@lang('view_adminpanel.closed_users_description')</p>
            </div>
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
                                  <div class="th-inner sortable ">@lang('view_adminpanel.all_user_name')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="author">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.all_user_mail')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="author">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.all_user_group')</div>
                                    <div class="fht-cell"></div>
                                  </th>
                                <th style="" data-field="author">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.all_user_balance')</div>
                                  <div class="fht-cell"></div>
                                </th>                                
                                <th style="" data-field="updated">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.all_user_registration')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th class="td-actions text-right" style="" data-field="actions">
                                  <div class="th-inner ">@lang('view_adminpanel.all_user_actions')</div>
                                  <div class="fht-cell"></div>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($users as $user)
                              <tr data-index="0">                      
                                <td class="text-center" style="">{{$user->id}}</td>
                                <td style="">{{$user->name}}</td>
                                <td style="">{{$user->email}}</td>
                                <td style="">{{$user->group_ru}}</td>
                                <td style="">{{$user->balance}}</td>
                                <td style="">{{$user->created_at}}</td>                                
                                <td class="td-actions text-right" style="">
                                  <a rel="tooltip"title="@lang('view_adminpanel.closed_users_activate')" class="btn btn-link btn-success btn-xs manage_user" href="{{ route('activate-user')}}" data-user="{{$user->id}}">
                                    <i class="fa fa-plus"></i>
                                  </a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                      </div>
                      <div class="fixed-table-pagination">
                        <div class="pull-right pagination">
                          {{ $users->links() }}
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
        $('a.manage_user').click(function(e){
            e.preventDefault();
            var action = $(this); 
            $.ajax({
                url: $(this).attr('href'),
                type: "POST",
                dataType: "html",
                data: {
                  'user': $(this).data('user'),
                  '_token': '{{ csrf_token() }}'
                },
                success: function(response){     
                  action.parents('tr').hide(200);
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
