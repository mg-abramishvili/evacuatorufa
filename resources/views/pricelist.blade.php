@extends('layouts.front')
@section('title', "Прайс-лист")
@section('description', "Прайс-лист")

@section('content')
    <div class="page-block p2">
        <div class="container">
            <h2 class="title-header mb-4">Прайс-лист</h1>
            
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