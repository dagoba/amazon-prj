@extends('layouts.admin')
@section('title') 
  @lang('view_adminpanel.user_balance_title')
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">@lang('view_adminpanel.user_balance_h4')</h4>
            </div>
            <div class="card-body">
                <form id="arbitrary_balance_change" action="{{route('arbitrary-balance-change')}}" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="operation" class="control-label">@lang('view_adminpanel.user_balance_operation')</label>
                                
                                    <div class="form-group ">
                                        <select class="form-control" id="operation" name="operation">
                                            <option value="1">@lang('view_adminpanel.user_balance_charge')</option>
                                            <option value="2">@lang('view_adminpanel.user_balance_write_of')</option>
                                        </select>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="amount">@lang('view_adminpanel.user_balance_sum')</label>
                                <input type="number" class="form-control" id="amount" name="amount" placeholder="@lang('view_adminpanel.user_balance_sum_placeholder')" min="0.00" max="9999999.00" step="0.01">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="created_at">ДАТА НАЧИСЛЕНИЯ</label>
                                <input type="text" name="created_at" maxlength="250" class="form-control datetimepicker created_at">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="comment">@lang('view_adminpanel.user_balance_comment')</label>
                            <textarea rows="2" cols="80" class="form-control" id="comment" name="comment" placeholder="@lang('view_adminpanel.user_balance_comment_placeholder')"></textarea>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="user" value="{{$user->id}}"/>
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-info btn-fill pull-right">Send</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-12">
        <div class="card bootstrap-table">
            <div class="card-header ">
                <h4 class="card-title">@lang('view_adminpanel.user_balance_attachments') "{{$user->name}}"</h4>
                <p class="card-category">
                  @if(LaravelLocalization::getCurrentLocale() == 'en')
                    Here you can view the user's attachments "{{$user->name}}", as well as the latest charges to the user for them. You can also make a charge to the user.
                  @else 
                    Здесь вы можете просмотреть вложения пользователя "{{$user->name}}", а также последние начисления пользователю за них. Также вы можете сделать начисление пользователю.
                  @endif
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
                                <th style="" data-field="author">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.user_balance_shop_attachments')</div>
                                  <div class="fht-cell"></div>
                                </th>      
                                <th style="" data-field="author">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.user_balance_size_attachments')</div>
                                  <div class="fht-cell"></div>
                                </th>                               
                                <th style="" data-field="updated">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.user_balance_date_attachments')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="updated">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.user_balance_last_profit')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="updated">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.user_balance_date_last_profit')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th class="td-actions text-right" style="" data-field="actions">
                                  <div class="th-inner ">@lang('view_adminpanel.all_user_actions')</div>
                                  <div class="fht-cell"></div>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($investment_profits as $investment_profit)
                              <tr data-index="0">                      
                                <td class="text-center" style="">{{$investment_profit->id}}</td>
                                <td style="">{{$investment_profit->shop_title}}</td>
                                <td style="">{{$investment_profit->cost}}</td>
                                <td style="">{{$investment_profit->created_at}}</td>
                                <td id="last_cost_{{$investment_profit->id}}" style="">{{$investment_profit->last_profit_cost}}</td>
                                <td id="last_created_{{$investment_profit->id}}" style="">{{$investment_profit->last_profit_created_at}}</td>
                                <td class="td-actions text-right" style="">
                                  <a title="@lang('view_adminpanel.user_balance_profit')" class="btn btn-success btn-link btn-xs modal-test" data-toggle="modal" data-title-operation="@lang('view_adminpanel.user_balance_operation_title') {{$investment_profit->shop_title}}!" data-rate-id="{{$investment_profit->id}}" data-type-operation="investment_profit" href="#">
                                    <i class="fa fa-money"></i>
                                  </a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                      </div>
                      <div class="fixed-table-pagination">
                        <div class="pull-right pagination">
                          {{ $investment_profits->links() }}
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card bootstrap-table">
            <div class="card-header ">
                <h4 class="card-title">@lang('view_adminpanel.user_balance_ref_h4') "{{$user->name}}"</h4>
                <p class="card-category">
                  @if(LaravelLocalization::getCurrentLocale() == 'en')
                    Here you can post requests from user referrals "{{$user->name}}", as well as the latest user charges for them. You can also make a user charge for referrals.
                  @else
                    Здесь вы можете просмотреть вложения рефералов пользователя "{{$user->name}}", а также последние начисления пользователю за них. Также вы можете сделать начисление пользователю за рефералов.
                  @endif
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
                                  <div class="th-inner sortable ">@lang('view_adminpanel.user_balance_name')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="author">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.user_balance_mail')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="author">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.user_balance_shop_attachments')</div>
                                  <div class="fht-cell"></div>
                                </th>      
                                <th style="" data-field="author">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.user_balance_size_attachments')</div>
                                  <div class="fht-cell"></div>
                                </th>                               
                                <th style="" data-field="updated">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.user_balance_date_attachments')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="updated">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.user_balance_last_profit')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="updated">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.user_balance_date_last_profit')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th class="td-actions text-right" style="" data-field="actions">
                                  <div class="th-inner ">@lang('view_adminpanel.all_user_actions')</div>
                                  <div class="fht-cell"></div>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($referral_profits as $referral_profit)
                              <tr data-index="0">                      
                                <td class="text-center" style="">{{$referral_profit->id}}</td>
                                <td style="">{{$referral_profit->referral_name}}</td>
                                <td style="">{{$referral_profit->referral_email}}</td>
                                <td style="">{{$referral_profit->shop_title}}</td>
                                <td style="">{{$referral_profit->cost}}</td>
                                <td style="">{{$referral_profit->created_at}}</td>
                                <td id="last_cost_{{$referral_profit->id}}" style="">{{$referral_profit->last_profit_cost}}</td>
                                <td id="last_created_{{$referral_profit->id}}" style="">{{$referral_profit->last_profit_created_at}}</td>
                                <td class="td-actions text-right" style="">
                                  <a title="@lang('view_adminpanel.user_balance_profit')" class="btn btn-success btn-link btn-xs modal-test" data-toggle="modal" data-title-operation="@lang('view_adminpanel.user_balance_charge_referra') {{$referral_profit->referral_name}} в магазин {{$referral_profit->shop_title}}!" data-rate-id="{{$referral_profit->id}}" data-type-operation="referral_profit" href="#">
                                    <i class="fa fa-money"></i>
                                  </a>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                      </div>
                      <div class="fixed-table-pagination">
                        <div class="pull-right pagination">
                          {{ $referral_profits->links() }}
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
          <form id="rate_shop" action="{{route('change-balance')}}" method="POST">
              <div class="modal-body text-center">
                  {{-- <h3 id="title_shop"></h3> --}}
                  <div class="col-md-12 form-group-fields">
                      <div class="form-group">
                          <label for="rate" id="title_operation"></label>
                          <input type="number" id="rate" class="form-control" name="rate" placeholder="@lang('view_adminpanel.user_balance_rate')" min="0.00" max="9999999.00" step="0.01">
                      </div>                   
                  </div>
                  <div class="col-md-12 form-group-fields">
                      <div class="form-group">
                          <label for="rate" id="title_operation"></label>
                          <input type="text" name="created_at" maxlength="250" class="form-control datetimepicker created_at" placeholder="ДАТА НАЧИСЛЕНИЯ">
                      </div>                   
                  </div>
              </div>
              <div class="modal-footer ">
                  <div class="col align-items-center">
                      <button type="submit" class="btn btn-success btn-wd">@lang('view_adminpanel.user_balance_charge')</button>
                      <button type="button" class="btn btn-danger btn-wd pull-right" data-dismiss="modal">@lang('view_adminpanel.all_user_closed')</button>
                  </div>
              </div>
              <input type="hidden" id="rate_id" name="rate_id" value="">
              <input type="hidden" id="type_operation" name="type_operation" value=""/>
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
      $('.modal-test').click(function(){
          $('#rate_shop .form-group-fields .alert.alert-danger').remove();
          $('#rate_shop [type="number"]').removeClass('form-control-error');
          $('#title_operation').text($(this).data('title-operation'));
          $('#type_operation').val($(this).data('type-operation'));
          $('#rate_id').val($(this).data('rate-id'));
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
                      $('#last_cost_'+result.profit.rate_id).text(result.profit.cost);
                      $('#last_created_'+result.profit.rate_id).text(result.profit.created_at);
                      demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', result.success, 2);
                      $('#rate_shop input[type="number"]').val('');
                      $('#rate_shop .form-group-fields .alert.alert-danger').remove();             
                  },
                  error: function(response){
                    var result = JSON.parse(response.responseText);
                    $.each(result.error, function(key, value){
                      $('#'+key).addClass('form-control-error');
                      $('#rate_shop .form-group-fields').append("<div class=\"alert alert-danger\"><button type=\"button\" aria-hidden=\"true\" class=\"close\" data-dismiss=\"alert\"><i class=\"nc-icon nc-simple-remove\"></i></button><span>"+value+"</span></div>");
                      // demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', value, 4);
                    });
                  },
              });
      });

      $('#arbitrary_balance_change [type="number"], #arbitrary_balance_change textarea').on('focus', function(){
          $(this).removeClass('form-control-error');
      });

      $('#arbitrary_balance_change').submit(function(e){
          e.preventDefault();
          $.ajax({
                  url: $(this).attr('action'),
                  type: "POST",
                  dataType: "html",
                  data: $(this).serialize(),
                  success: function(response){            
                      var result = JSON.parse(response);
                      demo.showNotification('top', 'right','nc-icon nc-settings-gear-64', result.success, 2);
                      $('#arbitrary_balance_change [type="number"], #arbitrary_balance_change textarea').val('');
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

      $('.created_at').datetimepicker({
        format: "YYYY-MM-DD HH:mm:ss",
        icons: {
            time: "fa fa-clock-o",
            date: "fa fa-calendar",
            up: "fa fa-chevron-up",
            down: "fa fa-chevron-down",
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'fa fa-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-remove'
        },
        locale: '{{LaravelLocalization::getCurrentLocale()}}'
    }); 

  });
</script>

@endsection
