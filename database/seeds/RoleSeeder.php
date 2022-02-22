<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Role::create(['name' => 'SUPER_ADMIN']);
        Role::create(['name' => 'ADMIN']);
        Role::create(['name' => 'DEVELOPER']);
        Role::create(['name' => 'AGENT']);
        Role::create(['name' => 'USER']);
    }
}
