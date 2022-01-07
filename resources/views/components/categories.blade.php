@foreach ($categories as $category)
    <div class="space-y-2 {{ $category->isChild() ? 'ml-16' : null }}">
        <x-category :category="$category" />
    </div>
@endforeach