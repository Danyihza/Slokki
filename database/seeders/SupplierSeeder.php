<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Supplier::create([
            'id_supplier' => 'SPL001',
            'nama_supplier' => 'Sumarto',
            'alamat_supplier' => 'RT 11 RW 04 Dusun Satin Desa Bermi (Depan Toko Pupuk) 081336548721'
        ]);

        Supplier::create([
            'id_supplier' => 'SPL002',
            'nama_supplier' => 'Asih Lestari',
            'alamat_supplier' => 'RT 02 RW 01 Desa Bermi 082331518792'
        ]);

        Supplier::create([
            'id_supplier' => 'SPL003',
            'nama_supplier' => 'Agung',
            'alamat_supplier' => 'RT 05 RW 02 Desa Tiris 087643810224'
        ]);

        Supplier::create([
            'id_supplier' => 'SPL004',
            'nama_supplier' => 'Indah Sumartini',
            'alamat_supplier' => 'RT 14 RW 05 Desa Bermi (belakang masjid) 081217388954'
        ]);
    }
}
