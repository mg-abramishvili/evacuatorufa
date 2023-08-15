@extends('layouts.front')
@section('title', $page->meta_title)
@section('description', $page->meta_description)

@section('content')
    <div class="container">
        <h1>{{ $page->name }}</h1>
    </div>

    @include('faq')
@endsection