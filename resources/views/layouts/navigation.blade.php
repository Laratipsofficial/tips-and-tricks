<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-10 w-auto fill-current text-gray-600" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
            </div>

            <div class="w-96 mt-3"
                 x-data="dropdownMovies()"
                 x-init="$watch('movie', () => selectedMovieIndex='')">
                <div>
                    <input type="text"
                           class="rounded-md border border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full px-4 py-2"
                           placeholder="Search"
                           x-model="movie"
                           x-on:click.outside="reset()"
                           x-on:keyup.escape="reset()"
                           x-on:keyup.down="selectNextMovie"
                           x-on:keyup.up="selectPreviousMovie"
                           x-on:keyup.enter="goToUrl()">

                    <div class="shadow-lg rounded-md py-2 border mt-1 max-h-64 overflow-y-auto bg-white"
                         x-show="filteredMovies.length>0"
                         x-transition
                         x-ref="movies">
                        <template x-for="(movie, index) in filteredMovies">
                            <button x-text="movie.name"
                                    class="px-4 py-2 block w-full text-left"
                                    :class="{ 'bg-gray-100 outline-none': index===selectedMovieIndex }"
                                    x-on:click.prevent="goToUrl(movie)"></button>
                        </template>
                    </div>
                    <div class="mt-1 px-4 py-2 block shadow-gray-50 rounded-md border bg-white"
                         x-show="movie!=='' && filteredMovies.length===0">
                        No Movies Available.
                    </div>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                            <div>{{ Auth::user()->name }}</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>

@push('script')
<script>
    function dropdownMovies() {
        return {
            movie: "",
            selectedMovieIndex: "",
            movies: [
                {id: 1, name: "Spider-Man: No Way Home"},
                {id: 2, name: "Eternals"},
                {id: 3, name: "Hotel Transylvania: Transformania"},
                {id: 4, name: "Ghostbusters: Afterlife"},
                {id: 5, name: "The Matrix Resurrections"},
                {id: 6, name: "The Ice Age Adventures of Buck Wild"},
                {id: 7, name: "Venom: Let There Be Carnage"},
                {id: 8, name: "Red Notice"},
                {id: 9, name: "Shang-Chi and the Legend of the Ten Rings"},
            ],

            get filteredMovies() {
                if (this.movie === "") {
                    return [];
                }

                return this.movies.filter(movie => movie.name.toLowerCase().includes(this.movie.toLowerCase()))
            },

            reset() {
                this.movie = "";
            },

            selectNextMovie() {
                if (this.selectedMovieIndex === "") {
                    this.selectedMovieIndex = 0;
                } else {
                    this.selectedMovieIndex++;
                }

                if (this.selectedMovieIndex === this.filteredMovies.length) {
                    this.selectedMovieIndex = 0;
                }

                this.focusSelectedMovie();
            },

            selectPreviousMovie() {
                if (this.selectedMovieIndex === "") {
                    this.selectedMovieIndex = this.filteredMovies.length - 1;
                } else {
                    this.selectedMovieIndex--;
                }

                if (this.selectedMovieIndex < 0) {
                    this.selectedMovieIndex = this.filteredMovies.length - 1;
                }

                this.focusSelectedMovie();
            },

            focusSelectedMovie() {
                this.$refs.movies.children[this.selectedMovieIndex + 1].scrollIntoView({ block: 'nearest' })
            },

            goToUrl(movie) {
                let currentMovie = movie ? movie : this.filteredMovies[this.selectedMovieIndex];

                window.location = `/dashboard?name=${currentMovie.name}`;
            },
        };
    }
</script>
@endpush