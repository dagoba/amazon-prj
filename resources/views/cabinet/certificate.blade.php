@extends('layouts.cabinet')

@section('title')
@lang('view_cabinet.certifeacte_title')
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card bootstrap-table">
            <div class="card-header ">
                <h4 class="card-title">@lang('view_cabinet.certifeacte_title')</h4>
            </div>
            <div class="card-body table-full-width">                
                <div class="bootstrap-table">
                  <div class="fixed-table-toolbar">
                    <div class="fixed-table-container">
                      <div class="fixed-table-body">
                        <img src="{{ asset('images/certificate.jpg') }}" style="margin: 0 auto;display: block;"/>
                      </div>                      
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection