<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $cat = new App\Category();
       $cat->name = 'Tech';
       $cat->save();
       $cat = new App\Category();
       $cat->name = 'Food';
       $cat->save();
       $cat = new App\Category();
       $cat->name = 'Support';
       $cat->save();
    }
}
