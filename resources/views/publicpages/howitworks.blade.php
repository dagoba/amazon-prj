@extends('layouts.app')

@section('content')
    <div class="page block">
        <div class="page--top">
            <div class="block--in page--flex">
                <div class="page--top_text">
                    <h1 class="page--title">@lang('publicpages.faq')</h1>
                </div>
                <p class="page--breadcrumbrs">
                    <a href="/" class="page--breadcrumbrs_link">@lang('publicpages.main')</a>
                    <span class="page--breadcrumbrs_text">@lang('publicpages.faq')</span>
                </p>
            </div>
        </div>
        <div class="page--content">
            <div class="block--in questions">
                <div class="questions">
                    <section class="questions--section questions--section_left">
                        <div class="questions--block">
                            <span class="questions--info questions--info_q">@lang('publicpages.q')</span>
                            <h2 class="questions--title">@lang('publicpages.faq-how')</h2>
                        </div>
                        <div class="questions--text">
                            <span class="questions--info">@lang('publicpages.a')</span>
                            <p>@lang('publicpages.faq-how-1')</p>
                            <p>@lang('publicpages.faq-how-2')</p>
                            <p>@lang('publicpages.faq-how-3')</p>
                        </div>
                    </section>
                    <section class="questions--section questions--section_right">
                        <div class="questions--block">
                            <span class="questions--info questions--info_q">@lang('publicpages.q')</span>
                            <h2 class="questions--title">@lang('publicpages.faq-why')</h2>
                        </div>
                        <div class="questions--text">
                            <span class="questions--info">@lang('publicpages.a')</span>
                            <p><b>@lang('publicpages.faq-why-1')</b></p>
                            <ul class="questions--list">
                                <li class="questions--item">@lang('publicpages.faq-why-2')</li>
                                <li class="questions--item">@lang('publicpages.faq-why-3')</li>
                                <li class="questions--item">@lang('publicpages.faq-why-4')</li>
                                <li class="questions--item">@lang('publicpages.faq-why-5')</li>
                                <li class="questions--item">@lang('publicpages.faq-why-6')</li>
                            </ul>
                        </div>
                    </section>
                    <section class="questions--section questions--section_left">
                        <div class="questions--block">
                            <span class="questions--info questions--info_q">@lang('publicpages.q')</span>
                            <h2 class="questions--title">@lang('publicpages.faq-amz')</h2>
                        </div>
                        <div class="questions--text">
                            <span class="questions--info">@lang('publicpages.a')</span>
                            <ul class="questions--list">
                                <li class="questions--item">@lang('publicpages.faq-amz-1')</li>
                                <li class="questions--item">@lang('publicpages.faq-amz-2')</li>
                                <li class="questions--item">@lang('publicpages.faq-amz-3')</li>
                                <li class="questions--item">@lang('publicpages.faq-amz-4')</li>
                                <li class="questions--item">@lang('publicpages.faq-amz-5')</li>
                                <li class="questions--item">@lang('publicpages.faq-amz-6')</li>
                                <li class="questions--item">@lang('publicpages.faq-amz-7')</li>
                                <li class="questions--item">@lang('publicpages.faq-amz-8')</li>
                            </ul>
                        </div>
                    </section>
                    <section class="questions--section questions--section_right">
                        <div class="questions--block">
                            <span class="questions--info questions--info_q">@lang('publicpages.q')</span>
                            <h2 class="questions--title">@lang('publicpages.faq-what-amz')</h2>
                        </div>
                        <div class="questions--text">
                            <span class="questions--info">@lang('publicpages.a')</span>
                            <p>@lang('publicpages.faq-what-amz-1')</p>
                        </div>
                    </section>
                    <section class="questions--section questions--section_left">
                        <div class="questions--block">
                            <span class="questions--info questions--info_q">@lang('publicpages.q')</span>
                            <h2 class="questions--title">@lang('publicpages.faq-monitoring')</h2>
                        </div>
                        <div class="questions--text">
                            <span class="questions--info">@lang('publicpages.a')</span>
                            <p>@lang('publicpages.faq-monitoring-1')</p>
                            <p><span class="questions--number">1.</span> @lang('publicpages.faq-monitoring-2')</p>
                            <p><span class="questions--number">2.</span> @lang('publicpages.faq-monitoring-3')</p>
                            <p><span class="questions--number">3.</span> @lang('publicpages.faq-monitoring-4')</p>
                            <p>@lang('publicpages.faq-monitoring-5')</p>
                        </div>
                    </section>
                    <section class="questions--section questions--section_right">
                        <div class="questions--block">
                            <span class="questions--info questions--info_q">@lang('publicpages.q')</span>
                            <h2 class="questions--title">@lang('publicpages.faq-price')</h2>
                        </div>
                        <div class="questions--text">
                            <span class="questions--info">@lang('publicpages.a')</span>
                            <p><b>@lang('publicpages.faq-price-1')</b></p>
                            <p>@lang('publicpages.faq-price-2')</p>
                            <ul class="questions--list">
                                <li class="questions--item">@lang('publicpages.faq-price-3')</li>
                                <li class="questions--item">@lang('publicpages.faq-price-4')</li>
                            </ul>
                        </div>
                    </section>
                    <section class="questions--section questions--section_left">
                        <div class="questions--block">
                            <span class="questions--info questions--info_q">@lang('publicpages.q')</span>
                            <h2 class="questions--title">@lang('publicpages.faq-demping')</h2>
                        </div>
                        <div class="questions--text">
                            <span class="questions--info">@lang('publicpages.a')</span>
                            <p>@lang('publicpages.faq-demping-1')</p>
                            <p>@lang('publicpages.faq-demping-2')</p>
                            <p>@lang('publicpages.faq-demping-3')</p>
                            <p>@lang('publicpages.faq-demping-4')</p>
                            </p>
                        </div>
                    </section>
                    <section class="questions--section questions--section_right">
                        <div class="questions--block">
                            <span class="questions--info questions--info_q">@lang('publicpages.q')</span>
                            <h2 class="questions--title">@lang('publicpages.faq-result')</h2>
                        </div>
                        <div class="questions--text questions--section_right">
                            <span class="questions--info">@lang('publicpages.a')</span>
                            <p>@lang('publicpages.faq-result-1')</p>
                            <p>@lang('publicpages.faq-result-2')</p>
                            <p><span class="questions--number">1.</span> @lang('publicpages.faq-result-3')</p>
                            <p><span class="questions--number">2.</span> @lang('publicpages.faq-result-4')</p>
                            <p><span class="questions--number">3.</span> @lang('publicpages.faq-result-5')</p>
                            <p><span class="questions--number">4.</span> @lang('publicpages.faq-result-6')</p>
                            <p><span class="questions--number">5.</span> @lang('publicpages.faq-result-7')</p>
                            <p>@lang('publicpages.faq-result-8')</p>
                            <p>@lang('publicpages.faq-result-9')</p>
                            <p>@lang('publicpages.faq-result-10')</p>
                        </div>
                    </section>

                    <section class="questions--section questions--section_left">
                        <div class="questions--block">
                            <span class="questions--info questions--info_q">@lang('publicpages.q')</span>
                            <h2 class="questions--title">@lang('publicpages.faq-dos')</h2>
                        </div>
                        <div class="questions--text">
                            <span class="questions--info">@lang('publicpages.a')</span>

                            <p>@lang('publicpages.faq-dos-1')</p>

                        </div>
                    </section>

                    <section class="questions--section questions--section_right">
                        <div class="questions--block">
                            <span class="questions--info questions--info_q">@lang('publicpages.q')</span>
                            <h2 class="questions--title">@lang('publicpages.faq-dos-2')</h2>
                        </div>
                        <div class="questions--text">
                            <span class="questions--info">@lang('publicpages.a')</span>
                            <p>@lang('publicpages.faq-dos-3')</p>
                        </div>
                    </section>

                    <section class="questions--section questions--section_left">
                            <div class="questions--block">
                                <span class="questions--info questions--info_q">@lang('publicpages.q')</span>
                                <h2 class="questions--title">@lang('publicpages.faq-dos-4')</h2>
                            </div>
                            <div class="questions--text">
                                <span class="questions--info">@lang('publicpages.a')</span>
                                <p>@lang('publicpages.faq-dos-5')</p>
                            </div>
                    </section>

                    <section class="questions--section questions--section_right">
                                <div class="questions--block">
                                    <span class="questions--info questions--info_q">@lang('publicpages.q')</span>
                                    <h2 class="questions--title">@lang('publicpages.faq-dos-6')</h2>
                                </div>
                                <div class="questions--text">
                                    <span class="questions--info">@lang('publicpages.a')</span>
                                    <p>@lang('publicpages.faq-dos-7')</p>
                                </div>
                    </section>

                    <section class="questions--section questions--section_left">
                            <div class="questions--block">
                                <span class="questions--info questions--info_q">@lang('publicpages.q')</span>
                                <h2 class="questions--title">@lang('publicpages.faq-dos-8')</h2>
                            </div>
                            <div class="questions--text">
                                <span class="questions--info">@lang('publicpages.a')</span>
                                <p>@lang('publicpages.faq-dos-9')</p>
                            </div>
                        </section>



                    {{--<section class="questions--section">--}}
                        {{--<div class="questions--block">--}}
                            {{--<span class="questions--info questions--info_q">@lang('publicpages.q')</span>--}}
                            {{--<h2 class="questions--title">Как я могу заработать, если у меня нет магазина на амазоне?</h2>--}}
                        {{--</div>--}}
                        {{--<div class="questions--text">--}}
                            {{--<span class="questions--info">@lang('publicpages.a')</span>--}}
                            {{--<p>С помощью AMZCoporation вы можете начать зарабатывать не открывая собственного магазина на AMAZON, а вкладывая в общий оборот уже существующих--}}
                                {{--и динамично развивающихся магазинов, которым мы оказываем наши услуги. Вкладывая деньги в такие магазины вы можете быть уверены в стабильном заработке--}}
                                {{--и сохранности ваших средств. Заработок формируется от увеличения продаж и как следствие увеличения оборота магазина в который вы вложили деньги.</p>--}}
                            {{--<p>Пример: Вы вложили 100$ в магазин с оборотом 900$, оборот магазина будет составлять 1000$ после вашего вклада. После завершения цикла продаж--}}
                                {{--данного магазина оборот увеличился до 1200$, прибыль составляет 20%, ваша личная прибыль в долларовом эквиваленте составляет 20$.</p>--}}
                            {{--<p>Именно эту прибыль вы можете вывести либо оставить ее для дальнейшего увеличения оборота и впоследствии прибыли.--}}
                                {{--Важно! Вы не можете вывести деньги вложенные в оборот до завершения цикла продаж! Цикл продаж может составлять разные сроки у разных магазинов в зависимости--}}
                                {{--от специализации магазина.</p>--}}
                        {{--</div>--}}
                    {{--</section>--}}
                </div>
            </div>
        </div>
    </div>
@endsection
