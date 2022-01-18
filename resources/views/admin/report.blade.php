@extends('admin._layouts.master')

@section('content')
<main class="mt-8 mb-24">
    <div class="container mx-auto px-6">
        @if (session('error'))
        <div id="alert-success" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500">
            <span class="text-xl inline-block mr-5 align-middle">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </span>
            <span class="inline-block align-middle mr-8">
                <b class="capitalize">Error!</b> Ada kesalahan pada server
            </span>
            <button onclick="document.getElementById('alert-success').style.display='none'"
                class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                <span>×</span>
            </button>
        </div>
        @endif
        <div id="content-container" class="mt-16 bg-brown-100 rounded-md p-6 px-16">
            <h3 class="text-gray-800 text-3xl mb-8 font-bold">Rekap Pemasukan</h3>
            <div class="col-span-3 sm:col-span-3 mb-4">
                <div class="flex flex-row mt-6">
                    <h3 class="text-xl w-1/4 text-gray-800 font-medium">Bulan</h3>
                    <div class="ml-5 flex flex-col w-1/2">
                        <input type="month" name="bulan" id="bulan"
                            class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col mt-6">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-[#343A40]">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                No
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                ID Customer
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Nama Customer
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Tanggal
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                ID Produk
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Harga Satuan
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Jumlah
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Total Harga
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-[#3F444A] divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                1
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                <div class="text-sm text-white">Regional Paradigm Technician</div>
                                                <div class="text-sm text-white">Optimization</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                <div class="text-sm text-white">Regional Paradigm Technician</div>
                                                <div class="text-sm text-white">Optimization</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                Admin
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                Admin
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                Admin
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                Admin
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                Admin
                                            </td>
                                        </tr>

                                        <!-- More people... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="content-container" class="mt-16 bg-brown-100 rounded-md p-6 px-16">
            <h3 class="text-gray-800 text-3xl mb-8 font-bold">Rekap Penyuplaian</h3>
            <div class="col-span-3 sm:col-span-3 mb-4">
                <div class="flex flex-row mt-6">
                    <h3 class="text-xl w-1/4 text-gray-800 font-medium">Bulan</h3>
                    <div class="ml-5 flex flex-col w-1/2">
                        <input type="month" name="bulan" id="bulan"
                            class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col mt-6">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-[#343A40]">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                No
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                ID Supplier
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Nama Supplier
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Tanggal
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                ID Bahan Baku
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Harga per kg
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Kuantitas
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Total Harga
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-[#3F444A] divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                1
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                <div class="text-sm text-white">Regional Paradigm Technician</div>
                                                <div class="text-sm text-white">Optimization</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                <div class="text-sm text-white">Regional Paradigm Technician</div>
                                                <div class="text-sm text-white">Optimization</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                Admin
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                Admin
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                Admin
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                Admin
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                Admin
                                            </td>
                                        </tr>

                                        <!-- More people... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="content-container" class="mt-16 bg-brown-100 rounded-md p-6 px-16">
            <h3 class="text-gray-800 text-3xl mb-8 font-bold">Rekap Pengeluaran</h3>
            <div class="col-span-3 sm:col-span-3 mb-4">
                <div class="flex flex-row mt-6">
                    <h3 class="text-xl w-1/4 text-gray-800 font-medium">Bulan</h3>
                    <div class="ml-5 flex flex-col w-1/2">
                        <input type="month" name="bulan" id="bulan"
                            class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <!-- This example requires Tailwind CSS v2.0+ -->
                <div class="flex flex-col mt-6">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-[#343A40]">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                No
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                ID Pengeluaran
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Nama Pengeluaran
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Tanggal
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Jenis Pengeluaran
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Harga
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Satuan
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Jumlah
                                            </th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                                Total Harga
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-[#3F444A] divide-y divide-gray-200">
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                1
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                <div class="text-sm text-white">Regional Paradigm Technician</div>
                                                <div class="text-sm text-white">Optimization</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                <div class="text-sm text-white">Regional Paradigm Technician</div>
                                                <div class="text-sm text-white">Optimization</div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                Admin
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                Admin
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                Admin
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                Admin
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                Admin
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                                                Admin
                                            </td>
                                        </tr>

                                        <!-- More people... -->
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
