<div class="grid grid-cols-2 gap-6 px-4 p-2 {{ $loop->odd ? 'bg-white' : '' }}"
     x-data="userData({{ Js::from($user) }})">
    <div x-on:click="handleClick">{{ $user->name }}</div>
    <div>{{ $user->latestLogin->logged_in_at }}</div>
</div>

@pushOnce('script')

    <script>
        function userData(user) {
            return {
                handleClick() {
                    alert(user.name);
                }
            }
        }
    </script>
@endpushOnce