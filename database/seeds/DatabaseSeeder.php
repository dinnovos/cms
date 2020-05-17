<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'full_name'     	=> 'Admin Admin',
            'email'         	=> 'admin@gmail.com',
            'password'      	=> bcrypt('123456'),
            'last_login'    	=> Carbon::now()->format('Y-m-d H:i:s'),
            'status'        	=> 1,
            'is_admin'      	=> 1,
            'email_confirmed'   => 1,
            'created_at'    	=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    	=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'full_name'     	=> 'User User',
            'email'         	=> 'user@gmail.com',
            'password'      	=> bcrypt('123456'),
            'last_login'    	=> Carbon::now()->format('Y-m-d H:i:s'),
            'status'        	=> 1,
            'is_admin'      	=> 0,
            'email_confirmed'   => 1,
            'type'              => 1,
            'created_at'    	=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    	=> Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'full_name'         => 'Assistant',
            'email'             => 'assistant@gmail.com',
            'password'          => bcrypt('123456'),
            'last_login'        => Carbon::now()->format('Y-m-d H:i:s'),
            'status'            => 1,
            'is_admin'          => 0,
            'email_confirmed'   => 1,
            'type'              => 2,
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('settings')->insert([
            'project'               => 'Dinnovos',
            'route_login_panel'     => 'panel',
            'maintenance_mode'      => 0,
            'coming_soon_mode'      => 0,
            'email_notification'    => 'admin@gmail.com',
            'created_at'            => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'            => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        //-----------------------------------------------------------------------------
        
        DB::table('roles')->insert([
            'title'         => 'Administrador',
            'name'          => 'admin',
            'guard_name'    => 'web',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('roles')->insert([
            'title'         => 'Asistente',
            'name'          => 'assistant',
            'guard_name'    => 'web',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('permissions')->insert([
            'title'         => 'Crear',
            'name'          => 'create-action',
            'guard_name'    => 'web',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('permissions')->insert([
            'title'         => 'Editar',
            'name'          => 'edit-action',
            'guard_name'    => 'web',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('permissions')->insert([
            'title'         => 'Eliminar',
            'name'          => 'delete-action',
            'guard_name'    => 'web',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('permissions')->insert([
            'title'         => 'M&oacute;dulo - P&aacute;ginas',
            'name'          => 'pages-module',
            'guard_name'    => 'web',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('permissions')->insert([
            'title'         => 'M&oacute;dulo - Blog',
            'name'          => 'blog-module',
            'guard_name'    => 'web',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('permissions')->insert([
            'title'         => 'M&oacute;dulo - Clientes',
            'name'          => 'users-module',
            'guard_name'    => 'web',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('permissions')->insert([
            'title'         => 'M&oacute;dulo - Asistentes',
            'name'          => 'assistants-module',
            'guard_name'    => 'web',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('permissions')->insert([
            'title'         => 'M&oacute;dulo - Roles & Permisos',
            'name'          => 'security-module',
            'guard_name'    => 'web',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('permissions')->insert([
            'title'         => 'M&oacute;dulo - Ajustes',
            'name'          => 'settings-module',
            'guard_name'    => 'web',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('permissions')->insert([
            'title'         => 'Sesi&oacute;n en Panel',
            'name'          => 'login-panel',
            'guard_name'    => 'web',
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('role_has_permissions')->insert([
            'role_id'       => 1,
            'permission_id' => 1
        ]);

        DB::table('role_has_permissions')->insert([
            'role_id'       => 1,
            'permission_id' => 2
        ]);

        DB::table('role_has_permissions')->insert([
            'role_id'       => 1,
            'permission_id' => 3
        ]);

        DB::table('role_has_permissions')->insert([
            'role_id'       => 1,
            'permission_id' => 4
        ]);

        DB::table('role_has_permissions')->insert([
            'role_id'       => 1,
            'permission_id' => 5
        ]);

        DB::table('role_has_permissions')->insert([
            'role_id'       => 1,
            'permission_id' => 6
        ]);        

        DB::table('role_has_permissions')->insert([
            'role_id'       => 1,
            'permission_id' => 7
        ]);

        DB::table('role_has_permissions')->insert([
            'role_id'       => 1,
            'permission_id' => 8
        ]);

        DB::table('role_has_permissions')->insert([
            'role_id'       => 1,
            'permission_id' => 9
        ]);

        DB::table('role_has_permissions')->insert([
            'role_id'       => 1,
            'permission_id' => 10
        ]);

        DB::table('role_has_permissions')->insert([
            'role_id'       => 2,
            'permission_id' => 10
        ]);

        //-----------------------------------------------------------------------------

        DB::table('languages')->insert([
            'title'         => 'Espa&ntilde;ol',
            'lang'          => 'es',
            'status'        => 1,
            'main'          => 1,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('languages')->insert([
            'title'         => 'Ingles',
            'lang'          => 'en',
            'status'        => 1,
            'main'          => 0,
            'created_at'    => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'    => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        //-----------------------------------------------------------------------------
    }
}
