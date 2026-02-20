<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Brand;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('brands')->insert([
            'name' => 'Toyota',
            'img' => 'toyota.png',
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $data = new Brand();
        $data->name = 'Honda';
        $data->img = 'honda.png';
        $data->save();
    }
}
