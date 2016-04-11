<?php

use Illuminate\Database\Seeder;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("authors")->insert([
            'name' => 'Вася Пупкин',
            'link' => '/w/was'
        ]);
        DB::table("authors")->insert([
            'name' => 'Петя Петро',
            'link' => '/p/pet'
        ]);
        DB::table("authors")->insert([
            'name' => 'Иван Васильевич',
            'link' => '/i/ivanwasilich'
        ]);

        factory(App\Author::class,10)->create();

    }
}
