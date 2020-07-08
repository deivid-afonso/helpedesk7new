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
        
        \App\User::create([
            'name' => 'juca', 
            'email' => 'juca@fatec.com',
            'password' => '12345678910'
        ])->roles()->attach(\Spatie\Permission\Models\Role::where('name', 'User')->first()->id);

        \App\User::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => '12345678910'
        ])->roles()->attach(\Spatie\Permission\Models\Role::where('name', 'User')->first()->id);
        \App\User::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => '12345678910'
        ])->roles()->attach(\Spatie\Permission\Models\Role::where('name', 'User')->first()->id);
        \App\User::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => '12345678910'
        ])->roles()->attach(\Spatie\Permission\Models\Role::where('name', 'User')->first()->id);
        \App\User::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => '12345678910'
        ])->roles()->attach(\Spatie\Permission\Models\Role::where('name', 'User')->first()->id);
        \App\User::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => '12345678910'
        ])->roles()->attach(\Spatie\Permission\Models\Role::where('name', 'Admin')->first()->id);
        \App\User::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => '12345678910'
        ])->roles()->attach(\Spatie\Permission\Models\Role::where('name', 'Admin')->first()->id);
        \App\User::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => '12345678910'
        ])->roles()->attach(\Spatie\Permission\Models\Role::where('name', 'User')->first()->id);
        \App\User::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => '12345678910'
        ])->roles()->attach(\Spatie\Permission\Models\Role::where('name', 'User')->first()->id);

        \App\User::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => '12345678910'
        ])->roles()->attach(\Spatie\Permission\Models\Role::where('name', 'User')->first()->id);

        \App\User::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => '12345678910'
        ])->roles()->attach(\Spatie\Permission\Models\Role::where('name', 'User')->first()->id);

        \App\User::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => '12345678910'
        ])->roles()->attach(\Spatie\Permission\Models\Role::where('name', 'User')->first()->id);

        \App\User::create([
            'name' => Str::random(10),
            'email' => Str::random(10).'@gmail.com',
            'password' => '12345678910'
        ])->roles()->attach(\Spatie\Permission\Models\Role::where('name', 'User')->first()->id);

    }
}
