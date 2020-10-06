@extends('layouts.app')

@section('content')
    <div class="page block">
        <div class="page--top">
            <div class="block--in page--flex">
                <div class="page--top_text">
                    <h1 class="page--title">@lang('publicpages.affiliate-program-title')</h1>
                </div>
                <p class="page--breadcrumbrs">
                    <a href="/" class="page--breadcrumbrs_link">@lang('publicpages.breadcrumbrs_link_main')</a>
                    <span class="page--breadcrumbrs_text">@lang('publicpages.affiliate-program-title')</span>
                </p>
            </div>
        </div>
        <div class="page--content">
            <div class="block--in">

                <p style="width: 800px;margin: 0px auto;">@lang('publicpages.af_pr_1')</p>
                <br><br>
                <div class="" style="width: 50%;float: left;">
                    <p class="about-us--title -left_line">@lang('publicpages.af_pr_2')</p>

                    <p>@lang('publicpages.af_pr_l1')</p>
                    <p>@lang('publicpages.af_pr_l2')</p>
                    <p>@lang('publicpages.af_pr_l3')</p>

                </div>
                <div class="" style="width: 50%;float: left;">
                <p>@lang('publicpages.af_pr_3')</p>
                </div>

                <div style="clear: both;"></div>

                    <div class="afil">@lang('publicpages.af_pr_st_1')</div>
                    <div class="afil">@lang('publicpages.af_pr_st_2')</div>
                    <div class="afil">@lang('publicpages.af_pr_st_3')</div>
                    <div class="afil">@lang('publicpages.af_pr_st_4')</div>
                    <div class="afil">@lang('publicpages.af_pr_st_5')</div>
                    <div class="afil">@lang('publicpages.af_pr_st_6')</div>
                    <div class="afil">@lang('publicpages.af_pr_st_7')</div>
                    <div class="afil">@lang('publicpages.af_pr_st_8')</div>
                    <div class="afil">@lang('publicpages.af_pr_st_9')</div>
                    <div class="afil">@lang('publicpages.af_pr_st_10')</div>

            </div>
        </div>

    </div>
@endsection
