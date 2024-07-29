<?php

namespace Database\Seeders;

use App\Models\Haircuts\HairCut;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HairCutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $haircutLists = [
            [
                'stripe_product_id' => 'prod_QYpW4EwK6MKrGs',
                'name' => 'Perruque de cheveux bleu',
                'description' => 'Exprimez votre personnalité audacieuse avec notre perruque rose vibrante, un choix parfait pour celles qui souhaitent ajouter une touche de glamour et de fraîcheur à leur look. Fabriquée à partir de cheveux de haute qualité, cette perruque offre non seulement une couleur rose intense et éclatante, mais aussi un confort exceptionnel et une apparence naturelle qui ne passera pas inaperçue.',
                'imageSrc' => 'shop-1.webp',
                'imageAlt' => 'Image description for product 1.',
                'price' => 300,
                "hair_cut_category_id" => 1,
                'date' => '2024-01-01',
                'sales' => rand(1, 100),
                'isOnSale' => false,
            ],
            [
                'stripe_product_id' => 'prod_QYpV642p31V5BR',
                'name' => 'Perruque de cheveux bruns',
                'description' => 'Journals and note-taking',
                'imageSrc' => 'shop-2.webp',
                'imageAlt' => 'Image description for product 2.',
                'price' => 800,
                "hair_cut_category_id" => 1,
                'date' => '2024-02-01',
                'sales' => rand(1, 100),
                'isOnSale' => true,
            ],
            [
                'stripe_product_id' => 'prod_QYpVADxFNg3Q53',
                'name' => 'Perruque de cheveux noirs',
                'description' => 'Work from home accessories',
                'imageSrc' => 'shop-3.webp',
                'imageAlt' => 'Image description for product 3.',
                'price' => 500,
                "hair_cut_category_id" => 1,
                'date' => '2024-03-01',
                'sales' => rand(1, 100),
                'isOnSale' => false,
            ],
            [
                'stripe_product_id' => 'prod_QYpTpWum6tqwbB',
                'name' => 'Perruque de cheveux blonds',
                'description' => 'Journals and note-taking',
                'imageSrc' => 'shop-4.webp',
                'imageAlt' => 'Image description for product 4.',
                'price' => 450,
                "hair_cut_category_id" => 1,
                'date' => '2024-04-01',
                'sales' => rand(1, 100),
                'isOnSale' => true,
            ],
            [
                'stripe_product_id' => 'prod_QYpTHFUqRntHJJ',
                'name' => 'Perruque de cheveux châtains',
                'description' => 'Work from home accessories',
                'imageSrc' => 'shop-5.webp',
                'imageAlt' => 'Image description for product 5.',
                'price' => 50,
                "hair_cut_category_id" => 2,
                'date' => '2024-05-01',
                'sales' => rand(1, 100),
                'isOnSale' => false,
            ],
            [
                'stripe_product_id' => 'prod_QYpTq4f6aTwY0s',
                'name' => 'Perruque de cheveux roux',
                'description' => 'Journals and note-taking',
                'imageSrc' => 'shop-6.webp',
                'imageAlt' => 'Image description for product 6.',
                'price' => 100,
                "hair_cut_category_id" => 2,
                'date' => '2024-06-01',
                'sales' => rand(1, 100),
                'isOnSale' => true,
            ],
            [
                'stripe_product_id' => 'prod_QYpSZg702De1xK',
                'name' => 'Perruque de cheveux blancs',
                'description' => 'Work from home accessories',
                'imageSrc' => 'shop-1.webp',
                'imageAlt' => 'Image description for product 7.',
                'price' => 150,
                "hair_cut_category_id" => 2,
                'date' => '2024-07-01',
                'sales' => rand(1, 100),
                'isOnSale' => false,
            ],
            [
                'stripe_product_id' => 'prod_QYpQN24uBdlzcN',
                'name' => 'Perruque de cheveux gris',
                'description' => 'Journals and note-taking',
                'imageSrc' => 'shop-2.webp',
                'imageAlt' => 'Image description for product 8.',
                'price' => 200,
                "hair_cut_category_id" => 2,
                'date' => '2024-08-01',
                'sales' => rand(1, 100),
                'isOnSale' => true,
            ],
            [
                'stripe_product_id' => 'prod_QYpQu5v4MezXtm',
                'name' => 'Perruque de cheveux tissage',
                'description' => 'Work from home accessories',
                'imageSrc' => 'shop-3.webp',
                'imageAlt' => 'Image description for product 9.',
                'price' => 250,
                "hair_cut_category_id" => 2,
                'date' => '2024-09-01',
                'sales' => rand(1, 100),
                'isOnSale' => false,
            ],
            [
                'stripe_product_id' => 'prod_QYpPJ0JqfLTKbs',
                'name' => 'Perruque de cheveux rose',
                'description' => 'Journals and note-taking',
                'imageSrc' => 'shop-4.webp',
                'imageAlt' => 'Image description for product 10.',
                'price' => 400,
                "hair_cut_category_id" => 2,
                'date' => '2024-10-01',
                'sales' => rand(1, 100),
                'isOnSale' => true,
            ],
            [
                'stripe_product_id' => 'prod_QYpOBYSwdGIRnA',
                'name' => 'Perruque de cheveux blonds coupe',
                'description' => 'Work from home accessories',
                'imageSrc' => 'shop-5.webp',
                'imageAlt' => 'Image description for product 11.',
                'price' => 300,
                "hair_cut_category_id" => 3,
                'date' => '2024-11-01',
                'sales' => rand(1, 100),
                'isOnSale' => false,
            ],
            [
                'stripe_product_id' => 'prod_QYpNZsYjZfqZ8B',
                'name' => 'Perruque de cheveux gris',
                'description' => 'Journals and note-taking',
                'imageSrc' => 'shop-6.webp',
                'imageAlt' => 'Image description for product 12.',
                'price' => 600,
                "hair_cut_category_id" => 3,
                'date' => '2024-12-01',
                'sales' => rand(1, 100),
                'isOnSale' => true,
            ],
        ];

        foreach ($haircutLists as $haircut) {
            HairCut::query()->create($haircut);
        }
    }
}
