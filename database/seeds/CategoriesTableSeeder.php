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
        $data = [
            ['name' => 'Shopping'],
            ['name' => 'ออกกำลังกาย'],
            ['name' => 'ทั่วไป']
        ];

        \App\Category::insert($data);
    }
}
