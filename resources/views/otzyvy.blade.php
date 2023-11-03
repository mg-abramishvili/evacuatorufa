@extends('layouts.front')
@section('title', "Отзывы")
@section('description', "Отзывы")

@section('content')
    <div class="page-block p2">
        <div class="container">
            <h2 class="title-header mb-4">Отзывы</h1>
            
            <div style="width: 760px; max-width:100%; height:1200px; overflow:hidden; position:relative;">
                <iframe style="width:100%;height:100%;border:1px solid #e6e6e6;border-radius:8px;box-sizing:border-box" src="https://yandex.ru/maps-reviews-widget/177099743166?comments"></iframe>
            </div>
        </div>
    </div>

    @include('miniform')

    @include('services')

    @include('gallery')

    @include('advantages')

    @include('mainform')

    @include('map')
@endsection