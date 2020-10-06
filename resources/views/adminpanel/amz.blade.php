@extends('layouts.admin')
@section('title')
AMZ
@endsection
@section('content')
      <div class="row">     
        <div class="col-md-12">
        <div class="card bootstrap-table">
            <div class="card-header ">
                <h4 class="card-title">@lang('view_adminpanel.amz_h4')</h4>
                <p class="card-category">@lang('view_adminpanel.amz_description')</p>
            </div>
            <div class="card-body table-full-width">                
                <div class="bootstrap-table">
                  <div class="fixed-table-toolbar">
                    <div class="fixed-table-container">
                      <div class="fixed-table-body">
                        <table id="bootstrap-table" class="table table-hover" style="margin-top: 0px;">
                            <thead style="">
                              <tr>
                                <th style="" data-field="id">
                                  <div class="th-inner ">id</div>
                                </th>
                                <th style="" data-field="name">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.amz_name')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="brand">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.amz_brand')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="price">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.amz_price')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="net">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.amz_net')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="fba_fees">
                                  <div class="th-inner sortable ">@lang('view_adminpanel.amz_fba_fees')</div>
                                  <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="lqs">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.amz_lqs')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="category">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.amz_category')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="sellers">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.amz_sellers')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="rank">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.amz_rank')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="est_sales">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.amz_est_sales')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="est_revenue">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.amz_est_revenue')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="rating">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.amz_rating')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="seller">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.amz_seller')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="weight">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.amz_weight')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="shipping_weight">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.amz_shipping_weight')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="size">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.amz_size')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="colors">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.amz_colors')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="oversize">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.amz_oversize')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="sizes">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.amz_sizes')</div>
                                    <div class="fht-cell"></div>
                                </th>
                                <th style="" data-field="asin">
                                    <div class="th-inner sortable ">@lang('view_adminpanel.amz_asin')</div>
                                    <div class="fht-cell"></div>
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($amzItems as $item)
                                <tr>
                                    <th  class="text-center">{{$item->id}}</th>
                                    <td><a href="{{$item->url}}" target="_blanck">{{$item->name}}</a></td>
                                    <td>{{$item->brand}}</td>
                                    <td>{{$item->price}}</td>
                                    {{-- <td>{{$item->min_price}}</td> --}}
                                    <td>{{$item->net}}</td>
                                    <td>{{$item->fba_fees}}</td>
                                    <td>{{$item->lqs}}</td>
                                    <td>{{$item->category}}</td>
                                    <td>{{$item->sellers}}</td>
                                    <td>{{$item->rank}}</td>
                                    <td>{{$item->est_sales}}</td>
                                    <td>{{$item->est_revenue}}</td>
                                    {{-- <td>{{$item->reviews_count}}</td> --}}
                                    {{-- <td>{{$item->available_from}}</td> --}}
                                    <td>{{$item->rating}}</td>
                                    <td>{{$item->seller}}</td>
                                    <td>{{$item->weight}}</td>
                                    <td>{{$item->shipping_weight}}</td>
                                    <td>{{$item->size}}</td>
                                    <td>{{$item->colors}}</td>
                                    <td>{{$item->oversize}}</td>
                                    <td>{{$item->sizes}}</td>
                                    <td>{{$item->asin}}</td>
                                </tr>
                            @endforeach
                              
                            </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
        

        <div class="col-lg-12">
            <div class="card">
              <div class="card-header d-flex align-items-center">
                <h4>@lang('view_adminpanel.amz_download_file')</h4>
              </div>
              <div class="card-body">
                <form action="{{ route('admin-amz') }}" enctype="multipart/form-data" method="POST" class="form-horizontal">
                  {{ csrf_field() }}
                  <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="amz_xls" accept=".csv, .xlsx, .xls" required class="" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
                        {{-- <label class="custom-file-label" for="inputGroupFile04">@lang('view_adminpanel.amz_choose')</label> --}}
                      </div>
                      <div class="input-group-append">
                        <button class="btn btn-secondary">@lang('view_adminpanel.amz_download')</button>
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>

      </div>
@endsection
