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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
    [x-cloak] {
        display: none !important;
    }
</style>


<body class="bg-gray-300">
    <div x-cloak x-data="{ cartOpen: {{ session('showCart') ? 'true' : 'false' }}, isOpen: {{ session('showCart') ? 'true' : 'false' }}, paymentModal: false, resiModal: false }">

        @include('_layouts.header')

        @include('_layouts.cart')

        @yield('content')

        @include('_layouts.footer')

    </div>
</body>

<script>
    function increaseQuantityCart(id) {
        const url = `{{ route('cart.increaseQuantity') }}?product_id=${id}`;
        window.location.href = url;
        return;
    }

    function decreaseQuantityCart(id) {
        const url = `{{ route('cart.decreaseQuantity') }}?product_id=${id}`;
        window.location.href = url;
        return;
    }
</script>

@if(session('updated_cart'))
<script>
    const toast = (function swalFire(){
        const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: false,
        })

        Toast.fire({
            icon: 'success',
            title: `<span class="text-sm font-bold">{{ session('updated_cart') }}</span>`
        })
        return swalFire;
    }())
</script>
@endif

@yield('script')

</html>
