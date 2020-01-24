<?php

use Illuminate\Database\Seeder;

class ConnectRelationshipsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Get Available Permissions.
         */
        $permissions = config('roles.models.permission')::all();

        /**
         * Attach Permissions to Roles.
         */
        $roleAdmin = config('roles.models.role')::where('slug', '=', 'admin')->first();
        foreach ($permissions as $permission) {
            $roleAdmin->attachPermission($permission);
        }

        $permissions = config('roles.models.permission')::where('slug', 'like', '%.catalog')
            ->orWhere('slug', 'like', '%.orders')
            ->orWhere('slug', 'like', '%.customers');

        $roleAdmin = config('roles.models.role')::where('slug', '=', 'manager')->first();
        foreach ($permissions as $permission) {
            $roleAdmin->attachPermission($permission);
        }

        $permissions = config('roles.models.permission')::where('slug', 'like', 'view.catalog')
            ->orWhere('slug', 'like', 'view.orders')
            ->orWhere('slug', 'like', 'view.customers');

        $roleAdmin = config('roles.models.role')::where('slug', '=', 'courier')->first();
        foreach ($permissions as $permission) {
            $roleAdmin->attachPermission($permission);
        }

        $permissions = config('roles.models.permission')::where('slug', 'like', 'view.catalog')
            ->orWhere('slug', 'like', 'view.orders');

        $roleAdmin = config('roles.models.role')::where('slug', '=', 'courier')->first();
        foreach ($permissions as $permission) {
            $roleAdmin->attachPermission($permission);
        }
    }
}
