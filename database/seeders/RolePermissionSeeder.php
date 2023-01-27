<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            ['name' => 'login.admin', 'guard_name' => 'web'],
            ['name' => 'login.page', 'guard_name' => 'web'],

            ['name' => 'sys.add', 'guard_name' => 'web'],
            ['name' => 'sys.edit', 'guard_name' => 'web'],
            ['name' => 'sys.del', 'guard_name' => 'web'],
            ['name' => 'sys.view', 'guard_name' => 'web'],

            //bill
            ['name' => 'bil.add', 'guard_name' => 'web'],
            ['name' => 'bil.edit', 'guard_name' => 'web'],
            ['name' => 'bil.view', 'guard_name' => 'web'],
            // ['name' => 'bill.del', 'guard_name' => 'web'],

            //category
            ['name' => 'cat.add', 'guard_name' => 'web'],
            ['name' => 'cat.edit', 'guard_name' => 'web'],
            ['name' => 'cat.del', 'guard_name' => 'web'],
            ['name' => 'cat.view', 'guard_name' => 'web'],


            //coupon
            ['name' => 'cou.add', 'guard_name' => 'web'],
            ['name' => 'cou.edit', 'guard_name' => 'web'],
            ['name' => 'cou.del', 'guard_name' => 'web'],
            ['name' => 'cou.view', 'guard_name' => 'web'],

            //feedback
            ['name' => 'fee.add', 'guard_name' => 'web'],
            ['name' => 'fee.edit', 'guard_name' => 'web'],
            ['name' => 'fee.del', 'guard_name' => 'web'],
            ['name' => 'fee.view', 'guard_name' => 'web'],

            //Galery
            ['name' => 'gal.add', 'guard_name' => 'web'],
            ['name' => 'gal.edit', 'guard_name' => 'web'],
            ['name' => 'gal.del', 'guard_name' => 'web'],
            ['name' => 'gal.view', 'guard_name' => 'web'],

            //Oder
            ['name' => 'ord.add', 'guard_name' => 'web'],
            ['name' => 'ord.edit', 'guard_name' => 'web'],
            ['name' => 'ord.del', 'guard_name' => 'web'],
            ['name' => 'ord.view', 'guard_name' => 'web'],

            //Product
            ['name' => 'pro.add', 'guard_name' => 'web'],
            ['name' => 'pro.edit', 'guard_name' => 'web'],
            ['name' => 'pro.del', 'guard_name' => 'web'],
            ['name' => 'pro.view', 'guard_name' => 'web'],

            //unit
            ['name' => 'uni.add', 'guard_name' => 'web'],
            ['name' => 'uni.edit', 'guard_name' => 'web'],
            ['name' => 'uni.del', 'guard_name' => 'web'],
            ['name' => 'uni.view', 'guard_name' => 'web'],

            //Customer
            ['name' => 'cus.add', 'guard_name' => 'web'],
            ['name' => 'cus.edit', 'guard_name' => 'web'],
            ['name' => 'cus.del', 'guard_name' => 'web'],
            ['name' => 'cus.view', 'guard_name' => 'web'],

            //Silder
            ['name' => 'sli.add', 'guard_name' => 'web'],
            ['name' => 'sli.edit', 'guard_name' => 'web'],
            ['name' => 'sli.del', 'guard_name' => 'web'],
            ['name' => 'sli.view', 'guard_name' => 'web'],

            // Statistic
            ['name' => 'sta.view', 'guard_name' => 'web'],

            // Log system
            ['name' => 'log.view', 'guard_name' => 'web'],


        ]);

        $roleAdmin = Role::create(['name' => 'admin', 'guard_name' => 'web']);
        // $roleDirector = Role::create(['name' => 'director', 'guard_name' => 'web']);
        $roleManager = Role::create(['name' => 'manager', 'guard_name' => 'web']);
        $roleStaff = Role::create(['name' => 'staff', 'guard_name' => 'web']);
        // $roleUser = Role::create(['name' => 'customer', 'guard_name' => 'web']);

        $admin = User::create([
            'fullname' => 'admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'), // password
            'phone_number' => '0123456789',
        ]);

        $staff = User::create([
            'fullname' => 'staff',
            'username' => 'tester',
            'email' => 'tester@gmail.com',
            'password' => bcrypt('123456'), // password
            'phone_number' => '1234567890',
        ]);

        $customer = Customer::create([
            'fullname' => 'Nguyen Van A',
            'username' => 'customer',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('123456'), // password
            'phone_number' => '1234567899',
        ]);

        $direction = User::create([
            'fullname' => 'direction',
            'username' => 'direction',
            'email' => 'direction@gmail.com',
            'password' => bcrypt('123456'), // password
            'phone_number' => '1234567898',
        ]);
        $roleAdmin->givePermissionTo(Permission::all());
        $roleManager->givePermissionTo(Permission::where([
            ['name', '<>', 'fee.add'],
            ['name', '<>', 'fee.edit'],
            ['name', '<>', 'fee.del'],
            ['name', '<>', 'log.view'],
            ['name', '<>', 'cus.add'],
            ['name', '<>', 'cus.edit'],
            ['name', '<>', 'cus.del'],
        ])->get());
        $roleStaff->givePermissionTo(Permission::where([
            ['name', '<>', 'fee.add'],
            ['name', '<>', 'fee.edit'],
            ['name', '<>', 'fee.del'],
            ['name', '<>', 'log.view'],
            ['name', '<>', 'cus.add'],
            ['name', '<>', 'cus.edit'],
            ['name', '<>', 'cus.del'],
            ['name', 'not like', 'sys%'],
        ])->get());

        // $roleUser->givePermissionTo(Permission::where([
        //     ['name', '<>', 'login.admin'],
        // ]));

        $admin->assignRole($roleAdmin);
        $staff->assignRole($roleManager);
        $staff->assignRole($roleStaff);
        // $customer->assignRole($roleUser);
        $direction->assignRole($roleManager);
    }
}
