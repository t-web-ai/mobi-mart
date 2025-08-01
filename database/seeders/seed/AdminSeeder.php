<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class AdminSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->tablename = 'admins';
        $this->file = database_path('seeders/csv/admins.csv');
        $this->delimiter = ";";
        $this->truncate = false;
    }
    public function run(): void
    {
        DB::disableQueryLog();
        parent::run();
    }
}
