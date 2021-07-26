<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\SuperAdmin::create(['user_name' => 'admin', 'phone_number' => '01812391633', 'email' => 'admin@doorsoft.co', 'password' => bcrypt('123456')]);
    }
}
