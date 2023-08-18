@extends('layouts.front')
@section('title', "Контакты")
@section('description', "Контакты")

@section('content')
    @include('map')

    @include('miniform')

    @include('services')

    @include('gallery')

    @include('advantages')

    @include('mainform')
@endsection