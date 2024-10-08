@extends('layouts.app')

@section('title', 'Create New Page')

@section('content')
    <h1>Create New Wiki Page</h1>
    <form action="/pages" method="POST">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div>
            <label for="content">Content:</label>
            <textarea id="content" name="content" required></textarea>
        </div>
        <button type="submit">Create Page</button>
    </form>
@endsection
