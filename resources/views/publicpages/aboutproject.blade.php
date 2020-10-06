@extends('layouts.app')

@section('content')
    <div class="page block">
        <div class="page--top">
            <div class="block--in page--flex">
                <div class="page--top_text">
                    <h1 class="page--title">@lang('publicpages.about-project')</h1>
                </div>
                <p class="page--breadcrumbrs">
                    <a href="/" class="page--breadcrumbrs_link">@lang('publicpages.main')</a>
                    <span class="page--breadcrumbrs_text">@lang('publicpages.about-project')</span>
                </p>
            </div>
        </div>
        <div class="page--content">
            <div class="block--in about-us">
                <div class="center-align">
                    <h2 class="about-us--title">@lang('publicpages.about-project')</h2>
                </div>
                <p style="padding: 0px 150px">@lang('publicpages.about-first')</p>
                <div class="">
                    <div class="" style="width: 50%;float: left;padding: 50px 150px">
                        <img src="{{ asset('images/about.jpg') }}" width="100%">
                    </div>
                    <div class="" style="padding: 50px 150px 50px 0px">
                        <p>@lang('publicpages.about-second')</p>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection