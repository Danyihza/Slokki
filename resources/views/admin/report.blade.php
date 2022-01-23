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
                        <input type="month" name="bulan" id="bulan-pemasukan" oninput="showRekapPemasukan()"
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
                                    <tbody id="rekap-pemasukan" class="divide-y divide-gray-200">
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
                        <input type="month" name="bulan" id="bulan-penyuplaian" oninput="showRekapPenyuplaian()"
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
                                    <tbody id="rekap-penyuplaian" class="bg-[#3F444A] divide-y divide-gray-200">
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
                        <input type="month" name="bulan" id="bulan-pengeluaran" oninput="showRekapPengeluaran()"
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
                                    <tbody id="rekap-pengeluaran" class="divide-y divide-gray-200">
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

@section('script')
    <script>
        async function showRekapPemasukan() {
            const bulan = document.getElementById('bulan-pemasukan').value;
            const content = document.getElementById('rekap-pemasukan');
            if (bulan == '') {
                content.innerHTML = `
                <tr class="bg-[#343A40]">
                    <td class="text-center py-2 text-white" colspan="8">
                        Data Tidak Ditemukan
                    </td>
                </tr>
                    `;
                return
            }
            console.log(bulan);
            const response = await fetch(`{{ route('api.getAllDetailTransaksi') }}?month=${bulan}`)
            .then(response => response.json())
            .then(data => data)
            .catch(error => console.error(error));
            if (response.code == 404) {
                content.innerHTML = `
                <tr class="bg-[#343A40]">
                    <td class="text-center py-2 text-white" colspan="8">
                        Data Tidak Ditemukan
                    </td>
                </tr>
                    `;
                return;
            }
            const data = response.data;
            let html = '';
            let no = 0;
            data.forEach(data => {
                html += `
                <tr class="${no % 2 != 0 ? 'bg-[#343A40]' : 'bg-[#3F444A]'}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${++no}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        <div class="text-sm text-white">${data.transaksi.customer.id_customer}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        <div class="text-sm text-white">${data.transaksi.customer.nama_customer}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${data.transaksi.tanggal_transaksi}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${data.id_produk}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${data.price}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${data.jumlah}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${data.price * data.jumlah}
                    </td>
                </tr>
                `;
            });

            content.innerHTML = html;
            return;
        }

        async function showRekapPenyuplaian() {
            const bulan = document.getElementById('bulan-penyuplaian').value;
            const content = document.getElementById('rekap-penyuplaian');
            if (bulan == '') {
                content.innerHTML = `
                <tr class="bg-[#343A40]">
                    <td class="text-center py-2 text-white" colspan="8">
                        Data Tidak Ditemukan
                    </td>
                </tr>
                    `;
                return
            }
            console.log(bulan);
            const response = await fetch(`{{ route('api.getRekapPenyuplaian') }}?month=${bulan}`)
            .then(response => response.json())
            .then(data => data)
            .catch(error => console.error(error));
            if (response.code == 404) {
                content.innerHTML = `
                <tr class="bg-[#343A40]">
                    <td class="text-center py-2 text-white" colspan="8">
                        Data Tidak Ditemukan
                    </td>
                </tr>
                    `;
                return;
            }
            const data = response.data;
            let html = '';
            let no = 0;
            data.forEach(data => {
                html += `
                <tr class="${no % 2 != 0 ? 'bg-[#343A40]' : 'bg-[#3F444A]'}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${++no}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        <div class="text-sm text-white">${data.id_supplier}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        <div class="text-sm text-white">${data.penyuplaian.supplier.nama_supplier}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${data.tanggal_penyuplaian}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${data.bahan_baku.id_bahan_baku}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${data.harga_beli}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${data.kuantitas} Kg
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${data.harga_beli * data.kuantitas}
                    </td>
                </tr>
                `;
            });

            content.innerHTML = html;
            return;
        }

        async function showRekapPengeluaran() {
            const bulan = document.getElementById('bulan-pengeluaran').value;
            const content = document.getElementById('rekap-pengeluaran');
            if (bulan == '') {
                content.innerHTML = `
                <tr class="bg-[#343A40]">
                    <td class="text-center py-2 text-white" colspan="8">
                        Data Tidak Ditemukan
                    </td>
                </tr>
                    `;
                return
            }
            console.log(bulan);
            const response = await fetch(`{{ route('api.getRekapPengeluaran') }}?month=${bulan}`)
            .then(response => response.json())
            .then(data => data)
            .catch(error => console.error(error));
            if (response.code == 404) {
                content.innerHTML = `
                <tr class="bg-[#343A40]">
                    <td class="text-center py-2 text-white" colspan="9">
                        Data Tidak Ditemukan
                    </td>
                </tr>
                    `;
                return;
            }
            const data = response.data;
            let html = '';
            let no = 0;
            data.forEach(data => {
                html += `
                <tr class="${no % 2 != 0 ? 'bg-[#343A40]' : 'bg-[#3F444A]'}">
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${++no}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        <div class="text-sm text-white">${data.id_pengeluaran}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        <div class="text-sm text-white">${data.nama_pengeluaran}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${data.tanggal_pengeluaran}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${data.jenis_pengeluaran}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${data.harga}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${data.satuan}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${data.jumlah_pengeluaran}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-white">
                        ${Math.ceil(data.harga * data.jumlah_pengeluaran)}
                    </td>
                </tr>
                `;
            });

            content.innerHTML = html;
            return;
        }
    </script>
@endsection