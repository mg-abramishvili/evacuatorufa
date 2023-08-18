@extends('layouts.front')
@section('title', "Контакты")
@section('description', "Контакты")

@section('content')
    <div class="page-block p2">
        <div class="container">
            <h2 class="title-header mb-4">О нас</h1>
            
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate eos dignissimos, totam fuga deleniti quia, vel nam natus, corporis quod ab velit quis delectus neque sapiente consectetur minus nostrum! Officiis veritatis, eveniet alias officia magnam optio possimus tenetur veniam minus ea delectus, perferendis neque quae maxime illo voluptates quis sequi.</p>
        </div>
    </div>

    @include('miniform')

    @include('services')

    @include('gallery')

    @include('advantages')

    @include('mainform')

    @include('map')
@endsection