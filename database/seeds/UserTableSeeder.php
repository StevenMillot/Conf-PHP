<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::statement('ALTER TABLE users AUTO_INCREMENT=1');
        DB::table('users')->insert([
            [
                'name'      => 'admin',
                'email'     => 'admin@gmail.com',
                'password'  => Hash::make('admin'),
            ],
        ]);
    }
}
