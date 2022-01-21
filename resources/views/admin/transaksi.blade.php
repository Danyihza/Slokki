@extends('admin._layouts.master')

@section('content')
<main class="mt-8 mb-24">
    <div class="container mx-auto px-6">
        <div class="flex flex-row">
            <h3 class="mr-24 text-xl text-gray-800 font-medium">ID Transaksi</h3>
            <select id="id_transaksi" name="id_transaksi" onchange="getTransaction(this.value)"
                class="block w-1/4 py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-brown-500 focus:border-brown-500 sm:text-sm">
                <option value="" disabled selected>Pilih ID Transaksi</option>
                @foreach ($transactions as $item)
                    <option {{ session('last_transaction') && $item->id_transaksi == session('last_transaction') ? 'selected' : '' }} value="{{ $item->id_transaksi }}">{{ $item->id_transaksi }} - {{ date('Y-m-d', strtotime($item->tanggal_transaksi)) }}</option>
                @endforeach
            </select>
        </div>
        <form action="{{ route('admin.updateTransaction') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="content-container" class="mt-16 bg-brown-100 rounded-md p-6">
                <div class="opacity-70">
                    <div class="flex justify-center">
                        <img class="w-56" src="{{ asset('assets/illustrations/not-found.svg') }}" alt="">
                    </div>
                    <div class="text-center">
                        Tidak Ada Transaksi
                    </div>
                </div>
            </div>
        </form>
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
        class="w-fit overflow-hidden rounded-t-lg sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="paymentModal">
    </div>
</div>

<!-- Modal Backdrop -->
<div x-show="resiModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-30 flex items-end bg-black bg-opacity-80 sm:items-center sm:justify-center">
    <!-- Modal -->
    <div x-show="resiModal" x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 transform translate-y-4 sm:translate-y-0 sm:scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave="transition ease-in duration-200"
        x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
        x-transition:leave-end="opacity-0  transform translate-y-4 sm:translate-y-0 sm:scale-95"
        @click.away="resiModal = !resiModal" @keydown.escape="resiModal = !resiModal"
        class="w-fit overflow-hidden rounded-t-lg sm:rounded-lg sm:m-4 sm:max-w-xl" role="dialog" id="resiModal">
    </div>
</div>

@endsection

@section('script')

@if($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: `{{ $errors->first() }}`,
    })
</script>
@endif

@if (session('success'))
<script>
    Swal.fire({
        title: 'Berhasil!',
        text: `{{ session('success') }}`,
        icon: 'success',
        confirmButtonText: 'Oke',
        confirmButtonColor: '#301C11'
    })
</script>
@endif
<script>
    async function getTransaction(id){
        // const id = document.getElementById('id_transaksi').value;
        const response = await fetch(`{{ route('api.getTransaction') }}?id=${id}`)
        .then(response => response.json())
        .then(result => result)
        .catch(error => console.error(error));

        const data = response.data;

        console.log(data.total_amount);
        let html = `
        <h3 class="text-gray-800 text-3xl font-medium mb-8">ID Transaksi = ${data.id_transaksi}</h3>
        <div class="grid gap-y-1 gap-x-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 mt-6">
        <input type="hidden" name="id_transaksi" value="${data.id_transaksi}">
        `;

        data.detail_transaksi.forEach(detail => {
            html += `
            <div class="bg-white p-2 rounded-sm justify-between mt-6">
                <div class="flex flex-between">
                    <img class="h-20 w-20 object-cover rounded"
                        src="{{ asset('assets/images') }}/${detail.produk.gambar}">
                    <div class="flex mx-3 flex-col">
                        <div class="">
                            <h3 class="text-sm text-gray-600">${detail.produk.nama_produk}</h3>
                            <h3 class="text-sm text-gray-600">${detail.produk.kuantitas}</h3>
                        </div>
                        <span class="text-gray-600">Rp
                            ${numberWithDots(detail.price * detail.jumlah)}
                        </span>
                        <span
                            class="float-right flex text-xs font-bold w-10 h-6 place-content-center items-center bg-brown-300 rounded-md">
                            ${ detail.jumlah } pcs
                        </span>
                    </div>
                </div>
            </div>
            `;
        });
        html += `
        </div>
            <h3 class="text-xl text-gray-800 font-medium mt-12">Alamat Pengiriman</h3>
            <div class="col-span-3 sm:col-span-3 mb-4">
                <textarea id="alamat" name="alamat" rows="3" disabled
                    class="shadow-sm mt-2 focus:ring-brown-500 focus:border-brown-500 block w-full sm:text-sm border border-gray-300 rounded-md"
                    placeholder="">${data.address}</textarea>
                <div class="flex flex-row justify-between mt-6">
                    <h3 class="text-xl w-1/4 text-gray-800 font-medium">Metode Pembayaran</h3>
                    <div class="flex flex-col ml-10 w-3/4">
                        <select id="payment_method" name="payment_method" disabled
                            class="block py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-brown-500 focus:border-brown-500 sm:text-sm">
        `;

        switch (data.payment_method) {
            case 'OVO':
                html += `
                <option value="ovo">OVO 087743297607</option>
                `;
                break;
            case 'DANA':
                html += `
                <option value="dana">DANA 087743297607</option>
                `;
                break;
            case 'BRI':
            html += `
                <option value="bri">BRI 005101193175518</option>
                `;
                break;
            case 'BCA':
            html += `
                <option value="bca">BCA 8161200032</option>
                `;
                break;
            case 'MANDIRI':
            html += `
                <option value="mandiri">MANDIRI 1560009861549</option>
                `;
                break;
            case 'COD':
            html += `
                <option value="cod">COD (Cash On Delivery)</option>
                `;
                break;
        
            default:
            html += `
                <option value="">NOT FOUND</option>
                `;
                break;
        }

        html += `
                        </select>
                        <button type="button" @click="paymentModal = !paymentModal" ${data.bukti_pembayaran ? '' : 'disabled'}
                            class="flex w-32 items-center justify-center mt-4 px-3 py-2 disabled:cursor-not-allowed cursor-pointer hover:opacity-90 disabled:bg-gray-400 bg-[#301C11] text-white text-sm font-medium rounded focus:outline-none focus:bg-[#301C11]">
                            Lihat Bukti
                        </button>
                    </div>
                </div>
                <div class="flex flex-row justify-between mt-6">
                    <h3 class="text-xl w-1/4 text-gray-800 font-medium">Biaya Kirim</h3>
                    <input type="text"
                        placeholder="Harap masukkan biaya kirim"
                        name="ongkir" id="ongkir" autofocus value="${data.ongkir ?? ''}"
                        class="ml-10 w-3/4 disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="flex flex-row justify-between mt-6">
                    <h3 class="text-xl w-1/4 text-gray-800 font-medium">No Resi</h3>
                    <div class="ml-10 flex flex-col w-3/4">
                        <input type="text" placeholder="Harap masukkan nomor resi" name="resi" id="resi" value="${data.no_resi ?? ''}"
                            class="w-full disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                    </div>
                </div>
                <div class="flex flex-row justify-between mt-6">
                    <h3 class="text-xl w-1/4 text-gray-800 font-medium">Total Harga</h3>
                    <input type="text"
                        value="Rp ${data.ongkir == null ? numberWithDots(data.total_amount) + ' (Belum termasuk ongkir)' : numberWithDots(data.total_amount+data.ongkir) + ' (Sudah termasuk ongkir)'}"
                        name="total_amount" id="total_amount" disabled
                        class="ml-10 w-3/4 disabled:bg-gray-100 disabled:text-gray-600 focus:ring-brown-500 focus:border-brown-500 block shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="flex flex-row justify-start mt-12">
                    <label class="flex cursor-pointer" for="upload">
                        <span
                            class="flex w-fit items-center justify-center mt-4 px-3 py-2 hover:opacity-90 disabled:bg-gray-400 bg-[#301C11] text-white text-sm font-medium rounded focus:outline-none focus:bg-[#301C11]">
                            Upload Resi
                        </span>
                        <input class="hidden" id="upload" name="resi_file" accept=".png, .jpg, .jpeg" type="file" oninput="previewImage()">
                    </label>
                    <button type="button" @click="resiModal = !resiModal" class="${data.bukti_resi ? '' : 'hidden'} ml-4 flex w-fit items-center justify-center mt-4 px-3 py-2 hover:opacity-90 disabled:bg-gray-400 bg-[#301C11] text-white text-sm font-medium rounded focus:outline-none focus:bg-[#301C11]">
                        Lihat Resi
                    </button>
                </div>
                <div class="mt-3">
                    <img class="w-24 hidden" id="uploadPreview">
                </div>
                <div class="flex flex-row mt-6 items-center">
                    <input name="diproses" type="checkbox" ${data.status.diproses == 1 ? 'checked' : ''}
                        class="focus:ring-brown-500 h-4 w-4 text-brown-600 border-gray-300 rounded">
                    <span class="ml-2 py-auto">Diproses</span>
                </div>
                <div class="flex flex-row mt-2 items-center">
                    <input name="dikemas" type="checkbox" ${data.status.dikemas == 1 ? 'checked' : ''}
                        class="focus:ring-brown-500 h-4 w-4 text-brown-600 border-gray-300 rounded">
                    <span class="ml-2 py-auto">Dikemas</span>
                </div>
                <div class="flex flex-row mt-2 items-center">
                    <input name="dikirim" type="checkbox" ${data.status.dikirim == 1 ? 'checked' : ''}
                        class="focus:ring-brown-500 h-4 w-4 text-brown-600 border-gray-300 rounded">
                    <span class="ml-2 py-auto">Dikirim</span>
                </div>
                <div class="flex flex-row mt-2 items-center">
                    <input name="diterima" type="checkbox" ${data.status.diterima == 1 ? 'checked' : ''}
                        class="focus:ring-brown-500 h-4 w-4 text-brown-600 border-gray-300 rounded">
                    <span class="ml-2 py-auto">Diterima</span>
                </div>
                <div class="mt-8 flex justify-center">
                    <button type="submit"
                        class="flex w-fit items-center justify-center px-3 py-2 disabled:bg-gray-400 hover:opacity-90 bg-[#301C11] text-white text-sm font-medium rounded focus:outline-none focus:bg-[#301C11]">
                        Simpan
                    </button>
                </div>
            </div>
        `;
        const container = document.getElementById('content-container');
        const paymentModal = document.getElementById('paymentModal');
        const resiModal = document.getElementById('resiModal');
        paymentModal.innerHTML = `
        <img src="{{ asset('assets/payments') }}/${data.detail_transaksi[0].transaksi.bukti_pembayaran}" alt="">
        `;

        resiModal.innerHTML = `
        <img src="{{ asset('assets/resi') }}/${data.bukti_resi}" alt="">
        `;
        container.innerHTML = html;
        return;


    }

    @if(session('last_transaction'))
    getTransaction("{{ session('last_transaction') }}");
    @endif

    function numberWithDots(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
    }

    function previewImage() {
        const imgInput = document.getElementById('upload');
        const previewContainer = document.getElementById('uploadPreview');
        previewContainer.classList.remove('hidden');
        const [file] = imgInput.files
        if (file) {
            previewContainer.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection
