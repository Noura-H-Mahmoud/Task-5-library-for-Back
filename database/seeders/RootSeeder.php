<?php

namespace Database\Seeders;

use App\Models\Root;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RootSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Root::create([
            'name'=>'Technology'
        ]);
        Root::create([
            'name'=>'Cooking'
        ]);
    }
}
