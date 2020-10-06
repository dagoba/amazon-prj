@extends('layouts.app')

@section('content')
    <div class="page block">
        <div class="page--top">
            <div class="block--in page--flex">
                <div class="page--top_text">
                    <h1 class="page--title">@lang('publicpages.us')</h1>
                </div>
                <p class="page--breadcrumbrs">
                    <a href="/" class="page--breadcrumbrs_link">@lang('publicpages.main')</a>
                    <span class="page--breadcrumbrs_text">@lang('publicpages.us')</span>
                </p>
            </div>
        </div>
        <div class="page--content">
            <div class="block--in about-us">
                <div class="center-align">
                    <h2 class="about-us--title">@lang('publicpages.us-title')</h2>
                </div>
                <div class="">
                        <p>@lang('publicpages.us-title-1')</p>
                        <p>@lang('publicpages.us-title-2')</p>
                        <p>@lang('publicpages.us-title-3')</p>
                        <p>@lang('publicpages.us-title-4')</p>
                </div>

                <div class="">
                    <div class="">
                        <img src="{{ asset('images/img_1.jpg') }}" width="100%">
                    </div>

                    <div class="">
                        <h3 class="about-us--sub">@lang('publicpages.us-result')</h3>
                        <p>@lang('publicpages.us-result-f')</p>
                        <p>@lang('publicpages.us-result-s')</p>
                    </div>

                </div>

                <div class="center-align">
                    <h2 class="about-us--title">@lang('publicpages.us-ch')</h2>
                </div>
                <div class="about-us--block">
                    <div class="about-us--left">
                        <img src="{{ asset('images/img_2.jpg') }}" width="100%">
                    </div>

                    <div class="about-us--right">
                        <h3 class="about-us--sub">@lang('publicpages.us-ch-1')</h3>
                        <p>@lang('publicpages.us-ch-2')</p>
                        <p>@lang('publicpages.us-ch-3')</p>
                    </div>
                </div>

                <div class="about-us--block">
                    <div class="about-us--left">
                        <h3 class="about-us--sub">@lang('publicpages.us-con')</h3>
                        <p>@lang('publicpages.us-con-1')</p>
                        <h3 class="about-us--sub">@lang('publicpages.us-team')</h3>
                        <p>@lang('publicpages.us-team-1')</p>
                        <p>@lang('publicpages.us-team-2')</p>
                        <h3 class="about-us--sub">@lang('publicpages.us-rus')</h3>
                        <p>@lang('publicpages.us-rus-1')</p>
                        <h3 class="about-us--sub">@lang('publicpages.us-invest')</h3>
                        <p>@lang('publicpages.us-invest-1')</p>
                        <p>@lang('publicpages.us-invest-2')</p>
                    </div>

                    <div class="about-us--right">
                        <img src="{{ asset('images/img_3.jpg') }}" width="100%">
                        <br><br><br>
                        <p>@lang('publicpages.us-invest-3')</p>
                    </div>
                </div>
            </div>
            <div class="block--in about-us -white about-us_benefits">
                <div class="about-us--block">
                    <div class="about-us--left sprite_before about-us--work_img">
                        <h4 class="about-us--work_title">@lang('publicpages.us-work')</h4>
                        <p class="work_item work_item_1">@lang('publicpages.us-work-1')</p>
                        <p class="work_item work_item_2">@lang('publicpages.us-work-2')</p>
                        <p class="work_item work_item_3">@lang('publicpages.us-work-3')</p>
                    </div>

                    <div class="about-us--right sprite_before about-us--work_img about-us--work_img_right">
                        <h4 class="about-us--work_title"><br>@lang('publicpages.us-company')</h4>
                        <p class="work_item work_item_1 -green">@lang('publicpages.us-company-1')</p>
                        <p class="work_item work_item_2 -green">@lang('publicpages.us-company-2')</p>
                        <p class="work_item work_item_3 -green">@lang('publicpages.us-company-3')</p>

                    </div>

                </div>

            </div>

            <div class="block--in about-us">
                <div class="about-us--block">
                    <div class="about-us--left">
                        <h3 class="about-us--sub">@lang('publicpages.our-plane')</h3>
                        <p>@lang('publicpages.our-plane-1')</p>
                        <p>@lang('publicpages.our-plane-2')</p>
                        <p>@lang('publicpages.our-plane-3')</p>
                    </div>
                    <div class="about-us--right">
                        <img src="{{ asset('images/img_4.jpg') }}" width="100%">
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection