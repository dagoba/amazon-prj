@extends('layouts.admin')
@section('title')
  @lang('view_adminpanel.closed_shops_title')
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card bootstrap-table">
            <div class="card-header ">
                <h4 class="card-title">@lang('view_adminpanel.closed_shops_h4')</h4>
                <p class="card-category">@lang('view_adminpanel.closed_shops_description')</p>
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
                                  <div class="th-inner sortable ">@lang('view_adminpanel.all_shop_name')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="seller">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.all_shop_seller')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="category">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.all_shop_category')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="rating">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.all_shop_rating')</div>
                                    <div class="fht-cell"></div>
                                  </th>
                                <th style="" data-field="price">
                                  <div class="th-inner sortable">@lang('view_adminpanel.all_shop_price') ($)</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="quantity">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.all_shop_quantity')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="min_balance">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.all_shop_min_balance')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="min_rate">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.all_shop_min_rate')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="min_profit">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.all_shop_min_profit')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="turnover">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.all_shop_turnover')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="profit">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.all_shop_profit') ($)</div>
                                    <div class="fht-cell"></div>
                                </th>
                                {{-- <th style="" data-field="updated">
                                    <div class="th-inner sortable ">Последнее редактирование</div>
                                    <div class="fht-cell"></div>
                                </th> --}}
                                <th class="td-actions text-right" style="" data-field="actions">
                                  <div class="th-inner ">@lang('view_adminpanel.all_shop_actions')</div>
                                  <div class="fht-cell"></div>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($shops as $shop)
                              <tr data-index="0">                      
                                <td class="text-center" style="">{{$shop->id}}</td>
                                <td style="">{{$shop->title}}</td>
                                <td style="">{{$shop->seller}}</td>
                                <td style="">{{$shop->category}}</td>
                                <td style="">{{$shop->rating}}</td>
                                <td style="">
                                  @lang('view_adminpanel.all_shop_purchases'): {{$shop->price}}<br/>
                                  @lang('view_adminpanel.all_shop_sales'): {{$shop->selling_price}}
                                </td>
                                <td style="">
                                  @lang('view_adminpanel.all_shop_in_stock'): {{$shop->quantity_in_stock}}<br/>
                                  @lang('view_adminpanel.all_shop_in_sales'): {{$shop->quantity_sold}}
                                </td>
                                <td style="">{{$shop->minimum_balance}}</td>
                                <td style="">{{$shop->minimum_bet}}</td>

                                <td style="">
                                  @lang('view_adminpanel.all_shop_investment'): {{$shop->percent}}<br/>
                                  @lang('view_adminpanel.all_shop_referral'): {{$shop->referral_percentage}}
                                </td>   
                                <td style="">
                                  @lang('view_adminpanel.all_shop_day'): {{$shop->quantity_per_day}}<br/>
                                  @lang('view_adminpanel.all_shop_week'): {{$shop->quantity_per_week}}<br/>
                                  @lang('view_adminpanel.all_shop_month'): {{$shop->quantity_per_month}}
                                </td>
                                <td style="">
                                  @lang('view_adminpanel.all_shop_day'): {{$shop->profit_per_day}}<br/>
                                  @lang('view_adminpanel.all_shop_week'): {{$shop->profit_per_week}}<br/>
                                  @lang('view_adminpanel.all_shop_month'): {{$shop->profit_per_month}}
                                </td>

                                {{-- <td style="">{{$shop->updated_at}}</td> --}}
                                <td class="td-actions text-right" style="">
                                    <a rel="tooltip" title="@lang('view_adminpanel.closed_shops_activate')" class="btn btn-link btn-success btn-xs manage_shop" href="{{ route('activate-shops')}}" data-shop="{{$shop->id}}">
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
                          {{ $shops->links() }}
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
        $('a.manage_shop').click(function(e){
            e.preventDefault();
            var action = $(this); 
            $.ajax({
                url: $(this).attr('href'),
                type: "POST",
                dataType: "html",
                data: {
                  'shop': $(this).data('shop'),
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
