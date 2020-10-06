@extends('layouts.cabinet')

@section('title')
  @lang('view_cabinet.yuor_assets_title')
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card bootstrap-table">
                <div class="card-header ">
                    <h4 class="card-title">@lang('view_cabinet.yuor_assets_title')</h4>
                    <p class="card-category">@lang('view_cabinet.yuor_assets_description')</p>
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
                                      <div class="th-inner sortable ">@lang('view_cabinet.all_shop_name')</div>
                                      <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                      <div class="th-inner sortable ">@lang('view_cabinet.all_shop_seller')</div>
                                      <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                      <div class="th-inner sortable ">@lang('view_cabinet.all_shop_category')</div>
                                      <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                        <div class="th-inner sortable ">@lang('view_cabinet.all_shop_rating')</div>
                                        <div class="fht-cell"></div>
                                      </th>
                                    <th style="" data-field="min_profit">
                                        <div class="th-inner sortable ">@lang('view_adminpanel.all_shop_min_profit')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="updated">
                                        <div class="th-inner sortable ">@lang('view_cabinet.all_shop_you_investment') ($)</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="updated">
                                        <div class="th-inner sortable "></div>
                                        <div class="fht-cell">@lang('view_cabinet.yuor_assets_date')</div>
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($user_rates as $user_rate)
                                  <tr data-index="0">                      
                                    <td class="text-center" style="">{{$user_rate->id}}</td>
                                    <td style="">{{$user_rate->title}}</td>
                                    <td style="">{{$user_rate->seller}}</td>
                                    <td style="">{{$user_rate->category}}</td>
                                    <td style="">{{$user_rate->rating}}</td>
                                    <td style="">
                                      {{$user_rate->percent}}% @lang('view_adminpanel.for') {{$user_rate->period_percent}} @lang('view_adminpanel.day')
                                    </td>  
                                    <td style="text-right">{{$user_rate->cost}}</td>
                                    <td style="text-right">{{$user_rate->created_at}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                          </div>
                          <div class="fixed-table-pagination">
                            <div class="pull-right pagination">
                              {{ $user_rates->links() }}
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