<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Organization;
use App\Models\Candidate;
use App\Models\CandidateGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Create Super Admin
        $superAdmin = User::updateOrCreate(
            ['email' => 'superadmin@erp.com'],
            [
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'password' => Hash::make('hadi@912'),
                'organization_id' => null, // SuperAdmin doesn't belong to any organization
            ]
        );
        $superAdmin->assignRole('superadmin');

        // Create Sample Organizations with Admins
        $organizations = [
            [
                'name' => 'USCS University',
                'email' => 'admin@uscs.edu',
                'admin_email' => 'admin@uscs.edu',
                'admin_password' => 'password123'
            ],
            [
                'name' => 'Tech Institute',
                'email' => 'contact@techinstitute.com',
                'admin_email' => 'admin@techinstitute.com',
                'admin_password' => 'password123'
            ]
        ];

        foreach ($organizations as $orgData) {
            // Create Organization
            $organization = Organization::updateOrCreate(
                ['email' => $orgData['email']],
                [
                    'name' => $orgData['name'],
                    'email' => $orgData['email'],
                     'is_active' => true,
                ]
            );

            // Create Organization Admin
            $orgAdmin = User::updateOrCreate(
                ['email' => $orgData['admin_email']],
                [
                    'first_name' => 'Organization',
                    'last_name' => 'Admin',
                    'password' => Hash::make($orgData['admin_password']),
                    'organization_id' => $organization->id,
                ]
            );
            $orgAdmin->assignRole('organization-admin');

            // Update organization with admin user
            $organization->update(['user_id' => $orgAdmin->id]);

            // Create a sample candidate group for this organization
            $candidateGroup = CandidateGroup::updateOrCreate(
                [
                    'name' => 'Default Group',
                    'organization_id' => $organization->id
                ],
                [
                    'description' => 'Default candidate group for ' . $organization->name,
                     'created_by' => $orgAdmin->id,
                ]
            );

            // Create sample candidates for this organization
            $candidates = [
                [
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'email' => 'candidate1@' . strtolower(str_replace(' ', '', $orgData['name'])) . '.com',
                    'username' => 'johndoe' . $organization->id,
                    'password' => 'candidate123'
                ],
                [
                    'first_name' => 'Jane',
                    'last_name' => 'Smith',
                    'email' => 'candidate2@' . strtolower(str_replace(' ', '', $orgData['name'])) . '.com',
                    'username' => 'janesmith' . $organization->id,
                    'password' => 'candidate123'
                ]
            ];

            foreach ($candidates as $candidateData) {
                $candidate = Candidate::updateOrCreate(
                    ['email' => $candidateData['email']],
                    [
                        'first_name' => $candidateData['first_name'],
                        'last_name' => $candidateData['last_name'],
                        'username' => $candidateData['username'],
                        'password' => Hash::make($candidateData['password']),
                        'candidate_group_id' => $candidateGroup->id,
                        'mobile' => '1234567890',
                        'national_id' => 'NAT' . rand(100000, 999999),
                        'reference_id' => 'REF' . rand(100000, 999999),
                         'created_by' => $orgAdmin->id,
                        'organization_id' => $organization->id,
                    ]
                );
                $candidate->assignRole('candidate');
            }
        }

        // Create a standalone Admin User (not tied to any organization)
        $standaloneAdmin = User::updateOrCreate(
            ['email' => 'admin@erp.com'],
            [
                'first_name' => 'System',
                'last_name' => 'Admin',
                'password' => Hash::make('admin123'),
                'organization_id' => null,
            ]
        );
        $standaloneAdmin->assignRole('admin');

        // Output created users for reference
        $this->command->info('Created users:');
        $this->command->info('Super Admin: superadmin@erp.com / hadi@912');
        $this->command->info('System Admin: admin@erp.com / admin123');
        $this->command->info('Org Admin 1: admin@uscs.edu / password123');
        $this->command->info('Org Admin 2: admin@techinstitute.com / password123');
        $this->command->info('Sample Candidates created with password: candidate123');
    }
}