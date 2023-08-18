@extends('layouts.front')
@section('title', "Отзывы")
@section('description', "Отзывы")

@section('content')
    <div class="page-block p2">
        <div class="container">
            <h2 class="title-header mb-4">Отзывы</h1>
            
            <p>Страница в разработке.</p>
        </div>
    </div>

    @include('miniform')

    @include('services')

    @include('gallery')

    @include('advantages')

    @include('mainform')

    @include('map')
@endsection