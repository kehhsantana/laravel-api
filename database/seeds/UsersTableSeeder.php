<?php

use App\Models\Users\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::create([
            'first_name'   => 'Kelly',
            'last_name'    => 'Santana',
            'document'     => '74309856372',
            'email'        => 'kehhsantana@gmail.com',
            'wallet'       => '600.00',
            'user_type_id' => 1,
            'password'     => bcrypt('747383k'),
        ]);

        Users::create([
            'first_name'   => 'Felipe',
            'last_name'    => 'Landim',
            'document'     => '19305858332',
            'email'        => 'felipelandimt@gmail.com',
            'wallet'       => '1200.00',
            'user_type_id' => 1,
            'password'     => bcrypt('dr5383rs'),
        ]);

        Users::create([
            'first_name'   => 'Silvana',
            'last_name'    => 'Cortinas MEI',
            'document'     => '07284638000177',
            'email'        => 'silvana.cortinas@gmail.com',
            'wallet'       => '3000.00',
            'user_type_id' => 2,
            'password'     => bcrypt('86392senha'),
        ]);
    }
}
