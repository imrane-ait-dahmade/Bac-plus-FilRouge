<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@section('title')</title>
    <style>
        /**{*/
        /*    border:1px red solid;*/
        /*}*/
        body {
            background: #F5F8F3;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Instrument Sans', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                    },
                    colors: {
                        custom: {
                            primary: '#93D872',
                            light: '#B3DCA0',
                            dark: '#72AE55',
                        },
                        gray: {
                            50: '#f9fafb',
                            100: '#f3f4f6',
                            200: '#e5e7eb',
                            300: '#d1d5db',
                            400: '#9ca3af',
                            500: '#6b7280',
                            600: '#4b5563',
                            700: '#374151',
                            800: '#1f2937',
                            900: '#111827',
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Ajout d'un style pour les scrollbars personnalisées */
        ::-webkit-scrollbar {
            width: 10px;
        }

        ::-webkit-scrollbar-track {
            background: #1f2937;
        }

        ::-webkit-scrollbar-thumb {
            background: #72AE55;
            border-radius: 5px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #93D872;
        }
    </style>
</head>

<body>

    @include('Partials.navbar')

    @auth
        @if(auth()->user()->role === 'student')
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <a href="{{ route('student.favorites') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    <i class="fas fa-heart mr-1"></i> Favoris
                </a>
                <a href="{{ route('student.history') }}"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">
                    <i class="fas fa-history mr-1"></i> Historique
                </a>
            </div>
        @endif
    @endauth

    @yield('content')
    @include('Partials.footer')
    @stack('scripts')

    <script>
        // Gestion du menu déroulant du profil
        const userMenuButton = document.getElementById('user-menu-button');
        const userMenu = document.getElementById('user-menu');

        if (userMenuButton && userMenu) {
            userMenuButton.addEventListener('click', () => {
                userMenu.classList.toggle('hidden');
            });

            // Fermer le menu quand on clique en dehors
            document.addEventListener('click', (event) => {
                if (!userMenuButton.contains(event.target) && !userMenu.contains(event.target)) {
                    userMenu.classList.add('hidden');
                }
            });
        }
    </script>
</body>

</html>