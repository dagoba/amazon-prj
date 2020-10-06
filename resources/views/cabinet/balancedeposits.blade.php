@extends('layouts.cabinet')

@section('title')
 @lang('view_cabinet.balance_deposits_title')
@endsection

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">@lang('view_cabinet.balance_deposits_h4')</h4>
            </div>
            <div class="card-body" id="btc-area">
                <form id="form-deposit" action="{{route('balance-deposit')}}" method="POST">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="payment_system" class="control-label">@lang('view_cabinet.balance_deposits_pay_sys')</label>
                                
                                    <div class="form-group ">
                                        <select class="form-control" id="payment_system" name="payment_system">
                                            @foreach ($payment_systems as $payment_system)
                                                <option value="{{$payment_system->key}}">{{$payment_system->title}}</option>
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
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="@lang('view_cabinet.balance_refill')" min="0.00" max="9999999.00" step="0.01">
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
                    <h4 class="card-title">@lang('view_cabinet.balance_requesrs_h4')</h4>
                    <p class="card-category">@lang('view_cabinet.balance_requesrs_des')</p>
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
                                        <div class="th-inner sortable ">@lang('view_cabinet.balance_deposits_pay_sys')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                        <div class="th-inner sortable ">@lang('view_cabinet.active_tickets_status')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th class="td-actions text-right" style="" data-field="actions">
                                      <div class="th-inner ">@lang('view_cabinet.active_tickets_actions')</div>
                                      <div class="fht-cell"></div>
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($payment_deposits as $payment_deposit)
                                  <tr data-index="0">                      
                                    <td class="text-center" style="">{{$payment_deposit->id}}</td>
                                    <td style="">{{$payment_deposit->description}}</td>
                                    <td style="">{{$payment_deposit->amount}}</td>
                                    <td style="">{{$payment_deposit->system_title}}</td>
                                    <td style="">
                                        <span class="
                                        @if($payment_deposit->status == 1)
                                          btn-info
                                        @elseif($payment_deposit->status == 2)
                                          btn-success
                                        @elseif($payment_deposit->status == 3)
                                          btn-warning
                                        @elseif($payment_deposit->status == 4)
                                          btn-danger
                                        @elseif($payment_deposit->status == 5)
                                          btn-secondary
                                        @endif
                                          btn-sm
                                        ">
                                      @if(LaravelLocalization::getCurrentLocale() == 'en')
                                        {{$payment_deposit->status_en}}
                                      @else
                                        {{$payment_deposit->status_ru}}
                                      @endif
                                        </span>
                                    </td>
                                    <td class="text-right" style="">{{$payment_deposit->created_at}}</td>
                                  </tr>
                                  @endforeach
                                </tbody>
                            </table>
                          </div>
                          <div class="fixed-table-pagination">
                            <div class="pull-right pagination">
                              {{ $payment_deposits->links() }}
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
          $('#form-deposit input[type="number"]').on('focus', function(){
            $(this).removeClass('form-control-error');
          });
            $('#form-deposit').submit(function(e){
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    dataType: "html",
                    data: $(this).serialize(),
                    success: function(response){   
                      var result = JSON.parse(response);   
                      demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', result.success, 2);
                      $('#form-deposit input[type="number"]').val('');

                      if(result.payment_system == 'perfectmoney'){
                        var form = document.createElement("form");
                        $(form).attr("action", "https://perfectmoney.is/api/step1.asp").attr("method", "post");
                        $.each(result.payment_data, function(key,val){
                          $(form).append("<input name='"+key+"' type='hidden' value='"+val+"' />");
                        });
                        $(document.body).append(form);
                        form.submit();
                      }else if(result.payment_system == 'paypal'){
                        var form = document.createElement("form");
                        $(form).attr("action", "https://www.paypal.com/cgi-bin/webscr").attr("method", "post");
                        $.each(result.payment_data, function(key,val){
                          $(form).append("<input name='"+key+"' type='hidden' value='"+val+"' />");
                        });
                        $(document.body).append(form);
                        form.submit();
                      }else if(result.payment_system == 'payeer'){
                        var form = document.createElement("form");
                        $(form).attr("action", "https://payeer.com/merchant/").attr("method", "post");
                        $.each(result.payment_data, function(key,val){
                          $(form).append("<input name='"+key+"' type='hidden' value='"+val+"' />");
                        });
                        $(document.body).append(form);
                        form.submit();
                      }else if(result.payment_system == 'advcash'){
                        var form = document.createElement("form");
                        $(form).attr("action", "https://wallet.advcash.com/sci/").attr("method", "post");
                        $.each(result.payment_data, function(key,val){
                          $(form).append("<input name='"+key+"' type='hidden' value='"+val+"' />");
                        });
                        $(document.body).append(form);
                        form.submit();
                      }else if(result.payment_system == 'btc'){
                          $('#btc-area').html('');
                          $('#btc-area').append(result.payment_data.description);
                          $('#btc-area').append('<p class="text-center">Ваш QRCode для пополнения баланса</p>');
                          $('#btc-area').append('<img class="rounded mx-auto d-block" src="https://chart.apis.google.com/chart?chs=250x250&cht=qr&chld=L|0&chl=bitcoin%3A'+result.payment_data.address+'">');
                          $('#btc-area').append('<h4 class="text-center">АДРЕС КОШЕЛЬКА</h4>');
                          $('#btc-area').append('<a class="text-center" href="bitcoin:'+result.payment_data.address+'" style="font-weight: 900 !important;display: inherit;">' + result.payment_data.address + '</a>');
                      }
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