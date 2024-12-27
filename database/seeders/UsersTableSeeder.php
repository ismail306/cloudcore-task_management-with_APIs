<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'id'   => 10,
            'name' => 'user1',
            'email' => 'user1@gmail.com',
            'phone' => '01929074663',
            'email_verified_at' => now(),
            'password' => Hash::make('00000000'),
            'status' => 'ACTIVE',
        ]);
        User::create([
            'id'   => 11,
            'name' => 'user2',
            'email' => 'user2@gmail.com',
            'phone' => '0190000000',
            'email_verified_at' => now(),
            'password' => Hash::make('00000000'),
            'status' => 'ACTIVE',
        ]);

        DB::table('oauth_clients')->insert([
            'id' => '9dd2f727-7059-4ee4-88df-987abe4816ff',
            'user_id' => null,
            'name' => 'Personal Access Client',
            'secret' => 'hk8uZlFXrRMxFI477L6nzofW2LHBt9QBY3goEAHm',
            'provider' => NULL,
            'redirect' => env('APP_URL') ? env('APP_URL') : "http://127.0.0.1:8000/",
            'personal_access_client' => 1,
            'password_client' => 0,
            'revoked' => 0,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('oauth_personal_access_clients')->insert([
            'client_id' => '9dd2f727-7059-4ee4-88df-987abe4816ff',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
