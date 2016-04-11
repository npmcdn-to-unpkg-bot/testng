<?php

use Illuminate\Database\Seeder;

class GenresSeeds extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //

        $genres_arr = file(base_path('database\seeds\\').'genres.txt');

        //dd($genres_arr);
        //dd( "utf8 ".mb_check_encoding (implode($genres_arr),'utf-8'));//;
        foreach ($genres_arr as $genre) {
            DB::table("genres")->insert([
                'genre' => $genre,
        ]);
        }
    }
}
