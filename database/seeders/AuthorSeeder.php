<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    /**
     * Untuk author seeder 
     * disini kita memanggil model Author lalu
     * menambahkan method factory() ke tabel tersebut dengan method create()
     * sebanyak 10 data seperti yang di definisikan pada method count()
     * 
     * Pastikan buat file factory terlebih dahulu sebelum menjalankan file seeder ini
     */
    public function run()
    {
        Author::factory()->count(10)->create();
    }
}
