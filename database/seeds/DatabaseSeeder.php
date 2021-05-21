<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(NotificationStatusTableSeeder::class);
        $this->call(UserTypeTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(TransactionStatusTableSeeder::class);
    }
}
