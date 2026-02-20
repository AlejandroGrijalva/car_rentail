<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Loyalty_level;

class Loyalty_levelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loyalty_levels')->insert([
            'name' => 'Bronze',
            'min_points' => 0,
            'discount_percentage' => 0,
            'free_extra_hours' => 0,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $data = new Loyalty_level();
        $data->name = 'Silver';
        $data->min_points = 0;
        $data->discount_percentage = 5;
        $data->free_extra_hours = 1;
        $data->save();
    }
}
