<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = config('roles.models.role')::where('slug', '=', 'admin')->first();
        $managerRole = config('roles.models.role')::where('slug', '=', 'manager')->first();
        $courierRole = config('roles.models.role')::where('slug', '=', 'courier')->first();
        $customerRole = config('roles.models.role')::where('slug', '=', 'customer')->first();

        $permissions = config('roles.models.permission')::all();

        /*
         * Add Users
         *
         */
        if (config('roles.models.defaultUser')::where('email', '=', 'admin@solotony.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Admin',
                'email'    => 'admin@solotony.com',
                'password' => bcrypt('password'),
            ]);

            $newUser->attachRole($adminRole);
            foreach ($permissions as $permission) {
                $newUser->attachPermission($permission);
            }
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'manager@solotony.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Manager',
                'email'    => 'manager@solotony.com',
                'password' => bcrypt('password'),
            ]);

            $newUser->attachRole($managerRole);
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'courier1@solotony.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'First Courier',
                'email'    => 'courier1@solotony.com',
                'password' => bcrypt('password'),
            ]);

            $newUser->attachRole($courierRole);
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'courier2@solotony.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Second Courier',
                'email'    => 'courier2@solotony.com',
                'password' => bcrypt('password'),
            ]);

            $newUser->attachRole($courierRole);
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'customer1@solotony.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'First Customer',
                'email'    => 'customer1@solotony.com',
                'password' => bcrypt('password'),
            ]);

            $newUser->attachRole($customerRole);
        }

        if (config('roles.models.defaultUser')::where('email', '=', 'customer2@solotony.com')->first() === null) {
            $newUser = config('roles.models.defaultUser')::create([
                'name'     => 'Second Customer',
                'email'    => 'customer2@solotony.com',
                'password' => bcrypt('password'),
            ]);

            $newUser->attachRole($customerRole);
        }

    }
}
