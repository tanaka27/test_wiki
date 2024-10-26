@extends('layouts.app')

@section('title', $page->title)
@section('custom_css',)
<link rel="stylesheet" href="{{ asset('css/pages.show.css') }}">

@endsection
@section('content')
    <link rel="stylesheet" href="{{ asset('css/pages.show.css') }}">

    <div class="page-container">
        <h1>{{ $page->title }}</h1>
        <div class="page-content">{{ $page->content }}</div>

        <div class="page-actions">
            <a href="/page/{{ $page->id }}/edit" class="btn edit-btn">Edit Page</a>

            <form action="/page/{{ $page->id }}" method="POST" class="delete-form">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn delete-btn">Delete Page</button>
            </form>
        </div>
    </div>
@endsection