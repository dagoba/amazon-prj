@extends('layouts.cabinet')

@section('title')
  @lang('view_cabinet.referrals_title')
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card bootstrap-table">
            <div class="card-header ">
                <h4 class="card-title">@lang('view_cabinet.referrals_title')</h4>
                <p class="card-category">@lang('view_cabinet.referrals_url') <b>{{route('register').'/?ref='.Auth::user()->affiliate_id}}</b></p>
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
                                  <div class="th-inner sortable ">@lang('view_cabinet.referrals_name')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="author">
                                  <div class="th-inner sortable ">@lang('view_cabinet.referrals_profit')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="author">
                                  <div class="th-inner sortable ">@lang('view_cabinet.referrals_last_profit')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th class="td-actions text-right" style="" data-field="actions">
                                  <div class="th-inner ">@lang('view_cabinet.referrals_last_date')</div>
                                  <div class="fht-cell"></div>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($referrals as $referral)
                              <tr data-index="0">                      
                                <td class="text-center" style="">{{$referral->id}}</td>
                                <td style="">{{$referral->name}}</td>
                                <td style="">{{$referral->profit_cost}}</td>
                                <td style="">{{$referral->last_profit_cost}}</td>
                                <td class="text-right" style="">{{$referral->last_profit_created_at}}</td>
                              </tr>
                              @endforeach
                            </tbody>
                        </table>
                      </div>
                      <div class="fixed-table-pagination">
                        <div class="pull-right pagination">                          
                          {{ $referrals->links() }}
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