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

    @include('services')

    @include('miniform')

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