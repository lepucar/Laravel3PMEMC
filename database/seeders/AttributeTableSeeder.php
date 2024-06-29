<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $attributeData= [
            ['attribute_name' => 'Color'],
            ['attribute_name' => 'Size'],
            ['attribute_name' => 'Material'],

        ];

        foreach ($attributeData as $data) {

            if(!Attribute::where('attribute_name', $data['attribute_name'])->exists()){
                Attribute::create($data);
            }
        }
    }
}
