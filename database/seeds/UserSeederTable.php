<?php

use Illuminate\Database\Seeder;

class UserSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Role::create(
            [
                'name' => "Médiathécaire",
                'description' => "the awesome admin dashboard wich provide you all access",
                'slug' => 'this-is-the-first-admin-role'
         ]);


         App\Role::create(
            [
                'name' => "Joueur",
                'description' => "the  member dashboard wich provide you all access",
                'slug' => 'this-is-the-third-admin-role'
    ]);


        App\User::create(
            [
                'first_name' => 'John',
                'middle_name' => 'Michael',
                'last_name' => 'Doe',
                'email' => 'unicron@fake.io',
                'password' => bcrypt('password'),
                'username' => 'admin',
                'role' => 1,
                'statut' => true,
                'remember_token' => 'adghhdyyyfkj8ds9e8ea8s9rrf6633qeeg',
                'confirm_token' => 'ad87123yyyfkj8ds9e8ea8s9rrf6633qeeg',
                'reset_token' => "adghhdyyyfkj8ds9e8ea8s9rrf6633qeeg",
                'slug' => 'dominique-damba-maoundongone-2018'
            ]
    );
    }
}
