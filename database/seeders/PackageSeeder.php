<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            [
                'title' => 'Platinum',
                'slug' => 'platinum',
                'price' => 1000000,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, laudantium sapiente maiores ipsam sunt provident at ut quos placeat nemo.'
            ],
            [
                'title' => 'Gold',
                'slug' => 'gold',
                'price' => 1500000,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, laudantium sapiente maiores ipsam sunt provident at ut quos placeat nemo.'
            ],
            [
                'title' => 'Diamond',
                'slug' => 'diamond',
                'price' => 2000000,
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio, laudantium sapiente maiores ipsam sunt provident at ut quos placeat nemo.'
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
