<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name'  => 'wahyu',
            'email' => 'wahyu@gmail.com',
            'password' => bcrypt('wahyu1993'),
            'address'   => 'Kotabaru',
            'phone'     => '082353089050'
        ]);

        $user->assignRoles('admin');
    }
}
