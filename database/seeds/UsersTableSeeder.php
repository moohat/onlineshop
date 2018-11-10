<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$users = [
            'name' => 'admin',
    		'email' => 'refixz86@lazday.com',
        'password' => bcrypt('admin'), // secret
        'remember_token' => str_random(10),
        'api_token' =>str_random(18),
        'is_admin'=>true,
    ];

    DB::table('users')->insert($users);
    factory(App\Models\User::class,50)->create();
}
}
