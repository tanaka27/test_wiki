<div class="category-item">
    <div class="accordion-toggle">
        <strong>{{ $category->name }}</strong>
        @if ($category->description)
            <p>{{ $category->description }}</p>
        @endif
    </div>

    <div class="accordion-content" style="display: none;">
        @if ($category->pages->isNotEmpty())
            <h4>Pages:</h4>
            <ul>
                @foreach ($category->pages as $page)
                    <li><a href="/pages/{{ $page->id }}">{{ $page->title }}</a></li>
                @endforeach
            </ul>
        @endif

        @if ($category->children->isNotEmpty())
            <h4>Subcategories:</h4>
            @foreach ($category->children as $child)
                @include('categories.partials.category', ['category' => $child])
            @endforeach
        @endif
    </div>
</div>
