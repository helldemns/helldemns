<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Membuat 1 user manual
        User::factory()->create([
            'name' => 'Admin Shop',
            'email' => 'myluxurystore@gmail.com',
            'password' => bcrypt('helldemns'), // 
        ]);

        // Memanggil ProdukSeeder
        $this->call([
            ProdukSeeder::class,
        ]);
    }
}
