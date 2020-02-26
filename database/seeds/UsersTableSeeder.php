<?php

use App\User;
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

        User::truncate();


        DB::table('users')->insert(
            [
                [
                    'name' => 'だーいし',
                    'email' => 'issiy@gmail.com',
                    'password' => Hash::make('aaaa'),
                    'introduction' => 'aaaaaaaaaaaaaaああああ',
                    'created_at' => new DateTime(),
                    'updated_at'=> new DateTime(),

                ]
            ]);

//        factory(App\User::class, 10)->create();

    }
}
