<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        DB::table('groups')->delete();
        DB::table('groups')->insert(array([
                'id'          => 1,
                'group_name'        => 'Superadmin',
                'group_description' => 'List data group superadmin',
                'created_by'  => 'machine',
                'created_at'  => \Carbon\Carbon::now(), 
                'updated_at'  => \Carbon\Carbon::now()
        ],[
                'id'          => 2,
                'group_name'        => 'Member',
                'group_description' => 'List data group member',
                'created_by'  => 'machine',
                'created_at'  => \Carbon\Carbon::now(), 
                'updated_at'  => \Carbon\Carbon::now()
        ]));

        DB::table('users')->delete();
        DB::table('users')->insert([
                'id'            => 1,
                'id_group'      => 1,
                'fullname'      => 'Admin System',
                'name'  	    => 'Administrator',
                'username'      => 'adminsystem',
                'email'         => 'adminsystem@gmail.com',
                'password'      => bcrypt('123456'),
                'image'         => 'user.jpg',
                'status'        => 'active',
                'created_by'    => 'machine',
                'created_at'    => \Carbon\Carbon::now(), 
                'updated_at'    => \Carbon\Carbon::now()
        ]);

        DB::table('languages')->delete();
        DB::table('languages')->insert(array([
                'id'          => 1,
                'lang_name'   => 'English',
                'lang_code'   => 'en',
                'status'      => 'active',
                'created_by'  => 'machine',
                'created_at'  => \Carbon\Carbon::now(), 
                'updated_at'  => \Carbon\Carbon::now()
        ],[
                'id'          => 2,
                'lang_name'   => 'Indonesia',
                'lang_code'   => 'id',
                'status'      => 'active',
                'created_by'  => 'machine',
                'created_at'  => \Carbon\Carbon::now(), 
                'updated_at'  => \Carbon\Carbon::now()
        ]));

        DB::table('sitesetting')->delete();
        DB::table('sitesetting')->insert([
                'id'          => 1,
                'author'      => 'Admin System',
                'title'       => 'Profile Official Website',
                'keywords'    => 'Official Website',
                'description' => 'Profile Official Website',
                'favicon'     => 'favicon.ico',
                'logo'        => 'logo.png',
                'image'       => 'image.jpg',
                'banner'      => 'banner.jpg',
                'video'       => '',
                'email'       => 'adminsystem@gmail.com',
                'phone'       => '',
                'address'     => '',
                'facebook'    => '',
                'twitter'     => '',
                'gplus'       => '',
                'maps'        => '',
                'footer'      => '&copy; '.date('Y').' all right reserved. | Developed by @aleecode',
                'created_by'  => 'machine',
                'created_at'  => \Carbon\Carbon::now(), 
                'updated_at'  => \Carbon\Carbon::now()
        ]);

        DB::table('category_post')->delete();
        DB::table('category_post')->insert(array([
                'id'         => 1,
                'cat_name'   => 'Uncategory',
                'cat_slug'   => 'uncategory',
                'cat_status' => 'draft',
                'created_at' => \Carbon\Carbon::now(), 
                'updated_at' => \Carbon\Carbon::now()
        ]));

        Model::reguard();
    }
}
