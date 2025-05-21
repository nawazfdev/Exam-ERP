<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         // Find an existing organization or create one
         $organization = Organization::firstOrCreate([
            'name' => 'USCS',
        ]);
        $admin = new User();
        $admin->first_name = "Super";
        $admin->last_name = "Admin";
        $admin->email = "superadmin@erp.com";
        $admin->password = Hash::make('hadi@912');
        $admin->organization_id = $organization->id;
        $admin->save();
        // Assign role
        $admin->assignRole('superadmin');
    }
}
