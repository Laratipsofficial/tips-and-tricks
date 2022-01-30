<div class="bg-green-700 text-white px-8 py-4 mb-4 rounded"
    x-show="show"
    x-transition.duration.500ms
    x-data="{show: true}"
    x-init="() => setTimeout(() => show=false, 4000)">
    {{ $message }}
</div>