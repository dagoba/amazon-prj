@extends('layouts.app')

@section('content')
    <div class="page block">
        <div class="page--top">
            <div class="block--in page--flex">
                <div class="page--top_text">
                    <h1 class="page--title">@lang('publicpages.contacts')</h1>
                    {{-- <h2 class="page--subtitle">@lang('publicpages.cont_st_1')</h2> --}}
                </div>
                <p class="page--breadcrumbrs">
                    <a href="/" class="page--breadcrumbrs_link">@lang('publicpages.breadcrumbrs_link_main')</a>
                    <span class="page--breadcrumbrs_text">@lang('publicpages.contacts')</span>
                </p>
            </div>
        </div>
        <div class="page--content">
            <div class="block--in">
                <div class="page--contact">
                    <div class="page--contact_item">
                        <p class="page--contact_title">@lang('publicpages.cont_st_2')</p>
                        <p>@lang('publicpages.cont_st_3')</p>
                    </div>
                    <div class="page--contact_item">
                        <p class="page--contact_title">@lang('publicpages.cont_st_4')</p>
                        <a href="tel:+4915902971159" rel="nofollow" class=""><img style="margin-bottom: -16px" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAATfSURBVGhD7VnLbxtlEI94HbjxOgE3Ho5DThU0lUBF/A0goFxAAiEBEtxa9QKngpAQiFgtpVCpF4QSFdHHOmlLHaBQHk0DsV1w09h5OE3cOC557dpeP4aZzWxw7PnWu45tLv5JP9nyft/M7/t2vpnZdVcHHXTQBAzArb6g3tetGfuRx32afsUXNG7ip2nR+m5E6RqNobFd78ItPPv/Q8+w8WC3pn+Aoq53Bw3wyDma2xvUH2Bz7cMjJ1fvRQGf407mq0R5JtnAO3SIbLL51uJRzdiD4ZCRxGyTabLNbpoP/wDcgU6OVDltOnFzPtsxCrez2+Zgx0m4E29zUHLYCuIiNPLJ7rcH2vl2ireJizjRlDuBxloeNipSOLGMxuAPGi9JhttKzXie5XjDQ8HV+3Dykmi0vUz7zq3cw7Lcg26fYKxpfPJ8Fj6KmRBbLUEqWxbHVDDAstyBKmwzilQ1e4YMePX3HJxZKEKhDJuYWndeAGl5+JR+P8urD6s9EAw1yt24259cNSFpVKiugDZfFOdtoaa/z/LqAJssnDBXY8Ajabdfv5SH71JFKMq6N/Hh36Zoo5LYFM66agB9Q8YuyYBbPh3KQv+ECfPCbpfLZUgt3YTY1Cz/soFXfsuJtqrpH9afYJlqULsrTXbiY7jbb4zmYeSGerdX1nX4KzED4WsJWDey/OsGdp7LinariQV1H8tUAxfwjTRZ4jMjWTh4rWBlERXyZgEScwvwR2wSopNTkM3l+coGZvW6GWiTmBkHWaYaOCgqTbbZi7v91uU8/LhYhJJDbJcwXBYwXMavxi3xtPu0mGpQRpL8KBhhmWrQ05Mw0Yrtw5MFuJGrcyIRdriQcCLFvFko8tWt+Bizk+RPJBZWlqmGKv87hYmNvGluhovNiZk5KJZKPKIWr2GmkvxJJG0sUw3VAvaH8xBZLolhUx0uNuPJeSg5xRmCKrLkT6LLBcghZLMPM8bbY3n4eqYAM3gAV9YwXOL/hYvN6fmUlTadQOEo+VDSTQjhwEjNRAeevVIrPplKs0RnhDDtSjYdGGaZauAqjwsTldx7cXGL+IV0huXVRwBTsGRTRVdp1Gshe+rsGoyx+FA0AV/+OgmFOnFv401Mx5JNFTG897JMNfCg9EmTnTgwPmstYPDPafg29DMc+SECGcNkmWpQapbsqdgT1B9nmQ7AhglvVVIyoOI7P6WtBRy7lLAWQAyMRGAa22QVMnlvB9h1M0eg1lUyouLOM+twORaHL36ZsMQfPT8Ku4aWrR7n4pJcAy6kvR5g/QDLqw963aeqByoeG0vC0QsRS3wfird/p0bvK0y51aCqXjnfkZqe8/RAQ8ADc0g0puCe7/+BQCiM4lfE6+9FzS1PYVRLpHEK9rMs96AHaSocgrGG+TL2/fScEF8rWwVRGlNDzVj0Dy/fzbK8AR9uXhSNtpH+IeM5ltMYcAcOS4bbQcyGn7KMxmG9WtSME5KDVpJ80h8nLGN7oBeteCdOS45axFNNe7lrg1604q609GUXs3/3CNzGbpsPTK8voJN0ldNmMO0P6s+ym9bCSrFBI+C12InEIoWf/b2nl+9i8+0DVWxqO3AhMzXC6nBjjn7Ac4VtCbDJopdOGF778JwMosAwfmboDlmk/9Q0Y5yuUUtsdZVuG7MOOujAAV1d/wJhEmnfHheIJAAAAABJRU5ErkJggg=="></a>
                        <a href="tel:+4915902972705" rel="nofollow" class=""><img style="margin-bottom: -16px" src="data:image/png;base64,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"></a>
                        <a href="viber://chat?number=+4917693510604" rel="nofollow" class=""><img style="margin-bottom: -16px" src="data:image/png;base64,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"></a>
                    </div>
                    <div class="page--contact_item">
                        <p class="page--contact_title">@lang('publicpages.cont_st_5')</p>
                        <a href="mailto:support@amz-corp.com" rel="nofollow"class="">support@amz-corp.com</a>
                    </div>
                </div>
                <div id="address1" class="page--map">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3385.3067507537503!2d115.85886011516133!3d-31.952573881228798!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2a329062932500bf%3A0x1c04f0b88014a300!2z0J_QtdGA0YIg0JfQsNC_0LDQtNC90LDRjyDQkNCy0YHRgtGA0LDQu9C40Y8gNjAwMCwg0JDQstGB0YLRgNCw0LvQuNGP!5e0!3m2!1sru!2sua!4v1562692152438!5m2!1sru!2sua" class="page--map_iframe" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                <div id="address2" class="page--map" style="display: none;">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2584.1386455798033!2d6.1691733159227455!3d49.632841453817235!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47954f6135471631%3A0x6caf5a70b06daa6d!2zNDMgQXZlbnVlIEpvaG4gRi4gS2VubmVkeSwgMTg1NSBMdXhlbWJvdXJnLCDQm9GO0LrRgdC10LzQsdGD0YDQsw!5e0!3m2!1sru!2sua!4v1562692969271!5m2!1sru!2sua" class="page--map_iframe" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
                </div>
                {{-- <div class="page--form">
                    <div class="page--form-left">
                        <input type="text" placeholder="Введите ваше имя" class="page--form-input" disabled>
                        <input type="text" placeholder="Введите ваш e-mail адрес" class="page--form-input" disabled>
                        <input type="text" placeholder="Тема сообщения" class="page--form-input" disabled>
                    </div>
                    <div class="page--form-right">
                        <textarea name="" id="" placeholder="Введите ваше сообщение" class="page--form-textarea" disabled></textarea>
                        <div class="login--form-block">
                                {!! Captcha::display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        <button class="btn btn-grad -large btn-orang">ОТПРАВИТЬ</button>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>

<script>
    document.addEventListener('DOMContentLoaded', function(){ 
        $('a.address_point').click(function(e){
            e.preventDefault();
            $('.page--map').hide();
            $($(this).attr('href')).show();
            console.log('test');
        });
    });
</script>
@endsection
