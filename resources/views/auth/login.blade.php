@extends('_layouts.master')

@section('content')
<main class="my-8">
    <div class="container mx-auto px-6">
        <div class="flex justify-center">
            <img src="{{ asset('assets/images/logo/logo.jpg') }}" class="lg:w-1/6 w-3/4" alt="">
        </div>
        <div class="md:mt-16 mt-10">
            <div class="text-center">
                <h2 class="text-4xl font-bold">Login</h2>
            </div>
            <div class="md:mx-96 md:mt-12 mt-6">
                @if(session('success'))
                <div id="alert-success" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-emerald-500">
                    <span class="text-xl inline-block mr-5 align-middle">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                    </span>
                    <span class="inline-block align-middle mr-8">
                        <b class="capitalize">Sukses!</b> Silahkan login dengan akun anda. 
                    </span>
                    <button
                        onclick="document.getElementById('alert-success').style.display='none'"
                        class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                        <span>×</span>
                    </button>
                </div>
                @endif
                <div class="col-span-6 mb-4">
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" id="username" autocomplete="given-name"
                        class="mt-1 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="col-span-6 mb-8">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" autocomplete="given-name"
                        class="mt-1 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <button type="submit"
                    class="w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-[#301C11] hover:bg-brown-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brown-500">
                    Login
                </button>
                <p class="mt-2">Belum punya akun ? <a class="hover:underline font-semibold"
                        href="{{ route('auth.registerView') }}">Daftar disini</a></p>
            </div>
        </div>
    </div>
</main>
@endsection
