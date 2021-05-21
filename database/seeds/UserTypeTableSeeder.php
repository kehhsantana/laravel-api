<?php

use Illuminate\Database\Seeder;
use App\Models\UserType\UserType;
use Illuminate\Support\Facades\DB;

class UserTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserType::create([
            'id' => 1,
            'description' => 'Consumer'
        ]);

        UserType::create([
            'id' => 2,
            'description' => 'Seller'
        ]);
    }
}
