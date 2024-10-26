@extends('layouts.app')

@section('title', 'Wiki Pages')
@section('custom_css')
<link rel="stylesheet" href="{{ asset('css/pages.index.css') }}">
@endsection

@section('content')
    <div class="page-container">
        <h1>Wiki Pages</h1>

        @if ($pages->isEmpty())
            <p class="no-pages">No pages available.</p>
        @else
            <ul class="pages-list">
                @foreach ($pages as $page)
                    <li class="page-item">
                        <div class="page-title">
                            <a href="/pages/{{ $page->id }}" class="page-link">{{ $page->title }}</a>
                        </div>
                        <div class="page-actions">
                            <a href="/pages/{{ $page->id }}/edit" class="edit-link">Edit</a>
                        </div>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
