<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name'=>'Design',
            'parent_id'=>'1'
        ]);
        Category::create([
            'name'=>'Programming',
            'parent_id'=>'1'
        ]);
        Category::create([
            'name'=>'Food Calture',
            'parent_id'=>'2'
        ]);
        Category::create([
            'name'=>'Recipes',
            'parent_id'=>'2'
        ]);
    }
}
