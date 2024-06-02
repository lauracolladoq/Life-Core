<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Fonts -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap');
    </style>

    <!-- CDN fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CDN NOTIFY -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.css">
    <script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

    <!-- CDN TailWind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- CDN Bootstrap -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles

</head>

<body>
    <x-banner />
    <!-- ------------------------------------------- Inicio NavBar ------------------------------------------- -->
    <nav>
        <div class="container nav-container">
            <a href="/" class="logo">
                <h3>Life <span>Core</span></h3>
            </a>
            <div class="search-bar boxshadow">
                <i class="fa fa-search"></i>
                <input placeholder="Search User" />
            </div>
            @auth
                <!-- Si está autenticado aparece el boton de Add Post -->
                <div class="add-post">
                    @livewire('add-post')
                </div>
                <!-- Si no está autenticado aparece el boton de Login -->
            @else
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            @endauth
        </div>
    </nav>
    <!-- ------------------------------------------- Fin NavBar ------------------------------------------- -->
    <main>
        <div class="container main-container">
            <!-- ------------------------------------------- Inicio Sección Izquierda ------------------------------------------- -->
            <div class="main-left">
                <!-- -------------------- Perfil -------------------- -->
                <!-- Si está autenticado aparece la foto de perfil y el nombre del usuario -->
                @auth
                    <button data-toggle="modal" data-target="#myProfile" class="profile boxshadow">
                        <div class="profile-picture" id="my-profile-picture">
                            <img src="{{ Storage::url(auth()->user()->avatar) }}" alt="My Profile Picture" />
                        </div>
                        <div class="profile-handle">
                            <h4 class="font-extrabold">{{ auth()->user()->name }}</h4>
                            <p class="text-gray"><span>@</span>{{ auth()->user()->username }}</p>
                        </div>
                    </button>
                @endauth
                <!-- -------------------- Fin Perfil -------------------- -->

                <!-- ------------------------------------------- Inicio Aside ------------------------------------------- -->
                <aside>
                    <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')"
                        class="menu-item {{ request()->routeIs('home') ? 'active' : '' }}">
                        <span><img src="https://cdn.hugeicons.com/icons/home-01-stroke-rounded.svg" alt="home-01"
                                width="48" height="48" /></span>
                        <h3 class="font-extrabold">Home</h3>
                    </x-nav-link>

                    <x-nav-link href="{{ route('myProfile') }}" :active="request()->routeIs('')"
                        class="menu-item {{ request()->routeIs('myProfile') ? 'active' : '' }}">
                        <span> <img src="https://cdn.hugeicons.com/icons/user-stroke-rounded.svg" alt="user"
                                width="48" height="48" /></span>
                        <h3 class="font-extrabold">My Profile</h3>
                    </x-nav-link>

                    <x-nav-link href="{{ route('explore') }}" :active="request()->routeIs('explore')"
                        class="menu-item {{ request()->routeIs('explore') ? 'active' : '' }}">
                        <span><img src="https://cdn.hugeicons.com/icons/view-stroke-rounded.svg" alt="view"
                                width="48" height="48" /></span>
                        <h3 class="font-extrabold">Explore</h3>
                    </x-nav-link>

                    <a href="" class="menu-item">
                        <span><img src="https://cdn.hugeicons.com/icons/notification-01-stroke-rounded.svg"
                                alt="notification-01" width="48" height="48" /></span>
                        <h3 class="font-extrabold">Notifications</h3>
                    </a>

                    <x-nav-link href="{{ route('chatify') }}" :active="request()->routeIs('chatify')"
                        class="menu-item {{ request()->routeIs('chatify') ? 'active' : '' }}">
                        <span><img src="https://cdn.hugeicons.com/icons/message-02-stroke-rounded.svg" alt="message-02"
                                width="48" height="48" /></span>
                        <h3 class="font-extrabold">Messages</h3>
                    </x-nav-link>

                    <a href="" class="menu-item">
                        <span><img src="https://cdn.hugeicons.com/icons/paint-board-stroke-rounded.svg"
                                alt="paint-board" width="48" height="48" /></span>
                        <h3 class="font-extrabold">Theme</h3>
                    </a>
                </aside>
                <!-- ------------------------------------------- Fin Aside ------------------------------------------- -->
            </div>
            <!-- ------------------------------------------- Fin Sección Izquierda ------------------------------------------- -->

            <!-- ------------------------------------------- Inicio Sección Principal ------------------------------------------- -->
            {{ $slot }}
            <!-- ------------------------------------------- Fin Sección Principal ------------------------------------------- -->

            <!-- ------------------------------------------- Inicio Sección Derecha ------------------------------------------- -->
            <div class="main-right">
                <div class="trending">
                    <div class="trending-header">
                        <span><img src="https://cdn.hugeicons.com/icons/fire-stroke-rounded.svg" alt="fire"
                                width="48" height="48" class="m-0" /></span>
                        <h3 class="font-extrabold">Trending</h4>
                    </div>
                    <div class="trending-body">
                        <div class="trending-search-bar">
                            <i class="fas fa-search"></i>
                            <input placeholder="Search tag" id="trending-search" />
                        </div>
                        <div class="tags">
                            <span>Prueba</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ------------------------------------------- Fin Sección Derecha ------------------------------------------- -->
        </div>

        <!------------------------------------------- Modales -------------------------------------------->

        <!---------- Modal My Profile ---------->
        @auth
            <div class="modal p-0 fade" id="myProfile">
                <div class="modal-dialog modal-dialog-centered profile-modal">
                    <div class="modal-content modal-style">
                        <!-- Modal Header -->
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <!-- Modal body -->
                        <div class="modal-body">
                            <h1 class="font-extrabold text-3xl">{{ auth()->user()->name }}</h1>
                            <p class="font-bold text-md"><span>@</span>{{ auth()->user()->username }}</p>
                            <img src="{{ Storage::url(auth()->user()->avatar) }}" alt=""
                                class="profile-picture" />
                        </div>
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <a class="btn btn-primary" href="{{ route('logout') }}"
                                    @click.prevent="$root.submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
        <!---------- Fin Modal My Profile ---------->
        <!------------------------------------------- Fin Modales -------------------------------------------->
    </main>
    @stack('modals')
    @livewireScripts
    <script>
        Livewire.on('message', txt => {
            new Notyf().success({
                message: txt,
                duration: 3000,
                position: {
                    x: 'center',
                    y: 'top',
                }
            });
        });
        Livewire.on('deleteConfirmation', postId => {
            new Notyf().sucess({
                message: "Are you sure you want to delete this post?",
                duration: false,
                position: {
                    x: 'center',
                    y: 'top',
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.dispatchTo('my-profile', 'eventDeletePost', postId);
                }
            });
        });
    </script>
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
