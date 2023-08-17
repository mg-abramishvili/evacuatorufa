@extends('layouts.front')
@section('title', "Эвакуатор Уфа недорого/ Услуги эвакуатора / Прибытие 10 минут")
@section('description', "Эвакуатор Уфа - быстрый вызов дешевого эвакуатора в Уфе! Эвакуация любого авто! Работаем с выездом по РБ и России. Звоните нам +7(347) 299-97-97")

@section('content')
    <div class="intro p1">
        <div class="container">
            <h2 class="title-header">{{ $homePage->text1_header }}</h2>

            <div class="row">
                <div class="col-12 col-lg-8">
                {!! $homePage->text1 !!}
                </div>
                <div class="col-12 col-lg-4">
                    <div class="free-evacuator-counter">
                        <p>Сейчас свободно: <strong id="freeEvauators"></strong></p>
                        <a href="tel:+7{{$settings->tel2}}">Вызвать</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="services">
        <div class="container">
            <h2 class="title-header">Эвакуатор по Уфе, РБ и РФ</h2>

            <div class="row">
                @foreach($pages as $page)
                    <div class="col-12 col-lg-4">
                        <div class="services-item">
                            <img src="{{ $page->icon }}" alt="{{ $page->name }}">
                            <h3 class="services-item-name">{{ $page->name }}</h3>

                            <span>от {{ $page->price }} руб.</span>

                            <div class="services-item-actions">
                                <a href="tel:+7{{$settings->tel2}}">Вызвать</a>
                                <a href="/p/{{ $page->slug }}">Подробнее</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="mini-form p2">
        <div class="container">
            <div class="mini-form-inner">
                <h5 class="title-header">Сломалась машина и нужен эвакуатор?</h5>
                <p>Закажи эвакуатор прямо сейчас и получи скидку 10%</p>
                <a href="tel:+7{{$settings->tel2}}">+7 @php echo substr($settings->tel2, 0, 3) . ' ' . substr($settings->tel2, 3, 3) . '-' . substr($settings->tel2, 6, 2)  . '-' . substr($settings->tel2, 8, 2) @endphp</a>

                <div class="mini-form-form">
                    <input type="text" class="form-control" placeholder="Введите телефон для связи">
                    <button class="btn btn-primary">Получить скидку 10%</button>
                </div>
            </div>
        </div>
    </div>

    <div class="why p1">
        <div class="container">
            <h5 class="title-header">{{ $homePage->text2_header }}</h5>
            <p class="str"><strong>Мы не посредники!</strong></p>
            {!! $homePage->text2 !!}
        </div>
    </div>

    @include('mainform')

    @include('gallery')

    @include('map')

    @include('advantages')

    <div class="bottom-text p1">
        <div class="container">
            <h5 class="title-header">{{ $homePage->text3_header }}</h5>

            {!! $homePage->text3 !!}
        </div>
    </div>

    @include('mainform')
@endsection