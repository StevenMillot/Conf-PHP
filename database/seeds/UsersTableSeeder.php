<?php
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                'password'  => Hash::make('admin'),
            ],
        ]);
    }
}
