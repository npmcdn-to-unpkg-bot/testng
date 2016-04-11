<?php

use Illuminate\Database\Seeder;

class ContinuationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
//        DB::table("continuations")->insert([
//            'title' => '',
//            'link' => '',
//            'size' => '',
//            'time' => '',
//            'author_id' => '',
//            'genre_id' => '',
//        ]);

        factory(App\Continuation::class, 100)->create();
    }

}
