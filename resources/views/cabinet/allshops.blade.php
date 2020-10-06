@extends('layouts.cabinet')

@section('title')
  @lang('view_cabinet.all_shop_title')
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card bootstrap-table">
            <div class="card-header ">
                <h4 class="card-title">@lang('view_cabinet.all_shop_h4')</h4>
                <p class="card-category">@lang('view_cabinet.all_shop_description')</p>
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
                                  <div class="th-inner sortable ">
                                    <div>@lang('view_cabinet.all_shop_name')</div>
                                    <div>@lang('view_cabinet.all_shop_seller') / @lang('view_cabinet.all_shop_category')</div>
                                  </div>
                                  <div class="fht-cell"></div>
                                </th>
                                {{-- <th style="" data-field="author">
                                  <div class="th-inner sortable ">@lang('view_cabinet.all_shop_seller')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="author">
                                  <div class="th-inner sortable ">@lang('view_cabinet.all_shop_category')</div>
                                  <div class="fht-cell"></div>
                                </th> --}}
                                <th style="" data-field="author">
                                    <div class="th-inner sortable text-center">@lang('view_cabinet.all_shop_rating')</div>
                                    <div class="fht-cell"></div>
                                  </th>
                                <th style="" data-field="created">
                                  <div class="th-inner sortable">@lang('view_cabinet.all_shop_price') ($)</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="updated">
                                  <div class="th-inner sortable ">@lang('view_cabinet.all_shop_quontity')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="min_profit">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.all_shop_min_profit')</div>
                                  <div class="fht-cell"></div>
                              </th>
                                <th style="" data-field="updated">
                                    <div class="th-inner sortable ">@lang('view_cabinet.all_shop_turnaver')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="updated">
                                    <div class="th-inner sortable ">@lang('view_cabinet.all_shop_profit') ($)</div>
                                    <div class="fht-cell"></div>
                                </th>
                                {{-- <th style="" data-field="updated">
                                    <div class="th-inner sortable ">Последнее редактирование</div>
                                    <div class="fht-cell"></div>
                                </th> --}}
                                <th class="td-actions text-right" style="" data-field="actions">
                                  <div class="th-inner ">@lang('view_cabinet.all_shop_actions')</div>
                                  <div class="fht-cell"></div>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($shops as $shop)
                              <tr data-index="0" 
                                @if (Auth::user()->balance < $shop->minimum_bet)
                                  style="opacity: 0.3;"
                                @endif
                              >                      
                                <td class="text-center" style="">{{$shop->id}}</td>
                                <td style="">

                                  <div style="text-center">{{$shop->title}}</div>
                                  <div style="text-center">{{$shop->seller}} / {{$shop->category}}</div>
                                </td>
                                {{-- <td style="">{{$shop->seller}}</td>
                                <td style="">{{$shop->category}}</td> --}}
                                <td style="">
                                  <div class="sidebar-card-user">
                                      @if($shop->rating >= 1)
                                      <span class="fa fa-star checked"></span>
                                  @else
                                      <span class="fa fa-star"></span>
                                  @endif
                                  @if($shop->rating >= 2)
                                      <span class="fa fa-star checked"></span>
                                  @else
                                      <span class="fa fa-star"></span>
                                  @endif
                                  @if($shop->rating >= 3)
                                      <span class="fa fa-star checked"></span>
                                  @else
                                      <span class="fa fa-star"></span>
                                  @endif
                                  @if($shop->rating >= 4)
                                      <span class="fa fa-star checked"></span>
                                  @else
                                      <span class="fa fa-star"></span>
                                  @endif
                                  @if($shop->rating >= 5)
                                      <span class="fa fa-star checked"></span>
                                  @else
                                      <span class="fa fa-star"></span>
                                  @endif
                                  {{-- {{$shop->rating}} --}}
                                  </div>
                                </td>
                                <td style="">
                                    @lang('view_cabinet.all_shop_purchases'): {{$shop->price}}<br/>
                                    @lang('view_cabinet.all_shop_sales'): {{$shop->selling_price}}
                                </td>
                                <td style="">
                                  @lang('view_cabinet.all_shop_in_stock'): {{$shop->quantity_in_stock}}<br/>
                                  @lang('view_cabinet.all_shop_in_sold'): {{$shop->quantity_sold}}
                                </td>
                                <td style="">
                                  @lang('view_adminpanel.all_shop_investment'): {{$shop->percent}}% @lang('view_adminpanel.for') {{$shop->period_percent}} @lang('view_adminpanel.day')
                                  {{-- <div class="my_grey_line"></div> --}}
                                  {{-- @lang('view_adminpanel.all_shop_referral'): {{$shop->referral_percentage}}% @lang('view_adminpanel.for') {{$shop->period_referral_percentage}} @lang('view_adminpanel.day') --}}
                                </td>  
                                <td style="">
                                  @lang('view_cabinet.all_shop_day'): {{$shop->quantity_per_day}}<br/>
                                  @lang('view_cabinet.all_shop_week'): {{$shop->quantity_per_week}}<br/>
                                  @lang('view_cabinet.all_shop_mount'): {{$shop->quantity_per_month}}
                                </td>
                                <td style="">
                                  @lang('view_cabinet.all_shop_day'): {{$shop->profit_per_day}}<br/>
                                  @lang('view_cabinet.all_shop_week'): {{$shop->profit_per_week}}<br/>
                                  @lang('view_cabinet.all_shop_mount'): {{$shop->profit_per_month}}
                                </td>

                                {{-- <td style="">{{$shop->updated_at}}</td> --}}
                                <td class="td-actions text-right" style="">
                                  @if (Auth::user()->balance >= $shop->minimum_bet)
                                    <a rel="tooltip" title="@lang('view_cabinet.all_shop_investment_shop')" class="btn btn-success btn-link btn-xs modal-test" data-toggle="modal" data-shop-title="{{$shop->title}}" data-shop-id="{{$shop->id}}" href="#">
                                      <i class="fa fa-money"></i>
                                    </a>
                                  @endif
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

<!-- Mini Modal -->
<div class="modal fade modal modal-primary" id="shopModal" tabindex="-1" role="dialog" aria-labelledby="shopModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <div class="modal-profile">
                        <i class="nc-icon nc-money-coins"></i>
                    </div>
                </div>
                <form id="rate_shop" action="{{route('pleace-a-bet')}}" method="POST">
                    <div class="modal-body text-center">
                        <h3 id="title_shop"></h3>
                        <div class="col-md-12 form-group-fields">
                            <div class="form-group">
                                <label for="rate">@lang('view_cabinet.all_shop_you_investment')</label>
                                <input type="number" id="rate" class="form-control" name="rate" placeholder="@lang('view_cabinet.all_shop_you_investment')" min="0.00" max="9999999.00" step="0.01">
                            </div>

                            

                        </div>
                    </div>
                    <div class="modal-footer ">
                        <div class="col align-items-center">
                            <button type="submit" class="btn btn-success btn-wd">@lang('view_cabinet.all_shop_to_invest')</button>
                            <button type="button" class="btn btn-danger btn-wd pull-right" data-dismiss="modal">@lang('view_cabinet.all_shop_closed')</button>
                        </div>
                    </div>
                    <input type="hidden" id="id_shop" name="shop" value="">
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
    <!--  End Modal -->
    
<style>
.alert.alert-danger{
    border-radius: 4px;
    position: relative;
    transition: 0.5s;
}
.modal-test{
  font-size: 45px;
  width: 100%;
  text-align: center;
}
</style>
<script>
    document.addEventListener('DOMContentLoaded', function(){
        $('.modal-test').click(function(){
            $('#rate_shop .form-group-fields .alert.alert-danger').remove();
            $('#rate_shop [type="number"]').removeClass('form-control-error');
            $('#title_shop').text($(this).data('shop-title'));
            $('#id_shop').val($(this).data('shop-id'));
            $('#shopModal').modal('toggle');
        });
        $('#rate_shop [type="number"]').on('focus', function(){
            $(this).removeClass('form-control-error');
        });
        $('#rate_shop').submit(function(e){
            e.preventDefault();
            $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    dataType: "html",
                    data: $(this).serialize(),
                    success: function(response){       
                        $('#shopModal').modal('toggle');  
                        var result = JSON.parse(response);
                        $('#user_balance').text(result.balance);
                        demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', result.success, 2);
                        $('#rate_shop input[type="number"]').val('');
                        $('#rate_shop .form-group-fields .alert.alert-danger').remove();
                    },
                    error: function(response){
                      var result = JSON.parse(response.responseText);
                      $.each(result.error, function(key, value){
                        $('#'+key).addClass('form-control-error');
                        $('#rate_shop .form-group-fields').append("<div class=\"alert alert-danger\"><button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\"><i class=\"nc-icon nc-simple-remove\"></i></button><span>"+value+"</span></div>");
                      });
                    },
                });
        });
    });
</script>

@endsection