<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Use updateOrCreate to avoid duplicate roles
        $role = Role::updateOrCreate(
            ['name' => 'superadmin', 'guard_name' => 'web']
        );

        $modules = [
            'Dashboard',
            'SiteSettings',
            'HomeSections',
            'Sliders',
            'Products',
            'ProcessTechnologies',
            'Investors',
            'IndustryCategories',
            'AboutUs',
            'Industries',
            'Pages',
            'Categories',
            'BlogCategories',
            'BlogPosts',
            'Stories',
            'Testimonials',
            'Users',
            'Roles',
        ];

        foreach ($modules as $module) {
            $moduleName = $module;

            // Generate permission names
            $showPermissionName = 'show-' . strtolower(str_replace(' ', '-', $moduleName));
            $createPermissionName = 'create-' . strtolower(str_replace(' ', '-', $moduleName));
            $editPermissionName = 'edit-' . strtolower(str_replace(' ', '-', $moduleName));
            $deletePermissionName = 'delete-' . strtolower(str_replace(' ', '-', $moduleName));

            // Use updateOrCreate to avoid duplicate permissions
            Permission::updateOrCreate([
                'name' => $showPermissionName,
                'group_name' => $moduleName
            ]);
            Permission::updateOrCreate([
                'name' => $createPermissionName,
                'group_name' => $moduleName
            ]);
            Permission::updateOrCreate([
                'name' => $editPermissionName,
                'group_name' => $moduleName
            ]);
            Permission::updateOrCreate([
                'name' => $deletePermissionName,
                'group_name' => $moduleName
            ]);

            // Add a specific 'update' permission for 'Bookings' (optional)
            if ($moduleName === 'Bookings') {
                Permission::updateOrCreate([
                    'name' => 'update-booking-payment-status',
                    'group_name' => $moduleName
                ]);
            }
        }

        // Assign all permissions to the 'superadmin' role
        $allPermissions = Permission::all();
        $role->syncPermissions($allPermissions);
    }
}
