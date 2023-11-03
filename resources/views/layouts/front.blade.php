<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>
        <meta name="description" content="@yield('description')">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=PT+Sans+Narrow:wght@400;700&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
        
        <link rel="stylesheet" href="/css/flickity.css">
        @vite('resources/css/front.css')
    </head>
    <body>
        <div id="front">
            @if(Request::is('/'))
                <header>
                    <div class="container">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <div class="header-logo">
                                    <a href="/">
                                        <img src="/img/logo.svg" alt="Эвакуатор Уфа">
                                        <span>Служба Эвакуации <strong>г. УФА</strong></span>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="header-tel">
                                    <a href="tel:+7{{$settings->tel1}}">+7 @php echo substr($settings->tel1, 0, 3) . ' ' . substr($settings->tel1, 3, 3) . '-' . substr($settings->tel1, 6, 2)  . '-' . substr($settings->tel1, 8, 2) @endphp</a>
                                    <a href="tel:+7{{$settings->tel2}}">+7 @php echo substr($settings->tel2, 0, 3) . ' ' . substr($settings->tel2, 3, 3) . '-' . substr($settings->tel2, 6, 2)  . '-' . substr($settings->tel2, 8, 2) @endphp</a>
                                    <span>Круглосуточно</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
            @endif

            <main>
                @if(Request::is('/'))
                    @include('carousel')
                @endif

                <nav class="navbar navbar-expand-md navbar-ev">
                    <div class="container">
                        <a href="/" class="navbar-logo">
                            <img src="/img/logo.svg" alt="Эвакуатор Уфа">
                            Служба Эвакуации <strong>г. УФА</strong>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="تبديل التنقل">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarCollapse">
                            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="/">Главная</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#services" id="services-link">Цены</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Услуги эвакуатора
                                    </a>
                                    <ul class="dropdown-menu">
                                        @foreach($pages as $page)
                                            <li>
                                                <a class="dropdown-item" href="/p/{{ $page->slug }}">{{ $page->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/o-nas">О нас</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/kontakty">Контакты</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                @yield('content')
            </main>

            <footer class="p1">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-4 footer-left">
                            <h5 class="title-header">Контакты</h5>

                            <p>© Служба эвакуации "АВТО ВЕЗЕТ"</p>

                            @if($settings->tel1 && $settings->tel2)
                                <p class="fw-bold">
                                    +7 @php echo substr($settings->tel1, 0, 3) . ' ' . substr($settings->tel1, 3, 3) . '-' . substr($settings->tel1, 6, 2)  . '-' . substr($settings->tel1, 8, 2) @endphp,
                                    +7 @php echo substr($settings->tel2, 0, 3) . ' ' . substr($settings->tel2, 3, 3) . '-' . substr($settings->tel2, 6, 2)  . '-' . substr($settings->tel2, 8, 2) @endphp
                                </p>
                            @endif

                            <p>Круглосуточно и без выходных!</p>
                            <p>E-mail: 2999797@mail.ru</p>
                            <p>г. Уфа, ул. Степана Злобина, д. 6</p>
                        </div>
                        <div class="col-12 col-lg-4 footer-center">
                            <h5 class="title-header">Эвакуация</h5>
                            <ul>
                                @foreach($pages as $page)
                                    <li>
                                        <a href="/p/{{ $page->slug }}">{{ $page->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="col-12 col-lg-4 footer-right">
                            <h5 class="title-header">Информация</h5>

                            <p><a href="/o-nas">О компании</a></p>
                            <p><a href="/pricelist/">Прайс-лист</a></p>
                            <p><a href="/otzyvy/">Отзывы</a></p>

                            <ul class="footer-social-icons">
                                <li><a href="{{ $settings->vk_link }}"><img src="/img/vk.svg"></a></li>
                                <li><a href="{{ $settings->instagram_link }}"><img src="/img/instagram.svg"></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
        m[i].l=1*new Date();
        for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
        k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(94873307, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true
        });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/94873307" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->

        <script src="/js/bootstrap.bundle.min.js"></script>
        <script src="/js/flickity.pkgd.min.js"></script>
        @vite('resources/js/front.js')

        <script>
            const freeEvacuators = ['2', '3', '4']

            let randomNumber = Math.floor(Math.random() * freeEvacuators.length)

            if(document.getElementById('freeEvauators')) {
                document.getElementById('freeEvauators').innerText = freeEvacuators[randomNumber] + ' эвакуатора'
            }
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById("services-link").onclick = function() {
                    let bsCollapse = new bootstrap.Collapse(document.querySelector('.navbar-collapse'), {
                        toggle: false
                    })

                    bsCollapse.hide()
                }
            })
        </script>

        @yield('scripts')

        <script>
            let figures = document.getElementsByTagName('figure')

            if(figures.length) {
                figures.forEach(figure => {
                    let figureTable = figure.getElementsByTagName('table')

                    if(figureTable) {
                        figureTable.classList.add('table')
                    }
                })
            }
        </script>
    </body>
</html>