@extends('layouts.cabinet')

@section('title')
  @lang('view_cabinet.all_shop_balance_title')
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card bootstrap-table">
                <div class="card-header ">
             
                    <h4 class="card-title" style="display: inline-block;">@lang('view_cabinet.all_shop_balance_title')</h4>: $<span id="user_balance">{{Auth::user()->balance}}
                    <a class="btn btn-orang" href="{{route('balance-deposit')}}">@lang('view_layouts.cabinet_top_up')</a>
                    <a class="btn btn-grad" href="{{route('balance-withdrawal')}}">@lang('view_layouts.cabinet_withdraw')</a>

                    <p class="card-category">@lang('view_cabinet.all_shop_balance_description')</p>
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
                                      <div class="th-inner sortable ">@lang('view_cabinet.all_shop_balance_des')</div>
                                      <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                      <div class="th-inner sortable ">@lang('view_cabinet.all_shop_balance_sum')</div>
                                      <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                      <div class="th-inner sortable ">@lang('view_cabinet.all_shop_balance_before')</div>
                                      <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                        <div class="th-inner sortable ">@lang('view_cabinet.all_shop_balance_after')</div>
                                        <div class="fht-cell"></div>
                                      </th>
                                    <th class="td-actions text-right" style="" data-field="actions">
                                      <div class="th-inner ">@lang('view_cabinet.all_shop_balance_date')</div>
                                      <div class="fht-cell"></div>
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($transactions as $transaction)
                                  <tr data-index="0">                      
                                    <td class="text-center" style="">{{$transaction->id}}</td>
                                    <td style="">{{$transaction->description}}</td>
                                    <td style="">{{$transaction->cost}}</td>
                                    <td style="">{{$transaction->amount_up}}</td>
                                    <td style="">{{$transaction->amount_after}}</td>
                                    <td class="text-right" style="">{{$transaction->created_at}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                          </div>
                          <div class="fixed-table-pagination">
                            <div class="pull-right pagination">
                              {{ $transactions->links() }}
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