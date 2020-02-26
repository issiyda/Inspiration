<?php

use App\Idea;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IdeaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        /**
         * テーブル削除
         */
        Idea::truncate();

        /**
         *Ideaテーブル生成
         */
        DB::table('ideas')->insert(
            [
                'user_id' =>1,
                'category_id' => 2,
                'title' => 'joy',
                'overflow' =>'aaaa',
                'content' =>'aaa',
                'price' => 10000

        ]);


//        /**
//         * faker利用
//         */
//        $faker = Faker::create('ja');


        factory(Idea::class, 10)->create();

    }
}
