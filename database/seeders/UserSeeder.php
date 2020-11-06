<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create(['username' => 'cdchap',
                      'name' => 'Christian Chapman',
                      'email' => 'cdchap@pm.me',
                      'password' => Hash::make('password')]);
        $user->assignRole('super-admin');

        $users = User::factory()->count(10)->create();
    }
}
