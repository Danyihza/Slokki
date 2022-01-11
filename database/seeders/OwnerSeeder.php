<?php

namespace Database\Seeders;

use App\Models\Owner;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class OwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Owner::create([
            'id_owner' => Uuid::uuid4(),
            'nama_owner' => 'John Doe',
            'username' => 'owner',
            'password' => Hash::make('owner'),
        ]);
    }
}
