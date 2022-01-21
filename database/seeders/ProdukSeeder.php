<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produk::create([
            'id_produk' => Produk::generateIdProduk(),
            'nama_produk' => 'Arabika Honey',
            'kuantitas' => '100 gram',
            'jenis_produk' => 'Kopi Bubuk',
            'harga_jual' => 30000,
            'gambar' => '1.jpg'
        ]);
        
        Produk::create([
            'id_produk' => Produk::generateIdProduk(),
            'nama_produk' => 'Arabika',
            'kuantitas' => '200 gram',
            'jenis_produk' => 'Kopi Bubuk',
            'harga_jual' => 25000,
            'gambar' => '2.jpg'
        ]);

        Produk::create([
            'id_produk' => Produk::generateIdProduk(),
            'nama_produk' => 'Arabika Yellow Caturra',
            'kuantitas' => '100 gram',
            'jenis_produk' => 'Kopi Bubuk',
            'harga_jual' => 40000,
            'gambar' => '3.jpg'
        ]);

        Produk::create([
            'id_produk' => Produk::generateIdProduk(),
            'nama_produk' => 'Kopi Excelsa/Nangka',
            'kuantitas' => '200 gram',
            'jenis_produk' => 'Kopi Bubuk',
            'harga_jual' => 25000,
            'gambar' => '4.jpg'
        ]);
        
        Produk::create([
            'id_produk' => Produk::generateIdProduk(),
            'nama_produk' => 'Robusta',
            'kuantitas' => '200 gram',
            'jenis_produk' => 'Kopi Bubuk',
            'harga_jual' => 25000,
            'gambar' => '5.jpg'
        ]);

        Produk::create([
            'id_produk' => Produk::generateIdProduk(),
            'nama_produk' => 'Robusta Fullwash',
            'kuantitas' => '100 gram',
            'jenis_produk' => 'Kopi Bubuk',
            'harga_jual' => 20000,
            'gambar' => '6.jpg'
        ]);

        Produk::create([
            'id_produk' => Produk::generateIdProduk(),
            'nama_produk' => 'Arabika Fullwash',
            'kuantitas' => '100 gram',
            'jenis_produk' => 'Kopi Bubuk',
            'harga_jual' => 25000,
            'gambar' => '7.jpg'
        ]);

        Produk::create([
            'id_produk' => Produk::generateIdProduk(),
            'nama_produk' => 'Arabika Wine',
            'kuantitas' => '100 gram',
            'jenis_produk' => 'Kopi Bubuk',
            'harga_jual' => 35000,
            'gambar' => '8.jpg'
        ]);

        Produk::create([
            'id_produk' => Produk::generateIdProduk(),
            'nama_produk' => 'Robusta Wine',
            'kuantitas' => '100 gram',
            'jenis_produk' => 'Kopi Bubuk',
            'harga_jual' => 35000,
            'gambar' => '9.jpg'
        ]);

        Produk::create([
            'id_produk' => Produk::generateIdProduk(),
            'nama_produk' => 'Green Bean',
            'kuantitas' => '1 kg',
            'jenis_produk' => 'Bean',
            'harga_jual' => 120000,
            'gambar' => '10.jpg'
        ]);

        Produk::create([
            'id_produk' => Produk::generateIdProduk(),
            'nama_produk' => 'Teh Cascara',
            'kuantitas' => '1kg',
            'jenis_produk' => 'Teh',
            'harga_jual' => 10000,
            'gambar' => '11.jpg'
        ]);

        Produk::create([
            'id_produk' => Produk::generateIdProduk(),
            'nama_produk' => 'Wine Cascara',
            'kuantitas' => '250 ml',
            'jenis_produk' => 'Wine',
            'harga_jual' => 10000,
            'gambar' => '12.jpg'
        ]);
    }
}
