<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="referrer" content="always">
    <link rel="canonical" href="/">
    <link href="{{ asset('/assets/images/logo') }}/logo.jpg" rel="shortcut icon">


    <meta name="description" content="">

    <title>Slokki Shop</title>

    {{-- <link rel="stylesheet" href="/assets/build/css/main.css?id=77327fb28ae9659bdf38"> --}}
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>


<body class="bg-gray-300">
    <div x-data="{ cartOpen: false , isOpen: false }">

        @include('_layouts.header')

        @include('_layouts.cart')

        @yield('content')

        @include('_layouts.footer')

    </div>
</body>

@yield('script')

</html>
