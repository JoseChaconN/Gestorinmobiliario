<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        //$this->call(CustomerSeeder::class);
        $this->call(RegionSeeder::class);
        $this->call(CommuneSeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(BankSeeder::class);
        $this->call(RoleSeeder::class);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
