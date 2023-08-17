@extends('layouts.front')
@section('title', $page->meta_title)
@section('description', $page->meta_description)

@section('content')
    <div class="page-hero p1">
        <div class="container">
            <h1 class="title-header">{{ $page->name }} от <i>{{ $page->price }}</i> руб.</h1>

            <a href="tel:+7{{ $settings->tel2 }}" class="btn btn-primary">Вызвать эвакуатор</a>
        </div>
    </div>

    @if($page->desc1_title && $page->desc1_text)
        <div class="page-block p2">
            <div class="container">
                <h2 class="title-header">{{ $page->desc1_title }}</h1>
                
                {!! $page->desc1_text !!}
            </div>
        </div>
    @endif

    @include('services')

    @include('miniform')

    @if($page->desc2_title && $page->desc2_text)
        <div class="page-block p2">
            <div class="container">
                <h2 class="title-header">{{ $page->desc2_title }}</h1>
                
                {!! $page->desc2_text !!}
            </div>
        </div>
    @endif

    @include('advantages')

    @include('gallery')

    @include('faq')

    @include('mainform')

    @include('gallery')

    @include('map')
@endsection