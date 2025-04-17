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
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
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
@yield('content')
@include('Partials.footer')
</body>
</html>
