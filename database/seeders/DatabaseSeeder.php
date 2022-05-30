<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'first_name' => 'maide',
            'last_name' => 'akdede',
            'is_admin' => '1',
            'email' => 'maide@maide.com',
            'password' => 'maide'
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'Boisson',
            'slug' => 'boisson',
            'created_at' => now(),
        ]);
        \App\Models\Category::factory()->create([
            'name' => 'Snack',
            'slug' => 'snack',
            'created_at' => now(),
        ]);
        \App\Models\Brand::factory()->create([
            'name' => 'The Coca-Cola',
            'slug' => 'the-coca-cola',
            'created_at' => now(),
        ]);
        \App\Models\Brand::factory()->create([
            'name' => 'Lay‘s Company',
            'slug' => 'lays-company',
            'created_at' => now(),
        ]);
        \App\Models\Product::factory()->create([
            'name' => 'Coca-cola',
            'slug' => 'coca-cola',
            'category_id' => '1',
            'brand_id' => '1',
            'price'=>'8',
            'created_at'=>now()
        ]);
        \App\Models\Product::factory()->create([
            'name' => 'Fanta Citron',
            'slug' => 'fanta-citron',
            'category_id' => '1',
            'brand_id' => '1',
            'price'=>'8',
            'created_at'=>now()
        ]);
        \App\Models\Product::factory()->create([
            'name' => 'Lays Nature',
            'slug' => 'lays-nature',
            'category_id' => '2',
            'brand_id' => '2',
            'price'=>'6',
            'created_at'=>now()
        ]);
    }
}
