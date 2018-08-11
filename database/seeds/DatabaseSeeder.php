<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('films');
        Storage::deleteDirectory('users');

        Storage::makeDirectory('films');
        Storage::makeDirectory('users');

        factory(\App\Role::class, 1)->create(['name' => 'admin']);
        factory(\App\Role::class, 1)->create(['name' => 'user']);

        factory(\App\Transaction_type::class, 1)->create(['name' => 'Sale']);
        factory(\App\Transaction_type::class, 1)->create(['name' => 'Rent']);
        factory(\App\Transaction_type::class, 1)->create(['name' => 'Subscription']);

        factory(\App\Category::class, 6)->create();

        factory(\App\Film::class, 20)->create();

        factory(\App\User::class, 1)->create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('secret'),
            'role_id' => \App\Role::ADMIN
        ]);

        factory(\App\User::class, 1)->create([
            'name' => 'user',
            'email' => 'user@email.com',
            'password' => bcrypt('secret'),
            'role_id' => \App\Role::USER
        ]);

        factory(\App\User::class, 10)->create(['role_id' => \App\Role::USER]);

        factory(\App\Review::class, 20)->create();
    }
}
