<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => '醤油ラーメン'],
            ['name' => '塩ラーメン'],
            ['name' => '味噌ラーメン'],
            ['name' => '豚骨ラーメン']
        ]);
    }
}
