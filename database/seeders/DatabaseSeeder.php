<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Pelanggan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'leni',
            'email' => 'leni@gmail.com',
            'password' => Hash::make('leni123'),
            'notel' => '0987654321',
            'role' => 'pemilik'
        ]);

        User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'notel' => '0987654321',
            'role' => 'admin'
        ]);

        User::factory()->create([
            'name' => 'binsar',
            'email' => 'binsar@gmail.com',
            'password' => Hash::make('12345678'),
            'notel' => '0987654321',
            'role' => 'pelanggan'
        ]);

        Pelanggan::create([
            'nama_pelanggan' => 'binsar',
            'email_pelanggan' => 'binsar@gmail.com',
            'notelepon_pelanggan' => '0987654321',
            'jeniskelamin_pelanggan' => 'Laki-Laki',
            'alamat_pelanggan' => '-',
            'status_pelanggan' => "biasa"
        ]);
    }
}
