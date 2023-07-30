@extends('layouts.front')
@section('title', $page->meta_title)
@section('description', $page->meta_description)

@section('content')
    <h1>{{ $page->name }}</h1>
@endsection