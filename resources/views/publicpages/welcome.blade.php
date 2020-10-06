@extends('layouts.app')

@section('content')
<div class="banner block">
    <div class="block--in banner--flex">
        <div class="banner--tag">
            <section id="main" class="section" data-type="background" data-speed="10" style="background-position: 50% 0px;">
                <div id="myCanvasContainer" style="z-index: 0;">
                    <canvas width="450 " height="450 " id="myCanvas" style="background: url({{ asset('images/top.svg') }}) 50% 50% / 100% 100% no-repeat; outline: none;">
                    </canvas>
                </div>
                <div id="tags" class="logo2" style="outline: none; display: none;">
                    @for($i = 0; $i <= 3; $i++)
                        {{--<li><a nohref=""><img src="{{ asset('images/1.png') }}" width="64" height="64"></a></li>--}}
                        {{--<li><a nohref=""><img src="{{ asset('images/2.png') }}" width="64" height="64"></a></li>--}}
                        {{--<li><a nohref=""><img src="{{ asset('images/3.png') }}" width="64" height="64"></a></li>--}}
                        {{--<li><a nohref=""><img src="{{ asset('images/4.png') }}" width="64" height="64"></a></li>--}}
                        {{--<li><a nohref=""><img src="{{ asset('images/5.png') }}" width="64" height="64"></a></li>--}}
                        {{--<li><a nohref=""><img src="{{ asset('images/6.png') }}" width="64" height="64"></a></li>--}}
                        {{--<li><a nohref=""><img src="{{ asset('images/7.png') }}" width="64" height="64"></a></li>--}}
                    @endfor
                </div>
            </section>
        </div>
        <div class="banner--text">
            <span class="banner--line_top"></span>
            <h1 class="banner--text_title">AMZ CORPORATE PTY LTD</h1>
            <p class="banner--text_white">– @lang('publicpages.banner')</p>
            @if(Auth::guest())
                <a href="{{ route('login') }}" class="banner--btn_left banner--btn btn -upper -large -margin-right-10 btn-orang">@lang('publicpages.about')</a>
                <a href="{{ route('register') }}" class="banner--btn btn -upper -large btn-grad">@lang('publicpages.connect')</a>
            @endif
            <span class="banner--line_bottom"></span>
        </div>
    </div>
</div>

<div class="description block">
    <div class="block--in">
        <div class="description--title"><p>AMZ CORPORATE PTY LTD</p></div>
        <div class="description--text">
            <p class="description--text-item"> – @lang('publicpages.info')</p>
        </div>
    </div>
</div>

<div class="cards block">
    <div class="block--in cards--flex">
        <div class="cards--item"><i class="cards--item-ico -first sprite"></i><p class="cards--item-text">@lang('publicpages.analis')</p></div>
        <div class="cards--item"><i class="cards--item-ico -second sprite"></i><p class="cards--item-text">@lang('publicpages.moreprice')</p></div>
        <div class="cards--item"><i class="cards--item-ico -fifth sprite"></i><p class="cards--item-text">@lang('publicpages.effect')</p></div>
        <div class="cards--item"><i class="cards--item-ico -fourth sprite"></i><p class="cards--item-text">@lang('publicpages.open')</p></div>
        <div class="cards--item"><i class="cards--item-ico -sixth sprite"></i><p class="cards--item-text">@lang('publicpages.add')</p></div>
    </div>
</div>

<div class="shops block">
    <div class="block--in">
        <p class="shops--title">@lang('publicpages.our-shop')</p> <span> (с Amazon)</span>
        <div class="outer-shop">
        @foreach($amz_data as $item)
        <div class="shops--item shops--flex">
            <div class="shops--item_td">{{$item->id}}</div>
            <div class="shops--item_td shops--item_name">
                <a href="{{$item->url}}" target="_blank">{{$item->name}}</a>
            </div>
            <div class="shops--item_td shops--item_money">${{$item->price}}</div>
            <div class="shops--item_td shops--item_money">${{$item->net}}</div>
            <div class="shops--item_td shops--item_rating">
                @if($item->rating >= 1)
                    <span class="rating--ico -star sprite"></span>
                @else
                    <span class="rating--ico sprite"></span>
                @endif
                @if($item->rating >= 2)
                    <span class="rating--ico -star sprite"></span>
                @else
                    <span class="rating--ico sprite"></span>
                @endif
                @if($item->rating >= 3)
                    <span class="rating--ico -star sprite"></span>
                @else
                    <span class="rating--ico sprite"></span>
                @endif
                @if($item->rating >= 4)
                    <span class="rating--ico -star sprite"></span>
                @else
                    <span class="rating--ico sprite"></span>
                @endif
                @if($item->rating >= 5)
                    <span class="rating--ico -star sprite"></span>
                @else
                    <span class="rating--ico sprite"></span>
                @endif
                {{$item->rating}}<br/>
                {{$item->reviews_count}} reviews
            </div>
            <div class="shops--item_td shops--item_rank">{{$item->rank}}</div>
            <div class="shops--item_td shops--item_sellers">{{$item->sellers}}</div>
            <div class="shops--item_td shops--item_lqs">{{$item->lqs}}</div>
            <div class="shops--item_td">{{$item->fba_fees}}</div>
            <div class="shops--item_td">{{$item->est_sales}}</div>
            <div class="shops--item_td">{{$item->est_revenue}}</div>
            <div class="shops--item_td shops--item_brand">
                Brand: {{$item->brand}}<br>
                ASIN: {{$item->asin}} Seller: {{$item->seller}}
            </div>
        </div>
        @endforeach
        </div>
    </div>
</div>






<div class="block advantages">
    <div class="block--in">
        <p class="advantages--title">@lang('publicpages.benefits')</p>
        <div class="advantages--list ">
            <div class="advantages--list_item">
                <p class="adva_title sprite_before -basket">@lang('publicpages.benefits-first')</p>
                <p class="adva_text">@lang('publicpages.benefits-first-t')</p>
            </div>
            <div class="advantages--list_item">
                <p class="adva_title sprite_before -lock">@lang('publicpages.benefits-second')</p>
                <p class="adva_text">@lang('publicpages.benefits-second-t')</p>
            </div>
            <div class="advantages--list_item">
                <p class="adva_title sprite_before -money">@lang('publicpages.benefits-third')</p>
                <p class="adva_text">@lang('publicpages.benefits-third-t')</p>
            </div>
            <div class="advantages--list_item">
                <p class="adva_title sprite_before -support">@lang('publicpages.benefits-four')</p>
                <p class="adva_text">@lang('publicpages.benefits-four-t')</p>
            </div>
            <div class="advantages--list_item">
                <p class="adva_title sprite_before -origin">@lang('publicpages.benefits-fifth')</p>
                <p class="adva_text">@lang('publicpages.benefits-fifth-t')</p>
            </div>
            <div class="advantages--list_item">
                <p class="adva_title sprite_before -people">@lang('publicpages.benefits-sixth')</p>
                <p class="adva_text">@lang('publicpages.benefits-sixth-t')</p>
            </div>
        </div>
    </div>
</div>

<div class="block about">
    <div class="block--in">
        <p class="about--title">@lang('publicpages.talk')</p>
        <div class="about--slider autoplay">
            <div class="about--slider_col">
                {{-- <div class="about--slider_item"><i class="about--slider_ico"></i></div> --}}
                <p class="slider--name"><span class="slider--name_blue">@lang('publicpages.rev_review_name_2'),</span><br> Panasonic</p>
                <p class="slider--text">@lang('publicpages.rev_review_text_2')</p>
                <img src="{{asset('images/reviews/panasonic-color.svg')}}" style="margin: 10px auto 20px auto;">
            </div>
            <div class="about--slider_col">
                {{-- <div class="about--slider_item"><i class="about--slider_ico"></i></div> --}}

                <p class="slider--name"><span class="slider--name_blue">@lang('publicpages.rev_review_name_3'),</span><br> Pricing Manager</p>
                <p class="slider--text">@lang('publicpages.rev_review_text_3')</p>
                <img src="{{asset('images/reviews/sdvor-color.svg')}}"  style="margin: 10px auto 20px auto;">
            </div>
            <div class="about--slider_col">
                {{-- <div class="about--slider_item"><i class="about--slider_ico"></i></div> --}}

                <p class="slider--name"><span class="slider--name_blue">@lang('publicpages.rev_review_name_4'),</span><br> Ecommerce Director</p>
                <p class="slider--text">@lang('publicpages.rev_review_text_4')</p>
                <img src="{{asset('images/reviews/foxtrot-color.svg')}}"  style="margin: 10px auto 20px auto;">
            </div>
            <div class="about--slider_col">
                {{-- <div class="about--slider_item"><i class="about--slider_ico"></i></div> --}}
                <p class="slider--name"><span class="slider--name_blue">@lang('publicpages.rev_review_name_7'),</span><br> Sports365</p>
                <p class="slider--text">@lang('publicpages.rev_review_text_7')</p>
            </div>
            <div class="about--slider_col">
                {{-- <div class="about--slider_item"><i class="about--slider_ico"></i></div> --}}

                <p class="slider--name"><span class="slider--name_blue">@lang('publicpages.rev_review_name_8'),</span><br> FIND ME A GIFT</p>
                <p class="slider--text">@lang('publicpages.rev_review_text_8')</p>
                <img src="{{asset('images/reviews/findmeagift-color.svg')}}" style="margin: 10px auto 20px auto;">
            </div>
            <div class="about--slider_col">
                {{-- <div class="about--slider_item"><i class="about--slider_ico"></i></div> --}}
                <p class="slider--name"><span class="slider--name_blue">@lang('publicpages.rev_review_name_8'),</span><br> MyToys, Pricing Manager</p>
                <p class="slider--text">@lang('publicpages.rev_review_text_9')</p>
            </div>
        </div>
    </div>
</div>
@endsection
