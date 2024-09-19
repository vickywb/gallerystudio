<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'title' => 'Portrait',
                'slug' => 'potrait'
            ],
            [
                'title' => 'Landscape',
                'slug' => 'landscape'
            ],
            [
                'title' => 'Wildlife',
                'slug' => 'wildlife'
            ],
            [
                'title' => 'Street',
                'slug' => 'street'
            ],
            [
                'title' => 'Event',
                'slug' => 'event'
            ],
            [
                'title' => 'Sports ',
                'slug' => 'sports'
            ],
            [
                'title' => 'Fashion',
                'slug' => 'fashion'
            ]
        ];

        foreach ($categories as $catgory) {
            Category::create($catgory);
        }
    }
}
