<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    public function run(): void
    {
        // Create Roles
        $superAdminRole = Role::updateOrCreate(['name' => 'superadmin', 'guard_name' => 'web']);
        $adminRole = Role::updateOrCreate(['name' => 'admin', 'guard_name' => 'web']);
        $organizationAdminRole = Role::updateOrCreate(['name' => 'organization-admin', 'guard_name' => 'web']);
        $candidateRole = Role::updateOrCreate(['name' => 'candidate', 'guard_name' => 'candidate']);

        // SuperAdmin Modules (Full System Access)
        $superAdminModules = [
            'Dashboard',
            'SiteSettings', 
            'Organizations',
            'Users',
            'Roles',
            'SystemSettings',
            'Reports',
            'Candidates',
            'CandidateGroups',
            'Exams',
            'Questions',
            'QuestionCategories',
            'Results',
            'ExamAttempts',
        ];

        // System Admin Modules (System-wide but limited)
        $adminModules = [
            'Dashboard',
            'Users',
            'Organizations',
            'Reports',
            'SystemSettings',
            'Candidates',
            'Exams',
            'Results',
        ];

        // Organization Admin Modules (Organization-Specific Access)
        $organizationModules = [
            'Dashboard',
            'Candidates',
            'CandidateGroups',
            'Exams',
            'Questions',
            'QuestionCategories',
            'Results',
            'ExamAttempts',
            'Profile',
        ];

        // Candidate Modules (Limited Access)
        $candidateModules = [
            'Dashboard',
            'UpcomingExams',
            'ExamAttempts',
            'Results',
            'Profile',
            'Certificates',
        ];

        // Create SuperAdmin Permissions
        $superAdminPermissions = [];
        foreach ($superAdminModules as $module) {
            $permissions = $this->createModulePermissions($module);
            $superAdminPermissions = array_merge($superAdminPermissions, $permissions);
        }

        // Create Admin Permissions
        $adminPermissions = [];
        foreach ($adminModules as $module) {
            $permissions = $this->createModulePermissions($module);
            $adminPermissions = array_merge($adminPermissions, $permissions);
        }

        // Create Organization Admin Permissions
        $organizationPermissions = [];
        foreach ($organizationModules as $module) {
            $permissions = $this->createModulePermissions($module);
            $organizationPermissions = array_merge($organizationPermissions, $permissions);
        }

        // Create Candidate Permissions
        $candidatePermissions = [];
        foreach ($candidateModules as $module) {
            $permissions = $this->createModulePermissions($module, 'candidate');
            $candidatePermissions = array_merge($candidatePermissions, $permissions);
        }

        // Assign permissions to roles
        $superAdminRole->syncPermissions($superAdminPermissions);
        $adminRole->syncPermissions($adminPermissions);
        $organizationAdminRole->syncPermissions($organizationPermissions);
        $candidateRole->syncPermissions($candidatePermissions);
    }

    private function createModulePermissions($module, $guard = 'web')
    {
        $permissions = [];
        $moduleName = strtolower(str_replace(' ', '-', $module));

        $actions = ['show', 'create', 'edit', 'delete'];
        
        foreach ($actions as $action) {
            $permissionName = $action . '-' . $moduleName;
            $permission = Permission::updateOrCreate([
                'name' => $permissionName,
                'guard_name' => $guard,
                'group_name' => $module
            ]);
            $permissions[] = $permission;
        }

        return $permissions;
    }
}