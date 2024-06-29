<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $categoryData = [
            ['section_id' => 1, 'parent_id' => null, 'category_name' => "Clothing","slug"=>"Clothing"],
            
            ['section_id' => 1, 'parent_id' => null, 'category_name' => "Sports & Gym Wear","slug"=>"sports-gym-wear"],
            ['section_id' => 2, 'parent_id' => null, 'category_name' => "Makeup","slug"=>"makeup"],
            ['section_id' => 2, 'parent_id' => null, 'category_name' => "Skincare","slug"=>"skincare"],
           
            ['section_id' => 3, 'parent_id' => null, 'category_name' => "Mobile Accessories","slug"=>"mobile-accessories"],
            ['section_id' => 3, 'parent_id' => null, 'category_name' => "Laptops","slug"=>"laptops"],
            


        ];

        foreach ($categoryData as $data) {
            $find = Category::where('category_name', $data['category_name'])->first();
            if (!$find) {
                Category::create($data);
            }
        }
    }

}
