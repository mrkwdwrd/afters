<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        if (User::where('email', 'admin@admin.com')->count() < 1 && env('APP_ENV') === 'local')
            User::create([
                'username' => 'admin',
                'first_name'    => 'Admin',
                'surname'    => 'User',
                'email'    => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'is_admin' => true
            ]);
    }
}
