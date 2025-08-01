<?php

namespace Database\Seeders\seed;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use JeroenZwart\CsvSeeder\CsvSeeder;

class UserSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->tablename = 'users';
        $this->file = database_path('seeders/csv/users.csv');
        $this->delimiter = ";";
        $this->truncate = false;
    }
    public function run(): void
    {
        DB::disableQueryLog();
        parent::run();
    }
}
