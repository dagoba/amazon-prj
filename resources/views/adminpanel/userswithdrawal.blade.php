@extends('layouts.admin')

@section('title')
 @lang('view_adminpanel.user_withdrawal_title')
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="card bootstrap-table">
                <div class="card-header ">
                    <h4 class="card-title">@lang('view_adminpanel.user_withdrawal_h4')</h4>
                    <p class="card-category">@lang('view_adminpanel.user_withdrawal_description')</p>
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
                                        <div class="th-inner sortable ">@lang('view_adminpanel.user_withdrawal_req')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                      <div class="th-inner sortable ">@lang('view_adminpanel.user_withdrawal_comment')</div>
                                      <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                        <div class="th-inner sortable ">@lang('view_adminpanel.user_deposit_stat')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                        <div class="th-inner sortable ">@lang('view_adminpanel.user_withdrawal_operator')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th style="" data-field="author">
                                        <div class="th-inner sortable ">@lang('view_adminpanel.user_deposit_date')</div>
                                        <div class="fht-cell"></div>
                                    </th>
                                    <th class="td-actions text-right" style="" data-field="actions">
                                      <div class="th-inner ">@lang('view_adminpanel.all_user_actions')</div>
                                      <div class="fht-cell"></div>
                                    </th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($payment_withdrawals as $payment_withdrawal)
                                  <tr data-index="0">                      
                                    <td class="text-center" style="">{{$payment_withdrawal->id}}</td>
                                    <td style="">
                                      <a href="{{url('/admin/user/'.$payment_withdrawal->user_id.'/balance')}}">{{$payment_withdrawal->user_name}}</a>
                                    </td>
                                    <td style="">{{$payment_withdrawal->description}}</td>
                                    <td style="">{{$payment_withdrawal->amount}}</td>
                                    <td style="">{{$payment_withdrawal->system_title}}</td>
                                    <td style="">{{$payment_withdrawal->requisites}}</td>
                                    <td style="">{{$payment_withdrawal->user_comment}}</td>
                                    <td id="status_{{$payment_withdrawal->id}}" style="">
                                      <span class="
                                      @if($payment_withdrawal->status == 1)
                                        btn-info
                                      @elseif($payment_withdrawal->status == 2)
                                        btn-success
                                      @elseif($payment_withdrawal->status == 3)
                                        btn-warning
                                      @elseif($payment_withdrawal->status == 4)
                                        btn-danger
                                      @elseif($payment_withdrawal->status == 5)
                                        btn-secondary
                                      @endif
                                        btn-sm
                                      ">
                                        @if(LaravelLocalization::getCurrentLocale() == 'en')
                                          {{$payment_withdrawal->status_en}}
                                        @else
                                          {{$payment_withdrawal->status_ru}}
                                        @endif
                                      </span>
                                    </td>
                                    <td id="operator_name_{{$payment_withdrawal->id}}" style="">{{$payment_withdrawal->operator_name}}</td>
                                    <td style="">{{$payment_withdrawal->created_at}}</td>
                                    <td id="actions_{{$payment_withdrawal->id}}" class="td-actions text-right" style="">
                                      @if($payment_withdrawal->status == 1)
                                      <a rel="tooltip" title="@lang('view_adminpanel.user_withdrawal_confirm')" data-toggle="modal" class="btn btn-link btn-success btn-xs modal_operation" href="#" data-withdrawal-title="@lang('view_adminpanel.user_withdrawal_confirm_operation')" data-withdrawal-operation="confirm" data-withdrawal-id="{{$payment_withdrawal->id}}">
                                        <i class="fa fa-plus"></i>
                                      </a>
                                      <a rel="tooltip" title="@lang('view_adminpanel.user_withdrawal_closed')" data-toggle="modal" class="btn btn-link btn-danger btn-xs modal_operation" href="#" data-withdrawal-title="@lang('view_adminpanel.user_withdrawal_closed_operation')" data-withdrawal-operation="closed" data-withdrawal-id="{{$payment_withdrawal->id}}">
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
                              {{ $payment_withdrawals->links() }}
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
  <div class="modal fade modal modal-primary" id="withdrawalModal" tabindex="-1" role="dialog" aria-labelledby="withdrawalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header justify-content-center">
                <div class="modal-profile">
                    <i class="nc-icon nc-money-coins"></i>
                </div>
            </div>
            <form id="users_withdrawal" action="{{route('users-withdrawal')}}" method="POST">
                <div class="modal-body text-center">
                    <h3 id="title_users_withdrawal"></h3>
                    <div class="col-md-12 form-group-fields">
                        <div class="form-group">
                            <label for="comment" id="title_operation"></label>
                            <input type="text" id="comment" class="form-control" name="comment" placeholder="@lang('view_adminpanel.user_withdrawal_operation_comment')">
                        </div>                   
                    </div>
                </div>
                <div class="modal-footer ">
                    <div class="col align-items-center">
                        <button type="submit" class="btn btn-success btn-wd">@lang('view_adminpanel.user_withdrawal_submit')</button>
                        <button type="button" class="btn btn-danger btn-wd pull-right" data-dismiss="modal">@lang('view_adminpanel.user_withdrawal_close')</button>
                    </div>
                </div>
                <input type="hidden" id="withdrawa_id" name="withdrawa_id" value="">
                <input type="hidden" id="withdrawa_operation" name="withdrawa_operation" value=""/>
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
</style>

<script>
    document.addEventListener('DOMContentLoaded', function(){
        $('.modal_operation').click(function(){
          $('#comment').val('');
          $('#title_users_withdrawal').text($(this).data('withdrawal-title'));
          $('#withdrawa_id').val($(this).data('withdrawal-id'));
          $('#withdrawa_operation').val($(this).data('withdrawal-operation'));
          $('#withdrawalModal').modal('toggle');
        });
        $('#users_withdrawal [type="text"]').on('focus', function(){
            $(this).removeClass('form-control-error');
        });
        $('#users_withdrawal').submit(function(e){
            e.preventDefault();
            $.ajax({
                    url: $(this).attr('action'),
                    type: "POST",
                    dataType: "html",
                    data: $(this).serialize(),
                    success: function(response){    
                        $('#withdrawalModal').modal('toggle');       
                        var result = JSON.parse(response);
                        var status_class = '';
                        if(result.status_id == 1){
                          status_class = 'btn-info';
                        }else if(result.status_id == 2){
                          status_class = 'btn-success';
                        }else if(result.status_id == 3){
                          status_class = 'btn-warning';
                        }else if(result.status_id == 4){
                          status_class = 'btn-danger';
                        }else if(result.status_id == 5){
                          status_class = 'btn-secondary';
                        } 
                        $('#status_'+result.withdrawa_id).html('<span class="btn-sm '+status_class+'">'+result.status+'</span>');
                        $('#operator_name_'+result.withdrawa_id).text(result.operator);
                        $('#actions_'+result.withdrawa_id).children().hide(200);
                        demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', result.success, 2);         
                    },
                    error: function(response){
                      var result = JSON.parse(response.responseText);
                      $.each(result.error, function(key, value){
                        $('#'+key).addClass('form-control-error');
                        $('#users_withdrawal .form-group-fields').append("<div class=\"alert alert-danger\"><button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\"><i class=\"nc-icon nc-simple-remove\"></i></button><span>"+value+"</span></div>");
                      });
                    },
                });
        });
    });
  </script>
@endsection