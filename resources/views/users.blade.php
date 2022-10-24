<div x-data="userData()">
    <div @class([
            'grid grid-cols-5 gap-6 py-2 px-4',
            'border-t' => $loop->first,
            'border-b' => $loop->last,
            'bg-gray-200' => $loop->even
        ])
    >
        <div class="col-span-1" x-on:click="clickIt()">{{ $index + 1 }})</div>
        <div class="col-span-2">{{ $user->name }}</div>
        <div class="col-span-2">{{ $user->email }}</div>
    </div>
</div>

@once
<script>
    function userData() {
        return {
            clickIt() {
                alert('clicked');
            }
        }
    }
</script>
@endonce