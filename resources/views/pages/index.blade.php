@extends('layouts.app')

@section('title', 'Wiki Pages')

@section('content')
    <h1>Wiki Pages</h1>

    @if ($pages->isEmpty())
        <p>No pages available.</p>
    @else
        <ul>
            @foreach ($pages as $page)
                <li>
                    <a href="/pages/{{ $page->id }}">{{ $page->title }}</a>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
