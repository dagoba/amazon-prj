@extends('layouts.cabinet')

@section('title')
 @lang('view_cabinet.balance_withdrawal_title')
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">@lang('view_cabinet.balance_withdrawal_h4')</h4>
            </div>
            <div class="card-body">
                <form id="form-withdrawal" action="{{route('balance-withdrawal')}}" method="POST">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="payment_system" class="control-label">@lang('view_cabinet.balance_deposits_pay_sys')</label>
                                
                                    <div class="form-group ">
                                        <select class="form-control" id="payment_system" name="payment_system">
                                            @foreach ($payment_systems as $payment_system)
                                                <option value="{{$payment_system->id}}">{{$payment_system->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="amount">@lang('view_cabinet.balance_deposits_sum')</label>
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="Withdrawal amount" min="0.00" max="9999999.00" step="0.01">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="requisites">@lang('view_cabinet.balance_withdrawal_requsites')</label>
                            <textarea rows="2" cols="80" class="form-control" id="requisites" name="requisites" placeholder="@lang('view_cabinet.balance_withdrawal_requsites_placeholder')"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="comment">@lang('view_cabinet.balance_withdrawal_comment')</label>
                            <textarea rows="2" cols="80" class="form-control" id="comment" name="comment" placeholder="@lang('view_cabinet.balance_withdrawal_comment_placeholder')"></textarea>
                            </div>
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-submit btn-fill pull-right">@lang('view_cabinet.balance_submit')</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

        <div class="col-md-12">
            <div class="card bootstrap-table">
                <div class="card-header ">
                    <h4 class="card-title">@lang('view_cabinet.balance_withdrawal_title')</h4>
                    <p class="card-category">@lang('view_cabinet.balance_withdrawal_requests_des')</p>
                    <p>
                        @foreach ($statuse as $status)
                          @if($status->id == 1)
                            <span rel="tooltip" title="@lang('view_adminpanel.stat_des_1')" class="btn-info btn-sm">{{$status->title}}</span>
                          @elseif($status->id == 2)
                            <span rel="tooltip" title="@lang('view_adminpanel.stat_des_2')" class="btn-success btn-sm">{{$status->title}}</span>
                          @elseif($status->id == 3)
                            <span rel="tooltip" title="@lang('view_adminpanel.stat_des_3')" class="btn-warning btn-sm">{{$status->title}}</span>
                          @elseif($status->id == 4)
                            <span rel="tooltip" title="@lang('view_adminpanel.stat_des_4')" class="btn-danger btn-sm">{{$status->title}}</span>
                          @elseif($status->id == 5)
                            <span rel="tooltip" title="@lang('view_adminpanel.stat_des_5')" class="btn-secondary btn-sm">{{$status->title}}</span>
                          @endif
                        @endforeach
                      </p>
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
                                      <div class="th-inner sortable ">@lang('view_cabinet.balance_withdrawal_requsites')</div>
                                      <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                        <div class="th-inner sortable ">@lang('view_cabinet.balance_deposits_pay_sys')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                        <div class="th-inner sortable ">@lang('view_cabinet.active_tickets_status')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                      <div class="th-inner sortable ">@lang('view_cabinet.balance_withdrawal_comment')</div>
                                      <div class="fht-cell"></div>
                                    </th>
                                    <th class="td-actions text-right" style="" data-field="actions">
                                      <div class="th-inner ">@lang('view_cabinet.all_shop_balance_date')</div>
                                      <div class="fht-cell"></div>
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($payment_withdrewals as $payment_withdrewal)
                                  <tr data-index="0">                      
                                    <td class="text-center" style="">{{$payment_withdrewal->id}}</td>
                                    <td style="">{{$payment_withdrewal->description}}</td>
                                    <td style="">{{$payment_withdrewal->amount}}</td>
                                    <td style="">{{$payment_withdrewal->requisites}}</td>
                                    <td style="">{{$payment_withdrewal->system_title}}</td>
                                    <td style="">
                                        <span class="
                                        @if($payment_withdrewal->status == 1)
                                          btn-info
                                        @elseif($payment_withdrewal->status == 2)
                                          btn-success
                                        @elseif($payment_withdrewal->status == 3)
                                          btn-warning
                                        @elseif($payment_withdrewal->status == 4)
                                          btn-danger
                                        @elseif($payment_withdrewal->status == 5)
                                          btn-secondary
                                        @endif
                                          btn-sm
                                        ">
                                      @if(LaravelLocalization::getCurrentLocale() == 'en')
                                        {{$payment_withdrewal->status_en}}
                                      @else
                                        {{$payment_withdrewal->status_ru}}
                                      @endif
                                        </span>
                                    </td>
                                    <td>{{$payment_withdrewal->operator_comment}}</td>
                                    <td class="text-right" style="">{{$payment_withdrewal->created_at}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                          </div>
                          <div class="fixed-table-pagination">
                            <div class="pull-right pagination">
                              {{ $payment_withdrewals->links() }}
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
          $('#form-withdrawal input[type="number"], #form-withdrawal textarea').on('focus', function(){
            $(this).removeClass('form-control-error');
          });
            $('#form-withdrawal').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    dataType: "html",
                    data: $(this).serialize(),
                    success: function(response){   
                      var result = JSON.parse(response);      
                      $('#user_balance').text(result.balance);         
                      demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', result.success, 2);
                      $('#form-withdrawal input[type="number"], #form-withdrawal textarea').val('');
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