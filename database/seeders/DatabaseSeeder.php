<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
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
        $this->call([
        ProgramSeeder::class,
    ]);
    }
}


User::create([
    'name' => 'Admin',
    'email' => 'admin@nooran.com',
    'password' => Hash::make('12345'),
]);