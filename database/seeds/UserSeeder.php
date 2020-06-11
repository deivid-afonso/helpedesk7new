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
        \App\User::create([
            'name' => 'Deivid', 
            'email' => 'deividsa@gmail.com',
            'password' => '12345678910'
        ])->roles()->attach(\Spatie\Permission\Models\Role::where('name', 'Admin')->first()->id);
    }
}
