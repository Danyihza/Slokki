<?php

namespace Database\Seeders;

use App\Models\BahanBaku;
use Illuminate\Database\Seeder;

class BahanBakuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BahanBaku::create([
            'id_bahan_baku' => 'BBK001',
            'nama_bahan_baku' => 'Ceri Arabika',
            'harga_beli' => 6500,
        ]);

        BahanBaku::create([
            'id_bahan_baku' => 'BBK002',
            'nama_bahan_baku' => 'Ceri Robusta',
            'harga_beli' => 6500,
        ]);

        BahanBaku::create([
            'id_bahan_baku' => 'BBK003',
            'nama_bahan_baku' => 'Ceri Kopi Nangka',
            'harga_beli' => 6000,
        ]);

        BahanBaku::create([
            'id_bahan_baku' => 'BBK004',
            'nama_bahan_baku' => 'Ceri Kopi Yellow Culturra',
            'harga_beli' => 7000,
        ]);
    }
}
