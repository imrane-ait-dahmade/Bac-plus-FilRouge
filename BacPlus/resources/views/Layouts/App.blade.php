<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@section('title')</title>
    @include('partiale.CDN')
</head>
<body>
@include('partiale.navbar')
@yield('content')
@include('partiale.Footer')
</body>
</html>
