@extends('_layouts.master')

@section('content')
<main class="mt-8 mb-24">
    <div class="container mx-auto px-6">
        <div class="flex flex-row">
            <h3 class="mr-24 text-xl text-gray-800 font-medium">ID Transaksi</h3>
            <select id="id_transaksi" name="id_transaksi"
                class="block w-1/4 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-brown-500 focus:border-brown-500 sm:text-sm">
                <option value="" disabled selected>Pilih ID Transaksi</option>
                @foreach ($transactions as $item)
                    <option value="{{ $item->id_transaksi }}">{{ $item->id_transaksi }} - {{ date('Y-m-d', strtotime($transaksi->tanggal_transaksi)) }}</option>
                @endforeach
            </select>
        </div>
        <div id="content-container" class="mt-16 bg-brown-100 rounded-md p-6">
            <h3 class="text-gray-800 text-3xl font-medium mb-8">ID Transaksi = TRX0000001</h3>
            <div class="grid gap-y-1 gap-x-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 mt-6">
                @foreach($transaksi->detailTransaksi as $key => $value)
                <div class="bg-white p-2 rounded-sm justify-between mt-6">
                    <div class="flex flex-between">
                        <img class="h-20 w-20 object-cover rounded"
                            src="{{ asset('assets/images') }}/{{ $value->produk->gambar }}">
                        <div class="flex mx-3 flex-col">
                            <div class="">
                                <h3 class="text-sm text-gray-600">{{ $value->produk->nama_produk }}</h3>
                                <h3 class="text-sm text-gray-600">{{ $value->produk->kuantitas }}</h3>
                            </div>
                            <span class="text-gray-600">Rp
                                {{ number_format($value->price * $value->jumlah, 0, ',', '.') }}
                            </span>
                            <span
                                class="float-right flex text-xs font-bold w-10 h-6 place-content-center items-center bg-brown-300 rounded-md">
                                {{ $value->jumlah }} pcs
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <h3 class="text-xl text-gray-800 font-medium mt-12">Alamat Pengiriman</h3>
            <div class="col-span-3 sm:col-span-3 mb-4">
                <textarea id="alamat" name="alamat" rows="3" disabled
                    class="shadow-sm mt-2 focus:ring-brown-500 focus:border-brown-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                    placeholder="">{{ $transaksi->address }}</textarea>
                <div class="flex flex-row justify-between mt-6">
                    <h3 class="text-xl w-1/4 text-gray-800 font-medium">Metode Pembayaran</h3>
                    <div class="flex flex-col ml-10 w-3/4">
                        <select id="payment_method" name="payment_method" disabled
                            class="block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-brown-500 focus:border-brown-500 sm:text-sm">
                            @switch($transaksi->payment_method)
                            @case('OVO')
                            <option value="ovo">OVO 087743297607</option>
                            @break
                            @case('DANA')
                            <option value="dana">DANA 087743297607</option>
                            @break
                            @case('BRI')
                            <option value="bri">BRI 005101193175518</option>
                            @break
                            @case('BCA')
                            <option value="bca">BCA 8161200032</option>
                            @break
                            @case('MANDIRI')
                            <option value="mandiri">MANDIRI 1560009861549</option>
                            @break
                            @default
                            <option value="">NOT FOUND</option>
                            @endswitch
                        </select>
                        <button type="button"
                            class="flex w-32 items-center justify-center mt-4 px-3 py-2 disabled:cursor-not-allowed cursor-pointer hover:opacity-90 disabled:bg-gray-400 bg-[#301C11] text-white text-sm font-medium rounded focus:outline-none focus:bg-[#301C11]">
                            Lihat Bukti
                        </button>
                    </div>
                </div>
                <div class="flex flex-row justify-between mt-6">
                    <h3 class="text-xl w-1/4 text-gray-800 font-medium">Biaya Kirim</h3>
                    <input type="text"
                        placeholder="Harap masukkan biaya kirim"
                        name="ongkir" id="ongkir" autofocus
                        class="ml-10 w-3/4 disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="flex flex-row justify-between mt-6">
                    <h3 class="text-xl w-1/4 text-gray-800 font-medium">No Resi</h3>
                    <div class="ml-10 flex flex-col w-3/4">
                        <input type="text" placeholder="Harap masukkan nomor resi" name="resi" id="resi"
                            class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="flex flex-row justify-between mt-6">
                    <h3 class="text-xl w-1/4 text-gray-800 font-medium">Total Harga</h3>
                    <input type="text"
                        value="Rp {{ number_format($transaksi->total_amount,0,',','.') }} {{ $transaksi->ongkir ? '(Termasuk ongkir)' : '(Belum termasuk ongkir)' }}"
                        name="total_amount" id="total_amount" disabled
                        class="ml-10 w-3/4 disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="flex flex-row justify-between mt-12">
                    @if($transaksi->bukti_pembayaran == null)
                    <label class="flex cursor-pointer" for="upload">
                        <form id="formUploadBuktiPembayaran" action="{{ route('order.uploadBuktiPembayaran') }}"
                            enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="id_transaksi" value="{{ $transaksi->id_transaksi }}">
                            <span
                                class="flex w-fit items-center justify-center mt-4 px-3 py-2 hover:opacity-90 disabled:bg-gray-400 bg-[#301C11] text-white text-sm font-medium rounded focus:outline-none focus:bg-[#301C11]">
                                Upload Bukti Pembayaran
                            </span>
                            <input class="hidden" id="upload" name="bukti_pembayaran" accept=".png, .jpg, .jpeg"
                                type="file" oninput="document.getElementById('formUploadBuktiPembayaran').submit()">
                        </form>
                    </label>
                    @else
                    <button type="button" @click="paymentModal = !paymentModal"
                        class="flex w-fit items-center justify-center mt-4 px-3 py-2 disabled:bg-gray-400 hover:opacity-90 bg-[#301C11] text-white text-sm font-medium rounded focus:outline-none focus:bg-[#301C11]">
                        Upload Resi
                    </button>
                    @endif
                </div>
                <div class="flex flex-row mt-6 items-center">
                    <input name="" type="checkbox"
                        class="focus:ring-brown-500 h-4 w-4 text-brown-600 border-gray-300 rounded">
                    <span class="ml-2 py-auto">Diproses</span>
                </div>
                <div class="flex flex-row mt-2 items-center">
                    <input name="" type="checkbox"
                        class="focus:ring-brown-500 h-4 w-4 text-brown-600 border-gray-300 rounded">
                    <span class="ml-2 py-auto">Dikemas</span>
                </div>
                <div class="flex flex-row mt-2 items-center">
                    <input name="" type="checkbox"
                        class="focus:ring-brown-500 h-4 w-4 text-brown-600 border-gray-300 rounded">
                    <span class="ml-2 py-auto">Dikirim</span>
                </div>
                <div class="flex flex-row mt-2 items-center">
                    <input name="" type="checkbox"
                        class="focus:ring-brown-500 h-4 w-4 text-brown-600 border-gray-300 rounded">
                    <span class="ml-2 py-auto">Diterima</span>
                </div>
                <div class="mt-8 flex justify-center">
                    <button type="button"
                        class="flex w-fit items-center justify-center px-3 py-2 disabled:bg-gray-400 hover:opacity-90 bg-[#301C11] text-white text-sm font-medium rounded focus:outline-none focus:bg-[#301C11]">
                        Simpan
                    </button>
                </div>
            </div>
        </div>
</main>

<!-- Modal Backdrop -->
<div x-show="paymentModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-80 sm:items-center sm:justify-center">
    <!-- Modal -->
    <div x-show="paymentModal" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0  transform translate-y-4 sm:translate-y-0 sm:scale-95"
        @click.away="paymentModal = !paymentModal" @keydown.escape="paymentModal = !paymentModal"
        class="w-fit overflow-hidden rounded-t-lg sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="modal">
        {{-- <header class="flex justify-end ">
            <button class="inline-flex items-center justify-center w-6 h-6 text-gray-400 transition-colors duration-150 rounded dark:hover:text-gray-200 hover: hover:text-gray-700" aria-label="close" @click="paymentModal = !paymentModal">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" role="img" aria-hidden="true">
                    <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                </svg>
            </button>
        </header> --}}
        </button>
        <img src="{{ asset('assets/payments/' . $transaksi->bukti_pembayaran) }}" alt="">
    </div>
</div>

@endsection

@section('script')
@if (session('success'))
<script>

    Swal.fire({
        title: 'Berhasil!',
        text: '{{ session('
        success ') }}',
        icon: 'success',
        confirmButtonText: 'Oke',
        confirmButtonColor: '#301C11'
    })

</script>
@endif
<script>
    async function getTransaction(){
        
    }
</script>
@endsection
