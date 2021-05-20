<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::truncate();
        Role::truncate();
        User::truncate();

        $adminRole = Role::create(['name' => 'Admin']);
        $writerRole = Role::create(['name' => 'Writer']);

        $viewArticlesPermissions = Permission::create(['name' => 'View articles']);
        $createArticlesPermissions = Permission::create(['name' => 'Create articles']);
        $updateArticlesPermissions = Permission::create(['name' => 'Update articles']);
        $deleteArticlesPermissions = Permission::create(['name' => 'Delete articles']);

        $admin = new User;
        $admin->name = 'Sebastian';
        $admin->email = 'sebastian@admin.com';
        $admin->password = bcrypt('admin123');
        $admin->save();

        $admin->assignRole($adminRole);

        $writer = new User;
        $writer->name = 'Pepito';
        $writer->email = 'pepito@gmail.com';
        $writer->password = bcrypt('12345678');
        $writer->save();

        $writer->assignRole($writerRole);
    }
}
