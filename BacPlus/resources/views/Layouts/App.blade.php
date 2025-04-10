<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@section('title')</title>
    @include('partiale.CDN')
    <style>
        /**{*/
        /*    border:1px red solid;*/
        /*}*/
        body{
            background: #F5F8F3;
        }
        button{
            background: #B3DCA0;
            font-family: 'Overpass Mono',Serif;
            border-radius: 14px;
        }
        button:hover{
            background: #72AE55;
        }


    </style>
</head>
<body>
@include('partiale.navbar')
@yield('content')
@include('partiale.Footer')
</body>
</html>
