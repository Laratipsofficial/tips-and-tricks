<div class="grid grid-cols-2 gap-6 px-4 p-2 {{ $loop->odd ? 'bg-white' : '' }}">
    <div class="flex items-center">
        <div class="form-check">
            <x-checkbox
                :value="$user->id"
                x-model="userIds"
            />
        </div>
        <span class="ml-2">{{ $user->name }}</span>
    </div>
    <div>{{ $user->latestLogin?->logged_in_at }}</div>
</div>