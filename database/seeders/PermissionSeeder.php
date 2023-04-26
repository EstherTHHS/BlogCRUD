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
        $blog_Create = Permission::create(['name' => 'blogCreate']);
        $blog_Edit = Permission::create(['name' => 'blogedit']);
        $blog_Delete = Permission::create(['name' => 'blogdelete']);



        $post_list = Permission::create(['name' => 'post_list']);
        // $note_list = Permission::create(['name' => 'note_list']);
        $permissionNav = Permission::create(['name' => 'permission_list']);


        $super_Admin->givePermissionTo([$dashboard, $widget, $blog_List, $post_list, $blog_Create, $blog_Edit, $blog_Delete, $permissionNav]);

        $editor->givePermissionTo($blog_List, $blog_Create, $blog_Edit, $permissionNav);
    }
}
