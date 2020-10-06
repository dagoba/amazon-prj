@extends('layouts.admin')
@section('title')
  @lang('view_adminpanel.all_users_shops_title')
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card bootstrap-table">
            <div class="card-header ">
                <h4 class="card-title">@lang('view_adminpanel.all_users_shops_h4') "{{$shop->title}}"</h4>
                <p class="card-category">@lang('view_adminpanel.all_users_shops_description')</p>
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
                                  <div class="th-inner sortable ">@lang('view_adminpanel.all_users_shops_name')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="author">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.all_user_shops_attachment')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="author">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.all_user_shops_all_sum')</div>
                                    <div class="fht-cell"></div>
                                  </th>
                                <th style="" data-field="author">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.all_user_shops_last_charge')</div>
                                  <div class="fht-cell"></div>
                                </th>                                
                                <th style="" data-field="updated">
                                    <div class="th-inner sortable text-right">@lang('view_adminpanel.all_user_shops_last_date')</div>
                                    <div class="fht-cell"></div>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($users as $user)
                              <tr data-index="0">                      
                                <td class="text-center" style="">{{$user->id}}</td>
                                <td style=""><a href="{{url('/admin/user/'.$user->user_id.'/balance')}}">{{$user->name}}</a></td>
                                <td style="">{{$user->cost}}</td>
                                <td style="">{{$user->profit_cost}}</td>
                                <td style="">{{$user->last_profit_cost}}</td>
                                <td style="" class="text-right">{{$user->last_profit_created_at}}</td>  
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
@endsection
