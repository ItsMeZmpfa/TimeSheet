<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $this->createAdminUser();
    }

    public function createAdminUser(): void
    {
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@admin.com',
            'password' => "Test12341234",
            'birthDay' => "2024-07-17",
            'zipCode' => "22117",
            'street' => "Test Street 1",
            'country' => "Test Country",
            'city' => "Test City",
            'phone' => "123-123-123",
        ]);
    }
}
