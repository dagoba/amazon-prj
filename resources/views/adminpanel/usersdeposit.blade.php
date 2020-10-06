@extends('layouts.admin')

@section('title')
 @lang('view_adminpanel.user_deposit_title')
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card bootstrap-table">
                <div class="card-header ">
                    <h4 class="card-title">@lang('view_adminpanel.user_deposit_h4')</h4>
                    <p class="card-category">@lang('view_adminpanel.user_deposit_description')</p>
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
                                        <div class="th-inner sortable ">@lang('view_adminpanel.user_deposit_user')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="theme">
                                      <div class="th-inner sortable ">@lang('view_adminpanel.user_deposit_des')</div>
                                      <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                      <div class="th-inner sortable ">@lang('view_adminpanel.user_deposit_sum')</div>
                                      <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                        <div class="th-inner sortable ">@lang('view_adminpanel.user_deposit_pay_sys')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                        <div class="th-inner sortable ">@lang('view_adminpanel.user_deposit_stat')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                        <div class="th-inner sortable ">@lang('view_adminpanel.user_deposit_date')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                      <div class="th-inner sortable ">@lang('view_adminpanel.user_withdrawal_operator')</div>
                                      <div class="fht-cell"></div>
                                    </th>
                                    <th class="td-actions text-right" style="" data-field="actions">
                                      <div class="th-inner ">@lang('view_adminpanel.all_user_actions')</div>
                                      <div class="fht-cell"></div>
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($payment_deposits as $payment_deposit)
                                  <tr data-index="0">                      
                                    <td class="text-center" style="">{{$payment_deposit->id}}</td>
                                    <td style="">
                                      <a href="{{url('/admin/user/'.$payment_deposit->user_id.'/balance')}}">{{$payment_deposit->user_name}}</a>
                                    </td>
                                    <td style="">{{$payment_deposit->description}}</td>
                                    <td style="">{{$payment_deposit->amount}}</td>
                                    <td style="">{{$payment_deposit->system_title}}</td>
                                    <td id="status_{{$payment_deposit->id}}">
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
                                    <td style="">{{$payment_deposit->created_at}}</td>
                                    <td id="operator_name_{{$payment_deposit->id}}" style="">{{$payment_deposit->operator_name}}</td>
                                    <td id="actions_{{$payment_deposit->id}}" class="td-actions text-right" style="">
                                      @if(!in_array($payment_deposit->status, [2,3,4]))
                                      <a rel="tooltip" title="@lang('view_adminpanel.user_withdrawal_confirm')" data-toggle="modal" class="btn btn-link btn-success btn-xs operation_deposit" href="#" data-deposit-operation="confirm" data-deposit-id="{{$payment_deposit->id}}">
                                        <i class="fa fa-plus"></i>
                                      </a>
                                      <a rel="tooltip" title="@lang('view_adminpanel.user_withdrawal_closed')" data-toggle="modal" class="btn btn-link btn-danger btn-xs operation_deposit" href="#"  data-deposit-operation="closed" data-deposit-id="{{$payment_deposit->id}}">
                                        <i class="fa fa-remove"></i>
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
            $('.operation_deposit').on('click',function(e){
                e.preventDefault();
                var a = $(this);
                $.ajax({
                    url: '{{route("users-deposit")}}',
                    type: "POST",
                    data: {
                      'operation': a.data('deposit-operation'),
                      'deposit_id': a.data('deposit-id'),
                      '_token': '{{ csrf_token() }}'
                    },
                    success: function(response){            
                      demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', response.success, 2);
                      var status_class = '';
                      if(response.status_id == 1){
                        status_class = 'btn-info';
                      }else if(response.status_id == 2){
                        status_class = 'btn-success';
                      }else if(response.status_id == 3){
                        status_class = 'btn-warning';
                      }else if(response.status_id == 4){
                        status_class = 'btn-danger';
                      }else if(response.status_id == 5){
                        status_class = 'btn-secondary';
                      }                      
                      $('#status_'+response.deposit_id).html('<span class="btn-sm '+status_class+'">'+response.status+'</span>');
                      $('#operator_name_'+response.deposit_id).text(response.operator);
                      $('#actions_'+response.deposit_id).html('');
                      $('.tooltip').hide();
                    },
                    error: function(response){ 
                      $.each(response.error, function(key, value){
                        demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', value, 4);
                      });
                    },
                });
            });
        });
    </script>
@endsection