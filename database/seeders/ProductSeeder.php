<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Engine Oil Filter',
                'category' => 'Engine Parts',
                'stock' => 45,
                'image_path' => 'images/engine-oil.jpg',
                'price' => 12.99,
            ],
            [
                'name' => 'Brake Pads Set',
                'category' => 'Brakes & Suspension',
                'stock' => 28,
                'image_path' => 'images/break.jpg',
                'price' => 89.99,
            ],
            [
                'name' => 'Car Battery',
                'category' => 'Electrical',
                'stock' => 15,
                'image_path' => 'images/battery.jpg',
                'price' => 129.99,
            ],
            [
                'name' => 'LED Headlight Bulbs',
                'category' => 'Body & Exterior',
                'stock' => 35,
                'image_path' => 'images/LED.jpg',
                'price' => 45.99,
            ],
            [
                'name' => 'Air Filter',
                'category' => 'Engine Parts',
                'stock' => 52,
                'image_path' => 'images/filter.jpg',
                'price' => 24.99,
            ],
            [
                'name' => 'Brake Rotors',
                'category' => 'Brakes & Suspension',
                'stock' => 18,
                'image_path' => 'images/rotors.jpg',
                'price' => 159.99,
            ],
            [
                'name' => 'Spark Plugs Set',
                'category' => 'Electrical',
                'stock' => 40,
                'image_path' => 'images/sparkplug.jpg',
                'price' => 32.99,
            ],
            [
                'name' => 'Side Mirror',
                'category' => 'Body & Exterior',
                'stock' => 22,
                'image_path' => 'images/side-mirror.jpg',
                'price' => 78.99,
            ],
            [
                'name' => 'Timing Belt',
                'category' => 'Engine Parts',
                'stock' => 12,
                'image_path' => 'images/belt.jpg',
                'price' => 95.99,
            ],
            [
                'name' => 'Shock Absorbers',
                'category' => 'Brakes & Suspension',
                'stock' => 16,
                'image_path' => 'images/shock-absorber.jpg',
                'price' => 189.99,
            ],
            [
                'name' => 'Alternator',
                'category' => 'Electrical',
                'stock' => 8,
                'image_path' => 'images/alternator.jpg',
                'price' => 245.99,
            ],
            [
                'name' => 'Front Bumper',
                'category' => 'Body & Exterior',
                'stock' => 6,
                'image_path' => 'images/bumper.jpg',
                'price' => 299.99,
            ],
        ];

        foreach ($products as $data) {
            $category = Category::where('name', $data['category'])->first();

            if ($category) {
                Product::create([
                    'name' => $data['name'],
                    'category_id' => $category->id,
                    'stock' => $data['stock'],
                    'image_path' => $data['image_path'],
                    'price' => $data['price'],
                ]);
            }
        }
    }
}
