<?php

use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
         * Permission Types
         *
         */
        $Permissionitems = [
            [
                'name'        => 'Can View Users',
                'slug'        => 'view.users',
                'description' => 'Can view users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Users',
                'slug'        => 'create.users',
                'description' => 'Can create new users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Users',
                'slug'        => 'edit.users',
                'description' => 'Can edit users',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Users',
                'slug'        => 'delete.users',
                'description' => 'Can delete users',
                'model'       => 'Permission',
            ],


            [
                'name'        => 'Can View Catalog',
                'slug'        => 'view.catalog',
                'description' => 'Can view catalog',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Catalog',
                'slug'        => 'create.catalog',
                'description' => 'Can create new catalog',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Catalog',
                'slug'        => 'edit.catalog',
                'description' => 'Can edit catalog',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Catalog',
                'slug'        => 'delete.catalog',
                'description' => 'Can delete catalog',
                'model'       => 'Permission',
            ],


            [
                'name'        => 'Can View Orders',
                'slug'        => 'view.orders',
                'description' => 'Can view orders',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Orders',
                'slug'        => 'create.orders',
                'description' => 'Can create new orders',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Orders',
                'slug'        => 'edit.orders',
                'description' => 'Can edit orders',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Orders',
                'slug'        => 'delete.orders',
                'description' => 'Can delete orders',
                'model'       => 'Permission',
            ],


            [
                'name'        => 'Can View Customers',
                'slug'        => 'view.customers',
                'description' => 'Can view customers',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Create Customers',
                'slug'        => 'create.customers',
                'description' => 'Can create new customers',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Edit Customers',
                'slug'        => 'edit.customers',
                'description' => 'Can edit customers',
                'model'       => 'Permission',
            ],
            [
                'name'        => 'Can Delete Customers',
                'slug'        => 'delete.customers',
                'description' => 'Can delete customers',
                'model'       => 'Permission',
            ],

        ];

        /*
         * Add Permission Items
         *
         */
        foreach ($Permissionitems as $Permissionitem) {
            $newPermissionitem = config('roles.models.permission')::where('slug', '=', $Permissionitem['slug'])->first();
            if ($newPermissionitem === null) {
                $newPermissionitem = config('roles.models.permission')::create([
                    'name'          => $Permissionitem['name'],
                    'slug'          => $Permissionitem['slug'],
                    'description'   => $Permissionitem['description'],
                    'model'         => $Permissionitem['model'],
                ]);
            }
        }
    }
}
