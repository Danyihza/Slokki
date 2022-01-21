{{-- @php
    $lastTransaction = \App\Models\Transaksi::orderBy('tanggal_transaksi', 'DESC')->first();
@endphp --}}
<header class="bg-[#301c11]">
    <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <div class="flex flex-row justify-start w-3/4 space-x-7">
                <div class="text-white text-2xl font-semibold">
                    UMKM HM Abadi
                </div>
                <nav :class="isOpen ? 'hidden' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-1">
                    <div class="flex flex-col sm:flex-row">
                        <a class="mt-3 {{ $state == 'Home' ? 'underline text-gray-200' : 'text-gray-400' }} hover:underline sm:mx-3 sm:mt-0" href="{{ route('admin.homeView') }}">Home</a>
                        <a class="mt-3 {{ $state == 'Catalogue' ? 'underline text-gray-200' : 'text-gray-400' }} hover:underline sm:mx-3 sm:mt-0" href="{{ route('admin.transactionView') }}">Transaksi</a>
                        <a class="mt-3 {{ $state == 'pengeluaran' ? 'underline text-gray-200' : 'text-gray-400' }} hover:underline sm:mx-3 sm:mt-0" href="{{ route('admin.pengeluaranView') }}">Pengeluaran</a>
                        <a class="mt-3 {{ $state == 'pendapatan' ? 'underline text-gray-200' : 'text-gray-400' }} hover:underline sm:mx-3 sm:mt-0" href="{{ route('admin.pendapatanView') }}">Pendapatan</a>
                        <a class="mt-3 {{ $state == 'stok' ? 'underline text-gray-200' : 'text-gray-400' }} hover:underline sm:mx-3 sm:mt-0" href="{{ route('admin.stokView') }}">Stok</a>
                        <a class="mt-3 {{ $state == 'report' ? 'underline text-gray-200' : 'text-gray-400' }} hover:underline sm:mx-3 sm:mt-0" href="{{ route('admin.reportView') }}">Report</a>
                        <a class="mt-3 {{ $state == 'laporan_keuangan' ? 'underline text-gray-200' : 'text-gray-400' }} hover:underline sm:mx-3 sm:mt-0" href="{{ route('admin.laporanKeuanganView') }}">Laporan Keuangan</a>
                    </div>
                </nav>
            </div>
            <div class="flex items-center justify-end w-1/2">
                <div class="flex flex-row space-x-6">
                        <a class="bg-red-500 text-white px-1 rounded" onclick="return confirm('Apakah anda yakin ingin logout?')" href="{{ route('auth.signOut') }}">
                            Logout
                        </a>
                        <span class="text-gray-200 underline">
                            Halo, {{ session('owner')->username }}
                        </span>
                </div>
            </div>
        </div>
        {{-- <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-4">
            <div class="flex flex-col sm:flex-row">
                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Home</a>
                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Shop</a>
                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Categories</a>
                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Contact</a>
                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">About</a>
            </div>
        </nav> --}}
        {{-- <div class="relative mt-6 max-w-lg mx-auto">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>

            <input
                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                type="text" placeholder="Search">
        </div> --}}
    </div>
</header>
