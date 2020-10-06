@extends('layouts.cabinet')

@section('title')
 @lang('view_cabinet.closed_tickets_title')
@endsection

@section('content')
<div class="row">
        <div class="col-md-12">
                <div class="card table-with-links">
                    <div class="card-header ">
                        <h4 class="card-title">@lang('view_cabinet.closed_tickets_title')</h4>
                        <p class="card-category">@lang('view_cabinet.closed_tickets_description')</p>
                    </div>
                    <div class="card-body table-full-width">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th>@lang('view_cabinet.active_tickets_theme')</th>
                                    <th>@lang('view_cabinet.closed_tickets_support')</th>
                                    <th class="text-right">@lang('view_cabinet.closed_tickets_last_update')</th>
                                    <th class="text-center">@lang('view_cabinet.active_tickets_cteated')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)                                
                                <tr>
                                    <td class="text-center">{{$ticket->id}}</td>
                                    <td>{{$ticket->theme}}</td>
                                    <td>{{$ticket->support}}</td>
                                    <td class="text-right">{{$ticket->updated_at}}</td>
                                    <td class="text-center">{{$ticket->created_at}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
</div>
@endsection