@extends('layouts.app')

@section('title', 'Categories')

@section('custom_css',)
<link rel="stylesheet" href="{{ asset('css/categories.css') }}">

@endsection

@section('content')
    @if (!isset($thisCategory))
    <h1>Categories</h1>
    @else
    <h1>{{$thisCategory->name}}</h1>
    <h2>{{$thisCategory->description }}</h2>
    @endif

    <div id="categories-container">
        @foreach ($categories as $category)
            @include('categories.partials.category', ['category' => $category])
        @endforeach
    </div>
    @if (!empty($pages))
    <h4>Pages:</h4>
    <ul>
        @foreach ($pages as $page)
            <li><a href="/pages/{{ $page->id }}">{{ $page->title }}</a></li>
        @endforeach
    </ul>
    @endif
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        $('.accordion-toggle').click(function () {
            $(this).next('.accordion-content').slideToggle();
            $(this).toggleClass('open');
        });
    });
</script>
@endsection
