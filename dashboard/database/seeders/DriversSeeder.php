<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Driver;

class DriversSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('drivers')->insert([
            'user_id' => 1,
            'license_number' => 'AASSFFSJ',
            'license_img' => 'default.jpg',
            'name' => 'Luis Fimbres',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $data = new Driver();
        $data->user_id = 2;
        $data->license_number = '12345678';
        $data->license_img = 'default.jpg';
        $data->name = 'Luis Bermudez';
        $data->save();
    }
}
