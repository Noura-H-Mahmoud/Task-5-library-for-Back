<?php

namespace Database\Seeders;
use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Book::create([
            'name'=>'The Design of Everyday Things',
            'author'=>'Don Norman',
            'category_id'=>'1',
        ]);
       Book::create([
            'name'=>'A Handbook of Agile Software Craftsmanship',
            'author'=>'Robert C. Martin',
            'category_id'=>'2',
        ]);
       Book::create([
            'name'=>'A Natural History of Four Meals',
            'author'=>'Michael Pollan',
            'category_id'=>'3',
        ]);
       Book::create([
            'name'=>'Mastering the Art of French Cooking',
            'author'=>'Julia Child, Louisette Bertholle, and Simone Beck',
            'category_id'=>'4',
        ]);
    }
}
