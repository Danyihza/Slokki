<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('auth.login');
    }

    public function registerView()
    {
        $data['provinces'] = Province::orderBy('name', 'ASC')->get();
        return view('auth.register', $data);
    }

    public function signIn(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        $user = User::where('username', $username)->first();

        if ($user && Hash::check($password, $user->password)) {
            $request->session()->put('user', $user);
            return redirect()->route('home.homeView');
        }

        return redirect()->route('auth.loginView')->with('error', 'Username atau password salah');
    }

    public function signUp(Request $request)
    {
        try {
            $request->validate([
                'email' => 'required|email|unique:App\Models\Customer,email',
                'nama_lengkap' => 'required',
                'no_telp' => 'required|numeric',
                'provinsi' => 'required',
                'kota_kab' => 'required',
                'kecamatan' => 'required',
                'desa_kel' => 'required',
                'alamat' => 'required',
                'username' => 'required|unique:App\Models\Customer,username',
                'conf_password' => 'required|min:6',
            ]);

            $email = $request->email;
            $nama_lengkap = $request->nama_lengkap;
            $no_telp = $request->no_telp;
            $provinsi = Province::where('id', $request->provinsi)->first()->name;
            $kota_kab = Regency::where('id', $request->kota_kab)->first()->name;
            $kecamatan = District::where('id', $request->kecamatan)->first()->name;
            $desa_kel = Village::where('id', $request->desa_kel)->first()->name;
            $alamat = $request->alamat;
            $username = $request->username;
            $password = $request->password;

            $customer = new Customer;
            $customer->id_customer = Uuid::uuid4();
            $customer->email = $email;
            $customer->nama_customer = $nama_lengkap;
            $customer->no_telp = $no_telp;
            $customer->alamat_customer = $alamat . ', ' . $desa_kel . ', ' . $kecamatan . ', ' . $kota_kab . ', ' . $provinsi;
            $customer->username = $username;
            $customer->password = Hash::make($password);
            $customer->save();

            return redirect()->route('auth.loginView')->with('success', 'Akun berhasil dibuat, Silahkan login');
        } catch (\Throwable $th) {
            // dd($th->getMessage());
            return redirect()->route('auth.registerView')->with('error', $th->getMessage());
        }
    }
}
