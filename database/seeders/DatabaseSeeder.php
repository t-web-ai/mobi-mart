<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Seeders\seed\AdminSeeder;
use Database\Seeders\seed\BrandSeeder;
use Database\Seeders\seed\CategorySeeder;
use Database\Seeders\seed\ColorSeeder;
use Database\Seeders\seed\DeviceSeeder;
use Database\Seeders\seed\DeviceVariantImageSeeder;
use Database\Seeders\seed\DeviceVariantOrderSeeder;
use Database\Seeders\seed\DeviceVariantSeeder;
use Database\Seeders\seed\OrderSeeder;
use Database\Seeders\seed\ReviewSeeder;
use Database\Seeders\seed\UserSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AdminSeeder::class,
            BrandSeeder::class,
            CategorySeeder::class,
            ColorSeeder::class,
            DeviceSeeder::class,
            DeviceVariantSeeder::class,
            DeviceVariantImageSeeder::class,
            DeviceVariantOrderSeeder::class,
            OrderSeeder::class,
            ReviewSeeder::class
        ]);
    }
}
