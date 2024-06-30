<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $admin = Role::create(['name' => 'Admin']);
        $mentor = Role::create(['name' => 'Mentor']);
        $mentee = Role::create(['name' => 'Mentee']);

        //Permission::create(['name' => 'admin.home'])->syncRoles([$admin, $mentor, $mentee]);

        /* 
            $role->givePermissionTo($permission); // Asignar permisos a un rol
            $permission->assignRole($role); // Asignar un rol a un permiso
            $role->syncPermissions($permissions); // Asignar varios permisos a un rol
            $permission->syncRoles($roles); // Asignar varios roles a un permiso
        */

        //Admin Permissions Mentors
        //Permission::create(['name' => 'admin.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.mentors.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.mentors.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.mentors.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.mentors.destroy'])->assignRole($admin);
        
        //Admin Permissions Mentees
        Permission::create(['name' => 'admin.mentees.index'])->assignRole($admin);
        Permission::create(['name' => 'admin.mentees.create'])->assignRole($admin);
        Permission::create(['name' => 'admin.mentees.edit'])->assignRole($admin);
        Permission::create(['name' => 'admin.mentees.destroy'])->assignRole($admin);

        //Mentor Permissions
        Permission::create(['name' => 'mentor.index'])->assignRole($mentor);

        //Mentee Permissions
        Permission::create(['name' => 'mentee.index'])->assignRole($mentee);

    }
}
