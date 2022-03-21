<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div
        class="py-12"
        id="shops"
    >
        <div
            class="max-w-7xl mx-auto sm:px-6 lg:px-8"
            x-data="usersData({{ Js::from($users) }})"
            x-init="usersInit()"
        >
            <div class="px-4">
                <x-checkbox
                    x-model="selectAll"
                    id="selectAllUsers"
                    x-ref="selectAllUsers"
                    label="Select All"
                />
            </div>

            @foreach ($users as $user)
                @include('dashboard.user')
            @endforeach
        </div>
    </div>

    @push('script')
        <script>
            function usersData(users) {
                return {
                    selectAll: false,
                    userIds: [],
                    usersInit() {
                        this.$watch('userIds', (userIds) => {
                            if (userIds.length > 0 && userIds.length < users.length) {
                                this.$refs.selectAllUsers.indeterminate = true;
                            } else {
                                this.$refs.selectAllUsers.indeterminate = false;
                            }

                            if (this.userIds.length === users.length) {
                                this.selectAll = true;
                            } else {
                                this.selectAll = false;
                            }
                        });

                        this.$watch('selectAll', (selectAll) => {
                            if (selectAll) {
                                this.userIds = users.map(u => u.id);
                            } else {
                                this.userIds = [];
                            }
                        })
                    }
                }
            }
        </script>
    @endpush
</x-app-layout>