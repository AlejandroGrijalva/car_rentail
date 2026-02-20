<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Rental;

class RentalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rentals')->insert([
            'user_id' => 1,
            'car_id' => 1,
            'driver_id' => 1,
            'pickup_time' => date('Y-m-d H:i:s'),
            'return_date' => date('Y-m-d H:i:s', strtotime('+3 days')),
            'total_amount' => 150.00,
            'status' => 'confirmed',
            'name' => 'Luis Fimbres Rental',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $data = new Rental();
        $data->user_id = 2;
        $data->car_id = 2;
        $data->driver_id = 2;
        $data->pickup_time = date('Y-m-d H:i:s');
        $data->return_date = date('Y-m-d H:i:s', strtotime('+5 days'));
        $data->total_amount = 250.00;
        $data->status = 'pending';
        $data->name = 'Luis Bermudez Rental';
        $data->save();
    }
}
