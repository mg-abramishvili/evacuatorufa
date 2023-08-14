@extends('layouts.front')
@section('title', "Эвакуатор Уфа недорого/ Услуги эвакуатора / Прибытие 10 минут")
@section('description', "Эвакуатор Уфа - быстрый вызов дешевого эвакуатора в Уфе! Эвакуация любого авто! Работаем с выездом по РБ и России. Звоните нам +7(347) 299-97-97")

@section('content')
    <div class="intro p1">
        <div class="container">
            <h2 class="title-header">Эвакуатор по Уфе, РБ и РФ</h2>

            <div class="row">
                <div class="col-12 col-lg-8">
                    <p>Служба эвакуации «АВТО ВЕЗЕТ» готова быстро и без хлопот перевезти любой Ваш транспорт – автомобиль, мотоцикл, спецтехнику и даже автобус. Подаем эвакуатор в течение 15 минут. Работаем круглосуточно – обращайтесь!</p>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="free-evacuator-counter">
                        <p>Сейчас свободно: <strong id="freeEvauators"></strong></p>
                        <a href="tel:+79053529797">Вызвать</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services">
        <div class="container">
            <h2 class="title-header">Эвакуатор по Уфе, РБ и РФ</h2>

            <div class="row">
                <div class="col-12 col-lg-4">
                    <div class="services-item">
                        <img src="/img/legk.png" alt="Эвакуатор для легковой машины">
                        <h3 class="services-item-name">Эвакуатор для <br>легковой машины</h3>

                        <span>от 2000 руб.</span>

                        <div class="services-item-actions">
                            <a href="tel:+79053529797">Вызвать</a>
                            <a href="#">Подробнее</a>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="services-item">
                        <img src="/img/kros.png" alt="Эвакуатор для кроссовера">
                        <h3 class="services-item-name">Эвакуатор для <br>кроссовера</h3>

                        <span>от 2500 руб.</span>

                        <div class="services-item-actions">
                            <a href="tel:+79053529797">Вызвать</a>
                            <a href="#">Подробнее</a>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="services-item">
                        <img src="/img/dzhip.png" alt="Эвакуатор для внедорожника">
                        <h3 class="services-item-name">Эвакуатор для <br>внедорожника</h3>

                        <span>от 3000 руб.</span>

                        <div class="services-item-actions">
                            <a href="tel:+79053529797">Вызвать</a>
                            <a href="#">Подробнее</a>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="services-item">
                        <img src="/img/mbus.png" alt="Эвакуатор для минивена">
                        <h3 class="services-item-name">Эвакуатор для <br>минивена</h3>

                        <span>от 2800 руб.</span>

                        <div class="services-item-actions">
                            <a href="tel:+79053529797">Вызвать</a>
                            <a href="#">Подробнее</a>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="services-item">
                        <img src="/img/gazel.png" alt="Эвакуатор для Газели">
                        <h3 class="services-item-name">Эвакуатор для <br>Газели</h3>

                        <span>от 3000 руб.</span>

                        <div class="services-item-actions">
                            <a href="tel:+79053529797">Вызвать</a>
                            <a href="#">Подробнее</a>
                        </div>

                    </div>
                </div>
                <div class="col-12 col-lg-4">
                    <div class="services-item">
                        <img src="/img/spez.png" alt="Эвакуатор для спецтехники и трактора">
                        <h3 class="services-item-name">Эвакуатор для <br>спецтехники и трактора</h3>

                        <span>от 4000 руб.</span>

                        <div class="services-item-actions">
                            <a href="tel:+79053529797">Вызвать</a>
                            <a href="#">Подробнее</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mini-form p2">
        <div class="container">
            <div class="mini-form-inner">
                <h5 class="title-header">Сломалась машина и нужен эвакуатор?</h5>
                <p>Закажи эвакуатор прямо сейчас и получи скидку 10%</p>
                <a href="tel:+79053529797">8 (905) 352-97-97</a>

                <div class="mini-form-form">
                    <input type="text" class="form-control" placeholder="Введите телефон для связи">
                    <button class="btn btn-primary">Получить скидку 10%</button>
                </div>
            </div>
        </div>
    </div>

    <div class="why p1">
        <div class="container">
            <h5 class="title-header">Почему у нас такая дешевая эвакуация?</h5>
            <p><strong>Мы не посредники!</strong></p>
            <p>Узнайте, сколько стоит заказать эвакуатор в Уфе, и убедитесь, что в среднем у нас на 15% ДЕШЕВЛЕ, чем в других компаниях. Низкую цену на услуги эвакуатора мы поддерживаем за счет использования только собственных машин, грамотной логистики, оптимальной численности штата.</p>
            <p>В нашем автопарке всегда есть свободный эвакуатор. Подадим эвакуатор через 15 МИНУТ после оформления заказа.</p>
        </div>
    </div>

    @include('mainform')

    <div class="bottom-text p1">
        <div class="container">
            <h5 class="title-header">Эвакуатор в Уфе круглосуточно</h5>

            <p>Наш эвакуатор доставит Ваш автомобиль аккуратно и быстро до места назначения. В нашем автопарке эвакуаторы для любых типов и габаритов машин, готовых по первому звонку выехать к Вам на помощь! Нужен автоэвакуатор Уфа или ищете телефон эвакуатора? Звоните нам!</p>

            <p>Чем мы отличаемся от других компаний? Долгий опыт, профессионализм и надежность наших эвакуаторов. У нас работают специалисты своего дела, а это значит, что вы не разочаруетесь, сделав вызов эвакуатора у нас!</p>

            <p>Вызвать эвакуатор круглосуточно в компании «Авто ангел» – правильный выбор, вы получите только лучшие услуги эвакуации и недорого! Если у вас возникнут вопросы, позвоните по телефону в любое время дня и ночи и проконсультируйтесь у наших специалистов. Они помогут вам определиться с выбором услуги. Обращайтесь, будем рады помочь!</p>
        </div>
    </div>

    <div class="gallery">
        <div class="container">
            <!-- Slider main container -->
            <div class="swiper">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                <!-- Slides -->
                <div class="swiper-slide">Slide 1</div>
                <div class="swiper-slide">Slide 2</div>
                <div class="swiper-slide">Slide 3</div>
                ...
            </div>
            <!-- If we need pagination -->
            <div class="swiper-pagination"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <!-- If we need scrollbar -->
            <div class="swiper-scrollbar"></div>
            </div>
        </div>
    </div>

    @include('mainform')
@endsection