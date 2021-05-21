<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\NotificationStatus\NotificationStatus;

class NotificationStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NotificationStatus::create([
            'id' => 1,
            'description' => 'Created'
        ]);

        NotificationStatus::create([
            'id' => 2,
            'description' => 'Sended'
        ]);

        NotificationStatus::create([
            'id' => 3,
            'description' => 'Not sended'
        ]);
    }
}
