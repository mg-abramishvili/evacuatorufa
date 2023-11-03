@extends('layouts.front')
@section('title', $pricelistPage->name)
@section('description', $pricelistPage->name)

@section('content')
    <div class="page-block p2">
        <div class="container">
            <h2 class="title-header mb-4">{{ $pricelistPage->name }}</h1>
            
            <p>{!! $pricelistPage->description !!}</p>
        </div>
    </div>

    @include('miniform')

    @include('services')

    @include('gallery')

    @include('advantages')

    @include('mainform')

    @include('map')
@endsection