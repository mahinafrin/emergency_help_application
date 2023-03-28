<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        $roleAdmin = Role::create(['name' => 'admin']);
        // $rolePatient = Role::create(['name' => 'patient']);
        $roleDoctor = Role::create(['name' => 'doctor']);
        // $roleHelper = Role::create(['name' => 'helper']);
        // $roleVisitor = Role::create(['name' => 'visitor']);
        $user = User::factory()->create([
            'name' => 'Admin',
            'phone' => '01797840513',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password')
        ]);
        $user->assignRole($roleAdmin);
    }
}
