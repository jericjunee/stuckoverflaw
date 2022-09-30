<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'Admin',
                'email' => 'admin@stuckoverflaw.com',
                'password' => bcrypt('1234'),
                'is_admin' => true,
                'created_at' => Carbon::now(),
            ],
        ]);
    }
}
