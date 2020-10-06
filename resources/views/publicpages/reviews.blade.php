@extends('layouts.app')

@section('content')
    <div class="page block">
        <div class="page--top">
            <div class="block--in page--flex">
                <div class="page--top_text">
                    <h1 class="page--title">@lang('publicpages.rev_reviews')</h1>
                </div>
                <p class="page--breadcrumbrs">
                    <a href="/" class="page--breadcrumbrs_link">@lang('publicpages.breadcrumbrs_link_main')</a>
                    <span class="page--breadcrumbrs_text">@lang('publicpages.rev_reviews')</span>
                </p>
            </div>
        </div>
        <div class="page--content">
            <div class="block--in questions">
                <div class="left-review">
                    <p class="our-recomend">@lang('publicpages.rev_recommended')</p>
                    <span class="line-green"></span>
                    <div class="-upperxx">
                        <p>Watsons</p>
                        <p>Panasonic</p>
                        <p>Sdvor.ru</p>
                        <p>M-video</p>
                        <p>Crocky</p>
                        <p>Cufarulnaturii</p>
                        <p>Sports365</p>
                        <p>MyToys</p>
                        <p>Emotegroup</p>
                        <p>Acer Europe</p>
                        <p>TinkCanadian CPG</p>
                        <p>SKB Europe</p>
                        <p>Votonia.ru</p>
                        <p>Aizel</p>
                        <p>RDE</p>
                        <p>Mataharimall</p>
                        <p>Brutal-shop</p>
                        <p>Maxi.az</p>
                        <p>Кенгуру</p>
                        <p>Emotegroup</p>
                        <p>Meloman</p>
                    </div>
                </div>
                <div class="right-review">
                    <div class="right-review_sec">
                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_1')</span><br>
                                Head of eCommerce at Watsons</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_1')</p>
                            <p style="text-align: center"></p>
                        </div>

                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_2')</span><br>
                                Sales Manager at Panasonic</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_2')</p>
                            <p style="text-align: center"><img src="{{asset('images/reviews/panasonic-color.svg')}}" style="margin: 00px auto 20px auto;">

                        </div>

                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_3')</span><br>
                                Pricing Manager at Sdvor.ru</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_3')</p>
                            <p style="text-align: center"><img src="{{asset('images/reviews/sdvor-color.svg')}}"  style="margin: 0px auto 20px auto;"></p>
                        </div>

                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_4')</span><br>
                                Ecommerce Director at M-video</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_4')</p>
                        </div>


                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_5')</span><br>
                                Supplier Manager at Crocky</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_5')</p>
                        </div>
                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_6')</span><br>
                                Director at Cufarulnaturii
                                </p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_6')</p>
                        </div>
                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_7')</span><br>
                                Sports365, Purchasing Manager, India</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_7')</p>
                        </div>
                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_8')</span><br>
                                FIND ME A GIFT, Merchandiser,
                                United Kingdom</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_8')</p>
                            <p style="text-align: center"><img src="{{asset('images/reviews/findmeagift-color.svg')}}" style="margin: 0px auto 20px auto;"></p>
                        </div>
                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_9')</span><br>
                                MyToys, Pricing Manager,
                                Russian Federation</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_9')</p>
                        </div>

                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_10')</span><br>
                                Кенгуру, Pricing Manager, Russian Federation</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_10')</p>
                        </div>

                        <div class="rew">
                            <p class="rew_name">
                                <span>@lang('publicpages.rev_review_name_11')</span><br>
                                Emotegroup, Pricing Manager,
                                Russian Federation
                            </p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_11')</p>
                        </div>





                    </div>
                    <div class="left-review_sec" style="margin-top: 200px">
                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_12')</span><br>
                                Meloman, Pricing Manager, Kazakhstan</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_12')</p>
                        </div>

                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_13')</span><br>
                                Aizel, Pricing Manager,
                                Russian Federation</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_13')</p>
                        </div>

                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_14')</span><br>
                                RDE, Project Lead,
                                Russian Federation</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_14')</p>
                        </div>

                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_15')</span><br>
                                Mataharimall, Project Lead, Indonesia</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_15')</p>
                        </div>

                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_16') </span><br>
                                Brutal-shop, Purchasing Manager,
                                Russian Federation</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_16')</p>
                        </div>

                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_17')</span><br>
                                Maxi.az, Project Manager,
                                Azerbaidzhan</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_17')</p>
                        </div>

                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_18')</span><br>
                                Acer Europe, France</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_18')</p>
                        </div>

                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_19')</span><br>
                                Tink, Business Development
                                Manager, Germany</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_19')</p>

                        </div>

                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_20')</span><br>
                                Canadian CPG Company, Purchasing
                                Manager, Canada</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_20')</p>
                        </div>

                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_21')</span><br>
                                Elkor, Director, LV</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_21')</p>
                        </div>
                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_22')</span><br>
                                SKB Europe, Office Sales
                                Manager, Holland</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_22')</p>
                        </div>
                        <div class="rew">
                            <p class="rew_name"><span>@lang('publicpages.rev_review_name_23')</span><br>
                                Votonia.ru, Director of Pricing Department
                                Russian Federation</p>
                            <p class="rew_text">@lang('publicpages.rev_review_text_23')</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
