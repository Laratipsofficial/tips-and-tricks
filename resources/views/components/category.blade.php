<div class="flex items-center">
    @if($category->isChild())
        <svg xmlns="http://www.w3.org/2000/svg" class="mr-4 h-5 w-5 rotate-180" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M7.707 3.293a1 1 0 010 1.414L5.414 7H11a7 7 0 017 7v2a1 1 0 11-2 0v-2a5 5 0 00-5-5H5.414l2.293 2.293a1 1 0 11-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
        </svg>
    @endif
    <div class="bg-white px-8 py-4 rounded shadow flex-1">{{ $category->name }}</div>
</div>

<x-categories :categories="$category->children" />