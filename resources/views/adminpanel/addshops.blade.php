@extends('layouts.admin')

@section('title')
    @lang('view_adminpanel.addshop_title')
@endsection

@section('content')

<div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('view_adminpanel.addshop_new_position')</h4>
                </div>
                <div class="card-body">
                    <form id="admin-add-shops" action="{{route('admin-add-shops')}}" method="POST">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title">@lang('view_adminpanel.addshop_name')</label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="@lang('view_adminpanel.addshop_name_placeholder')">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="seller">@lang('view_adminpanel.addshop_seller')</label>
                                    <input type="text" class="form-control" id="seller" name="seller" placeholder="@lang('view_adminpanel.addshop_seller_placeholder')">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="category">@lang('view_adminpanel.addshop_category')</label>
                                    <input type="text" class="form-control" id="category" name="category" placeholder="@lang('view_adminpanel.addshop_category_placeholder')">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="rating">@lang('view_adminpanel.addshop_rating')</label>
                                    <input type="number" class="form-control" id="rating" name="rating" placeholder="@lang('view_adminpanel.addshop_rating_placeholder')" min="0.00" max="5.00" step="0.01">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="price">@lang('view_adminpanel.addshop_price')</label>
                                    <input type="number" class="form-control" id="price" name="price" placeholder="@lang('view_adminpanel.addshop_price')" min="0.01" max="9999999.00" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="selling_price">@lang('view_adminpanel.addshop_selling_price')</label>
                                    <input type="number" class="form-control" id="selling_price" name="selling_price" placeholder="@lang('view_adminpanel.addshop_selling_price')" min="0.01" max="9999999.00" step="0.01">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quantity_in_stock">@lang('view_adminpanel.addshop_quantity_in_stock')</label>
                                    <input type="number" class="form-control" id="quantity_in_stock" name="quantity_in_stock" placeholder="@lang('view_adminpanel.addshop_quantity_in_stock')" min="0" max="9999999" step="1">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="quantity_sold">@lang('view_adminpanel.addshop_quantity_sold')</label>
                                    <input type="number" class="form-control" id="quantity_sold" name="quantity_sold" placeholder="@lang('view_adminpanel.addshop_quantity_sold')" min="0" max="9999999" step="1">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="minimum_balance">@lang('view_adminpanel.addshop_minimum_balance')</label>
                                    <input type="number" class="form-control" id="minimum_balance" name="minimum_balance" placeholder="@lang('view_adminpanel.addshop_minimum_balance')" min="0.00" max="9999999.00" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="minimum_bet">@lang('view_adminpanel.addshop_minimum_bet')</label>
                                    <input type="number" class="form-control" id="minimum_bet" name="minimum_bet" placeholder="@lang('view_adminpanel.addshop_minimum_bet')" min="0.00" max="9999999.00" step="0.01">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="percent">@lang('view_adminpanel.addshop_percent')</label>
                                    <input type="number" class="form-control" id="percent" name="percent" placeholder="@lang('view_adminpanel.addshop_percent')" min="0.00" max="100.00" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="period_percent">@lang('view_adminpanel.addshop_period_percent')</label>
                                    <input type="number" class="form-control" id="period_percent" name="period_percent" placeholder="@lang('view_adminpanel.addshop_period_percent')">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="referral_percentage">@lang('view_adminpanel.addshop_referral_percentage')</label>
                                    <input type="number" class="form-control" id="referral_percentage" name="referral_percentage" placeholder="@lang('view_adminpanel.addshop_referral_percentage')" min="0.00" max="100.00" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="period_referral_percentage">@lang('view_adminpanel.addshop_period_referral_percentage')</label>
                                    <input type="number" class="form-control" id="period_referral_percentage" name="period_referral_percentage" placeholder="@lang('view_adminpanel.addshop_period_referral_percentage')">
                                </div>
                            </div>
                        </div>
       
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="quantity_per_day">@lang('view_adminpanel.addshop_quantity_per_day')</label>
                                    <input type="number" class="form-control" id="quantity_per_day" name="quantity_per_day" placeholder="@lang('view_adminpanel.addshop_quantity_per_day')" min="0" max="9999999" step="1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="quantity_per_week">@lang('view_adminpanel.addshop_quantity_per_week')</label>
                                    <input type="number" class="form-control" id="quantity_per_week" name="quantity_per_week" placeholder="@lang('view_adminpanel.addshop_quantity_per_week')" min="0" max="9999999" step="1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="quantity_per_month">@lang('view_adminpanel.addshop_quantity_per_month')</label>
                                    <input type="number" class="form-control" id="quantity_per_month" name="quantity_per_month" placeholder="@lang('view_adminpanel.addshop_quantity_per_month')" min="0" max="9999999" step="1">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="profit_per_day">@lang('view_adminpanel.addshop_profit_per_day')</label>
                                    <input type="number" class="form-control" id="profit_per_day" name="profit_per_day" placeholder="@lang('view_adminpanel.addshop_profit_per_day')" min="0.00" max="9999999.00" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="profit_per_week">@lang('view_adminpanel.addshop_profit_per_week')</label>
                                    <input type="number" class="form-control" id="profit_per_week" name="profit_per_week" placeholder="@lang('view_adminpanel.addshop_profit_per_week')" min="0.00" max="9999999.00" step="0.01">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="profit_per_month">@lang('view_adminpanel.addshop_profit_per_month')</label>
                                    <input type="number" class="form-control" id="profit_per_month" name="profit_per_month" placeholder="@lang('view_adminpanel.addshop_profit_per_month')" min="0.00" max="9999999.00" step="0.01">
                                </div>
                            </div>
                        </div>

                        {{ csrf_field() }}
                        <button type="submit" class="btn btn-info btn-fill pull-right">@lang('view_adminpanel.addshop_add_position')</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<script>
    document.addEventListener('DOMContentLoaded', function(){ 
          $('#admin-add-shops input[type="text"], #admin-add-shops input[type="number"]').on('focus', function(){
            $(this).removeClass('form-control-error');
          });
            $('#admin-add-shops').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    dataType: "html",
                    data: $(this).serialize(),
                    success: function(response){   
                        var result = JSON.parse(response);            
                        demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', result.success, 2);
                        $('#admin-add-shops input[type="text"], #admin-add-shops input[type="number"]').val('');
                    },
                    error: function(response){
                      var result = JSON.parse(response.responseText);
                      $.each(result.error, function(key, value){
                        $('#'+key).addClass('form-control-error');
                        demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', value, 4);
                      });
                    },
                });
            });
        });
</script>
@endsection
