<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\TransactionStatus\TransactionStatus;

class TransactionStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransactionStatus::create([
            'id' => 1,
            'description' => 'Pending'
        ]);

        TransactionStatus::create([
            'id' => 2,
            'description' => 'Authorized'
        ]);

        TransactionStatus::create([
            'id' => 3,
            'description' => 'Unauthorized'
        ]);
    }
}
