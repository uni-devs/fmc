<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $trainer = Role::create(['name' => 'trainer']);
        $trainer_p1 = Permission::create(['name' => 'add workshop']);
        $trainer_p2 = Permission::create(['name' => 'edit workshop']);
        $admin = Role::create(['name' => 'admin']);
        $admin->syncPermissions([$trainer_p2,$trainer_p1]);
    }
}
