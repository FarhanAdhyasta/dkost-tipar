<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Room::create([
            'nameroom' => 'Kamar 01',
            'slug' => 'kamar-satu',
            'typeroom' => 'standar',
            'feature' => 'Kamar mandi Luar, Wifi, Listrik, Kasur',
            'price' => 250000,
            'status' => 'Tersedia'
        ]);
        Room::create([
            'nameroom' => 'Kamar 02',
            'slug' => 'kamar-dua',
            'typeroom' => 'standar',
            'feature' => 'Kamar mandi Luar, Wifi, Listrik, Kasur',
            'price' => 250000,
            'status' => 'Tersedia'
        ]);
        Room::create([
            'nameroom' => 'Kamar 03',
            'slug' => 'kamar-tiga',
            'typeroom' => 'deluxe',
            'feature' => 'Kamar mandi Luar, Wifi, Listrik, Kasur',
            'price' => 600000,
            'status' => 'Tersedia'
        ]);
        Room::create([
            'nameroom' => 'Kamar 04',
            'slug' => 'kamar-empat',
            'typeroom' => 'deluxe',
            'feature' => 'Kamar mandi Luar, Wifi, Listrik, Kasur',
            'price' => 600000,
            'status' => 'Tersedia'
        ]);
        Room::create([
            'nameroom' => 'Kamar 05',
            'slug' => 'kamar-lima',
            'typeroom' => 'deluxe',
            'feature' => 'Kamar mandi Luar, Wifi, Listrik, Kasur',
            'price' => 600000,
            'status' => 'Tersedia'
        ]);
    }
}
