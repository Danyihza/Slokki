<div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'"
    class="fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300 z-50 hidden"
    x-init="() => { $el.classList.remove('hidden'); }">
    <div class="flex items-center justify-between">
        <h3 class="text-2xl font-medium text-gray-700">Your cart</h3>
        <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <hr class="my-3">
    @if(session('cart'))
    <form action="{{ route('checkout') }}" method="POST">
        @csrf
        @foreach(session('cart') as $id => $details)
        <div class="flex justify-between mt-6">
            <div class="flex">
                <img class="h-20 w-20 object-cover rounded"
                    src="{{ asset('assets/images') }}/{{ $details['gambar_produk'] }}">
                <div class="mx-3">
                    <h3 class="text-xs font-bold text-gray-600">{{ $details['nama_produk'] }}</h3>
                    <h3 class="text-xs text-gray-600">{{ $details['netto'] }}</h3>
                    <div class="flex items-center mt-2">
                        <button type="button" onclick="decreaseQuantityCart('{{ $id }}')"
                            class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </button>
                        <span class="text-gray-700 mx-2">{{ $details['quantity'] }}</span>
                        <button type="button" onclick="increaseQuantityCart('{{ $id }}')"
                            class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                <path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <span class="text-gray-600 min-w-max">Rp
                    {{ number_format($details['harga_produk'] * $details['quantity'], 0, ',', '.') }}</span>
                <div class="flex justify-end mt-5 h-5">
                    <input name="selected[]" type="checkbox" value="{{ $id }}" checked
                        class="focus:ring-brown-500 h-4 w-4 text-brown-600 border-gray-300 rounded">
                </div>
            </div>
        </div>
        @endforeach
        <button type="submit"
            class="flex items-center justify-center w-full mt-4 px-3 py-2 bg-[#301C11] text-white text-sm uppercase font-medium rounded hover:bg-[#301C11] focus:outline-none focus:bg-[#301C11]">
            <span>Checkout</span>
            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" stroke="currentColor">
                <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
            </svg>
        </button>
    </form>
    @else
    <div class="flex justify-center">
        <h3 class="text-gray-600">Your cart is empty</h3>
    </div>
    @endif

</div>
