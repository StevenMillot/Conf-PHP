<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('comments')->delete();
        DB::statement('ALTER TABLE comments AUTO_INCREMENT=1');
        DB::table('comments')->insert([
            [
                'post_id' => 1,
                'email' => 'toto@gmail.com',
                'message' => 'Prem\'s troll XD',
                'status' => 'publish',
            ],
            [
                'post_id' => 1,
                'email' => 'titi@gmail.com',
                'message' => 'Merci beaucoup',
                'status' => 'publish',
            ],
            [
                'post_id' => 2,
                'email' => 'tata@gmail.com',
                'message' => 'C\'est genial:P',
                'status' => 'publish',
            ],
            [
                'post_id' => 3,
                'email' => 'tutu@gmail.com',
                'message' => 'Super post merci a vous',
                'status' => 'publish',
            ],
        ]);
    }
}
