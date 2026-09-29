<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       User::truncate();
       Order::truncate();
       Customer::truncate();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Order::factory(1000)->create();

        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);

        $cajero = User::factory()->create([
            'name' => 'Cajero User',
            'email' => 'cajero@example.com',
        ]);

        $roleAdmin = Role::create(['name' => 'admin']);
        $roleCajero = Role::create(['name' => 'cajero']);
    }
}
