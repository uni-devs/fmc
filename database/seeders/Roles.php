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
        $admin = Role::create(['name' => 'admin']);
        $admin->syncPermissions([$trainer_p2,$trainer_p1]);
    }
}
