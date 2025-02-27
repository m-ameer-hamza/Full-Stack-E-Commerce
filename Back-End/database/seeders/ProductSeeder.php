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
            // 1. Mobile (was electronics)
            [
                'title' => 'Smartphone X1',
                'description' => 'A high-end smartphone with a stunning display and powerful processor.',
                'price' => 699.99,
                'category' => 'mobile',
                'image' => 'img1',
                'isFeatured' => true,
            ],
            // 2. Electronics
            [
                'title' => 'Laptop Pro 15',
                'description' => 'Lightweight and powerful laptop with 16GB RAM and 512GB SSD.',
                'price' => 1299.99,
                'category' => 'electronics',
                'image' => 'img2',
                'isFeatured' => false,
            ],
            // 3. Accessories (originally electronics, now reassigning earbuds as accessory)
            [
                'title' => 'Wireless Earbuds',
                'description' => 'Noise-canceling wireless earbuds with long battery life.',
                'price' => 129.99,
                'category' => 'accessories',
                'image' => 'img3',
                'isFeatured' => true,
            ],
            // 4. Accessories (smartwatches are wearable tech)
            [
                'title' => 'Smartwatch Z3',
                'description' => 'Fitness-focused smartwatch with heart rate monitoring and GPS.',
                'price' => 249.99,
                'category' => 'accessories',
                'image' => 'img4',
                'isFeatured' => false,
            ],
            // 5. Electronics
            [
                'title' => 'LED Smart TV 55"',
                'description' => '55-inch 4K UHD Smart TV with HDR10 and built-in streaming apps.',
                'price' => 799.99,
                'category' => 'electronics',
                'image' => 'img1',
                'isFeatured' => true,
            ],
            // 6. Accessories
            [
                'title' => 'Gaming Mouse',
                'description' => 'Ergonomic gaming mouse with customizable RGB lighting.',
                'price' => 49.99,
                'category' => 'accessories',
                'image' => 'img2',
                'isFeatured' => false,
            ],
            // 7. Electronics
            [
                'title' => 'Bluetooth Speaker',
                'description' => 'Portable Bluetooth speaker with deep bass and waterproof design.',
                'price' => 79.99,
                'category' => 'electronics',
                'image' => 'img3',
                'isFeatured' => true,
            ],
            // 8. Electronics
            [
                'title' => 'Digital Camera',
                'description' => 'High-resolution digital camera with 20MP sensor and 4K recording.',
                'price' => 599.99,
                'category' => 'electronics',
                'image' => 'img4',
                'isFeatured' => false,
            ],
            // 9. Accessories (converted from Electric Kettle)
            [
                'title' => 'Portable Power Bank',
                'description' => 'A high-capacity power bank to keep your devices charged on the go.',
                'price' => 39.99,
                'category' => 'accessories',
                'image' => 'img1',
                'isFeatured' => false,
            ],
            // 10. Accessories (converted from Microwave Oven)
            [
                'title' => 'Wireless Car Charger',
                'description' => 'A fast wireless charger designed for in-car use.',
                'price' => 29.99,
                'category' => 'accessories',
                'image' => 'img2',
                'isFeatured' => true,
            ],
            // 11. Accessories (converted from Refrigerator 300L)
            [
                'title' => 'Smartphone Case',
                'description' => 'A durable smartphone case offering protection and style.',
                'price' => 19.99,
                'category' => 'accessories',
                'image' => 'img3',
                'isFeatured' => false,
            ],
            // 12. Accessories (converted from Washing Machine)
            [
                'title' => 'Universal Car Mount',
                'description' => 'An adjustable car mount for a secure smartphone hold.',
                'price' => 24.99,
                'category' => 'accessories',
                'image' => 'img4',
                'isFeatured' => true,
            ],
            // 13. Accessories (converted from Air Conditioner 1.5 Ton)
            [
                'title' => 'Bluetooth In-Car Adapter',
                'description' => 'Enhance your car\'s audio with this Bluetooth adapter.',
                'price' => 34.99,
                'category' => 'accessories',
                'image' => 'img1',
                'isFeatured' => false,
            ],
            // 14. Clothing
            [
                'title' => 'Jeans Slim Fit',
                'description' => 'Comfortable and stylish slim fit jeans for men.',
                'price' => 49.99,
                'category' => 'clothing',
                'image' => 'img2',
                'isFeatured' => true,
            ],
            // 15. Clothing
            [
                'title' => 'Casual T-Shirt',
                'description' => 'Soft cotton T-shirt available in multiple colors.',
                'price' => 19.99,
                'category' => 'clothing',
                'image' => 'img3',
                'isFeatured' => false,
            ],
            // 16. Clothing
            [
                'title' => 'Running Shoes',
                'description' => 'Breathable and lightweight running shoes with great grip.',
                'price' => 59.99,
                'category' => 'clothing',
                'image' => 'img4',
                'isFeatured' => true,
            ],
            // 17. Grocery
            [
                'title' => 'Rice 5kg Pack',
                'description' => 'High-quality basmati rice, perfect for daily cooking.',
                'price' => 9.99,
                'category' => 'grocery',
                'image' => 'img1',
                'isFeatured' => false,
            ],
            // 18. Grocery
            [
                'title' => 'Cooking Oil 2L',
                'description' => 'Pure sunflower oil suitable for healthy cooking.',
                'price' => 6.99,
                'category' => 'grocery',
                'image' => 'img2',
                'isFeatured' => true,
            ],
            // 19. Grocery
            [
                'title' => 'Coffee Beans 1kg',
                'description' => 'High-quality Arabica coffee beans for fresh brew.',
                'price' => 19.99,
                'category' => 'grocery',
                'image' => 'img3',
                'isFeatured' => false,
            ],
            // ---- New 10 Products ----
            // 20. Mobile
            [
                'title' => 'Smartphone Y2',
                'description' => 'Affordable smartphone with impressive battery life.',
                'price' => 399.99,
                'category' => 'mobile',
                'image' => 'img4',
                'isFeatured' => true,
            ],
            // 21. Electronics
            [
                'title' => 'Tablet A10',
                'description' => 'Lightweight tablet perfect for entertainment and work.',
                'price' => 299.99,
                'category' => 'electronics',
                'image' => 'img1',
                'isFeatured' => false,
            ],
            // 22. Accessories
            [
                'title' => 'Noise-Cancelling Headphones',
                'description' => 'Experience immersive sound with active noise cancellation.',
                'price' => 199.99,
                'category' => 'accessories',
                'image' => 'img2',
                'isFeatured' => true,
            ],
            // 23. Electronics
            [
                'title' => '4K Action Camera',
                'description' => 'Compact and rugged camera for capturing adventures in 4K.',
                'price' => 249.99,
                'category' => 'electronics',
                'image' => 'img3',
                'isFeatured' => false,
            ],
            // 24. Accessories
            [
                'title' => 'Fitness Tracker Pro',
                'description' => 'Monitor your activity and health with precision tracking.',
                'price' => 99.99,
                'category' => 'accessories',
                'image' => 'img4',
                'isFeatured' => true,
            ],
            // 25. Accessories
            [
                'title' => 'Designer Sunglasses',
                'description' => 'Stylish sunglasses to complement your summer look.',
                'price' => 89.99,
                'category' => 'accessories',
                'image' => 'img1',
                'isFeatured' => false,
            ],
            // 26. Grocery
            [
                'title' => 'Organic Honey 500g',
                'description' => 'Pure, raw organic honey sourced directly from the farm.',
                'price' => 14.99,
                'category' => 'grocery',
                'image' => 'img2',
                'isFeatured' => true,
            ],
            // 27. Clothing
            [
                'title' => 'Casual Sneakers',
                'description' => 'Comfortable and trendy sneakers for everyday wear.',
                'price' => 59.99,
                'category' => 'clothing',
                'image' => 'img3',
                'isFeatured' => false,
            ],
            // 28. Accessories
            [
                'title' => 'Portable Bluetooth Keyboard',
                'description' => 'Slim and lightweight keyboard for on-the-go typing.',
                'price' => 39.99,
                'category' => 'accessories',
                'image' => 'img4',
                'isFeatured' => true,
            ],
            // 29. Electronics
            [
                'title' => 'Smart Home Hub',
                'description' => 'Centralize your smart devices with this intuitive home hub.',
                'price' => 129.99,
                'category' => 'electronics',
                'image' => 'img1',
                'isFeatured' => false,
            ],
        ];

        DB::table('products')->insert($products);
    }
}
