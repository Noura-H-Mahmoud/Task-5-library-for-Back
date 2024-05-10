<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'book-list',
           'book-create',
           'book-edit',
           'book-delete',
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'root-list',
           'root-create',
           'root-edit',
           'root-delete',
           'category-list',
           'category-create',
           'category-edit',
           'category-delete',
        ];
     
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}