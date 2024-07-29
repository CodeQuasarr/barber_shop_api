<?php

namespace Database\Seeders;

use App\Models\Haircuts\HairCutCategory;;
use Illuminate\Database\Seeder;

class HairCutCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Bikiwig'],
            ['name' => 'naturels'],
            ['name' => 'Remy Hair'],
        ];

        foreach ($categories as $category) {
            HairCutCategory::create($category);
        }
    }
}
