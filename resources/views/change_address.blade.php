@extends('_layouts.master')
@php
    $alamat = explode(',', $customer->alamat_customer);
@endphp
@section('content')
<main class="my-8">
    <div class="container mx-auto px-6">
        {{-- <div class="flex justify-center">
            <img src="{{ asset('assets/images/logo/logo.jpg') }}" class="lg:w-1/6 w-3/4" alt="">
    </div> --}}
    <div class="mt-16">
        <div class="text-center">
            <h2 class="text-4xl font-bold">Ganti Alamat</h2>
        </div>
        <div class="md:mx-96 mt-12">
            @if ($errors->any())
            <div id="alert-success" class="text-white px-6 py-4 border-0 rounded relative mb-4 bg-red-500">
                <span class="text-xl inline-block mr-5 align-middle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                </span>
                <span class="inline-block align-middle mr-8">
                    <b class="capitalize">Error!</b> Semua Wajib Terisi
                </span>
                <button onclick="document.getElementById('alert-success').style.display='none'"
                    class="absolute bg-transparent text-2xl font-semibold leading-none right-0 top-0 mt-4 mr-6 outline-none focus:outline-none">
                    <span>×</span>
                </button>
            </div>
            @endif
            <form action="{{ route('changeAddress') }}" method="POST">
                @csrf
                <div class="col-span-6 sm:col-span-3 mb-4">
                    <label for="nama_lengkap" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input disabled type="text" placeholder="John Doe" name="nama_lengkap" id="nama_lengkap" value="{{ $customer->nama_customer }}"
                        class="mt-1 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="col-span-6 sm:col-span-3 mb-4">
                    <label for="no_telp" class="block text-sm font-medium text-gray-700">No. Telepon</label>
                    <input disabled type="text" placeholder="0812345678912" name="no_telp" id="no_telp" value="{{ $customer->no_telp }}"
                        class="mt-1 focus:ring-brown-500 focus:border-brown-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="col-span-6 sm:col-span-3 mb-4">
                    <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                    <select id="provinsi" name="province" onchange="getRegencies()"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-brown-500 focus:border-brown-500 sm:text-sm">
                        <option value="" disabled selected>Pilih Provinsi</option>
                        @foreach ($provinces as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-3 mb-4">
                    <label for="kota_kab" class="block text-sm font-medium text-gray-700">Kota/Kabupaten</label>
                    <select id="kota_kab" name="city" disabled onchange="getDistricts()"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-brown-500 focus:border-brown-500 sm:text-sm">
                    </select>
                </div>
                <div class="col-span-6 sm:col-span-3 mb-4">
                    <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                    <select id="kecamatan" name="district" disabled onchange="getVillages()"
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-brown-500 focus:border-brown-500 sm:text-sm">

                    </select>
                </div>
                <div class="col-span-6 sm:col-span-3 mb-4">
                    <label for="desa_kel" class="block text-sm font-medium text-gray-700">Desa/Kelurahan</label>
                    <select id="desa_kel" name="village" disabled
                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-brown-500 focus:border-brown-500 sm:text-sm">

                    </select>
                </div>
                <div class="col-span-6 sm:col-span-3 mb-4">
                    <label for="alamat" class="block text-sm font-medium text-gray-700">
                        Alamat Detail
                    </label>
                    <div class="mt-1">
                        <textarea id="alamat" name="address" rows="3"
                            class="shadow-sm focus:ring-brown-500 focus:border-brown-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"
                            placeholder="">{{ $alamat[0] }}</textarea>
                    </div>
                </div>
                <button type="submit"
                    class="mt-2 w-full inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-[#301C11] hover:bg-brown-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-brown-500 disabled:bg-grey-200">
                    Simpan
                </button>
            </form>
        </div>
    </div>
</main>
@endsection

@section('script')
<script>
    async function getRegencies() {
        const id_province = document.querySelector('#provinsi').value;
        const response = await fetch(`{{ route('api.getRegencies') }}?province_id=${id_province}`)
            .then(res => res.json())
            .then(data => data.data)
            .catch(err => console.error(err));

        const kota_kab = document.querySelector('#kota_kab');
        kota_kab.innerHTML = '<option value="" disabled selected>Pilih Kota/Kabupaten</option>';
        response.forEach(item => {
            const option = document.createElement('option');
            option.value = item.id;
            option.innerHTML = item.name;
            kota_kab.appendChild(option);
        });

        kota_kab.disabled = false;

        const kecamatan = document.querySelector('#kecamatan');
        kecamatan.innerHTML = '';
        kecamatan.disabled = true;

        const desa_kel = document.querySelector('#desa_kel');
        desa_kel.innerHTML = '';
        desa_kel.disabled = true;
    }

    async function getDistricts() {
        const id_regency = document.querySelector('#kota_kab').value;
        console.log(id_regency);
        if (id_regency == '') {
            const kecamatan = document.querySelector('#kecamatan');
            kecamatan.innerHTML = '';
            kecamatan.disabled = true;

            const desa_kel = document.querySelector('#desa_kel');
            desa_kel.innerHTML = '';
            desa_kel.disabled = true;
            return;
        }
        const response = await fetch(`{{ route('api.getDistricts') }}?regency_id=${id_regency}`)
            .then(res => res.json())
            .then(data => data.data)
            .catch(err => console.error(err));

        const kecamatan = document.querySelector('#kecamatan');
        kecamatan.innerHTML = '<option value="" disabled selected>Pilih Kecamatan</option>';
        response.forEach(item => {
            const option = document.createElement('option');
            option.value = item.id;
            option.innerHTML = item.name;
            kecamatan.appendChild(option);
        });

        kecamatan.disabled = false;

        const desa_kel = document.querySelector('#desa_kel');
        desa_kel.innerHTML = '';
        desa_kel.disabled = true;
    }

    async function getVillages() {
        const id_district = document.querySelector('#kecamatan').value;
        if (id_district == '') {
            const desa_kel = document.querySelector('#desa_kel');
            desa_kel.innerHTML = '';
            desa_kel.disabled = true;
            return;
        }
        const response = await fetch(`{{ route('api.getVillages') }}?district_id=${id_district}`)
            .then(res => res.json())
            .then(data => data.data)
            .catch(err => console.error(err));

        const desa_kel = document.querySelector('#desa_kel');
        desa_kel.innerHTML = '<option value="" disabled selected>Pilih Desa/Kelurahan</option>';
        response.forEach(item => {
            const option = document.createElement('option');
            option.value = item.id;
            option.innerHTML = item.name;
            desa_kel.appendChild(option);
        });

        desa_kel.disabled = false;
    }

    async function checkEmail(){
        const inputEmail = document.querySelector('#email');
        const email_error = document.querySelector('#alert-email');
        const email = inputEmail.value;
        const response = await fetch(`{{ route('api.checkEmail') }}?email=${email}`)
            .then(res => res.json())
            .then(data => data)
            .catch(err => console.error(err));

        if(response.status == 'success'){
            // console.log('email tersedia');
            email_error.classList.remove('hidden');
        } else {
            // console.log('email tidak tersedia');
            email_error.classList.add('hidden');
        }
    }

    async function checkUsername(){
        const inputUsername = document.querySelector('#username');
        const username_error = document.querySelector('#alert-username');
        const username = inputUsername.value;
        const response = await fetch(`{{ route('api.checkUsername') }}?username=${username}`)
            .then(res => res.json())
            .then(data => data)
            .catch(err => console.error(err));

        if(response.status == 'success'){
            // console.log('username tersedia');
            username_error.classList.remove('hidden');
        } else {
            // console.log('username tidak tersedia');
            username_error.classList.add('hidden');
        }
    }

    function checkPassword(){
        const inputPassword = document.querySelector('#password');
        const inputPasswordConfirm = document.querySelector('#conf_password');
        const password_error = document.querySelector('#alert-password');
        const password = inputPassword.value;
        const password_confirm = inputPasswordConfirm.value;

        if(password != password_confirm){
            // console.log('password tidak sama');
            password_error.classList.remove('hidden');
        } else {
            // console.log('password sama');
            password_error.classList.add('hidden');
        }
    }

    function checkRegexPassword() {
        const inputPassword = document.querySelector('#password');
        const password_error = document.querySelector('#alert-password');
        const password = inputPassword.value;

        const regex = /^(?=.*\d)[A-Za-z\d@$!%*?&]{6,}$/;
        if(!regex.test(password)){
            console.log('password tidak sesuai');
            // password_error.classList.remove('hidden');
            inputPassword.classList.remove('focus:border-brown-500');
            inputPassword.classList.remove('focus:ring-brown-500');
            inputPassword.classList.add('focus:border-red-500');
            inputPassword.classList.add('border-red-500');
        } else {
            console.log('password sesuai');
            // password_error.classList.add('hidden');
            inputPassword.classList.add('focus:border-brown-500');
            inputPassword.classList.add('focus:ring-brown-500');
            inputPassword.classList.remove('focus:border-red-500');
            inputPassword.classList.remove('border-red-500');
        }
    }

</script>
@endsection
