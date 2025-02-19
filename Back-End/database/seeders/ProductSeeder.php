<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'title' => 'Smartphone X1',
                'description' => 'A high-end smartphone with a stunning display and powerful processor.',
                'price' => 699.99,
                'category' => 'electronics',

            ],
            [
                'title' => 'Laptop Pro 15',
                'description' => 'Lightweight and powerful laptop with 16GB RAM and 512GB SSD.',
                'price' => 1299.99,
                'category' => 'electronics',

            ],
            [
                'title' => 'Wireless Earbuds',
                'description' => 'Noise-canceling wireless earbuds with long battery life.',
                'price' => 129.99,
                'category' => 'electronics',

            ],
            [
                'title' => 'Smartwatch Z3',
                'description' => 'Fitness-focused smartwatch with heart rate monitoring and GPS.',
                'price' => 249.99,
                'category' => 'electronics',

            ],
            [
                'title' => 'LED Smart TV 55"',
                'description' => '55-inch 4K UHD Smart TV with HDR10 and built-in streaming apps.',
                'price' => 799.99,
                'category' => 'electronics',

            ],
            [
                'title' => 'Gaming Mouse',
                'description' => 'Ergonomic gaming mouse with customizable RGB lighting.',
                'price' => 49.99,
                'category' => 'electronics',

            ],
            [
                'title' => 'Bluetooth Speaker',
                'description' => 'Portable Bluetooth speaker with deep bass and waterproof design.',
                'price' => 79.99,
                'category' => 'electronics',

            ],
            [
                'title' => 'Digital Camera',
                'description' => 'High-resolution digital camera with 20MP sensor and 4K recording.',
                'price' => 599.99,
                'category' => 'electronics',

            ],
            [
                'title' => 'Electric Kettle',
                'description' => '1.7L electric kettle with auto shut-off and fast boiling.',
                'price' => 39.99,
                'category' => 'appliances',

            ],
            [
                'title' => 'Microwave Oven',
                'description' => '1000W microwave oven with multiple cooking modes.',
                'price' => 149.99,
                'category' => 'appliances',

            ],
            [
                'title' => 'Refrigerator 300L',
                'description' => 'Energy-efficient refrigerator with frost-free technology.',
                'price' => 499.99,
                'category' => 'appliances',

            ],
            [
                'title' => 'Washing Machine',
                'description' => '7kg front load washing machine with smart inverter technology.',
                'price' => 699.99,
                'category' => 'appliances',

            ],
            [
                'title' => 'Air Conditioner 1.5 Ton',
                'description' => 'Split AC with inverter technology and remote control.',
                'price' => 899.99,
                'category' => 'appliances',

            ],
            [
                'title' => 'Jeans Slim Fit',
                'description' => 'Comfortable and stylish slim fit jeans for men.',
                'price' => 49.99,
                'category' => 'cloth',

            ],
            [
                'title' => 'Casual T-Shirt',
                'description' => 'Soft cotton T-shirt available in multiple colors.',
                'price' => 19.99,
                'category' => 'cloth',

            ],
            [
                'title' => 'Running Shoes',
                'description' => 'Breathable and lightweight running shoes with great grip.',
                'price' => 59.99,
                'category' => 'cloth',

            ],
            [
                'title' => 'Rice 5kg Pack',
                'description' => 'High-quality basmati rice, perfect for daily cooking.',
                'price' => 9.99,
                'category' => 'grocery',

            ],
            [
                'title' => 'Cooking Oil 2L',
                'description' => 'Pure sunflower oil suitable for healthy cooking.',
                'price' => 6.99,
                'category' => 'grocery',

            ],
            [
                'title' => 'Coffee Beans 1kg',
                'description' => 'High-quality Arabica coffee beans for fresh brew.',
                'price' => 19.99,
                'category' => 'grocery',

            ],
        ];

        DB::table('products')->insert($products);
    }
}
