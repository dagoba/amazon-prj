@extends('layouts.admin')
@section('title')
 @lang('view_adminpanel.closed_tickets_title')
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
                                <th style="" data-field="author">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.all_tickets_support')</div>
                                    <div class="fht-cell"></div>
                                  </th>
                                <th style="" data-field="created">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.all_tickets_created')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="updated">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.closed_tickets_updated')</div>
                                  <div class="fht-cell"></div>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($tickets as $ticket)
                              <tr data-index="0">
                                <td class="text-center" style="">{{$ticket->id}}</td>
                                <td style="">{{$ticket->theme}}</td>
                                <td style="">{{$ticket->user_name}}</td>
                                <td style="">{{$ticket->support_name}}</td>
                                <td style="">{{$ticket->created_at}}</td>
                                <td style="">{{$ticket->updated_at}}</td>
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
@endsection
