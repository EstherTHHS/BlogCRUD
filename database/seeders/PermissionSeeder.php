<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_Admin = Role::create(['name' => 'SuperAdmin']);
        $editor = Role::create(['name' => 'Editor']);

        $dashboard = Permission::create(['name' => 'dashboard']);
        $widget = Permission::create(['name' => 'widget']);
        $blog_List = Permission::create(['name' => 'blog_List']);

        $super_Admin->givePermissionTo([$dashboard, $widget, $blog_List]);
        $editor->givePermissionTo($blog_List);
    }
}
