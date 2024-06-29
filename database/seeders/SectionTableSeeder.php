<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sectionData = [
            ['name' => "Women's Fashion", 'order' => 1],
            ['name' => "Health & Beauty", 'order' => 2],
            ['name' => "Electronics", 'order' => 3],
            ['name' => "Home & Living", 'order' => 4]
        ];
        foreach ($sectionData as $data) {
            $find = Section::where('name', $data['name'])->first();
            if (!$find) {
                Section::create($data);
            }
        }
    }
}
