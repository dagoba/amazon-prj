@extends('layouts.admin')
@section('title')
  @lang('view_adminpanel.all_shop_title')
@endsection
@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card bootstrap-table">
            <div class="card-header ">
                <h4 class="card-title">@lang('view_adminpanel.all_shop_h4')</h4>
                <p class="card-category">@lang('view_adminpanel.all_shop_description')</p>
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
                                    @lang('view_adminpanel.all_shop_purchases'): {{$shop->price}}
                                    <div class="my_grey_line"></div>
                                    @lang('view_adminpanel.all_shop_sales'): {{$shop->selling_price}}
                                </td>
                                <td style="">
                                  @lang('view_adminpanel.all_shop_in_stock'): {{$shop->quantity_in_stock}}
                                  <div class="my_grey_line"></div>
                                  @lang('view_adminpanel.all_shop_in_sales'): {{$shop->quantity_sold}}
                                </td>
                                <td style="">{{$shop->minimum_balance}}</td>
                                <td style="">{{$shop->minimum_bet}}</td>

                                <td style="">
                                  @lang('view_adminpanel.all_shop_investment'): {{$shop->percent}}% @lang('view_adminpanel.for') {{$shop->period_percent}} @lang('view_adminpanel.day')
                                  <div class="my_grey_line"></div>
                                  @lang('view_adminpanel.all_shop_referral'): {{$shop->referral_percentage}}% @lang('view_adminpanel.for') {{$shop->period_referral_percentage}} @lang('view_adminpanel.day')
                                </td>   
                                <td style="">
                                  @lang('view_adminpanel.all_shop_day'): {{$shop->quantity_per_day}}
                                  <div class="my_grey_line"></div>
                                  @lang('view_adminpanel.all_shop_week'): {{$shop->quantity_per_week}}
                                  <div class="my_grey_line"></div>
                                  @lang('view_adminpanel.all_shop_month'): {{$shop->quantity_per_month}}
                                </td>
                                <td style="">
                                  @lang('view_adminpanel.all_shop_day'): {{$shop->profit_per_day}}
                                  <div class="my_grey_line"></div>
                                  @lang('view_adminpanel.all_shop_week'): {{$shop->profit_per_week}}
                                  <div class="my_grey_line"></div>
                                  @lang('view_adminpanel.all_shop_month'): {{$shop->profit_per_month}}
                                </td>

                                {{-- <td style="">{{$shop->updated_at}}</td> --}}
                                <td class="td-actions text-right" style="">
                                  <a href="{{url('/admin/shop/'.$shop->id.'/all-users')}}" rel="tooltip" title="" class="btn btn-success btn-link btn-xs" data-original-title="@lang('view_adminpanel.all_shop_users')">
                                    <i class="fa fa-user"></i>
                                  </a>
                                  <a rel="tooltip" title="@lang('view_adminpanel.all_shop_edit')" class="btn btn-info btn-link btn-xs" href="{{url('admin/edit-shop/'.$shop->id)}}">
                                    <i class="fa fa-edit"></i>
                                  </a>
                                  <a rel="tooltip" data-action="remove" title="@lang('view_adminpanel.all_shop_remove')" class="btn btn-link btn-danger btn-xs admin-edit-shop" href="{{route('admin-closed-shop')}}" data-theme="{{$shop->id}}">
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
      $('a.admin-edit-shop').click(function(e){
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
