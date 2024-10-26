@extends('layouts.app')

@section('title', 'Edit Page')
@section('custom_css',)
<link rel="stylesheet" href="{{ asset('css/pages.edit.css') }}">

@endsection
@section('content')
    <h1>Edit Wiki Page</h1>
    <form action="/page/{{ $page->id }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="{{ $page->title }}" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required>{{ $page->content }}</textarea>
        </div>
        <button type="submit">Update Page</button>
    </form>
@endsection
