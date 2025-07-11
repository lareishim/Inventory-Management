<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run()
    {
        $categories = [
            'Engine Parts',
            'Brakes & Suspension',
            'Electrical',
            'Body & Exterior'
        ];

        foreach ($categories as $name) {
            Category::create(['name' => $name]);
        }
    }

}
