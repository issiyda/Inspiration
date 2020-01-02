<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert(
            [
                [
                    'name' => 'だーいし',
                    'email' => 'issiy@gmail.com',
                    'password' => Hash::make('password'),
                    'introduction' => 'aaaaaaaaaaaaaaああああ'

                ]
            ]);

        factory(App\User::class, 10)->create();

    }
}
