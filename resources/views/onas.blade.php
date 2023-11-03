@extends('layouts.front')
@section('title', $aboutPage->name)
@section('description', $aboutPage->name)

@section('content')
    <div class="page-block p2">
        <div class="container">
            <h2 class="title-header mb-4">{{ $aboutPage->name }}</h1>
            
            {!! $aboutPage->description !!}
        </div>
    </div>

    @include('miniform')

    @include('services')

    @include('gallery')

    @include('advantages')

    @include('mainform')

    @include('map')
@endsection