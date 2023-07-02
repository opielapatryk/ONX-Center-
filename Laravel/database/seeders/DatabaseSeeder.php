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
        \App\Models\Customer::factory(100)->create();
        \App\Models\Customercar::factory(100)->create();
        \App\Models\Employee::factory(100)->create();
        \App\Models\Order::factory(100)->create();
        \App\Models\User::factory(100)->create();

    }
}
