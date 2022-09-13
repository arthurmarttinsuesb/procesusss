<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Reset cached roles and permissions
         app()['cache']->forget('spatie.permission.cache');

        //  $role = Role::create(['name' => 'administrador', 'guard_name' => 'web']);
        //  $role = Role::create(['name' => 'cidadao', 'guard_name' => 'web']);
         $role = Role::create(['name' => 'colaborador-nivel-1', 'guard_name' => 'web']);
         $role = Role::create(['name' => 'colaborador-nivel-2', 'guard_name' => 'web']);


     //administrador
    //   DB::table('model_has_roles')->insert([
    //      'role_id' => 1,
    //      'model_type' => "App\User",
    //      'model_id' => 1
    //  ]);

    }
}
