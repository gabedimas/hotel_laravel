<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('booking')->insert([
            'id' => 1,
            'user_id' => 'Literature',
            'kamar_id' => 'Literature',
            'status' => 'APPROVAL',
            'tanggal_awal' => '2022-06-09',
            'tanggal_akhir' => '2022-06-19',
          ]);

          DB::table('user')->insert([
            'id' => 1,
            'nama' => 'Gabe Dimas',
            'email' => 'gabe.dimas10@gmail.com',
            'password' => bcrypt('gabe123'),
            'role' => 'admin'
          ]);

          DB::table('kamar')->insert([
            'id' => 1,
            'nama' => 'A-001',
            'klasifikasi_id' => 1
          ]);

          DB::table('klasifikasi')->insert([
            'id' => 1,
            'nama' => 'Alpha Room',
            'jumlah_kapasitas' => 10,
            'harga' => 5000000
          ]);
    }
}
