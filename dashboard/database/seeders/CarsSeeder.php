<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Car;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cars')->insert([
            'brand_id' => 1,
            'model' => 'Model S',
            'year' => 2020,
            'color' => 'Red',
            'license_plate' => '1',
            'mileage' => 124552,
            'lat' => 37.7749,
            'lng' => -122.4194,
            'is_premium' => true,
            'rental_count' => 5,
            'daily_rate' => 100,
            'status' => 'available',
            'name' => 'Tesla Model S',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $data = new Car();
        $data->brand_id = 2;
        $data->model = 'Civic';
        $data->year = 2019;
        $data->color = 'Blue';
        $data->license_plate = 'AJHGOBS3';
        $data->mileage = 124552;
        $data->lat = 37.7749;
        $data->lng = -122.4194;
        $data->is_premium = false;
        $data->rental_count = 0;
        $data->daily_rate = 80;
        $data->status = 'available';
        $data->name = 'Honda Civic';
        $data->save();
    }
}
