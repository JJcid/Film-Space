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
        factory(\App\Role::class, 1)->create(['name' => 'teacher']);
        factory(\App\Role::class, 1)->create(['name' => 'student']);

        factory(\App\User::class, 1)->create([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('secret'),
            'role_id' => \App\Role::ADMIN
        ]);

        factory(\App\User::class, 50)->create()
        ->each(function(\App\User $user){
            if($faker->randomBoolean()){
                factory(\App\Transaction::class, 1)->create(['user_id' => $user->id, 'type' => 3, 'subscription' => 1]);
            }
            factory(\App\User::class, 1)->create(['user_id' => $user->id]);
        });

        factory(\App\User::class, 10)->create()
        ->each(function(\App\User $user){
            factory(\App\Transaction::class, 1)->create(['user_id' => $user->id, 'subscription' => 1]);
        });

        factory(\App\TransactionType::class, 1)->create(['name' => 'Sale']);
        factory(\App\TransactionType::class, 1)->create(['name' => 'Rent']);
        factory(\App\TransactionType::class, 1)->create(['name' => 'Subscription']);
        factory(\App\Category::class, 5)->create();
    }
}
