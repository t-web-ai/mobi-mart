<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class DeviceSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->tablename = 'devices';
        $this->file = database_path('seeders/csv/devices.csv');
        $this->delimiter = ";";
        $this->truncate = false;
    }
    public function run(): void
    {
        DB::disableQueryLog();
        parent::run();
    }
}
