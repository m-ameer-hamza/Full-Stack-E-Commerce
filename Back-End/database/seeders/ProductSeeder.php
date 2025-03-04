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
    // 1. img1 (Table)
    [
        'title'       => 'Contemporary Dining Table',
        'description' => 'A sleek and modern dining table perfect for family meals.',
        'price'       => 499.99,
        'category'    => 'furniture',
        'image'       => 'img1',
        'isFeatured'  => true,
    ],
    // 2. img2 (Sofa)
    [
        'title'       => 'Plush Living Room Sofa',
        'description' => 'A comfortable sofa with soft upholstery that enhances any living space.',
        'price'       => 899.99,
        'category'    => 'furniture',
        'image'       => 'img2',
        'isFeatured'  => false,
    ],
    // 3. img3 (Dining Sofa)
    [
        'title'       => 'Elegant Banquet Sofa',
        'description' => 'A refined dining sofa set ideal for hosting elegant dinners.',
        'price'       => 749.99,
        'category'    => 'furniture',
        'image'       => 'img3',
        'isFeatured'  => true,
    ],
    // 4. img4 (Lamp)
    [
        'title'       => 'Art Deco Table Lamp',
        'description' => 'A stylish table lamp featuring an Art Deco design that brightens any room.',
        'price'       => 129.99,
        'category'    => 'lighting',
        'image'       => 'img4',
        'isFeatured'  => false,
    ],
    // 5. img5 (Leather Sofa)
    [
        'title'       => 'Luxurious Leather Sofa',
        'description' => 'A premium leather sofa with superior comfort and sophisticated style.',
        'price'       => 1199.99,
        'category'    => 'furniture',
        'image'       => 'img5',
        'isFeatured'  => true,
    ],
    // 6. img6 (Sofa)
    [
        'title'       => 'Cozy Modern Sofa',
        'description' => 'A modern sofa with a minimalist design and inviting comfort.',
        'price'       => 799.99,
        'category'    => 'furniture',
        'image'       => 'img6',
        'isFeatured'  => false,
    ],
    // 7. img7 (Sofa Bed)
    [
        'title'       => 'Convertible Sofa Bed Deluxe',
        'description' => 'A versatile sofa bed that effortlessly transitions from seating to sleeping space.',
        'price'       => 649.99,
        'category'    => 'furniture',
        'image'       => 'img7',
        'isFeatured'  => true,
    ],
    // 8. img8 (Chair)
    [
        'title'       => 'Ergonomic Accent Chair',
        'description' => 'A contemporary accent chair designed for both comfort and style.',
        'price'       => 199.99,
        'category'    => 'furniture',
        'image'       => 'img8',
        'isFeatured'  => false,
    ],
    // 9. img1 (Table)
    [
        'title'       => 'Rustic Farmhouse Table',
        'description' => 'A charming wooden table that brings a rustic feel to any dining area.',
        'price'       => 399.99,
        'category'    => 'furniture',
        'image'       => 'img1',
        'isFeatured'  => false,
    ],
    // 10. img2 (Sofa)
    [
        'title'       => 'Contemporary Sectional Sofa',
        'description' => 'A spacious sectional sofa with a modern design and plush cushions.',
        'price'       => 999.99,
        'category'    => 'furniture',
        'image'       => 'img2',
        'isFeatured'  => true,
    ],
    // 11. img3 (Dining Sofa)
    [
        'title'       => 'Designer Dining Lounge',
        'description' => 'A stylish dining sofa that combines luxury with practical comfort.',
        'price'       => 849.99,
        'category'    => 'furniture',
        'image'       => 'img3',
        'isFeatured'  => false,
    ],
    // 12. img4 (Lamp)
    [
        'title'       => 'Minimalist Floor Lamp',
        'description' => 'A sleek floor lamp with a minimalist design to enhance ambient lighting.',
        'price'       => 149.99,
        'category'    => 'lighting',
        'image'       => 'img4',
        'isFeatured'  => true,
    ],
    // 13. img5 (Leather Sofa)
    [
        'title'       => 'Executive Leather Chesterfield',
        'description' => 'A classic chesterfield leather sofa that exudes elegance and comfort.',
        'price'       => 1399.99,
        'category'    => 'furniture',
        'image'       => 'img5',
        'isFeatured'  => false,
    ],
    // 14. img6 (Sofa)
    [
        'title'       => 'Family Comfort Sofa',
        'description' => 'A generously sized sofa designed for family gatherings and relaxation.',
        'price'       => 699.99,
        'category'    => 'furniture',
        'image'       => 'img6',
        'isFeatured'  => true,
    ],
    // 15. img7 (Sofa Bed)
    [
        'title'       => 'Urban Studio Sofa Bed',
        'description' => 'A space-saving sofa bed ideal for compact apartments and studios.',
        'price'       => 549.99,
        'category'    => 'furniture',
        'image'       => 'img7',
        'isFeatured'  => false,
    ],
    // 16. img8 (Chair)
    [
        'title'       => 'Vintage Wingback Chair',
        'description' => 'A timeless wingback chair that combines vintage charm with modern comfort.',
        'price'       => 259.99,
        'category'    => 'furniture',
        'image'       => 'img8',
        'isFeatured'  => true,
    ],
    // 17. img1 (Table)
    [
        'title'       => 'Modern Glass Dining Table',
        'description' => 'A striking glass dining table with a sleek metal frame for a modern look.',
        'price'       => 599.99,
        'category'    => 'furniture',
        'image'       => 'img1',
        'isFeatured'  => false,
    ],
    // 18. img2 (Sofa)
    [
        'title'       => 'Upholstered Contemporary Sofa',
        'description' => 'A stylish sofa with high-quality upholstery that fits any living room.',
        'price'       => 849.99,
        'category'    => 'furniture',
        'image'       => 'img2',
        'isFeatured'  => true,
    ],
    // 19. img3 (Dining Sofa)
    [
        'title'       => 'Sophisticated Banquet Seating',
        'description' => 'An exquisite dining sofa designed to elevate your hosting experience.',
        'price'       => 799.99,
        'category'    => 'furniture',
        'image'       => 'img3',
        'isFeatured'  => false,
    ],
    // 20. img4 (Lamp)
    [
        'title'       => 'Industrial Pendant Lamp',
        'description' => 'A bold pendant lamp with an industrial design that stands out.',
        'price'       => 179.99,
        'category'    => 'lighting',
        'image'       => 'img4',
        'isFeatured'  => true,
    ],
    // 21. img5 (Leather Sofa)
    [
        'title'       => 'Modern Luxe Leather Sofa',
        'description' => 'A contemporary leather sofa with refined detailing and superior comfort.',
        'price'       => 1299.99,
        'category'    => 'furniture',
        'image'       => 'img5',
        'isFeatured'  => false,
    ],
    // 22. img6 (Sofa)
    [
        'title'       => 'Casual Urban Sofa',
        'description' => 'A relaxed sofa designed for everyday comfort and modern style.',
        'price'       => 749.99,
        'category'    => 'furniture',
        'image'       => 'img6',
        'isFeatured'  => true,
    ],
    // 23. img7 (Sofa Bed)
    [
        'title'       => 'Compact Sleeper Sofa',
        'description' => 'A practical sofa bed offering a comfortable sleep solution in small spaces.',
        'price'       => 499.99,
        'category'    => 'furniture',
        'image'       => 'img7',
        'isFeatured'  => false,
    ],
    // 24. img8 (Chair)
    [
        'title'       => 'Modern Office Chair',
        'description' => 'An ergonomic office chair designed to support long hours of work.',
        'price'       => 299.99,
        'category'    => 'furniture',
        'image'       => 'img8',
        'isFeatured'  => true,
    ],
    // 25. img1 (Table)
    [
        'title'       => 'Heritage Wood Dining Table',
        'description' => 'A robust dining table crafted from solid wood, blending tradition and style.',
        'price'       => 549.99,
        'category'    => 'furniture',
        'image'       => 'img1',
        'isFeatured'  => false,
    ],
    // 26. img2 (Sofa)
    [
        'title'       => 'Luxury Reclining Sofa',
        'description' => 'A reclining sofa with plush cushions and luxurious fabric for optimal relaxation.',
        'price'       => 1099.99,
        'category'    => 'furniture',
        'image'       => 'img2',
        'isFeatured'  => true,
    ],
    // 27. img3 (Dining Sofa)
    [
        'title'       => 'Sleek Urban Dining Sofa',
        'description' => 'A modern dining sofa with clean lines and contemporary design details.',
        'price'       => 899.99,
        'category'    => 'furniture',
        'image'       => 'img3',
        'isFeatured'  => false,
    ],
    // 28. img4 (Lamp)
    [
        'title'       => 'Contemporary LED Lamp',
        'description' => 'An energy-efficient LED lamp with a contemporary design for stylish illumination.',
        'price'       => 159.99,
        'category'    => 'lighting',
        'image'       => 'img4',
        'isFeatured'  => true,
    ],
    // 29. img5 (Leather Sofa)
    [
        'title'       => 'Chic Italian Leather Sofa',
        'description' => 'An exquisitely designed leather sofa with Italian craftsmanship and style.',
        'price'       => 1499.99,
        'category'    => 'furniture',
        'image'       => 'img5',
        'isFeatured'  => false,
    ],
];


        DB::table('products')->insert($products);
    }
}
