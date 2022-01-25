<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cars=[
                [
                    'model' => "Figo",
                    'make' => "Ford",
                    'stock' => 5
                ],
                [
                    'model' => "Ecosport",
                    'make' => "Ford",
                    'stock' => 3
                ],
                [
                    'model' => "Endeavour",
                    'make' => "Ford",
                    'stock' => 5
                ],
                [
                    'model' => "Harrier",
                    'make' => "TATA",
                    'stock' => 7
                ],
                [
                    'model' => "Nexon",
                    'make' => "TATA",
                    'stock' => 10
                ],
                [
                    'model' => "Safari",
                    'make' => "TATA",
                    'stock' => 3
                ],
                [
                    'model' => "Scorpio",
                    'make' => "Mahindra",
                    'stock' => 5
                ],
                [
                    'model' => "Bolero",
                    'make' => "Mahindra",
                    'stock' => 7
                ],
                [
                    'model' => "Thar",
                    'make' => "Mahindra",
                    'stock' => 2
                ]
            ];
        DB::table('cars')->insert($cars);
    }
}
