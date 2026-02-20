<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Luis Fimbres',
            'email' => 'luis.fimbres@itsncg.com',
            'password' => bcrypt('rootbeer'),
            'loyalty_points' => 1000,
            'loyalty_level_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
        ]);
        $data = new User();
        $data->name = 'Luis Bermudez';
        $data->email = 'luis.bermudez@itsncg.com';
        $data->password = Hash::make('drpepper');
        $data->loyalty_points = 0;
        $data->loyalty_level_id = 1;
        $data->save();
    }
}
