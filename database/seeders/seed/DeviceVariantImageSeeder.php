<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class DeviceVariantImageSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->tablename = 'device_variant_images';
        $this->file = database_path('seeders/csv/device_variant_images.csv');
        $this->delimiter = ";";
        $this->truncate = false;
    }
    public function run(): void
    {
        DB::disableQueryLog();
        parent::run();
    }
}
