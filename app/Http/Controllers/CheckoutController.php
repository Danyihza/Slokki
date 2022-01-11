<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\Village;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout(Request $request)
    {
        $selectedCart = $request->selected;
        // dd($selectedCart);
        $confirmProduct = ['total' => 0];
        foreach(session('cart') as $id => $details) {
            foreach($selectedCart as $value) {
                if($id == $value) {
                    $confirmProduct['data'][$id] = $details;
                    $confirmProduct['total'] += $details['harga_produk'] * $details['quantity'];
                }
            }
        }
        // dd($confirmProduct);
        session()->put('confirm_product', $confirmProduct);
        return redirect()->route('checkoutView');
    }

    public function checkoutView()
    {
        $user = session()->get('user');
        $address = Customer::where('id_customer', $user->id_customer)->first()->alamat_customer;
        $data['address'] = $address;
        $data['state'] = 'Checkout';
        return view('checkout', $data);
    }

    public function changeAddressView()
    {
        $id_customer = session()->get('user')->id_customer;
        $data['customer'] = Customer::where('id_customer', $id_customer)->first();
        $data['state'] = 'Change Address';
        $data['provinces'] = Province::orderBy('name', 'asc')->get();
        return view('change_address', $data);
    }

    public function changeAdress(Request $request)
    {
        $request->validate([
            'province' => 'required',
            'city' => 'required',
            'district' => 'required',
            'village' => 'required',
            'address' => 'required',
        ]);

        $id_customer = session()->get('user')->id_customer;
        $new_address = $request->address;
        $province =  Province::where('id', $request->province)->first()->name;
        $city = Regency::where('id', $request->city)->first()->name;
        $district = District::where('id', $request->district)->first()->name;
        $village = Village::where('id', $request->village)->first()->name;
        $address = $new_address . ', ' . $village . ', ' . $district . ', ' . $city . ', ' . $province;
        $customer = Customer::where('id_customer', $id_customer)->first();
        $customer->alamat_customer = $address;
        $customer->save();
        return redirect()->route('checkoutView');
    }
}
