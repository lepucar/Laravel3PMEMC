<?php

namespace Database\Seeders;

use App\Models\User;
use Attribute;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([UserSeederTable::class,
        SectionTableSeeder::class,
        CategoryTableSeeder::class,
        AttributeTableSeeder::class,
        BrandTableSeeder::class,]);
    }
}
