<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'nama'  => 'admin'
        ]);

        Role::create([
            'nama'  => 'user'
        ]);
    }
}
